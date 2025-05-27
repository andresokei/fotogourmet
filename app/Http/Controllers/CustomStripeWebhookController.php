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
                    $eventId = $payload['id'];

                    // Evitar duplicados
                    if (! CreditTransaction::where('reference', $eventId)->exists()) {
                        $user->adjustCredits($creditsToAdd, 'subscription', $eventId);
                        // Si necesitas expires_at o expired_processed, puedes actualizar el último registro aquí.
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

    /** Subscripción eliminada */
    public function handleCustomerSubscriptionDeleted(array $payload)
    {
        $stripeId  = $payload['data']['object']['customer'] ?? null;          // cliente Stripe
        $periodEnd = $payload['data']['object']['current_period_end'] ?? 0;   // fin de periodo (timestamp)

        $user = User::where('stripe_id', $stripeId)->first();

        Log::info('Subscripción eliminada', [
            'stripe_id'  => $stripeId,
            'period_end' => $periodEnd,
        ]);

        if ($user && $user->credits_balance > 0) {
            $user->adjustCredits(-$user->credits_balance, 'expiration', $payload['id']);
        }

        // Dejamos que Cashier haga lo suyo
        return parent::handleCustomerSubscriptionDeleted($payload);
    }
}
