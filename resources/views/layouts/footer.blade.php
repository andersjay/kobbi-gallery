<footer class="bg-black w-full">
  <div class="px-8 md:px-10 lg:px-6 xl:px-4 max-w-[1440px] w-full mx-auto py-20 bg-black flex flex-col items-center md:grid md:grid-cols-[100px,1fr,150px] lg:grid lg:grid-cols-[200px,1fr,150px] gap-8 lg:gap-2">
      <a href="{{ route('home') }}" class="w-full max-w-[150px]">
          <img class="w-full" src="{{ asset('images/logo-kobbi.png') }}" alt="Logo Kobbi Gallery">
      </a>

      <nav class="flex flex-col md:flex-row justify-center items-center gap-2">
          <a href="#" class="text-white text-lg md:text-sm lg:text-sm">ARTISTAS</a>
          <a href="{{ route('exhibitions') }}" class="text-white text-sm md:text-sm lg:text-sm">EXPOSIÇÕES</a>
          <a href="#" class="text-white text-sm md:text-sm lg:text-sm">PARCERIAS</a>
          <a href="{{ route('gallery') }}" class="text-white text-sm md:text-sm lg:text-sm">GALERIA</a>
          <a href="#" class="text-white text-sm md:text-sm lg:text-sm">NOTÍCIAS</a>
          <a href="#" class="text-white text-sm md:text-sm lg:text-sm">CONTATO</a>
          <a href="#" class="text-white text-sm md:text-sm lg:text-sm">LOJA</a>
      </nav>

      <div class="flex items-center gap-6">
          <a href="https://web.whatsapp.com/send?phone=5511984202061&text=Olá!%20Gostaria%20de%20saber%20mais%20sobre%20a%20Kobbi%20Gallery" target="_blank">
              <img src="{{ asset('images/link-whats.png') }}" alt="WhatsApp">
          </a>
          <a href="https://www.instagram.com/kobbi.gallery/">
              <img src="{{ asset('images/link-insta.png') }}" alt="Instagram">
          </a>
          {{-- <a href="#">
              <img src="{{ asset('images/link-email.png') }}" alt="Email">
          </a> --}}
      </div>
    </div>

  </div>

    <div class="w-full border-t border-white pb-8 py-4 text-white text-center">
        <span>
            Copyright 2025. Kobbi Photogallery. Todos os direitos reservados
        </span>
    </div>
</footer>
