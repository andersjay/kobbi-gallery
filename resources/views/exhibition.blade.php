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
                      <div class="flex flex-col space-y-1 text-left">
                          <h2 class="text-white text-4xl font-bold drop-shadow-2xl"
                              style="text-shadow: 2px 4px 4px rgba(0, 0, 0, 0.5);">{{ $exhibition->title }}</h2>
                          <h3 class="text-white text-xl font-bold drop-shadow-2xl text-center"
                              style="text-shadow: 2px 4px 4px rgba(0, 0, 0, 0.5);">{{ $exhibition->author_name }}</h3>
                      </div>
                  </div>
              </div>

          </div>
          <div class="swiper-button-next text-white"></div>
          <div class="swiper-button-prev text-white"></div>
      </div>
  </div>
  <div class="container px-4 mx-auto mt-14">
      {!! nl2br($exhibition->description) !!}
  </div>
@endsection
