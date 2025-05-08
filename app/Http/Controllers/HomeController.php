<?php

namespace App\Http\Controllers;

use App\Models\Exhibition;
use App\Models\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $exhibitionBanner = Exhibition::orderBy('sort')->first();
        $banners = Banner::where('active', true)->orderBy('order')->get();
        return view('home', compact('exhibitionBanner', 'banners'));
    }
}
