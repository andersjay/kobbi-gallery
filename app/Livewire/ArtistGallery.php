<?php

namespace App\Livewire;

use App\Models\Artist;
use Livewire\Component;

class ArtistGallery extends Component
{
    public $artists = [];
    public $selectedArtist = null;

    public function mount()
    {
        $this->artists = Artist::all();
    }

    public function selectArtist($index)
    {   
        $artist = Artist::find($index);

        // Garantir que `$artist->image` seja um array antes de iterar
        $images = is_array($artist->image) ? 
            array_map(fn($image) => [
                'src' => asset('storage/' . $image),
                'srct' => asset('storage/' . $image),
                'title' => $artist->name
            ], $artist->image) : 
            [[
                'src' => asset('storage/' . $artist->image),
                'srct' => asset('storage/' . $artist->image),
                'title' => $artist->name
            ]];

        $this->selectedArtist = [
            'name' => $artist->name,
            'images' => $images,
            'id' => $artist->id
        ];  
    }

    public function render()
    {
        return view('livewire.artist-gallery');
    }
}