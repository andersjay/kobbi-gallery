@extends('layouts.app')

@php
    $items = [
        [
            'src' => asset('images/gallery/galeria1.webp'),
            'srct' => asset('images/gallery/galeria1.webp'),
            'title' => 'Galeria 1',
        ],
        [
            'src' => asset('images/gallery/galeria2.webp'),
            'srct' => asset('images/gallery/galeria2.webp'),
            'title' => 'Galeria 2',
        ],
        [
            'src' => asset('images/gallery/galeria3.webp'),
            'srct' => asset('images/gallery/galeria3.webp'),
            'title' => 'Galeria 3',
        ],
        [
            'src' => asset('images/gallery/galeria4.webp'),
            'srct' => asset('images/gallery/galeria4.webp'),
            'title' => 'Galeria 4',
        ],
        [
            'src' => asset('images/gallery/galeria5.webp'),
            'srct' => asset('images/gallery/galeria5.webp'),
            'title' => 'Galeria 5',
        ],
    ];
@endphp

@section('content')
    <script>
        var galleryImages = @json($items);
    </script>
    <div class=" bg-black">
        <div class="swiper mySwiper w-full h-full">
            <div class="swiper-wrapper">
                @foreach ($exhibitions as $item)
                    <div class="swiper-slide text-center text-lg h-[810px] flex items-end"
                        style="background: linear-gradient(to top, black, transparent 50%), 
                              linear-gradient(to bottom, rgba(0, 0, 0, 0.6), transparent 50%), 
                              url({{ asset('storage/' . $item->image) }}); 
                      background-size: cover; 
                      background-position: center; 
                      background-repeat: no-repeat;">

                        <div class="max-w-[1068px] w-full mx-auto flex items-start">
                            <div class="flex flex-col space-y-1 text-left">
                                <div class="flex gap-2">
                                    <h2 class="text-2xl text-white">{{ $item->year }}</h2>
                                    |
                                    <span>{{ $item->author_name }}</span>
                                </div>
                                <p class="text-4xl text-white">{{ $item->title }}</p>
                                <a href="#">
                                    <span class="text-white p-0">Ver exposição</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <livewire:artist-gallery />
        <div class="pt-28 max-w-[1068px] w-full mx-auto pb-10">
            <h2 class="text-4xl text-white font-bold">GALERIA</h2>
            <div class="mt-20">
                <div id="gallery"></div>
            </div>
            <div class="w-full flex flex-col gap-9 mt-40">
                <div class="w-[368px] mx-auto">
                    <img src="{{ asset('images/logo-kobbi-2x.png') }}" alt="Logo Kobbi Gallery">
                </div>
                <span class="text-center text-2xl text-white">
                    Fundada na Vila Madalena, a Kobbi Gallery é um espaço dedicado à fotografia artística, conectando
                    artistas contemporâneos ao mercado nacional e internacional. Com curadoria inovadora e um ambiente
                    imersivo, celebramos a história da fotografia enquanto exploramos suas novas possibilidades.
                </span>
                <div class="w-full flex justify-center">
                    <a href="#" class="bg-black p-2 text-white border-white rounded-md border w-">
                        Conheça nossa história
                    </a>
                </div>
            </div>
        </div>

        <livewire:noticie />
    </div>
@endsection
