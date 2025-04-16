<?php

namespace App\Livewire;

use App\Models\Exhibition;
use Livewire\Component;

class PastExhibitions extends Component
{
    public $pastExhibitions;
    public function render()
    {
        $this->pastExhibitions = Exhibition::orderBy('sort')
            ->orderBy('created_at', 'desc')
            ->skip(1)
            ->limit(100)
            ->get();
            
        return view('livewire.past-exhibitions');
    }
}
