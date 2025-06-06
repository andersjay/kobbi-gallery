@extends('layouts.app')

@section('content')
<div class="container-kobbi pt-14 mx-auto pb-10">
    <a href="{{ route('agenda.index') }}" class="text-gray-500 hover:text-gray-950 inline-block">&larr; Voltar para agenda</a>
   <div>
    <h1 class="text-3xl md:text-4xl font-light text-gray-950 mt-10">{{ $event->title }}</h1>
    <div class="font-bold text-lg text-gray-950 mb-6">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</div>
   </div>
    <div class="grid md:grid-cols-2 gap-8 items-start mb-10">
        <div>
            <img src="{{ asset('storage/' . $event->cover_image) }}" alt="{{ $event->title }}" class="w-full max-w-[400px] aspect-square object-cover border border-gray-200 bg-[#7cc0e6]">
        </div>
        <div>
            <div class="text-gray-700 text-base leading-relaxed text-justify">{!! nl2br(e($event->description)) !!}</div>
        </div>
    </div>
    <div class="my-6 text-gray-950 flex items-center gap-2">
        <span>IMAGENS</span>
        <div class="w-full h-[1px] bg-gray-200"></div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 gallery-lightbox">
        @foreach($event->images as $img)
            <div>
                <a href="{{ asset('storage/' . $img->image) }}" data-caption="{{ $event->title }}">
                    <img src="{{ asset('storage/' . $img->image) }}" alt="Imagem do evento" class="w-full max-w-[280px] aspect-square object-cover -lg border border-gray-200 bg-[#b3d8ea] mx-auto cursor-pointer">
                </a>
            </div>
        @endforeach
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.gallery-lightbox');
</script>
@endsection 