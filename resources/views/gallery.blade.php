@extends('layouts.app')

@section('content')
<div class="container px-4 pt-14 mt-4 w-full mx-auto pb-10">
    <div class="mt-12">
        <h2 class="text-4xl text-gray-950 font-bold">GALERIA</h2>
        <div class="mt-8 w-full">
            @php
                $gallerySetting = \App\Models\GallerySetting::first();
            @endphp
            @if($gallerySetting && $gallerySetting->about)
                <div class="prose max-w-none text-gray-700 text-lg">{!! $gallerySetting->about !!}</div>
            @else
                <p class="text-gray-700 text-lg">Fundada com a missão de explorar a fotografia e sua história, a Kobbi Gallery se estabeleceu como uma referência essencial no cenário da fotografia artística paulistana. Localizada na Vila Madalena, em São Paulo, a galeria dedica-se tanto à pesquisa quanto à realização de exposições que valorizem a potência e a singularidade de diferentes fotógrafos, posicionando-os tanto no mercado nacional quanto internacional. Trabalhando com uma variedade de artistas contemporâneos e reconhecidos, a Kobbi Gallery oferece um espaço dinâmico para a exploração de diferentes perspectivas e narrativas fotográficas.</p>
                    
                <p class="mt-4 text-gray-700 text-lg">
                    Dirigida por Eduardo e Cristina Kobbi, conta com um grupo de profissionais apaixonados e experientes, comprometidos em criar uma programação inovadora e relevante. Com um espaço expositivo cuidadosamente projetado, o local proporciona uma experiência imersiva e enriquecedora para os visitantes, sejam eles brasileiros ou estrangeiros, incentivando o diálogo entre a arte e o ambiente urbano.
                </p>

                <p class="mt-4 text-gray-700 text-lg">
                    A expansão recente de sua proposta expositiva reforça seu compromisso com a promoção tanto da fotografia quanto da arte contemporânea, uma vez que destaca seu empenho com uma abordagem curatorial que se estende desde a fotografia tradicional até as novas mídias. Com o compromisso de promover a pluralidade a partir de iniciativas baseadas na criatividade e no rigor acadêmico, celebramos a rica história da fotografia, ao mesmo tempo em que exploramos as infinitas possibilidades oferecidas por esse meio artístico.
                </p>
            @endif
        </div>
    </div>

    <div class="w-full mt-8">
        <div class="swiper gallerySwiper w-full h-[700px]">
            <div class="swiper-wrapper">
                @foreach($galleryImages as $img)
                    <div class="swiper-slide flex items-center justify-center">
                        <a href="{{ $img['src'] }}" class="gallery-lightbox block w-full h-full" data-caption="{{ $img['title'] }}">
                            <img src="{{ $img['src'] }}" alt="{{ $img['title'] }}" class="object-contain w-full h-[600px] rounded-lg" />
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next text-gray-950"></div>
            <div class="swiper-button-prev text-gray-950"></div>
        </div>
    </div>
    <div class="mt-10 border-t border-[#D1D1D1] pt-10">
        <livewire:newsletter />
    </div>
</div>

<!-- baguetteBox.js para lightbox -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.gallerySwiper', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
        });
        baguetteBox.run('.gallerySwiper', {
            captions: true,
            buttons: 'auto',
        });
    });
</script>
@endsection