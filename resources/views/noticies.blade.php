@extends('layouts.app')
@section('content')
<div class="container px-8 pt-14 w-full mx-auto pb-10 border-t border-gray-800">
    <h2 class="text-4xl text-white font-bold">NOTÍCIAS</h2>
    
    @if($lastNoticie)
    <!-- Notícia em Destaque -->
    <div class="mt-11 mb-16">
        <a href="{{ route('noticies.show', $lastNoticie->slug) }}" class="block">
            <div class="w-full max-h-[500px] overflow-hidden">
                <img class="w-full h-full object-cover" src="{{ asset('storage/' . $lastNoticie->image) }}" alt="{{ $lastNoticie->title }}">
            </div>
            <div class="mt-6">
                <h2 class="text-3xl text-white font-bold">{{ $lastNoticie->title }}</h2>
                <p class="text-gray-400 text-lg mt-3">{{ $lastNoticie->summary }}</p>
                <span class="text-blue-500 mt-4 inline-block">Leia mais</span>
            </div>
        </a>
    </div>

    <!-- Grid de Notícias -->
    @if($noticies->count() > 0)
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($noticies as $notice)
        <a href="{{ route('noticies.show', $notice->slug) }}" class="block group">
            <div class="w-full h-[200px] overflow-hidden">
                <img class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" 
                     src="{{ asset('storage/' . $notice->image) }}" 
                     alt="{{ $notice->title }}">
            </div>
            <div class="mt-4">
                <h3 class="text-xl text-white font-semibold group-hover:text-blue-500 transition-colors">{{ $notice->title }}</h3>
                <p class="text-gray-400 text-sm mt-2">{{ $notice->summary }}</p>
                <span class="text-blue-500 mt-3 inline-block">Leia mais</span>
            </div>
        </a>
        @endforeach
    </div>
    @endif

    @else
    <p class="text-white text-xl mt-8">Nenhuma notícia disponível no momento.</p>
    @endif
</div>
@endsection