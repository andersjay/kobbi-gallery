@extends('layouts.app')

@section('content')
<div class="container-kobbi  pt-14 mx-auto pb-10">
    <h2 class="header-title-spacing text-3xl text-gray-950 font-light">AGENDA</h2>
    @if($nextEvent)
        <div class="mb-10">
            <h4 class="text-xl text-gray-950 mb-4">PRÓXIMO EVENTO</h4>
            <div class="flex flex-col md:flex-row bg-white py-6">
                <div class="w-full md:w-1/3 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('storage/' . $nextEvent->cover_image) }}" alt="{{ $nextEvent->title }}" class="w-full max-w-[240px] aspect-square object-cover  border border-gray-200 bg-[#7cc0e6] mx-auto">
                </div>
                <div class="w-full md:w-2/3">
                    <h5 class="text-[16px] text-gray-950 mb-1">{{ $nextEvent->title }}</h5>
                    <span class="block text-gray-700 mb-2 text-[14px]">{{ \Carbon\Carbon::parse($nextEvent->date)->format('d/m/Y') }}</span>
                    <div class="text-gray-700 text-base mb-4 text-[14px] text-justify">{!! nl2br(e($nextEvent->description)) !!}</div>
                    <a href="{{ route('agenda.show', $nextEvent) }}" class="w-full text-gray-400 text-md hover:brightness-95 transition">VER MAIS</a>
                </div>
            </div>
        </div>
    @endif

    <h6 class="text-lg text-gray-950 mt-8 mb-2">ANTERIORES</h6>
    <hr class="mb-6">
    @if($previousEvents->count())
        <div class="space-y-8">
            @foreach($previousEvents as $event)
                <div class="flex flex-col md:flex-row gap-6 items-center bg-white rounded-xl p-5">
                    <div class="w-full md:w-1/4 flex-shrink-0">
                        <img src="{{ asset('storage/' . $event->cover_image) }}" alt="{{ $event->title }}" class="w-full max-w-[160px] aspect-square object-cover bg-[#7cc0e6] mx-auto">
                    </div>
                    <div class="w-full md:w-3/4 ">
                        <h6 class="text-lg text-gray-950 mb-1 text-[16px]">{{ $event->title }}</h6>
                        <span class="block text-gray-700 text-[14px] mb-2">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</span>
                        <div class="text-gray-700 text-base mb-1 text-[14px] text-justify flex-wrap break-words">{!! \Illuminate\Support\Str::limit(strip_tags($event->description), 300) !!}</div>
                        <div class="mt-4">
                            <a href="{{ route('agenda.show', $event) }}" class="w-full text-gray-400 text-md hover:brightness-95 transition">VER MAIS</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info mt-8 text-center text-gray-700 bg-white border-0 rounded-lg py-6">Nenhum evento cadastrado no momento.</div>
    @endif
    <div class="mt-10 pt-10">
      <livewire:newsletter-form />
    </div>
</div>
@endsection
