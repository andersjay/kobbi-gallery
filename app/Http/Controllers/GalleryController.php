<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleryImages = Gallery::latest()
        ->get()
        ->map(function ($image){
            return [
                'src' => asset('storage/'.$image->image),
                'srct' => asset('storage/'.$image->image),
                'title' => $image->name,
            ];
        });
        return view('gallery', compact('galleryImages'));
    }
}
