@extends('layouts.app')

@section('content')

    <div class=" bg-black">
        <div class="swiper mySwiper w-full h-full mb-14">
            <div class="swiper-wrapper">
                @foreach ($exhibitions as $item)
                    <div class="swiper-slide text-center text-lg px-8 md:px-10 lg:px-6 xl:px-4 h-[510px] md:h-[810px] flex items-end"
                        style="background: linear-gradient(to top, black, transparent 50%), 
                              linear-gradient(to bottom, rgba(0, 0, 0, 0.6), transparent 50%), 
                              url({{ asset('storage/' . $item->image) }}); 
                      background-size: cover; 
                      background-position: center; 
                      background-repeat: no-repeat;">

                        <div class="max-w-[1440px] w-full mx-auto flex items-start">
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
        <livewire:gallery />
        <livewire:noticie />
    </div>
@endsection
