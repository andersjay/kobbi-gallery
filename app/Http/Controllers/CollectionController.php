<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class CollectionController extends Controller
{
    public function index()
    {
        $acervo = Collection::orderBy('order')->get();
        return view('acervo', compact('acervo'));
    }

    public function interesse(\Illuminate\Http\Request $request)
    {
        Log::info('CollectionController: Starting collection interest email process', [
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'request_data' => $request->except(['_token'])
        ]);

        try {
            $data = $request->validate([
                'artwork_id' => 'required|exists:collections,id',
                'name' => 'required|string',
                'email' => 'required|email',
                'message' => 'required|string',
            ]);

            Log::info('CollectionController: Validation successful', [
                'artwork_id' => $data['artwork_id'],
                'email' => $data['email'],
                'name' => $data['name']
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('CollectionController: Validation failed', [
                'errors' => $e->errors(),
                'request_data' => $request->except(['_token'])
            ]);
            throw $e;
        }

        Log::info('CollectionController: Loading collection artwork', [
            'artwork_id' => $data['artwork_id']
        ]);

        $obra = Collection::findOrFail($data['artwork_id']);

        Log::info('CollectionController: Collection artwork loaded', [
            'artwork_title' => $obra->title,
            'artwork_artist' => $obra->artist ?? 'N/A',
            'artwork_year' => $obra->year ?? 'N/A'
        ]);

        $emailData = [
            'nome' => $data['name'],
            'email' => $data['email'],
            'mensagem' => $data['message'],
            'obra' => $obra,
        ];

        Log::info('CollectionController: Preparing to send collection interest email', [
            'email_template' => 'emails.interesse-acervo',
            'to_email' => $data['email'],  // Email vai para quem preencheu o formulário
            'from_email' => env('MAIL_FROM_ADDRESS'),
            'customer_name' => $data['name'],
            'artwork_title' => $obra->title
        ]);

        try {
            Mail::send('emails.interesse-acervo', $emailData, function($message) use ($obra, $data) {
                $subject = 'Novo interesse em obra do acervo: ' . $obra->title;
                
                Log::info('CollectionController: Email subject generated', [
                    'subject' => $subject,
                    'artwork_title' => $obra->title
                ]);
                
                $message->to($data['email'])  // Email vai para quem preencheu o formulário
                        ->cc('contato@kobbigallery.com.br')  // Cópia para galeria
                        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME', 'Galeria'))
                        ->subject($subject);
            });

            Log::info('CollectionController: Collection interest email sent successfully', [
                'email_template' => 'emails.interesse-acervo',
                'to_email' => $data['email'],  // Email enviado para quem preencheu o formulário
                'from_email' => env('MAIL_FROM_ADDRESS'),
                'from_name' => env('MAIL_FROM_NAME', 'Galeria'),
                'customer_name' => $data['name'],
                'artwork_title' => $obra->title,
                'artwork_id' => $obra->id
            ]);

            return redirect()->route('acervo.index')->with('success', 'Interesse registrado com sucesso! Em breve entraremos em contato.');
        } catch (\Exception $e) {
            Log::error('CollectionController: Failed to send collection interest email', [
                'error' => $e->getMessage(),
                'email_template' => 'emails.interesse-acervo',
                'sender_email' => $data['email'],
                'sender_name' => $data['name'],
                'artwork_title' => $obra->title,
                'artwork_id' => $obra->id,
                'exception' => $e
            ]);
            return redirect()->route('acervo.index')->with('error', 'Erro ao registrar interesse. Tente novamente.');
        }
    }
} 