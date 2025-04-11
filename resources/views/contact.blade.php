@extends('layouts.app')
@section('content')
<div class="container px-8 pt-14 w-full mx-auto pb-20">
    <h1 class="text-4xl text-white font-bold mb-12">CONTATO</h1>

    <div class="grid md:grid-cols-2 gap-12">
        <!-- Informações de Contato -->
        <div class="space-y-10">
            <!-- Formulário de Contato -->
            <div class="space-y-4">
                <h2 class="text-2xl text-white font-semibold">Envie sua mensagem</h2>
                <form id="contactForm" class="space-y-4">
                    <div>
                        <label for="name" class="block text-gray-300 mb-1">Nome</label>
                        <input type="text" id="name" name="name" class="w-full bg-zinc-800 border border-zinc-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-zinc-500" required>
                    </div>
                    <div>
                        <label for="email" class="block text-gray-300 mb-1">E-mail</label>
                        <input type="email" id="email" name="email" class="w-full bg-zinc-800 border border-zinc-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-zinc-500" required>
                    </div>
                    <div>
                        <label for="message" class="block text-gray-300 mb-1">Mensagem</label>
                        <textarea id="message" name="message" rows="4" class="w-full bg-zinc-800 border border-zinc-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-zinc-500" required></textarea>
                    </div>
                    <button type="submit" class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                        </svg>
                        Enviar mensagem no WhatsApp
                    </button>
                </form>
            </div>

            <!-- Grid de Informações -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
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
                    <h2 class="text-2xl text-white font-semibold">Horário</h2>
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

<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;
    
    const whatsappMessage = `Olá! Me chamo ${name}.\nE-mail: ${email}\n\nMensagem: ${message}`;
    const encodedMessage = encodeURIComponent(whatsappMessage);
    
    window.open(`https://wa.me/5511984202061?text=${encodedMessage}`, '_blank');
});
</script>
@endsection