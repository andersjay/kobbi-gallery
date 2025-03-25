<?php

namespace App\Http\Controllers;

use App\Models\Exhibition;
use Illuminate\Http\Request;

class ExhibitionController extends Controller
{
    public function index()
    {
        $lastExhibition = Exhibition::orderBy('created_at', 'desc')->first();
        $exhibitions = Exhibition::where('id', '!=', $lastExhibition->id)->get();
        return view('exhibitions', compact('exhibitions', 'lastExhibition'));
    }
    public function exhbition($id)
    {
        $exhibition = \App\Models\Exhibition::find($id);
        $images = $exhibition->images;
        return view('exhibition', compact('exhibition', 'images'));
    }
}
