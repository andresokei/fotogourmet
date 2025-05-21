<x-app-layout>
    <div class="container">
        <h2>Elige tu plan</h2>
        <div class="row">
            @foreach($plans as $plan)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body text-center">
                            <h4>{{ $plan['name'] }}</h4>
                            <p class="display-5">{{ number_format($plan['price'], 2) }} €</p>
                            <form method="POST" action="{{ route('subscriptions.subscribe') }}">
                                @csrf
                                <input type="hidden" name="price_id" value="{{ $plan['price_id'] }}">
                                <input type="hidden" name="plan_name" value="{{ $plan['name'] }}">
                                <button type="submit" class="btn btn-primary">Suscribirse</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
