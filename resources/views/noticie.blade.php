@extends('layouts.app')
@section('content')
<div class="container-kobbi md:px-0 pt-14 mx-auto pb-10 border-t border-gray-800">
    <div class="max-w-4xl mx-auto">
        <h1 class="header-title-spacing text-4xl text-gray-950 font-light">{{ $noticie->title }}</h1>
        
        @if($noticie->image_url)
        <div class="w-full h-[400px] mb-8">
            <img class="w-full h-full object-cover" src="{{ $noticie->image_url }}" alt="{{ $noticie->title }}">
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