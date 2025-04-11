@extends('layouts.app')
@section('content')
    <div class="bg-black">
        <div class="swiper mySwiper w-full h-full mb-14">
            <div class="swiper-wrapper">
                <div class="swiper-slide text-center text-lg px-8 md:px-10 lg:px-6 xl:px-4 h-[510px] md:h-[810px] flex items-center justify-center"
                    style="background: linear-gradient(to top, black, transparent 50%), 
                        linear-gradient(to bottom, rgba(0, 0, 0, 0.6), transparent 50%), 
                        url({{ asset('storage/' . $exhibition->banner) }}); 
                background-size: cover; 
                background-position: center; 
                background-repeat: no-repeat;">

                    <div class="max-w-[1440px] w-full mx-auto flex items-center justify-center">
                        <div class="flex flex-col space-y-1">
                            <h2 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold drop-shadow-2xl"
                                style="text-shadow: 2px 4px 4px rgba(0, 0, 0, 0.5);">{{ $exhibition->title }}</h2>
                            @if($exhibition->author_name)
                                <h3 class="text-white text-xl md:text-2xl font-bold drop-shadow-2xl text-center"
                                    style="text-shadow: 2px 4px 4px rgba(0, 0, 0, 0.5);">{{ $exhibition->author_name }}</h3>
                            @endif
                            @if($exhibition->year)
                                <p class="text-white text-lg md:text-xl drop-shadow-2xl text-center"
                                   style="text-shadow: 2px 4px 4px rgba(0, 0, 0, 0.5);">{{ $exhibition->year }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next text-white"></div>
            <div class="swiper-button-prev text-white"></div>
        </div>
    </div>

    <div class="container px-4 mx-auto mt-14">
        <div class="grid grid-cols-1 {{ $exhibition->gallery ? 'lg:grid-cols-[1fr_400px]' : '' }} gap-14">
            <div class="space-y-14">
                <!-- Conteúdo Principal -->
                <div class="prose prose-lg max-w-none prose-invert">
                    {!! $exhibition->description !!}
                </div>

                <!-- Seção do Autor -->
                @if($exhibition->author_name || $exhibition->author_description)
                    <div class="bg-zinc-900 rounded-2xl p-8 md:p-10">
                        <div class="flex flex-col items-start">
                            @if($exhibition->author_name)
                                <h3 class="text-2xl md:text-3xl font-bold text-white mb-6">{{ $exhibition->author_name }}</h3>
                            @endif
                            @if($exhibition->author_description)
                                <div class="prose prose-lg max-w-none prose-invert prose-p:text-gray-300">
                                    {!! $exhibition->author_description !!}
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            <!-- Galeria Lateral -->
            @if($exhibition->gallery)
                <div class="space-y-8">
                    <h3 class="text-2xl font-bold text-white">Galeria</h3>
                    <div class="space-y-6">
                        @foreach($exhibition->gallery as $item)
                            <div class="relative group">
                                <img src="{{ asset('storage/' . $item['image']) }}" 
                                     alt="{{ $item['caption'] ?? '' }}" 
                                     class="w-full aspect-[4/3] object-cover rounded-xl transition-transform duration-300 group-hover:scale-[1.02]">
                                @if(isset($item['caption']))
                                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 to-transparent p-4 rounded-b-xl">
                                        <p class="text-white text-sm">{{ $item['caption'] }}</p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('styles')
<style>
    .prose-invert {
        --tw-prose-invert-body: theme('colors.gray.300');
        --tw-prose-invert-headings: theme('colors.white');
        --tw-prose-invert-links: theme('colors.white');
    }
</style>
@endpush
