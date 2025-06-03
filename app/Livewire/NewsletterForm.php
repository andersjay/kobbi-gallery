<?php

namespace App\Livewire;

use Livewire\Component;
use Newsletter;
use Illuminate\Support\Facades\Log;

class NewsletterForm extends Component
{
    public $email;

    public function subscribe()
    {
        $this->validate([
            'email' => 'required|email',
        ]);

        try {
            if (Newsletter::isSubscribed($this->email)) {
                Log::info('Tentativa de inscrição na newsletter: já inscrito', ['email' => $this->email]);
                session()->flash('message', 'Este e-mail já está inscrito!');
                return;
            }

            $result = Newsletter::subscribe($this->email);
            if ($result) {
                Log::info('Inscrição na newsletter realizada com sucesso', ['email' => $this->email]);
                session()->flash('message', 'Inscrição realizada com sucesso!');
            } else {
                Log::warning('Falha ao inscrever na newsletter', [
                    'email' => $this->email,
                    'error' => Newsletter::getLastError()
                ]);
                session()->flash('message', 'Não foi possível realizar a inscrição. Tente novamente mais tarde.');
            }
        } catch (\Exception $e) {
            Log::error('Erro ao tentar inscrever na newsletter', [
                'email' => $this->email,
                'exception' => $e->getMessage()
            ]);
            session()->flash('message', 'Erro inesperado: ' . $e->getMessage());
        }
        $this->reset('email');
    }

    public function render()
    {
        return view('livewire.newsletter-form');
    }
}
