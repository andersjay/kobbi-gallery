@extends('layouts.app')

@section('content')
<div class="container px-8 pt-14 w-full mx-auto pb-10 border-t border-gray-800">
    <div class="max-w-7xl mx-auto">
        <!-- Cabeçalho do Artista -->
        <div class="flex flex-col md:flex-row gap-8 mb-16">
            <div class="w-full md:w-1/3">
                @if(is_array($artist->image) && count($artist->image) > 0)
                    <div class="aspect-square rounded-lg overflow-hidden">
                        <img 
                            src="{{ asset('storage/' . $artist->image[0]) }}" 
                            alt="{{ $artist->name }}" 
                            class="w-full h-full object-cover"
                        >
                    </div>
                @else
                    <div class="aspect-square rounded-lg bg-gray-800 flex items-center justify-center">
                        <span class="text-gray-400 text-8xl">{{ substr($artist->name, 0, 1) }}</span>
                    </div>
                @endif
            </div>
            
            <div class="w-full md:w-2/3">
                <h1 class="text-5xl text-white font-bold mb-6">{{ $artist->name }}</h1>
                @if($artist->description)
                    <div class="prose prose-invert max-w-none">
                        <p class="text-gray-300 text-lg">{{ $artist->description }}</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Galeria de Obras -->
        @if($artist->artworks->count() > 0)
            <h2 class="text-3xl text-white font-bold mb-8">Obras do Artista</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($artist->artworks as $artwork)
                    <div class="group">
                        <div class="relative aspect-square rounded-lg overflow-hidden bg-gray-900">
                            @if(is_array($artwork->images) && count($artwork->images) > 0)
                                <img 
                                    src="{{ asset('storage/' . $artwork->images[0]) }}" 
                                    alt="{{ $artwork->name }}" 
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                >
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="text-gray-400 text-5xl">{{ substr($artwork->name, 0, 1) }}</span>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <div>
                                    <h3 class="text-xl font-bold text-white mb-2">{{ $artwork->name }}</h3>
                                    @if($artwork->description)
                                        <p class="text-gray-300 text-sm line-clamp-2">{{ $artwork->description }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-400 text-xl">Nenhuma obra cadastrada ainda.</p>
            </div>
        @endif

        <!-- Galeria de Imagens Adicionais do Artista -->
        @if(is_array($artist->image) && count($artist->image) > 1)
            <h2 class="text-3xl text-white font-bold mt-16 mb-8">Mais Imagens</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach(array_slice($artist->image, 1) as $image)
                    <div class="aspect-square rounded-lg overflow-hidden">
                        <img 
                            src="{{ asset('storage/' . $image) }}" 
                            alt="{{ $artist->name }}" 
                            class="w-full h-full object-cover hover:scale-110 transition-transform duration-300"
                        >
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Botão Voltar -->
        <div class="mt-12">
            <a href="{{ route('artists.index') }}" class="inline-flex items-center text-blue-400 hover:text-blue-300 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                <span>Voltar para lista de artistas</span>
            </a>
        </div>
    </div>
</div>
@endsection 