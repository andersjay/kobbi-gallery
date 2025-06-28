<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Support\Facades\Mail;

class CollectionController extends Controller
{
    public function index()
    {
        $acervo = Collection::orderBy('order')->get();
        return view('acervo', compact('acervo'));
    }

    public function interesse(\Illuminate\Http\Request $request)
    {
        $data = $request->validate([
            'artwork_id' => 'required|exists:collections,id',
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $obra = Collection::findOrFail($data['artwork_id']);

        $emailData = [
            'nome' => $data['name'],
            'email' => $data['email'],
            'mensagem' => $data['message'],
            'obra' => $obra,
        ];

        Mail::send('emails.interesse-acervo', $emailData, function($message) use ($obra) {
            $message->to(env('GALLERY_CONTACT_EMAIL', 'contato@sua-galeria.com'))
                    ->subject('Novo interesse em obra do acervo: ' . $obra->title);
        });

        return redirect()->route('acervo')->with('success', 'Interesse registrado com sucesso! Em breve entraremos em contato.');
    }
} 