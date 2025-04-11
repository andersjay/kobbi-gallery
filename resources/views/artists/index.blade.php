@extends('layouts.app')

@section('content')
<div class="container px-8 pt-14 w-full mx-auto pb-10 border-t border-gray-800">
    <h2 class="text-4xl text-white font-bold mb-12">ARTISTAS</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($artists as $artist)
        <a href="{{ route('artists.show', $artist->id) }}" class="group">
            <div class="relative overflow-hidden bg-gray-900 rounded-lg aspect-square">
                @if(is_array($artist->image) && count($artist->image) > 0)
                    <img 
                        src="{{ asset('storage/' . $artist->image[0]) }}" 
                        alt="{{ $artist->name }}" 
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                    >
                @else
                    <div class="w-full h-full flex items-center justify-center bg-gray-800">
                        <span class="text-gray-400 text-5xl">{{ substr($artist->name, 0, 1) }}</span>
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                    <div>
                        <h3 class="text-2xl font-bold text-white mb-2">{{ $artist->name }}</h3>
                        @if($artist->description)
                            <p class="text-gray-300 text-sm line-clamp-2">{{ $artist->description }}</p>
                        @endif
                        <div class="mt-4 inline-flex items-center text-blue-400">
                            <span>Ver obras</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection 