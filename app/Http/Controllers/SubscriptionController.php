<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function showPlans()
    {
        // Puedes pasar los planes desde config, bd, o aquí directamente:
        $plans = [
            ['name' => 'Starter', 'price_id' => 'price_1RRAsyIS4HW9Ci3k6n3UqifP', 'price' => 9.90],
            ['name' => 'Pro',     'price_id' => 'price_1RRAtKIS4HW9Ci3krTmIdYFk', 'price' => 29.90],
            ['name' => 'Business','price_id' => 'price_1RRB5zIS4HW9Ci3k4B25VHlP', 'price' => 49.00],
        ];
        return view('subscriptions.plans', compact('plans'));
    }

    public function subscribe(Request $request)
    {
        $user = Auth::user();
        $priceId = $request->input('price_id');
        $planName = $request->input('plan_name'); // Opcional: por si quieres guardar el nombre

        // Lanza el Stripe Checkout de Cashier
        return $user
            ->newSubscription('default', $priceId)
            ->checkout([
                'success_url' => url('/subscriptions/success'),
                'cancel_url'  => url('/subscriptions/cancel'),
            ]);
    }

    // Para feedback tras el pago
    public function success() { return view('subscriptions.success'); }
    public function cancel()  { return view('subscriptions.cancel'); }
}
