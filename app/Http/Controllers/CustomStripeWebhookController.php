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
}
