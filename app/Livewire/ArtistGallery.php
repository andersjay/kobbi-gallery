<?php

namespace App\Livewire;

use Livewire\Component;

class ArtistGallery extends Component
{
    public $artists = [];
    public $selectedArtist = null;

    public function mount()
    {
        $this->artists = [
            [
                'name' => 'Antonio Saggese',
                'gallery' => [
                    'images/gallery/antonio.png',
                ]
            ],
            [
                'name' => 'Cristiano Xavier',
                'gallery' => [
                    'images/gallery/helo mello.png',
                ]
            ],
            [
                'name' => 'Eduardo Kobbi',
                'gallery' => [
                    'images/gallery/eduardo.png',
                ]
            ],
            [
                'name' => 'Eidi Feldon',
                'gallery' => [
                    'images/gallery/jean.png',
                ]
            ]
        ];
    }

    public function selectArtist($index)
    {
        $this->selectedArtist = $this->artists[$index];
    }

    public function render()
    {
        return view('livewire.artist-gallery');
    }
}
