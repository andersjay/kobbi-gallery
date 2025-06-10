@php
    $footer = \App\Models\FooterSetting::first();
@endphp
<footer class="bg-white text-black w-full">
  <div class="px-8 lg:px-6 xl:px-4 container-kobbi py-10 flex flex-col items-center md:flex-row ">
      <a href="{{ route('home') }}" class="w-full max-w-[150px] mb-6 md:mb-0">
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

      <div class="flex flex-col gap-10 md:gap-0 items-center w-full md:flex-row md:justify-center md:items-start">
        @if ($footer && $footer->section1_title)
          <div class="flex flex-col text-start w-full max-w-[300px] items-center md:items-center ">
            <div class="flex flex-col md:items-start items-center">
                <h3 class="text-lg font-bold text-gray-950 mb-2">{{ $footer->section1_title }}</h3>
                <div class="text-gray-950 p-0 m-0 text-center md:text-start">{!! $footer->section1_description !!}</div>
            </div>
          </div>
        @endif

        @if ($footer && $footer->section2_title)
          <div class="flex flex-col text-start w-full max-w-[300px] items-center md:items-center ">
            <div class="flex flex-col md:items-start items-center">
                <h3 class="text-lg font-bold text-gray-950 mb-2 text-start">{{ $footer->section2_title }}</h3>
                <div class="text-gray-950 p-0 m-0 text-center md:text-start">{!! $footer->section2_description !!}</div>
            </div>
          </div>
        @endif

        @if ($footer && $footer->section3_title)
          <div class="flex flex-col text-start w-full max-w-[300px] items-center md:items-center mb-6 md:mb-0">
            <div class="flex flex-col md:items-start items-center">
                <h3 class="text-lg font-bold text-gray-950 mb-2">{{ $footer->section3_title }}</h3>
                <div class="text-gray-950 p-0 m-0 text-center md:text-start">{!! $footer->section3_description !!}</div>
            </div>
          </div>
        @endif
      </div>

      <x-social-media-links />
    </div>

  </div>

    <div class="w-full border-t border-[#D1D1D1] pb-8 py-4 text-black  text-center">
        <span>
            {{ $footer && $footer->copyright ? $footer->copyright : 'Copyright 2025. Kobbi Photogallery. Todos os direitos reservados' }}
        </span>
    </div>
</footer>
