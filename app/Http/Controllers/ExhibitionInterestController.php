<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Exhibition;
use App\Models\Artist;
use App\Models\Collection;

class ExhibitionInterestController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'exhibition_id' => 'nullable|exists:exhibitions,id',
            'artist_id' => 'nullable|exists:artists,id',
            'collection_id' => 'nullable|exists:collections,id',
            'obra_index' => 'nullable|integer',
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
            'contato' => 'nullable',
        ]);

        if ($request->filled('contato')) {
            // Contato geral
            Mail::send([], [], function($message) use ($data) {
                $message->to('contato@sua-galeria.com')
                    ->subject('Nova mensagem de contato')
                    ->html(
                        '<p><strong>Nome:</strong> ' . $data['name'] . '</p>' .
                        '<p><strong>E-mail:</strong> ' . $data['email'] . '</p>' .
                        '<p><strong>Mensagem:</strong> ' . nl2br(e($data['message'])) . '</p>'
                    );
            });
            return back()->with('success', 'Mensagem enviada com sucesso! Em breve entraremos em contato.');
        }

        if ($request->filled('exhibition_id')) {
            $exhibition = Exhibition::findOrFail($data['exhibition_id']);
            $obra = $exhibition->gallery[$data['obra_index']] ?? null;
            $context = [
                'tipo' => 'exposicao',
                'exhibition' => $exhibition,
            ];
        } elseif ($request->filled('artist_id')) {
            $artist = Artist::with('artworks')->findOrFail($data['artist_id']);
            $obra = $artist->artworks[$data['obra_index']] ?? null;
            $context = [
                'tipo' => 'artista',
                'artist' => $artist,
            ];
        } elseif ($request->filled('collection_id')) {
            $obra = Collection::skip($data['obra_index'])->first();
            $context = [
                'tipo' => 'acervo',
            ];
        } else {
            return back()->with('error', 'Dados insuficientes para identificar a obra.');
        }

        if (!$obra) {
            return back()->with('error', 'Obra não encontrada.');
        }

        $view = match($context['tipo']) {
            'exposicao' => 'emails.interesse-exposicao',
            'artista' => 'emails.interesse-artista',
            'acervo' => 'emails.interesse-acervo',
        };

        Mail::send($view, [
            'nome' => $data['name'],
            'email' => $data['email'],
            'mensagem' => $data['message'],
            'obra' => $obra,
            'exhibition' => $context['exhibition'] ?? null,
            'artist' => $context['artist'] ?? null,
        ], function($message) use ($obra, $context) {
            $subject = match($context['tipo']) {
                'exposicao' => 'Novo interesse em obra da exposição: ' . ($obra['name'] ?? 'Obra'),
                'artista' => 'Novo interesse em obra do artista: ' . ($obra->name ?? 'Obra'),
                'acervo' => 'Novo interesse em obra do acervo: ' . ($obra->title ?? 'Obra'),
            };
            $message->to('contato@sua-galeria.com')->subject($subject);
        });

        return back()->with('success', 'Interesse registrado com sucesso! Em breve entraremos em contato.');
    }
} 