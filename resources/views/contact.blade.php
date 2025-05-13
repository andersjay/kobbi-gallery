@extends('layouts.app')
@section('content')
<div class="container px-8 pt-14 w-full mx-auto pb-20">
    <h1 class="text-4xl text-gray-950 font-bold mb-12 mt-12 md:mt-0">CONTATO</h1>
   
    <div class="grid md:grid-cols-2 gap-12">
        <!-- Informações de Contato -->
        <div class="space-y-10">
            <div class="mb-12">
                <h2 class="text-3xl text-gray-950 font-medium">KOBBI GALLERY</h2>
                <span class="text-gray-950">Travessa Alonso, 23</span> <br>
                <span class="text-gray-950">Vila Madalena</span> <br>
                <span class="text-gray-950">São Paulo, SP</span>
        
                <div class="mt-2">
                    <span class="text-gray-950">TELEFONE: +55 (11) 3815-2223</span> <br>
                    <span class="text-gray-950">
                        WHATSAPP:
                        <a href="https://wa.me/5511984202061" target="_blank" class="hover:text-gray-950 transition-colors underline">+55 11 98420-2061</a>
                    </span>
                </div>
            </div>
            <!-- Formulário de Contato -->
            <div class="space-y-4">
                <h2 class="text-2xl text-gray-950 font-semibold">Envie sua mensagem</h2>
                <form id="contactForm" class="space-y-4">
                    <div>
                        <label for="name" class="block text-gray-950 mb-1">Nome</label>
                        <input type="text" id="name" name="name" class="w-full bg-[#D1D1D1] rounded-lg px-4 py-2 text-white focus:outline-none focus:border-zinc-500" required>
                    </div>
                    <div>
                        <label for="email" class="block text-gray-950 mb-1">E-mail</label>
                        <input type="email" id="email" name="email" class="w-full bg-[#D1D1D1] rounded-lg px-4 py-2 text-white focus:outline-none focus:border-zinc-500" required>
                    </div>
                    <div>
                        <label for="message" class="block text-gray-950 mb-1">Mensagem</label>
                        <textarea id="message" name="message" rows="4" class="w-full bg-[#D1D1D1] rounded-lg px-4 py-2 text-white focus:outline-none focus:border-zinc-500" required></textarea>
                    </div>
                    <button type="submit" class="px-4 bg-[#D1D1D1] text-black py-3 rounded font-semibold text-lg hover:brightness-95 transition">
                      
                        Enviar mensagem
                    </button>
                </form>
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

    <div class="mt-12">
        <livewire:newsletter/>
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