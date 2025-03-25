<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Exhibition;

class ActualExhibition extends Component
{
    public $actualExhibition;

    public function mount()
    {
        $this->actualExhibition = Exhibition::orderBy('created_at', 'desc')->first();
    }

    public function render()
    {
        return view('livewire.actual-exhibition');
    }
}
