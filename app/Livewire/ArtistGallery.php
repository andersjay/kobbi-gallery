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
        $images = array_map(fn($image) => [
            'src' => asset('storage/' . $image),
            'srct' => asset('storage/' . $image),
            'title' => $artist->name
        ], $artist->image);
        
        $this->selectedArtist = [
            'name' => $artist->name,
            'images' => $images,
        ];

        $this->dispatch('artistSelected', $this->selectedArtist['images']);
    }

    public function render()
    {
        return view('livewire.artist-gallery');
    }
}
