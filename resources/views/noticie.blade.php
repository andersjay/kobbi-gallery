@extends('layouts.app')
@section('content')
<div class="container px-8 pt-14 w-full mx-auto pb-10 border-t border-gray-800">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl text-white font-bold mb-6">{{ $noticie->title }}</h1>
        
        @if($noticie->image)
        <div class="w-full h-[400px] mb-8">
            <img class="w-full h-full object-cover" src="{{ asset('storage/' . $noticie->image) }}" alt="{{ $noticie->title }}">
        </div>
        @endif

        <div class="prose prose-invert max-w-none">
            {!! $noticie->content !!}
        </div>

        <div class="mt-8 text-gray-400">
            <p>Autor: {{ $noticie->author_name }}</p>
            <p>Publicado em: {{ $noticie->created_at->format('d/m/Y') }}</p>
        </div>
    </div>
</div>
@endsection 