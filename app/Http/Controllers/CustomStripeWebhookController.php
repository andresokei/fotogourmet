<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;
use App\Models\User;
use App\Models\CreditTransaction;
use Log;

class CustomStripeWebhookController extends CashierController
{
    protected array $priceMap;

    public function __construct()
    {
        $this->priceMap = [
            env('PRICE_STARTER')  => 30,
            env('PRICE_PRO')      => 90,
            env('PRICE_BUSINESS') => 220,
        ];
    }

    /** Punto de entrada para todos los webhooks */
    public function handleWebhook(Request $request)
    {
        Log::info('ENTRA EN HANDLEWEBHOOK', [
            'event' => $request->get('type'),
        ]);

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
                $creditsToAdd = $this->priceMap[$subscription->stripe_price] ?? 0;

                if ($creditsToAdd > 0) {
                    $eventId = $payload['id'];

                    if (! CreditTransaction::where('reference', $eventId)->exists()) {
                        $user->adjustCredits($creditsToAdd, 'subscription', $eventId);
                    }

                    Log::info('Créditos sumados', [
                        'user_id'       => $user->id,
                        'credits_added' => $creditsToAdd,
                        'total'         => $user->credits_balance,
                    ]);
                }
            }
        }

        return response('OK', 200);
    }

    /** Subscripción eliminada */
    public function handleCustomerSubscriptionDeleted(array $payload)
    {
        $stripeId  = $payload['data']['object']['customer'] ?? null;
        $periodEnd = $payload['data']['object']['current_period_end'] ?? 0;

        $user = User::where('stripe_id', $stripeId)->first();

        Log::info('Subscripción eliminada', [
            'stripe_id'  => $stripeId,
            'period_end' => $periodEnd,
        ]);

        if ($user && $user->credits_balance > 0) {
            $user->adjustCredits(-$user->credits_balance, 'expiration', $payload['id']);
        }

        return parent::handleCustomerSubscriptionDeleted($payload);
    }
}
