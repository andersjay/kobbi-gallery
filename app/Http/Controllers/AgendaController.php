<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $nextEvent = Event::where('date', '>=', now())->orderBy('date')->first();
        $previousEvents = Event::where('date', '<', now())->orderBy('date', 'desc')->get();
        return view('agenda', compact('nextEvent', 'previousEvents'));
    }

    public function show(Event $event)
    {
        return view('agenda-show', compact('event'));
    }
} 