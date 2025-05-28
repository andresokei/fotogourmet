<?php

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

    public function handleWebhook(Request $request)
    {
        Log::info('ENTRA EN HANDLEWEBHOOK', [
            'event' => $request->get('type'),
        ]);

        return parent::handleWebhook($request);
    }

    public function handleInvoicePaymentSucceeded($payload)
    {
        Log::info('Webhook recibido correctamente', [
            'stripe_id' => $payload['data']['object']['customer'] ?? null,
        ]);

        $stripeData = $payload['data']['object'] ?? [];
        $stripeId   = $stripeData['customer'] ?? null;
        $user       = User::where('stripe_id', $stripeId)->first();

        if ($user) {
            $subscription = $user->subscription('default');
            if ($subscription) {
                $creditsToAdd = $this->priceMap[$subscription->stripe_price] ?? 0;
                if ($creditsToAdd > 0) {
                    $eventId = $payload['id'];
                    if (!CreditTransaction::where('reference', $eventId)->exists()) {
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

    public function handleCustomerSubscriptionDeleted(array $payload)
    {
        $stripeData = $payload['data']['object'] ?? [];
        $stripeId   = $stripeData['customer'] ?? null;
        $periodEnd  = $stripeData['current_period_end'] ?? null;

        $user = User::where('stripe_id', $stripeId)->first();

        Log::info('Subscripción eliminada', [
            'stripe_id'  => $stripeId,
            'period_end' => $periodEnd,
        ]);

        if ($user && $user->credits_balance > 0) {
            $user->adjustCredits(-abs($user->credits_balance), 'expiration', $payload['id']);
        }

        // Opcional: Si quieres usar la lógica de Cashier:
        return parent::handleCustomerSubscriptionDeleted($payload);

        // O, si prefieres controlar el 200:
        // return response('OK', 200);
    }
}
