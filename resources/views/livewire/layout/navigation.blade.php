<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" style="background: linear-gradient(180deg, #0a0a08 0%, #111111 100%); border-bottom: 1px solid #d4af37; box-shadow: 0 2px 20px rgba(212,175,55,0.1);">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" wire:navigate style="transition: all 0.3s ease;"
                       onmouseover="this.style.transform='scale(1.05)';"
                       onmouseout="this.style.transform='scale(1)';">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex sm:items-center">
                    @auth
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate
                                    style="color: #eee8c3; font-weight: 500; font-size: 0.9rem; letter-spacing: 0.5px; padding: 0.75rem 1.25rem; border-radius: 0.5rem; transition: all 0.3s ease; {{ request()->routeIs('dashboard') ? 'color: #d4af37; background: rgba(212,175,55,0.15); border: 1px solid rgba(212,175,55,0.3);' : '' }}"
                                    onmouseover="this.style.color='#d4af37'; this.style.background='rgba(212,175,55,0.08)'; this.style.transform='translateY(-1px)';"
                                    onmouseout="this.style.color='{{ request()->routeIs('dashboard') ? '#d4af37' : '#eee8c3' }}'; this.style.background='{{ request()->routeIs('dashboard') ? 'rgba(212,175,55,0.15)' : 'transparent' }}'; this.style.transform='translateY(0)';">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        
                        <x-nav-link :href="route('gallery.index')" :active="request()->routeIs('gallery.*')" wire:navigate
                                    style="color: #eee8c3; font-weight: 500; font-size: 0.9rem; letter-spacing: 0.5px; padding: 0.75rem 1.25rem; border-radius: 0.5rem; transition: all 0.3s ease; {{ request()->routeIs('gallery.*') ? 'color: #d4af37; background: rgba(212,175,55,0.15); border: 1px solid rgba(212,175,55,0.3);' : '' }}"
                                    onmouseover="this.style.color='#d4af37'; this.style.background='rgba(212,175,55,0.08)'; this.style.transform='translateY(-1px)';"
                                    onmouseout="this.style.color='{{ request()->routeIs('gallery.*') ? '#d4af37' : '#eee8c3' }}'; this.style.background='{{ request()->routeIs('gallery.*') ? 'rgba(212,175,55,0.15)' : 'transparent' }}'; this.style.transform='translateY(0)';">
                            {{ __('Galería') }}
                        </x-nav-link>
                        
                        <x-nav-link :href="route('subscriptions.plans')" :active="request()->routeIs('subscriptions.plans')" wire:navigate
                                    style="color: #eee8c3; font-weight: 500; font-size: 0.9rem; letter-spacing: 0.5px; padding: 0.75rem 1.25rem; border-radius: 0.5rem; transition: all 0.3s ease; {{ request()->routeIs('subscriptions.plans') ? 'color: #d4af37; background: rgba(212,175,55,0.15); border: 1px solid rgba(212,175,55,0.3);' : '' }}"
                                    onmouseover="this.style.color='#d4af37'; this.style.background='rgba(212,175,55,0.08)'; this.style.transform='translateY(-1px)';"
                                    onmouseout="this.style.color='{{ request()->routeIs('subscriptions.plans') ? '#d4af37' : '#eee8c3' }}'; this.style.background='{{ request()->routeIs('subscriptions.plans') ? 'rgba(212,175,55,0.15)' : 'transparent' }}'; this.style.transform='translateY(0)';">
                            {{ __('Planes') }}
                        </x-nav-link>
                        
                        <x-nav-link :href="route('subscriptions.index')" :active="request()->routeIs('subscriptions.index')" wire:navigate
                                    style="color: #eee8c3; font-weight: 500; font-size: 0.9rem; letter-spacing: 0.5px; padding: 0.75rem 1.25rem; border-radius: 0.5rem; transition: all 0.3s ease; {{ request()->routeIs('subscriptions.index') ? 'color: #d4af37; background: rgba(212,175,55,0.15); border: 1px solid rgba(212,175,55,0.3);' : '' }}"
                                    onmouseover="this.style.color='#d4af37'; this.style.background='rgba(212,175,55,0.08)'; this.style.transform='translateY(-1px)';"
                                    onmouseout="this.style.color='{{ request()->routeIs('subscriptions.index') ? '#d4af37' : '#eee8c3' }}'; this.style.background='{{ request()->routeIs('subscriptions.index') ? 'rgba(212,175,55,0.15)' : 'transparent' }}'; this.style.transform='translateY(0)';">
                            {{ __('Mi Suscripción') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="route('home')" :active="request()->routeIs('home')" wire:navigate
                                    style="color: #eee8c3; font-weight: 500; font-size: 0.9rem; letter-spacing: 0.5px; padding: 0.75rem 1.25rem; border-radius: 0.5rem; transition: all 0.3s ease; {{ request()->routeIs('home') ? 'color: #d4af37; background: rgba(212,175,55,0.15); border: 1px solid rgba(212,175,55,0.3);' : '' }}"
                                    onmouseover="this.style.color='#d4af37'; this.style.background='rgba(212,175,55,0.08)'; this.style.transform='translateY(-1px)';"
                                    onmouseout="this.style.color='{{ request()->routeIs('home') ? '#d4af37' : '#eee8c3' }}'; this.style.background='{{ request()->routeIs('home') ? 'rgba(212,175,55,0.15)' : 'transparent' }}'; this.style.transform='translateY(0)';">
                            {{ __('Home') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button style="background: rgba(212,175,55,0.1); color: #d4af37; border: 1px solid rgba(212,175,55,0.3); border-radius: 0.5rem; transition: all 0.3s ease;" 
                                    class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium focus:outline-none"
                                    onmouseover="this.style.background='rgba(212,175,55,0.2)'; this.style.color='#ffe291'; this.style.borderColor='rgba(212,175,55,0.5)'; this.style.transform='translateY(-1px)';"
                                    onmouseout="this.style.background='rgba(212,175,55,0.1)'; this.style.color='#d4af37'; this.style.borderColor='rgba(212,175,55,0.3)'; this.style.transform='translateY(0)';">
                                <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div style="background: linear-gradient(180deg, #19160e 0%, #10100d 100%); border: 1px solid #d4af37; border-radius: 0.5rem; box-shadow: 0 8px 32px rgba(212,175,55,0.2); margin-top: 0.5rem; overflow: hidden;">
                                <a href="{{ route('profile') }}" wire:navigate
                                   style="color: #eee8c3; padding: 0.75rem 1rem; transition: all 0.3s ease; display: block; text-decoration: none; border: none; border-radius: 0;"
                                   onmouseover="this.style.background='rgba(212,175,55,0.15)'; this.style.color='#d4af37';"
                                   onmouseout="this.style.background='transparent'; this.style.color='#eee8c3';">
                                    {{ __('Profile') }}
                                </a>

                                <!-- Authentication -->
                                <button wire:click="logout" 
                                        style="color: #eee8c3; padding: 0.75rem 1rem; transition: all 0.3s ease; width: 100%; text-align: left; background: none; border: none; border-radius: 0; cursor: pointer;"
                                        onmouseover="this.style.background='rgba(212,175,55,0.15)'; this.style.color='#d4af37';"
                                        onmouseout="this.style.background='transparent'; this.style.color='#eee8c3';">
                                    {{ __('Log Out') }}
                                </button>
                            </div>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="flex space-x-4">
                        <a href="{{ route('login') }}" 
                           style="color: #eee8c3; font-weight: 500; font-size: 0.9rem; letter-spacing: 0.5px; padding: 0.5rem 1rem; border-radius: 0.5rem; transition: all 0.3s ease; text-decoration: none;"
                           onmouseover="this.style.color='#d4af37'; this.style.background='rgba(212,175,55,0.1)'; this.style.transform='translateY(-1px)';"
                           onmouseout="this.style.color='#eee8c3'; this.style.background='transparent'; this.style.transform='translateY(0)';">
                            {{ __('Login') }}
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" 
                               style="color: #eee8c3; font-weight: 500; font-size: 0.9rem; letter-spacing: 0.5px; padding: 0.5rem 1rem; border-radius: 0.5rem; transition: all 0.3s ease; text-decoration: none;"
                               onmouseover="this.style.color='#d4af37'; this.style.background='rgba(212,175,55,0.1)'; this.style.transform='translateY(-1px)';"
                               onmouseout="this.style.color='#eee8c3'; this.style.background='transparent'; this.style.transform='translateY(0)';">
                                {{ __('Register') }}
                            </a>
                        @endif
                    </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" 
                        style="color: #d4af37; background: rgba(212,175,55,0.1); border-radius: 0.5rem; transition: all 0.3s ease;" 
                        class="inline-flex items-center justify-center p-2 focus:outline-none"
                        onmouseover="this.style.background='rgba(212,175,55,0.2)'; this.style.color='#ffe291'; this.style.transform='scale(1.05)';"
                        onmouseout="this.style.background='rgba(212,175,55,0.1)'; this.style.color='#d4af37'; this.style.transform='scale(1)';">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden" style="background: linear-gradient(180deg, #0a0a08 0%, #111111 100%); border-top: 1px solid rgba(212,175,55,0.3);">
        @auth
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate
                                      style="color: #eee8c3; font-weight: 500; padding: 0.75rem 1rem; border-radius: 0.5rem; margin: 0.25rem 1rem; transition: all 0.3s ease; border-left: 3px solid {{ request()->routeIs('dashboard') ? '#d4af37' : 'transparent' }}; {{ request()->routeIs('dashboard') ? 'color: #d4af37; background: rgba(212,175,55,0.15);' : '' }}"
                                      onmouseover="this.style.color='#d4af37'; this.style.background='rgba(212,175,55,0.1)'; this.style.borderLeftColor='#d4af37'; this.style.transform='translateX(5px)';"
                                      onmouseout="this.style.color='{{ request()->routeIs('dashboard') ? '#d4af37' : '#eee8c3' }}'; this.style.background='{{ request()->routeIs('dashboard') ? 'rgba(212,175,55,0.15)' : 'transparent' }}'; this.style.borderLeftColor='{{ request()->routeIs('dashboard') ? '#d4af37' : 'transparent' }}'; this.style.transform='translateX(0)';">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                
                <x-responsive-nav-link :href="route('gallery.index')" :active="request()->routeIs('gallery.*')" wire:navigate
                                      style="color: #eee8c3; font-weight: 500; padding: 0.75rem 1rem; border-radius: 0.5rem; margin: 0.25rem 1rem; transition: all 0.3s ease; border-left: 3px solid {{ request()->routeIs('gallery.*') ? '#d4af37' : 'transparent' }}; {{ request()->routeIs('gallery.*') ? 'color: #d4af37; background: rgba(212,175,55,0.15);' : '' }}"
                                      onmouseover="this.style.color='#d4af37'; this.style.background='rgba(212,175,55,0.1)'; this.style.borderLeftColor='#d4af37'; this.style.transform='translateX(5px)';"
                                      onmouseout="this.style.color='{{ request()->routeIs('gallery.*') ? '#d4af37' : '#eee8c3' }}'; this.style.background='{{ request()->routeIs('gallery.*') ? 'rgba(212,175,55,0.15)' : 'transparent' }}'; this.style.borderLeftColor='{{ request()->routeIs('gallery.*') ? '#d4af37' : 'transparent' }}'; this.style.transform='translateX(0)';">
                    {{ __('Galería') }}
                </x-responsive-nav-link>
                
                <x-responsive-nav-link :href="route('subscriptions.plans')" :active="request()->routeIs('subscriptions.plans')" wire:navigate
                                      style="color: #eee8c3; font-weight: 500; padding: 0.75rem 1rem; border-radius: 0.5rem; margin: 0.25rem 1rem; transition: all 0.3s ease; border-left: 3px solid {{ request()->routeIs('subscriptions.plans') ? '#d4af37' : 'transparent' }}; {{ request()->routeIs('subscriptions.plans') ? 'color: #d4af37; background: rgba(212,175,55,0.15);' : '' }}"
                                      onmouseover="this.style.color='#d4af37'; this.style.background='rgba(212,175,55,0.1)'; this.style.borderLeftColor='#d4af37'; this.style.transform='translateX(5px)';"
                                      onmouseout="this.style.color='{{ request()->routeIs('subscriptions.plans') ? '#d4af37' : '#eee8c3' }}'; this.style.background='{{ request()->routeIs('subscriptions.plans') ? 'rgba(212,175,55,0.15)' : 'transparent' }}'; this.style.borderLeftColor='{{ request()->routeIs('subscriptions.plans') ? '#d4af37' : 'transparent' }}'; this.style.transform='translateX(0)';">
                    {{ __('Planes') }}
                </x-responsive-nav-link>
                
                <x-responsive-nav-link :href="route('subscriptions.index')" :active="request()->routeIs('subscriptions.index')" wire:navigate
                                      style="color: #eee8c3; font-weight: 500; padding: 0.75rem 1rem; border-radius: 0.5rem; margin: 0.25rem 1rem; transition: all 0.3s ease; border-left: 3px solid {{ request()->routeIs('subscriptions.index') ? '#d4af37' : 'transparent' }}; {{ request()->routeIs('subscriptions.index') ? 'color: #d4af37; background: rgba(212,175,55,0.15);' : '' }}"
                                      onmouseover="this.style.color='#d4af37'; this.style.background='rgba(212,175,55,0.1)'; this.style.borderLeftColor='#d4af37'; this.style.transform='translateX(5px)';"
                                      onmouseout="this.style.color='{{ request()->routeIs('subscriptions.index') ? '#d4af37' : '#eee8c3' }}'; this.style.background='{{ request()->routeIs('subscriptions.index') ? 'rgba(212,175,55,0.15)' : 'transparent' }}'; this.style.borderLeftColor='{{ request()->routeIs('subscriptions.index') ? '#d4af37' : 'transparent' }}'; this.style.transform='translateX(0)';">
                    {{ __('Mi Suscripción') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div style="background: rgba(212,175,55,0.05); border-top: 1px solid rgba(212,175,55,0.2); padding: 1rem;" class="pt-4 pb-1">
                <div class="px-4">
                    <div style="color: #d4af37; font-weight: 600;" class="font-medium text-base" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                    <div style="color: #b7ad7a;" class="font-medium text-sm">{{ auth()->user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile')" wire:navigate
                                          style="color: #eee8c3; font-weight: 500; padding: 0.75rem 1rem; border-radius: 0.5rem; margin: 0.25rem 1rem; transition: all 0.3s ease; border-left: 3px solid transparent;"
                                          onmouseover="this.style.color='#d4af37'; this.style.background='rgba(212,175,55,0.1)'; this.style.borderLeftColor='#d4af37'; this.style.transform='translateX(5px)';"
                                          onmouseout="this.style.color='#eee8c3'; this.style.background='transparent'; this.style.borderLeftColor='transparent'; this.style.transform='translateX(0)';">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <button wire:click="logout" 
                            style="color: #eee8c3; font-weight: 500; padding: 0.75rem 1rem; border-radius: 0.5rem; margin: 0.25rem 1rem; transition: all 0.3s ease; border-left: 3px solid transparent; width: 100%; text-align: left; background: none; border: none;"
                            onmouseover="this.style.color='#d4af37'; this.style.background='rgba(212,175,55,0.1)'; this.style.borderLeftColor='#d4af37'; this.style.transform='translateX(5px)';"
                            onmouseout="this.style.color='#eee8c3'; this.style.background='transparent'; this.style.borderLeftColor='transparent'; this.style.transform='translateX(0)';">
                        {{ __('Log Out') }}
                    </button>
                </div>
            </div>
        @else
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')"
                                      style="color: #eee8c3; font-weight: 500; padding: 0.75rem 1rem; border-radius: 0.5rem; margin: 0.25rem 1rem; transition: all 0.3s ease; border-left: 3px solid {{ request()->routeIs('home') ? '#d4af37' : 'transparent' }}; {{ request()->routeIs('home') ? 'color: #d4af37; background: rgba(212,175,55,0.15);' : '' }}"
                                      onmouseover="this.style.color='#d4af37'; this.style.background='rgba(212,175,55,0.1)'; this.style.borderLeftColor='#d4af37'; this.style.transform='translateX(5px)';"
                                      onmouseout="this.style.color='{{ request()->routeIs('home') ? '#d4af37' : '#eee8c3' }}'; this.style.background='{{ request()->routeIs('home') ? 'rgba(212,175,55,0.15)' : 'transparent' }}'; this.style.borderLeftColor='{{ request()->routeIs('home') ? '#d4af37' : 'transparent' }}'; this.style.transform='translateX(0)';">
                    {{ __('Home') }}
                </x-responsive-nav-link>
                
                <x-responsive-nav-link :href="route('login')"
                                      style="color: #eee8c3; font-weight: 500; padding: 0.75rem 1rem; border-radius: 0.5rem; margin: 0.25rem 1rem; transition: all 0.3s ease; border-left: 3px solid transparent;"
                                      onmouseover="this.style.color='#d4af37'; this.style.background='rgba(212,175,55,0.1)'; this.style.borderLeftColor='#d4af37'; this.style.transform='translateX(5px)';"
                                      onmouseout="this.style.color='#eee8c3'; this.style.background='transparent'; this.style.borderLeftColor='transparent'; this.style.transform='translateX(0)';">
                    {{ __('Login') }}
                </x-responsive-nav-link>
                
                @if (Route::has('register'))
                    <x-responsive-nav-link :href="route('register')"
                                          style="color: #eee8c3; font-weight: 500; padding: 0.75rem 1rem; border-radius: 0.5rem; margin: 0.25rem 1rem; transition: all 0.3s ease; border-left: 3px solid transparent;"
                                          onmouseover="this.style.color='#d4af37'; this.style.background='rgba(212,175,55,0.1)'; this.style.borderLeftColor='#d4af37'; this.style.transform='translateX(5px)';"
                                          onmouseout="this.style.color='#eee8c3'; this.style.background='transparent'; this.style.borderLeftColor='transparent'; this.style.transform='translateX(0)';">
                        {{ __('Register') }}
                    </x-responsive-nav-link>
                @endif
            </div>
        @endauth
    </div>
</nav>