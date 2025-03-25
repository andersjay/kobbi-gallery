<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Exhibitions extends Controller
{
    public function index()
    {
        return view('exhibitions');
    }
}
