<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactSetting;
use App\Models\Team;

class ContactController extends Controller
{
    public function index()
    {
        $contactSettings = ContactSetting::first();
        $teams = Team::all();
        return view('contact', compact('contactSettings', 'teams'));
    }
}
