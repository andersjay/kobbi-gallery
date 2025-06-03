@extends('layouts.app')

@section('content')
<div class="container-kobbi md:px-0 pt-14 mx-auto pb-10">
    <h2 class="header-title-spacing text-3xl text-gray-950 font-light">AGENDA</h2>
    @if($nextEvent)
        <div class="mb-10">
            <h4 class="text-2xl text-gray-950 font-semibold mb-4">PRÓXIMO EVENTO</h4>
            <div class="flex flex-col md:flex-row  bg-[#F3F3F3] rounded-xl py-6">
                <div class="w-full md:w-1/3 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('storage/' . $nextEvent->cover_image) }}" alt="{{ $nextEvent->title }}" class="w-full max-w-[240px] aspect-square object-cover rounded-lg border border-gray-200 bg-[#7cc0e6] mx-auto">
                </div>
                <div class="w-full md:w-2/3">
                    <h5 class="text-xl text-gray-950 font-bold mb-1">{{ $nextEvent->title }}</h5>
                    <strong class="block text-gray-700 mb-2">{{ \Carbon\Carbon::parse($nextEvent->date)->format('d/m/Y') }}</strong>
                    <div class="text-gray-700 text-base mb-4">{!! nl2br(e($nextEvent->description)) !!}</div>
                    <a href="{{ route('agenda.show', $nextEvent) }}" class="w-full bg-[#D1D1D1] text-black py-2 px-4 rounded font-semibold text-md hover:brightness-95 transition">Ver mais</a>
                </div>
            </div>
        </div>
    @endif

    <h6 class="text-lg text-gray-950 font-semibold mt-8 mb-2">ANTERIORES</h6>
    <hr class="mb-6">
    @if($previousEvents->count())
        <div class="space-y-8">
            @foreach($previousEvents as $event)
                <div class="flex flex-col md:flex-row gap-6 items-center bg-[#F3F3F3] rounded-xl p-5">
                    <div class="w-full md:w-1/4 flex-shrink-0">
                        <img src="{{ asset('storage/' . $event->cover_image) }}" alt="{{ $event->title }}" class="w-full max-w-[160px] aspect-square object-cover rounded-lg border border-gray-200 bg-[#7cc0e6] mx-auto">
                    </div>
                    <div class="w-full md:w-3/4 ">
                        <h6 class="text-lg text-gray-950 font-bold mb-1">{{ $event->title }}</h6>
                        <strong class="block text-gray-700 mb-2">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</strong>
                        <div class="text-gray-700 text-base mb-1">{!! \Illuminate\Support\Str::limit(strip_tags($event->description), 300) !!}</div>
                        <div class="mt-4">
                            <a href="{{ route('agenda.show', $event) }}" class="w-full bg-[#D1D1D1] text-black py-2 px-4 rounded font-semibold text-md hover:brightness-95 transition">Ver mais</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info mt-8 text-center text-gray-700 bg-[#F3F3F3] border-0 rounded-lg py-6">Nenhum evento cadastrado no momento.</div>
    @endif
    <div class="mt-10 pt-10">
      <livewire:newsletter-form />
    </div>
</div>
@endsection 