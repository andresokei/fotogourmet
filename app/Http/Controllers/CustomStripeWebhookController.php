<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;
use App\Models\User;
use App\Models\CreditTransaction;
use Log;

class CustomStripeWebhookController extends CashierController
{
    /** Punto de entrada para todos los webhooks */
    public function handleWebhook(Request $request)
    {
        Log::info('ENTRA EN HANDLEWEBHOOK', [
            'event' => $request->get('type'),
        ]);

        // delega en Cashier, que llamará a handleInvoicePaymentSucceeded
        return parent::handleWebhook($request);
    }

    /** Suscripción pagada con éxito */
    public function handleInvoicePaymentSucceeded($payload)
    {
        Log::info('Webhook recibido correctamente', [
            'stripe_id' => $payload['data']['object']['customer'] ?? null,
        ]);

        $stripeId = $payload['data']['object']['customer'] ?? null;
        $user     = User::where('stripe_id', $stripeId)->first();

        if ($user) {
            $subscription = $user->subscription('default');

            if ($subscription) {
                /* Créditos según plan */
                $creditsToAdd = match ($subscription->stripe_price) {
                    'price_1RRAsyIS4HW9Ci3k6n3UqifP' => 30,
                    'price_1RRAtKIS4HW9Ci3krTmIdYFk' => 90,
                    'price_1RRB5zIS4HW9Ci3k4B25VHlP' => 220,
                    default => 0,
                };

                if ($creditsToAdd > 0) {
                    // 1. sumar saldo
                    $user->credits_balance += $creditsToAdd;
                    $user->save();

                    // 2. registrar la recarga (evitar duplicados)
                    $eventId = $payload['id'];

                    if (! CreditTransaction::where('reference', $eventId)->exists()) {
                        CreditTransaction::create([
                            'user_id'           => $user->id,
                            'amount'            => $creditsToAdd,
                            'type'              => 'subscription',
                            'reference'         => $eventId,
                            'expires_at'        => null,
                            'expired_processed' => false,
                        ]);
                    }

                    Log::info('Créditos sumados', [
                        'user_id'       => $user->id,
                        'credits_added' => $creditsToAdd,
                        'total'         => $user->credits_balance,
                    ]);
                }
            }
        }

        // responder 200 a Stripe
       
        return response('OK', 200);
    }

     // 1) Abre tu CustomStripeWebhookController

public function handleCustomerSubscriptionDeleted(array $payload)
{
    // 2) Datos básicos que vienen en el webhook
    $stripeId  = $payload['data']['object']['customer'] ?? null;          // cliente Stripe
    $periodEnd = $payload['data']['object']['current_period_end'] ?? 0;   // fin de periodo (timestamp)

    // 3) Encuentra al usuario de tu base de datos
    $user = \App\Models\User::where('stripe_id', $stripeId)->first();

    // 4) Guarda un log para que veas que funciona
    \Log::info('Subscripción eliminada', [
        'stripe_id'  => $stripeId,
        'period_end' => $periodEnd,
    ]);

    // 5) Si el usuario existe y aún tiene saldo, lo ponemos a 0
    if ($user && $user->credits_balance > 0) {

        // 5.a) Creamos una transacción negativa para dejar rastro
        \App\Models\CreditTransaction::create([
            'user_id'   => $user->id,
            'amount'    => -$user->credits_balance, // restamos TODO
            'type'      => 'expiration',
            'reference' => $payload['id'],          // id único del evento Stripe
        ]);

        // 5.b) Actualizamos el saldo del usuario
        $user->credits_balance = 0;
        $user->save();
    }

    // 6) Dejamos que Cashier haga lo suyo
    return parent::handleCustomerSubscriptionDeleted($payload);
}

}
