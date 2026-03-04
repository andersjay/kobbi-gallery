@php
    $footer = \App\Models\FooterSetting::first();
    $footerTitleTranslations = function ($title) {
        $text = trim((string) $title);
        $normalized = mb_strtoupper($text);
        $normalizedAscii = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $normalized);
        $normalized = $normalizedAscii !== false
            ? preg_replace('/[^A-Z0-9]/', '', $normalizedAscii)
            : preg_replace('/[^\p{L}\p{N}]/u', '', $normalized);

        if (in_array($normalized, ['HORARIO', 'HORARIOS', 'SCHEDULE', 'SCHEDULES', 'HOUR', 'HOURS'], true)) {
            return [
                'pt' => 'HORÁRIOS',
                'en' => 'HOURS',
                'es' => 'HORARIOS',
            ];
        }

        if (in_array($normalized, ['ENDERECO', 'ENDERECOS', 'ADDRESS', 'ADDRESSES', 'DIRECCION', 'DIRECCIONES'], true)) {
            return [
                'pt' => 'ENDEREÇO',
                'en' => 'ADDRESS',
                'es' => 'DIRECCIÓN',
            ];
        }

        if (in_array($normalized, ['CONTATO', 'CONTATOS', 'CONTACT', 'CONTACTS', 'CONTACTO', 'CONTACTOS'], true)) {
            return [
                'pt' => 'CONTATO',
                'en' => 'CONTACT',
                'es' => 'CONTACTO',
            ];
        }

        return [
            'pt' => $text,
            'en' => $text,
            'es' => $text,
        ];
    };
@endphp
<footer class="bg-white text-black w-full">
  <div class="container-kobbi pt-14 pb-10 flex flex-col items-center md:flex-row">
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

      <div class="flex flex-col gap-4 items-center w-full md:flex-row md:justify-center md:items-start md:gap-6">
        @if ($footer && $footer->section1_title)
          @php $section1Title = $footerTitleTranslations($footer->section1_title); @endphp
          <div class="flex flex-col text-start w-full max-w-[300px] items-center md:items-center ">
            <div class="flex flex-col md:items-start items-center">
                <span class="text-lg text-gray-950 mb-2 notranslate" data-pt="{{ $section1Title['pt'] }}" data-en="{{ $section1Title['en'] }}" data-es="{{ $section1Title['es'] }}">{{ $section1Title['pt'] }}</span>
                <div class="text-gray-950 p-0 m-0 text-center md:text-start">{!! $footer->section1_description !!}</div>
            </div>
          </div>
        @endif

        @if ($footer && $footer->section2_title)
          @php $section2Title = $footerTitleTranslations($footer->section2_title); @endphp
          <div class="flex flex-col text-start w-full max-w-[300px] items-center md:items-center ">
            <div class="flex flex-col md:items-start items-center">
                <span class="text-lg text-gray-950 mb-2 text-start notranslate" data-pt="{{ $section2Title['pt'] }}" data-en="{{ $section2Title['en'] }}" data-es="{{ $section2Title['es'] }}">{{ $section2Title['pt'] }}</span>
                <div class="text-gray-950 p-0 m-0 text-center md:text-start">{!! $footer->section2_description !!}</div>
            </div>
          </div>
        @endif

        @if ($footer && $footer->section3_title)
          @php $section3Title = $footerTitleTranslations($footer->section3_title); @endphp
          <div class="flex flex-col text-start w-full max-w-[300px] items-center md:items-center">
            <div class="flex flex-col md:items-start items-center">
                <span class="text-lg text-gray-950 mb-2 notranslate" data-pt="{{ $section3Title['pt'] }}" data-en="{{ $section3Title['en'] }}" data-es="{{ $section3Title['es'] }}">{{ $section3Title['pt'] }}</span>
                <div class="text-gray-950 p-0 m-0 text-center md:text-start">{!! $footer->section3_description !!}</div>
            </div>
          </div>
        @endif
      </div>
      <x-social-media-links />
    </div>

  </div>

    <div class="w-full border-t border-[#D1D1D1] py-6 text-black text-center">
        <span>
            {{ $footer && $footer->copyright ? $footer->copyright : 'Copyright 2025. Kobbi Photogallery. Todos os direitos reservados' }}
        </span>
    </div>
</footer>
