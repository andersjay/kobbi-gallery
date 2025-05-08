<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::with('artworks')->get();
        return view('artists.index', compact('artists'));
    }

    public function show($id)
    {
        $artist = Artist::with('artworks')->findOrFail($id);
        return view('artists.show', compact('artist'));
    }

    public function images($id)
    {
        $artist = Artist::with('artworks')->findOrFail($id);
        $images = [];
        // Imagens principais do artista
        if (is_array($artist->image)) {
            foreach ($artist->image as $img) {
                $images[] = [
                    'src' => asset('storage/' . $img),
                    'title' => $artist->name
                ];
            }
        } elseif ($artist->image) {
            $images[] = [
                'src' => asset('storage/' . $artist->image),
                'title' => $artist->name
            ];
        }
        // Imagens das obras
        foreach ($artist->artworks as $artwork) {
            if (is_array($artwork->images)) {
                foreach ($artwork->images as $img) {
                    $images[] = [
                        'src' => asset('storage/' . $img),
                        'title' => $artwork->name
                    ];
                }
            } elseif ($artwork->images) {
                $images[] = [
                    'src' => asset('storage/' . $artwork->images),
                    'title' => $artwork->name
                ];
            }
        }
        return response()->json(['images' => $images]);
    }
} 