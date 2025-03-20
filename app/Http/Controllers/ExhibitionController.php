<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExhibitionController extends Controller
{
    public function index($id)
    {
        $exhibition = \App\Models\Exhibition::find($id);
        $images = $exhibition->images;
        return view('exhibition', compact('exhibition', 'images'));
    }    
}
