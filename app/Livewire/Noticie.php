<?php

namespace App\Livewire;

use App\Models\Noticies;
use Livewire\Component;
use Illuminate\Support\Str;

class Noticie extends Component
{

    public $noticies;
    public $highlight;
    public $summary;


    public function mount()
    {
        $this->noticies = Noticies::latest()->take(4)->get();
        $this->highlight = $this->noticies->shift();
    }

    public function render()
    {
        return view('livewire.noticie');
    }
}
