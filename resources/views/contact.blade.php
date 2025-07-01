@extends('layouts.app')
@section('content')
    <div class="container-kobbi pt-14 mx-auto pb-10 md:px-[6rem!important]">
        <h1 class="header-title-spacing text-3xl text-gray-950 font-light">CONTATO</h1>

        <div class="mt-8 flex flex-col md:grid md:grid-cols-[40%_80%] gap-0">
            <!-- Coluna da Esquerda - Informações -->
            <div class="space-y-8">
                <div>
                    <h2 class="text-2xl text-gray-950 font-normal mb-8">KOBBI GALLERY</h2>
                </div>

                @if ($contactSettings && $contactSettings->section1_title)
                    <div>
                        <h2 class="text-xl text-gray-950 font-normal mb-4">{{ $contactSettings->section1_title }}</h2>
                        <div class="text-gray-950 text-base leading-relaxed">{!! $contactSettings->section1_description !!}</div>
                    </div>
                @endif

                @if ($contactSettings && $contactSettings->section2_title)
                    <div>
                        <h2 class="text-xl text-gray-950 font-normal mb-4">{{ $contactSettings->section2_title }}</h2>
                        <div class="text-gray-950 text-base leading-relaxed">{!! $contactSettings->section2_description !!}</div>
                    </div>
                @endif

                @if ($contactSettings && $contactSettings->section3_title)
                    <div>
                        <h2 class="text-xl text-gray-950 font-normal mb-4">{{ $contactSettings->section3_title }}</h2>
                        <div class="text-gray-950 text-base leading-relaxed">{!! $contactSettings->section3_description !!}</div>
                    </div>
                @endif
            </div>

            <!-- Coluna da Direita - Mapa Quadrado -->
            <div class="w-full md:w-[700px] h-64 md:h-96 overflow-hidden">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d978.6841387468653!2d-46.686229221082236!3d-23.556123530287405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce579576ede819%3A0x72411ec7188e8c53!2sKobbi%20Gallery!5e0!3m2!1spt-BR!2sbr!4v1749851985241!5m2!1spt-BR!2sbr" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <div class="mt-12 border-t border-gray-300 pt-8">
            <!-- Formulário de Contato -->
            <div class="space-y-6">
                <h2 class="text-xl text-gray-950 font-normal mb-6">ENVIE SUA MENSAGEM</h2>
                <form id="contactForm" method="POST" action="{{ route('exhibition.interest') }}" class="space-y-4">
                    @csrf
                    <input type="hidden" name="contato" value="1">
                    <div>
                        <label for="name" class="block text-gray-950 mb-1">Nome</label>
                        <input type="text" id="name" name="name"
                            class="w-full bg-[#D1D1D1] px-4 py-2 text-black focus:outline-none focus:border-zinc-500"
                            required>
                    </div>
                    <div>
                        <label for="email" class="block text-gray-950 mb-1">E-mail</label>
                        <input type="email" id="email" name="email"
                            class="w-full bg-[#D1D1D1] px-4 py-2 text-black focus:outline-none focus:border-zinc-500"
                            required>
                    </div>
                    <div>
                        <label for="message" class="block text-gray-950 mb-1">Mensagem</label>
                        <textarea id="message" name="message" rows="4"
                            class="w-full bg-[#D1D1D1] px-4 py-2 text-black focus:outline-none focus:border-zinc-500 resize-none" required></textarea>
                    </div>
                    <button type="submit"
                        class="px-4 bg-[#D1D1D1] text-black py-3 text-lg hover:brightness-95 transition">
                        Enviar mensagem
                    </button>
                </form>
            </div>

        </div>

         <!-- Lista da Equipe -->
        @if($teams && $teams->count() > 0)
        <div class="mt-12 pt-8 ">
            <div class="flex items-center gap-4 mb-8">
                <h2 class="text-xl text-gray-950 font-normal">EQUIPE</h2>
                <div class="h-[1px] w-full bg-gray-300"></div>
            </div>
            <div class="space-y-6">
                @foreach($teams as $member)
                    <div class="mb-6">
                        <div class="text-gray-950 text-base font-medium tracking-wide uppercase mb-2">{{ $member->function }}</div>
                        <div class="text-gray-700 text-base">{{ $member->name }}</div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="mt-10 pt-10">
            <livewire:newsletter-form />
        </div>
    </div>

    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK',
                    customClass: {
                        popup: 'rounded-xl'
                    }
                });
            });
        </script>
    @endif
@endsection
