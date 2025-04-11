<?php

namespace App\Http\Controllers;

use App\Models\Noticies;

class NoticieController extends Controller
{
    public function index()
    {
        $noticies = Noticies::latest()->get();
        $lastNoticie = $noticies->shift(); // Remove e retorna a primeira notícia (mais recente)
        return view('noticies', compact('noticies', 'lastNoticie'));
    }

    public function show($slug)
    {
        $noticie = Noticies::where('slug', $slug)->firstOrFail();
        
        if ($noticie->url) {
            return redirect()->away($noticie->url);
        }
        
        return view('noticie', compact('noticie'));
    }
} 