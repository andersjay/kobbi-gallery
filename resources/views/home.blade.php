 @extends('layouts.app')

@section('content')

    <div>
        <div class="swiper mySwiper w-full h-full mb-14">
            <div class="swiper-wrapper">
                @if($exhibitionBanner)

                    <div class="swiper-slide text-center text-lg px-8 md:px-10 lg:px-6 xl:px-4 h-[100dvh] flex items-end"
                        style="background:
                              linear-gradient(to bottom, rgba(0, 0, 0, 0.6), transparent 50%),
                              url({{ asset('storage/' . $exhibitionBanner->banner) }});
                      background-size: cover;
                      background-position: {{ $exhibitionBanner->banner_position }}!important;
                      background-repeat: no-repeat;">
                        @if($exhibitionBanner->banner_url)
                            <a href="{{ $exhibitionBanner->banner_url }}" target="_blank" class="w-full h-full flex items-end justify-start">
                                <span class="sr-only">Banner com link</span>
                            </a>
                        @endif
                        {{-- <div class="container w-full mx-auto flex items-start">
                            <div class="flex flex-col space-y-1 text-left">
                                <div class="flex gap-2">
                                    <h2 class="text-2xl text-white">{{ $exhibitionBanner->year }}</h2>
                                    |
                                    <span>{{ $exhibitionBanner->author_name }}</span>
                                </div>
                                <p class="text-4xl text-white">{{ $exhibitionBanner->title }}</p>
                                <a href="{{ route('exhibition', $exhibitionBanner->id) }}">
                                    <span class="text-white p-0">Ver exposição</span>
                                </a>
                            </div>
                        </div> --}}
                    </div>
                @endif
                @foreach ($banners as $banner)

                    <div class="swiper-slide text-center text-lg px-8 md:px-10 lg:px-6 xl:px-4 h-[100dvh] flex items-end"
                        style="background:
                              linear-gradient(to bottom, rgba(0, 0, 0, 0.6), transparent 50%),
                              url({{ asset('storage/' . $banner->image) }});
                      background-size: cover;
                      background-position: {{ $banner->position }}!important;
                      background-repeat: no-repeat;">
                        @if($banner->url)
                            <a href="{{ $banner->url }}" target="_blank" class="w-full h-full flex items-end justify-start">
                                <span class="sr-only">Banner com link</span>
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next text-white"></div>
            <div class="swiper-button-prev text-white"></div>
        </div>
        {{-- <livewire:artist-gallery />
        <livewire:gallery />
        <livewire:noticie /> --}}
        <div class="container-kobbi px-8 pt-14 w-full mx-auto pb-10">
            <livewire:newsletter-form />
        </div>
    </div>
@endsection
