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
} 