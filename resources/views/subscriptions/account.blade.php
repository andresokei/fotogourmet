<x-app-layout>
    <style>
        body, .premium-subscription-section {
            background: #0a0a08 !important;
            color: #eee8c3;
        }
        .premium-subscription-section {
            min-height: 100vh;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .subscription-title {
            color: #d4af37;
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.4rem;
            font-weight: 700;
            margin-top: 3.5rem;
            margin-bottom: 0.5rem;
            letter-spacing: 0.01em;
            text-align: center;
        }
        .subscription-subtitle {
            color: #b7ad7a;
            font-size: 1.18rem;
            margin-bottom: 2.5rem;
            font-weight: 400;
            text-align: center;
            letter-spacing: 0.01em;
        }
        .subscription-container {
            width: 100%;
            max-width: 1100px;
            margin-bottom: 2.2rem;
        }
        .status-card {
            background: linear-gradient(180deg, #19160e 0%, #10100d 100%);
            border-radius: 1.2rem;
            border: 1.5px solid #d4af37;
            box-shadow: 0 8px 32px 0 rgba(212,175,55,0.13), 0 1.5px 0 0 #d4af37;
            padding: 2.5rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
            transition: transform .21s cubic-bezier(.4,2,.3,1), box-shadow .2s;
        }
        .status-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 44px 0 rgba(212,175,55,0.24);
        }
        .status-badge {
            position: absolute;
            right: 2rem;
            top: 2rem;
            font-weight: 700;
            padding: 0.5rem 1.2rem;
            border-radius: 2.5rem;
            font-size: 0.9rem;
            letter-spacing: 0.01em;
            box-shadow: 0 2px 10px rgba(0,0,0,0.09);
            border: 1.5px solid;
        }
        .status-badge.active {
            background: #ffe080;
            color: #1a1a13;
            border-color: #d4af37;
        }
        .status-badge.inactive {
            background: #4a453a;
            color: #b7ad7a;
            border-color: #6b6350;
        }
        .status-header {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }
        .status-icon {
            width: 2.5rem;
            height: 2.5rem;
            margin-right: 1rem;
            color: #d4af37;
        }
        .status-title {
            color: #d4af37;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.8rem;
            font-weight: 600;
            letter-spacing: 0.01em;
        }
        .status-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }
        .status-item {
            background: rgba(212,175,55,0.06);
            border: 1px solid rgba(212,175,55,0.2);
            border-radius: 1rem;
            padding: 1.8rem;
            text-align: center;
            transition: all .18s ease;
        }
        .status-item:hover {
            background: rgba(212,175,55,0.1);
            border-color: rgba(212,175,55,0.4);
            transform: translateY(-2px);
        }
        .status-item-icon {
            width: 2rem;
            height: 2rem;
            margin: 0 auto 1rem;
            color: #ffe291;
        }
        .status-item-label {
            color: #b7ad7a;
            font-size: 0.95rem;
            margin-bottom: 0.5rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.02em;
        }
        .status-item-value {
            color: #ffe291;
            font-size: 1.8rem;
            font-weight: 700;
            font-family: 'Montserrat', Arial, sans-serif;
            letter-spacing: -0.02em;
        }
        .status-item-extra {
            color: #8a8265;
            font-size: 0.85rem;
            margin-top: 0.3rem;
        }
        .actions-container {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 2rem;
        }
        .btn-premium {
            background: #f9d24c;
            color: #19160e;
            font-weight: 700;
            border-radius: 1.05rem;
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
            letter-spacing: 0.04em;
            border: none;
            outline: none;
            transition: all .18s ease;
            box-shadow: 0 3px 15px rgba(212,175,55,0.14);
            text-decoration: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            min-width: 200px;
            justify-content: center;
        }
        .btn-premium:hover {
            filter: brightness(1.11);
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(212,175,55,0.17);
        }
        .btn-secondary {
            background: transparent;
            color: #f9d24c;
            font-weight: 600;
            border-radius: 1.05rem;
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
            letter-spacing: 0.04em;
            border: 2px solid #d4af37;
            outline: none;
            transition: all .18s ease;
            text-decoration: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            min-width: 200px;
            justify-content: center;
        }
        .btn-secondary:hover {
            background: rgba(212,175,55,0.1);
            border-color: #ffe291;
            color: #ffe291;
            transform: translateY(-2px);
        }
        .btn-icon {
            width: 1.2rem;
            height: 1.2rem;
        }
        .no-subscription-alert {
            background: linear-gradient(135deg, rgba(255,193,7,0.15) 0%, rgba(255,152,0,0.1) 100%);
            border: 1.5px solid rgba(255,193,7,0.3);
            border-radius: 1.2rem;
            padding: 2rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
        }
        .alert-icon {
            width: 2rem;
            height: 2rem;
            color: #ffc107;
            flex-shrink: 0;
            margin-top: 0.2rem;
        }
        .alert-content h3 {
            color: #ffc107;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-family: 'Cormorant Garamond', serif;
        }
        .alert-content p {
            color: #eee8c3;
            font-size: 1rem;
            line-height: 1.5;
        }
        .subscription-footer {
            text-align: center;
            color: #b9b496;
            font-size: 0.95rem;
            margin-top: 1rem;
            margin-bottom: 3rem;
            letter-spacing: 0.01em;
            opacity: .9;
        }
        @media (max-width: 768px) {
            .subscription-title { font-size: 1.8rem; }
            .subscription-subtitle { font-size: 1rem; }
            .status-card { padding: 1.8rem; }
            .status-grid { grid-template-columns: 1fr; gap: 1.2rem; }
            .actions-container { flex-direction: column; align-items: center; }
            .btn-premium, .btn-secondary { min-width: 280px; }
            .status-badge { position: static; margin-bottom: 1rem; }
            .status-header { flex-direction: column; text-align: center; }
        }
    </style>

    <div class="premium-subscription-section">
        <h2 class="subscription-title">Mi Suscripción</h2>
        <p class="subscription-subtitle">
            Gestiona tu plan y revisa el estado de tu cuenta
        </p>

        <div class="subscription-container">
            <!-- Status Card -->
            <div class="status-card">
                <div class="status-badge {{ $sub ? 'active' : 'inactive' }}">
                    @if ($sub)
                        ✓ Suscripción Activa
                    @else
                        ⚠ Sin Suscripción
                    @endif
                </div>

                <div class="status-header">
                    <svg class="status-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="status-title">Estado de la Cuenta</h3>
                </div>

                <div class="status-grid">
                    <!-- Current Plan -->
                    <div class="status-item">
                        <svg class="status-item-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                        <div class="status-item-label">Plan Actual</div>
                        <div class="status-item-value">
                            {{ $planLabel ?? 'Gratuito' }}
                        </div>
                    </div>

                    <!-- Next Billing -->
                   
                    <!-- Available Credits -->
                    <div class="status-item">
                        <svg class="status-item-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                        <div class="status-item-label">Créditos</div>
                        <div class="status-item-value">
                            {{ number_format($user->credits_balance) }}
                        </div>
                        <div class="status-item-extra">disponibles</div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="actions-container">
                    @if ($sub)
                        <!-- Manage Subscription -->
                        <form method="GET" action="{{ route('subscriptions.portal') }}">
                            @csrf
                            <button type="submit" class="btn-premium">
                                <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Gestionar Suscripción
                            </button>
                        </form>

                        <!-- View Plans -->
                        <a href="{{ route('subscriptions.plans') }}" class="btn-secondary">
                            <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Ver Todos los Planes
                        </a>
                    @else
                        <!-- Choose Plan -->
                        <a href="{{ route('subscriptions.plans') }}" class="btn-premium">
                            <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            Elegir un Plan
                        </a>

                        <!-- Learn More -->
                        <a href="#" class="btn-secondary">
                            <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Más Información
                        </a>
                    @endif
                </div>
            </div>

            @if (!$sub)
                <!-- No Subscription Alert -->
                <div class="no-subscription-alert">
                    <svg class="alert-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.865-.833-2.635 0L4.178 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                    <div class="alert-content">
                        <h3>Sin Suscripción Activa</h3>
                        <p>Suscríbete a un plan premium para desbloquear todas las funciones y obtener más créditos para tus proyectos de fotografía gastronómica.</p>
                    </div>
                </div>
            @endif

            <div class="subscription-footer">
                Cancela cuando quieras &middot; Soporte 24/7 &middot; Sin permanencia
            </div>
        </div>
    </div>
</x-app-layout>