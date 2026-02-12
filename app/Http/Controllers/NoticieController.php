<?php

namespace App\Http\Controllers;

use App\Models\Noticies;

class NoticieController extends Controller
{
    public function index()
    {
        $noticies = Noticies::query()
            ->orderByDesc('is_pinned')
            ->orderBy('sort_order')
            ->orderByDesc('date')
            ->get();
        return view('noticies', compact('noticies'));
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