<?php

namespace App\Livewire;

use App\Models\Gallery as ModelsGallery;
use Livewire\Component;

class Gallery extends Component
{
    public $images = [];
    
    public function mount()
    {
        $this->images = ModelsGallery::latest()
            ->take(6)
            ->get()
            ->map(function ($image){
                return [
                    'src' => asset('storage/'.$image->image),
                    'srct' => asset('storage/'.$image->image),
                    'title' => $image->name,
                ];
            });
    }

    public function render()
    {
        return view('livewire.gallery');
    }
}
