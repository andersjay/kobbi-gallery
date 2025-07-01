<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\Exhibition;
use App\Models\Artist;
use App\Models\Collection;

class ExhibitionInterestController extends Controller
{
    public function send(Request $request)
    {
        Log::info('ExhibitionInterestController: Starting interest email process', [
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'request_data' => $request->except(['_token'])
        ]);

        try {
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

            Log::info('ExhibitionInterestController: Validation successful', [
                'email' => $data['email'],
                'name' => $data['name'],
                'type' => $request->filled('contato') ? 'contact' : 
                         ($request->filled('exhibition_id') ? 'exhibition' : 
                         ($request->filled('artist_id') ? 'artist' : 'collection'))
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('ExhibitionInterestController: Validation failed', [
                'errors' => $e->errors(),
                'request_data' => $request->except(['_token'])
            ]);
            throw $e;
        }

        if ($request->filled('contato')) {
            Log::info('ExhibitionInterestController: Processing general contact form', [
                'email' => $data['email'],
                'name' => $data['name']
            ]);

            try {
                Mail::send([], [], function($message) use ($data) {
                    $message->to($data['email'])  // Email vai para quem preencheu o formulário
                        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME', 'Galeria'))
                        ->subject('Nova mensagem de contato')
                        ->html(
                            '<p><strong>Nome:</strong> ' . $data['name'] . '</p>' .
                            '<p><strong>E-mail:</strong> ' . $data['email'] . '</p>' .
                            '<p><strong>Mensagem:</strong> ' . nl2br(e($data['message'])) . '</p>'
                        );
                });

                Log::info('ExhibitionInterestController: General contact email sent successfully', [
                    'to_email' => $data['email'],  // Email enviado para quem preencheu o formulário
                    'from_email' => env('MAIL_FROM_ADDRESS'),
                    'from_name' => env('MAIL_FROM_NAME', 'Galeria'),
                    'customer_name' => $data['name']
                ]);

                return back()->with('success', 'Mensagem enviada com sucesso! Em breve entraremos em contato.');
            } catch (\Exception $e) {
                Log::error('ExhibitionInterestController: Failed to send general contact email', [
                    'error' => $e->getMessage(),
                    'email' => $data['email'],
                    'name' => $data['name'],
                    'exception' => $e
                ]);
                return back()->with('error', 'Erro ao enviar mensagem. Tente novamente.');
            }
        }

        if ($request->filled('exhibition_id')) {
            Log::info('ExhibitionInterestController: Processing exhibition interest', [
                'exhibition_id' => $data['exhibition_id'],
                'obra_index' => $data['obra_index']
            ]);

            $exhibition = Exhibition::findOrFail($data['exhibition_id']);
            $obra = $exhibition->gallery[$data['obra_index']] ?? null;
            $context = [
                'tipo' => 'exposicao',
                'exhibition' => $exhibition,
            ];

            Log::info('ExhibitionInterestController: Exhibition data loaded', [
                'exhibition_title' => $exhibition->title,
                'obra_found' => $obra !== null,
                'obra_name' => $obra['name'] ?? 'N/A'
            ]);
        } elseif ($request->filled('artist_id')) {
            Log::info('ExhibitionInterestController: Processing artist interest', [
                'artist_id' => $data['artist_id'],
                'obra_index' => $data['obra_index']
            ]);

            $artist = Artist::with('artworks')->findOrFail($data['artist_id']);
            $obra = $artist->artworks[$data['obra_index']] ?? null;
            $context = [
                'tipo' => 'artista',
                'artist' => $artist,
            ];

            Log::info('ExhibitionInterestController: Artist data loaded', [
                'artist_name' => $artist->name,
                'obra_found' => $obra !== null,
                'obra_name' => $obra->name ?? 'N/A'
            ]);
        } elseif ($request->filled('collection_id')) {
            Log::info('ExhibitionInterestController: Processing collection interest', [
                'collection_id' => $data['collection_id'],
                'obra_index' => $data['obra_index']
            ]);

            $obra = Collection::skip($data['obra_index'])->first();
            $context = [
                'tipo' => 'acervo',
            ];

            Log::info('ExhibitionInterestController: Collection data loaded', [
                'obra_found' => $obra !== null,
                'obra_title' => $obra->title ?? 'N/A'
            ]);
        } else {
            Log::warning('ExhibitionInterestController: Insufficient data to identify artwork', [
                'request_data' => $request->except(['_token'])
            ]);
            return back()->with('error', 'Dados insuficientes para identificar a obra.');
        }

        if (!$obra) {
            Log::error('ExhibitionInterestController: Artwork not found', [
                'context' => $context,
                'request_data' => $request->except(['_token'])
            ]);
            return back()->with('error', 'Obra não encontrada.');
        }

        $view = match($context['tipo']) {
            'exposicao' => 'emails.interesse-exposicao',
            'artista' => 'emails.interesse-artista',
            'acervo' => 'emails.interesse-acervo',
        };

        Log::info('ExhibitionInterestController: Preparing to send interest email', [
            'email_template' => $view,
            'context_type' => $context['tipo'],
            'to_email' => $data['email'],  // Email vai para quem preencheu o formulário
            'from_email' => env('MAIL_FROM_ADDRESS'),
            'customer_name' => $data['name']
        ]);

        try {
            Mail::send($view, [
                'nome' => $data['name'],
                'email' => $data['email'],
                'mensagem' => $data['message'],
                'obra' => $obra,
                'exhibition' => $context['exhibition'] ?? null,
                'artist' => $context['artist'] ?? null,
            ], function($message) use ($obra, $context, $data) {
                $subject = match($context['tipo']) {
                    'exposicao' => 'Novo interesse em obra da exposição: ' . ($obra['name'] ?? 'Obra'),
                    'artista' => 'Novo interesse em obra do artista: ' . ($obra->name ?? 'Obra'),
                    'acervo' => 'Novo interesse em obra do acervo: ' . ($obra->title ?? 'Obra'),
                };
                
                Log::info('ExhibitionInterestController: Email subject generated', [
                    'subject' => $subject,
                    'context_type' => $context['tipo']
                ]);
                
                $message->to($data['email'])  // Email vai para quem preencheu o formulário
                        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME', 'Galeria'))
                        ->subject($subject);
            });

            Log::info('ExhibitionInterestController: Interest email sent successfully', [
                'email_template' => $view,
                'context_type' => $context['tipo'],
                'to_email' => $data['email'],  // Email enviado para quem preencheu o formulário
                'from_email' => env('MAIL_FROM_ADDRESS'),
                'from_name' => env('MAIL_FROM_NAME', 'Galeria'),
                'customer_name' => $data['name'],
                'artwork_identifier' => match($context['tipo']) {
                    'exposicao' => $obra['name'] ?? 'N/A',
                    'artista' => $obra->name ?? 'N/A',
                    'acervo' => $obra->title ?? 'N/A',
                }
            ]);

            return back()->with('success', 'Interesse registrado com sucesso! Em breve entraremos em contato.');
        } catch (\Exception $e) {
            Log::error('ExhibitionInterestController: Failed to send interest email', [
                'error' => $e->getMessage(),
                'email_template' => $view,
                'context_type' => $context['tipo'],
                'sender_email' => $data['email'],
                'sender_name' => $data['name'],
                'exception' => $e
            ]);
            return back()->with('error', 'Erro ao registrar interesse. Tente novamente.');
        }
    }
} 