@extends('layouts.app')
@section('content')
<div class="container px-8 pt-14 w-full mx-auto pb-20">
    <h1 class="text-4xl text-white font-bold mb-12">CONTATO</h1>

    <div class="grid md:grid-cols-2 gap-12">
        <!-- Informações de Contato -->
        <div class="space-y-10">
            <!-- Endereço -->
            <div class="space-y-4">
                <h2 class="text-2xl text-white font-semibold">Endereço</h2>
                <div class="text-gray-300 space-y-1">
                    <p>Rua Tv. Alonso, 23 – Beco do Batman</p>
                    <p>Vila Madalena – São Paulo</p>
                </div>
            </div>

            <!-- Horário -->
            <div class="space-y-4">
                <h2 class="text-2xl text-white font-semibold">Horário de Funcionamento</h2>
                <div class="text-gray-300 space-y-1">
                    <p>Aberto de segunda-feira a sábado</p>
                    <p>9:30 – 18:00</p>
                </div>
            </div>

            <!-- Telefones -->
            <div class="space-y-4">
                <h2 class="text-2xl text-white font-semibold">Telefones</h2>
                <div class="text-gray-300 space-y-3">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>
                        <a href="tel:+551138152223" class="hover:text-white transition-colors">+55 11 3815-2223</a>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                        </svg>
                        <a href="https://wa.me/5511984202061" target="_blank" class="hover:text-white transition-colors">+55 11 98420-2061 (WhatsApp)</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mapa -->
        <div class="h-[400px] bg-zinc-900 rounded-xl overflow-hidden">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.2569026678584!2d-46.69007492375836!3d-23.556713060725434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce579d0a4e1c91%3A0x102f5571d311220!2sBeco%20do%20Batman!5e0!3m2!1spt-BR!2sbr!4v1709778622599!5m2!1spt-BR!2sbr" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</div>
@endsection