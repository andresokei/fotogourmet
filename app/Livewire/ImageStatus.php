<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class ImageStatus extends Component
{
    public $image;

    // Opcional: para inicializar el componente con la última imagen
    public function mount()
    {
        $this->image = Image::where('user_id', Auth::id())
            ->latest()
            ->first();
    }

    public function render()
    {
        // Refresca el estado cada vez que Livewire repinta
        $this->image = Image::find($this->image->id);

        return view('livewire.image-status');
    }
}
