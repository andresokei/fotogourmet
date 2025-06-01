<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /* ---------- NUEVO: panel del usuario ---------- */
   public function index()
{
    $user = Auth::user();
    $sub  = $user->subscriptions()->latest()->first();   // nos quedamos con la más nueva

    // Mapa PriceID → Nombre comercial
   $labels = [
    env('PRICE_STARTER') => 'Starter',
    env('PRICE_PRO') => 'Pro',
    env('PRICE_BUSINESS') => 'Business',
];

    // Calculamos el label (o null)
    $planLabel = $sub?->stripe_price ? ($labels[$sub->stripe_price] ?? $sub->stripe_price) : null;

    return view('subscriptions.account', [
        'user'      => $user,
        'sub'       => $sub,
        'planLabel' => $planLabel,
    ]);
}


    /* ---------- NUEVO: redirigir al Customer Portal ---------- */
    
  public function redirectToPortal(Request $request)
{
    // URL a la que volverá el cliente cuando cierre el Customer Portal
    $returnUrl = route('subscriptions.index');

    // 👉🏻 Pasamos SOLO la cadena, no un array
    $portalUrl = $request->user()->billingPortalUrl($returnUrl);

    // o, si prefieres el helper “todo en uno”:
    // $portalUrl = $request->user()->redirectToBillingPortal($returnUrl)->url;

    return redirect($portalUrl);
}





    /* ---------- tus métodos existentes ---------- */
   public function showPlans()
{
    // Hardcodeamos los price_id directamente, en lugar de usar env()
    $plans = [
        [
            'name'     => 'Starter',
            'price_id' => 'price_1RTYWIDRTrT9QEyZUcOnkpg', // tu Price ID Live de Stripe
            'price'    => 9.90,
        ],
        [
            'name'     => 'Pro',
            'price_id' => 'price_1RTYZuIDRTrT9QEyop0iAWlpa', // otro Price ID Live
            'price'    => 29.90,
        ],
        [
            'name'     => 'Business',
            'price_id' => 'price_1RTYaVIDRTrT9QEyKQjtjQ8N', // otro Price ID Live
            'price'    => 49.00,
        ],
    ];

    return view('subscriptions.plans', compact('plans'));
}


    public function subscribe(Request $request)
    {
        $user    = Auth::user();
        $priceId = $request->input('price_id');

        return $user->newSubscription('default', $priceId)
                    ->checkout([
                        'success_url' => url('/subscriptions/success'),
                        'cancel_url'  => url('/subscriptions/cancel'),
                    ]);
    }

    public function success() { return view('subscriptions.success'); }
    public function cancel()  { return view('subscriptions.cancel'); }
}
