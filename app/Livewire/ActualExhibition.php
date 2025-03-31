<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Exhibition;

class ActualExhibition extends Component
{
    public $actualExhibition;

    public function mount()
    {
        $this->actualExhibition = Exhibition::orderBy('sort')->first();
    }

    public function render()
    {
        return view('livewire.actual-exhibition');
    }
}
