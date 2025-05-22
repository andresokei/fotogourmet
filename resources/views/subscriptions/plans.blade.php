<x-app-layout>
<!-- seccion planes -->
 <style>
        body, .premium-section {
            background: #0a0a08 !important;
            color: #eee8c3;
        }
        .premium-section {
            min-height: 100vh;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .premium-title {
            color: #d4af37;
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.4rem;
            font-weight: 700;
            margin-top: 3.5rem;
            margin-bottom: 0.5rem;
            letter-spacing: 0.01em;
            text-align: center;
        }
        .premium-subtitle {
            color: #b7ad7a;
            font-size: 1.18rem;
            margin-bottom: 2.5rem;
            font-weight: 400;
            text-align: center;
            letter-spacing: 0.01em;
        }
        .plans-container {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
            margin-bottom: 2.2rem;
            width: 100%;
            max-width: 1100px;
        }
        .plan-wrapper {
            flex: 1 1 310px;
            max-width: 340px;
            min-width: 275px;
            display: flex;
            flex-direction: column;
        }
        .plan-card {
            background: linear-gradient(180deg, #19160e 0%, #10100d 100%);
            border-radius: 1.2rem;
            border: 1.5px solid #d4af37;
            box-shadow: 0 8px 32px 0 rgba(212,175,55,0.13), 0 1.5px 0 0 #d4af37;
            padding: 2.1rem 1.1rem 2.4rem 1.1rem;
            margin-bottom: 1.2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            min-height: 510px;
            transition: transform .21s cubic-bezier(.4,2,.3,1), box-shadow .2s;
        }
        .plan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 44px 0 rgba(212,175,55,0.24);
        }
        .plan-badge {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            top: 22px;
            background: #ffe080;
            color: #1a1a13;
            font-weight: 700;
            padding: 0.42rem 1.1rem;
            border-radius: 2.5rem;
            font-size: 0.92rem;
            letter-spacing: 0.01em;
            box-shadow: 0 2px 10px rgba(0,0,0,0.09);
            border: 1.2px solid #d4af37;
            background-size: 200% 100%;
            /* Animación removida */
            z-index: 2;
        }
        .plan-badge.plan-popular {
            background: #ffd04c;
            color: #181818;
            font-weight: 900;
            border-width: 2.1px;
            font-size: 1.01rem;
        }
        .plan-popular-label {
            position: absolute;
            top: 60px;
            left: 50%;
            transform: translateX(-50%);
            background: #d4af37;
            color: #19160e;
            font-size: .92rem;
            font-weight: 700;
            border-radius: 2rem;
            padding: 0.19rem 0.98rem;
            box-shadow: 0 1.5px 8px rgba(212,175,55,0.17);
            z-index: 2;
            letter-spacing: 0.01em;
        }
        /* Keyframes de animación removidos */
        .plan-price {
            margin: 2.1rem 0 1.1rem;
            font-family: 'Montserrat', Arial, sans-serif;
        }
        .price-amount {
            font-size: 2.95rem;
            font-weight: 800;
            color: #ffe291;
            letter-spacing: -0.04em;
        }
        .price-currency {
            font-size: 1.6rem;
            font-weight: 600;
            color: #ffd04c;
            margin-left: 0.22rem;
        }
        .price-period {
            font-size: 1.09rem;
            color: #b0a36a;
            margin-left: 0.45rem;
            font-weight: 500;
        }
        .features-list {
            list-style: none;
            padding: 0;
            margin: 1.1rem 0 0.5rem 0;
            text-align: left;
        }
        .feature-item {
            color: #eee8c3;
            font-size: 1.08rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.69rem 0;
            border-bottom: 1px solid rgba(212,175,55,0.13);
        }
        .feature-item:last-child {
            border-bottom: none;
        }
        .feature-icon {
            width: 1.25em;
            height: 1.25em;
            color: #ffe291;
            flex-shrink: 0;
        }
        .plan-action {
            margin-top: 1.95rem;
        }
        .btn-gold {
            background: #f9d24c;
            color: #19160e;
            font-weight: 700;
            border-radius: 1.05rem;
            padding: 0.9rem 2.2rem;
            font-size: 1.09rem;
            letter-spacing: 0.04em;
            border: none;
            outline: none;
            transition: filter .18s, box-shadow .16s, transform .12s;
            box-shadow: 0 3px 15px rgba(212,175,55,0.14);
            text-decoration: none;
            width: 100%;
            cursor: pointer;
        }
        .btn-gold:hover {
            filter: brightness(1.11);
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(212,175,55,0.17);
        }
        @media (max-width: 1050px) {
            .plans-container { gap: 1.1rem; }
            .plan-wrapper { min-width: 220px; }
        }
        @media (max-width: 880px) {
            .plans-container { flex-wrap: wrap; gap: 1.1rem;}
            .plan-wrapper { flex: 1 1 90vw; max-width: 450px;}
        }
        @media (max-width: 600px) {
            .premium-title { font-size: 1.55rem; }
            .premium-subtitle { font-size: 1.01rem; }
            .plan-card { padding: 1.5rem 0.7rem 2rem 0.7rem; min-height: 410px;}
            .price-amount { font-size: 2.15rem;}
            .plan-wrapper { min-width: 99vw; max-width: 99vw;}
        }
        .premium-footer {
            text-align: center;
            color: #b9b496;
            font-size: 0.99rem;
            margin-top: 0.6rem;
            margin-bottom: 2.6rem;
            letter-spacing: 0.01em;
            opacity: .95;
        }
        .plan-card.free-plan {
            border-color: #8a8265;
            box-shadow: 0 8px 32px 0 rgba(138,130,101,0.13);
        }
        .plan-badge.free-badge {
            background: #9c9478;
            border-color: #8a8265;
        }
    </style>
    <div class="premium-section">
        <h2 class="premium-title">Elige tu Plan</h2>
        <div class="premium-subtitle">
            Llévate fotos irresistibles para tu carta, RRSS o delivery.<br>
            Paga solo por los créditos que realmente necesitas.
        </div>
        <div class="plans-container">
            <!-- Definición de planes estática para demostración -->
            @php
                // Mapear los nombres de planes a los valores predeterminados de créditos
                $defaultCredits = [
                    'Starter' => 30,
                    'Pro' => 90,
                    'Business' => 220
                ];
                
                // Obtener planes del controlador o usar datos predeterminados si no hay
                $receivedPlans = isset($plans) ? $plans : [];
            @endphp
            
            @foreach($plans as $index => $plan)
                <div class="plan-wrapper">
                    <div class="plan-card {{ $index == 0 ? 'free-plan' : '' }}" @if($index == 2) style="box-shadow:0 12px 40px 0 rgba(212,175,55,0.23); border:2.3px solid #ffd04c;" @endif>
                        <div class="plan-badge {{ $index == 0 ? 'free-badge' : '' }} @if($index == 2) plan-popular @endif">{{ $plan['name'] }}</div>
                        <div class="plan-price">
                            <span class="price-amount">{{ explode('.', number_format($plan['price'], 2))[0] }}</span><span class="price-currency">,{{ explode('.', number_format($plan['price'], 2))[1] }} €</span>
                            <span class="price-period">/mes</span>
                        </div>
                        <ul class="features-list">
                            @php
                                $planName = $plan['name'] ?? "Plan " . ($index + 1);
                                $creditsValue = isset($defaultCredits[$planName]) ? $defaultCredits[$planName] : ($index == 0 ? 3 : ($index == 1 ? 30 : ($index == 2 ? 90 : 220)));
                                
                                $defaultFeatures = [
                                    $creditsValue . ' créditos/mes',
                                    'Calidad profesional IA',
                                    $index > 0 ? 'Descarga HD ilimitada' : 'Descarga básica',
                                    $index == 2 ? 'Soporte prioritario' : ($index == 3 ? 'Soporte VIP' : null)
                                ];
                                $features = isset($plan['features']) ? $plan['features'] : $defaultFeatures;
                            @endphp
                            
                            @foreach($features as $feature)
                                @if(!empty($feature))
                                <li class="feature-item">
                                    <svg class="feature-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 20 20"><path d="M5 11l4 4L19 7"></path></svg>
                                    {{ $feature }}
                                </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="plan-action">
                            <form method="POST" action="{{ route('subscriptions.subscribe') }}">
                                @csrf
                                <input type="hidden" name="price_id" value="{{ $plan['price_id'] }}">
                                <input type="hidden" name="plan_name" value="{{ $plan['name'] }}">
                                <button type="submit" class="btn-gold">
                                    {{ $index == 0 ? 'Comenzar gratis' : ($index == 2 ? 'Empezar ahora' : 'Suscribirse') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="premium-footer">
            Cancela cuando quieras &middot; IVA incluido &middot; Sin permanencia
        </div>
        
        <div class="free-trial-container">
            <a href="{{ route('login') }}" class="btn-free-trial">Comenzar prueba gratuita</a>
            <p class="free-trial-info">Prueba gratis durante 7 días con 3 créditos</p>
        </div>
    </div>
    
    <style>
        .free-trial-container {
            margin-top: 1rem;
            margin-bottom: 3rem;
            text-align: center;
        }
        
        .btn-free-trial {
            background: transparent;
            color: #f9d24c;
            font-weight: 700;
            border-radius: 1.05rem;
            padding: 0.9rem 2.5rem;
            font-size: 1.09rem;
            letter-spacing: 0.04em;
            border: 2px solid #f9d24c;
            outline: none;
            transition: all .18s ease;
            box-shadow: 0 3px 15px rgba(212,175,55,0.07);
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            margin-bottom: 0.7rem;
        }
        
        .btn-free-trial:hover {
            background: #f9d24c;
            color: #19160e;
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(212,175,55,0.15);
        }
        
        .free-trial-info {
            color: #b7ad7a;
            font-size: 0.98rem;
            margin-top: 0.4rem;
        }
    </style>
</x-app-layout>