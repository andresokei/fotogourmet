<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Mi suscripción</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 space-y-6">
        <div class="p-4 bg-white shadow rounded">
            <p><strong>Plan actual:</strong> {{ $planLabel ?? '— Sin suscripción —' }}</p>

            

            @php
                $nextTimestamp = optional($sub?->asStripeSubscription())->current_period_end;
                $nextDate      = $nextTimestamp ? \Carbon\Carbon::createFromTimestamp($nextTimestamp) : null;
            @endphp

            <p><strong>Próximo cobro:</strong>
                {{ $nextDate?->toFormattedDateString() ?? '—' }}
            </p>

            <p><strong>Créditos disponibles:</strong> {{ $user->credits_balance }}</p>
        </div>

        @if ($sub)
            <form method="POST" action="{{ route('subscriptions.portal') }}">
                @csrf
                <x-primary-button>Gestionar suscripción</x-primary-button>
            </form>
        @else
            <a href="{{ route('subscriptions.plans') }}" class="underline text-indigo-600">
                Ver planes disponibles
            </a>
        @endif
    </div>
</x-app-layout>
