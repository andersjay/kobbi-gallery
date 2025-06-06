@extends('layouts.app')
@section('content')
    <div class="container-kobbi  pt-14 mx-auto pb-10">
        <h1 class="header-title-spacing text-3xl text-gray-950 font-light">CONTATO</h1>

        <div>
            <h2 class="header-title-spacing text-2xl text-gray-950 font-normal">KOBBI GALLERY</h1>

        </div>
        <div class="grid md:grid-cols-2 gap-12">
            <!-- Seções Personalizadas de Contato -->
            <div class="space-y-10">
                @if ($contactSettings && $contactSettings->section1_title)
                    <div class="mb-12">
                        <h2 class="text-2xl text-gray-950 font-normal">{{ $contactSettings->section1_title }}</h2>
                        <div class="text-gray-950">{!! $contactSettings->section1_description !!}</div>
                    </div>
                @endif

                @if ($contactSettings && $contactSettings->section2_title)
                    <div class="mb-12">
                        <h2 class="text-2xl text-gray-950 font-normal">{{ $contactSettings->section2_title }}</h2>
                        <div class="text-gray-950">{!! $contactSettings->section2_description !!}</div>
                    </div>
                @endif

                @if ($contactSettings && $contactSettings->section3_title)
                    <div class="mb-12">
                        <h2 class="text-2xl text-gray-950 font-normal">{{ $contactSettings->section3_title }}</h2>
                        <div class="text-gray-950">{!! $contactSettings->section3_description !!}</div>
                    </div>
                @endif

            </div>

            <!-- Mapa -->
            <div class="h-[400px] bg-zinc-900 rounded-xl overflow-hidden">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.2569026678584!2d-46.69007492375836!3d-23.556713060725434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce579d0a4e1c91%3A0x102f5571d311220!2sBeco%20do%20Batman!5e0!3m2!1spt-BR!2sbr!4v1709778622599!5m2!1spt-BR!2sbr"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        <div class="mt-12 border-t border-gray-300 py-6">

            <!-- Formulário de Contato -->
            <div class="space-y-4">
                <span class="text-2xl text-gray-950">ENVIE SUA MENSAGEM</span>
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
         <div class="space-y-4  pt-10">
            <div class="flex items-center gap-4">
                <h2 class="text-2xl text-gray-950 font-normal pb-2">EQUIPE</h2>
                <div class="h-[1px] w-full bg-gray-300"></div>
            </div>
             @foreach($teams as $member)
                 <div>
                     <div class="text-black text-base tracking-widest uppercase">{{ $member->function }}</div>
                     <div class="text-black text-sm mt-1">{{ $member->name }}</div>
                 </div>
             @endforeach
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
