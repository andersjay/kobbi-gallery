<?php

namespace App\Livewire;

use App\Models\Exhibition;
use Livewire\Component;

class PastExhibitions extends Component
{
    public $pastExhibitions;
    public function render()
    {
        $this->pastExhibitions = Exhibition::latest()->skip(1)->get();
        return view('livewire.past-exhibitions');
    }
}
