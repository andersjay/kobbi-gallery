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
    public function exhibition($id)
    {
        $exhibition = \App\Models\Exhibition::find($id);
        return view('exhibition', compact('exhibition'));
    }
}
