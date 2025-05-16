<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Main extends Component
{
    public function render()
    {
        return view('livewire.dashboard.main', [
            'user' => Auth::user(),
        ])->layout('layouts.app'); 
    }
}

