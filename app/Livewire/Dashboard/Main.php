<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Main extends Component
{
    public function render()
{
    $user = Auth::user();

    // Movimientos de créditos (últimos 10)
    $transactions = \App\Models\CreditTransaction::where('user_id', $user->id)
        ->orderByDesc('created_at')
        ->take(10)
        ->get();

    // Últimas 8 imágenes procesadas por el usuario
    $gallery = \App\Models\Image::where('user_id', $user->id)
        ->whereNotNull('processed_path')
        ->orderByDesc('created_at')
        ->take(8)
        ->get();

    return view('livewire.dashboard.main', [
        'user' => $user,
        'transactions' => $transactions,
        'gallery' => $gallery,
    ])->layout('layouts.app');
}

}

