@extends('layouts.app')

@section('content')
    <main class="h-[calc(100vh-88px)]">
        <div class="swiper mySwiper w-full h-full">
            <div class="swiper-wrapper">
               @foreach ($exhibitions as $item)
               <div 
               class="swiper-slide text-center text-lg h-[810px] flex items-end"
               style="background: linear-gradient(to top, black, transparent 50%), 
                              linear-gradient(to bottom, rgba(0, 0, 0, 0.6), transparent 50%), 
                              url({{ asset('storage/' . $item->image)}}); 
                      background-size: cover; 
                      background-position: center; 
                      background-repeat: no-repeat;">

                      <div class="max-w-[1068px] w-full mx-auto flex items-start">
                           <div class="flex flex-col space-y-1 text-left">
                               <h2 class="text-2xl text-white">{{$item->year}}</h2>
                               <p class="text-4xl text-white">{{$item->title}}</p>
                               <span>{{$item->author_name}}</span>
                           </div>
                      </div>
               </div>    
               @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div class="pt-10 max-w-[1068px] w-full mx-auto">
            <h2 class="text-4xl text-white font-bold">ARTISTAS</h2>
            <livewire:artist-gallery />
        </div>
    </main>
@endsection
