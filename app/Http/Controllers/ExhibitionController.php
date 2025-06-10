<?php

namespace App\Http\Controllers;

use App\Models\Exhibition;

class ExhibitionController extends Controller
{
    public function index()
    {
        $lastExhibition = Exhibition::orderBy('created_at', 'desc')->first();
        $exhibitions = Exhibition::where('id', '!=', $lastExhibition->id)->get();
        return view('exhibitions', compact('exhibitions', 'lastExhibition'));
    }
    public function exhibition($slug)
    {
        $exhibition = \App\Models\Exhibition::with('photographers')->where('slug', $slug)->first();
        return view('exhibition', compact('exhibition'));
    }
}
