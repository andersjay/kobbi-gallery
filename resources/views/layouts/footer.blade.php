@php
    $footer = \App\Models\FooterSetting::first();
@endphp
<footer class="bg-[#F3F3F3] text-black w-full">
  <div class="px-8 lg:px-6 xl:px-4 container mx-auto py-20 flex flex-col items-center md:grid md:grid-cols-[100px,1fr,150px] lg:grid lg:grid-cols-[200px,1fr,150px] gap-8 lg:gap-2">
      <a href="{{ route('home') }}" class="w-full max-w-[150px]">
          <img class="w-full" src="{{ $footer && $footer->logo ? asset('storage/' . $footer->logo) : asset('images/logo-kobbi.png') }}" alt="Logo Kobbi Gallery">
      </a>

      {{-- <nav class="flex flex-col md:flex-row justify-center items-center gap-2">
          <a href="#" class=" text-lg md:text-sm lg:text-sm">ARTISTAS</a>
          <a href="{{ route('exhibitions') }}" class=" text-sm md:text-sm lg:text-sm">EXPOSIÇÕES</a>
          {{-- <a href="#" class=" text-sm md:text-sm lg:text-sm">PARCERIAS</a> --}}
          {{-- <a href="{{ route('gallery') }}" class=" text-sm md:text-sm lg:text-sm">GALERIA</a>
          <a href="{{ route('noticies') }}" class=" text-sm md:text-sm lg:text-sm">NOTÍCIAS</a>
          <a href="{{ route('contact') }}" class=" text-sm md:text-sm lg:text-sm">CONTATO</a>
          <a href="#" class=" text-sm md:text-sm lg:text-sm">LOJA</a> --}}
        {{-- </nav> --}}

      <div class="flex flex-col items-center w-full md:flex-row md:justify-center md:items-start gap-8 md:gap-24">
        <div class="flex flex-col text-start">
            <h3 class="text-lg font-bold text-gray-950">KOBBI GALLERY</h3>
            <p class="text-gray-950 p-0 m-0">{!! $footer && $footer->address ? $footer->address : 'Rua Augusta, 2900 <br> Vila Madalena, São Paulo/SP' !!}</p>
        </div>
        <div class="flex flex-col text-start">
            <h3 class="text-lg font-bold text-gray-950">CONTATO</h3>
            <p class="text-gray-950 p-0 m-0">{{ $footer && $footer->contact_phone ? $footer->contact_phone : '+55 11 98420-2061' }}</p>
            <p class="text-gray-950 p-0 m-0">{{ $footer && $footer->contact_email ? $footer->contact_email : 'contato@kobbi.com.br' }}</p>
        </div>
        <div class="flex flex-col gap-2 text-start">
            <h3 class="text-lg font-bold text-gray-950">HORARIO</h3>
            <p class="text-gray-950 p-0 m-0">{{ $footer && $footer->schedule_week ? $footer->schedule_week : 'Segunda a Sexta: 9:30 às 18h' }}</p>
            <p class="text-gray-950 p-0 m-0">{{ $footer && $footer->schedule_saturday ? $footer->schedule_saturday : 'Sábado: 9:30 às 18h' }}</p>
        </div>
      </div>

      <x-social-media-links />
    </div>

  </div>

    <div class="w-full border-t border-[#D1D1D1] pb-8 py-4  text-center">
        <span>
            {{ $footer && $footer->copyright ? $footer->copyright : 'Copyright 2025. Kobbi Photogallery. Todos os direitos reservados' }}
        </span>
    </div>
</footer>
