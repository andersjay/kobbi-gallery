<?php

namespace App\Http\Controllers;

use App\Models\Exhibition;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $exhibitions = Exhibition::all();
        return view('home', compact('exhibitions'));
    }
}
