@extends('layouts.app')
@section('content')
<div class="container-kobbi  pt-14 mx-auto pb-10">
    <h2 class="header-title-spacing text-3xl text-gray-950 font-light">NOTÍCIAS</h2>
    @if($noticies->count())
        <div class="space-y-8">
            @foreach($noticies as $notice)
                <div class="flex flex-col md:flex-row gap-6 md:items-center bg-white md:p-5">
                    <div class="w-full md:w-1/4 flex-shrink-0 flex items-center">
                        <img src="{{ $notice->image_url }}" alt="{{ $notice->title }}" class="w-full max-w-[160px] aspect-square object-cover border border-gray-200 bg-[#7cc0e6] mx-auto">
                    </div>
                    <div class="w-full md:w-3/4">
                        <div class="flex items-center gap-2 mb-1">
                            <h6 class="text-lg text-gray-950">{{ $notice->title }}</h6>
                            @if($notice->is_pinned)
                                <svg class="w-4 h-4 text-gray-700" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 12V4h1V2H7v2h1v8l-2 2v2h5.2v6h1.6v-6H18v-2l-2-2z"/>
                                </svg>
                            @endif
                        </div>
                        @if($notice->date)
                        <span class="block text-gray-700 mb-2">{{ \Carbon\Carbon::parse($notice->date)->format('d/m/Y') }}</span>
                        @endif
                        <div class="text-gray-700 text-base mb-1">{{ \Illuminate\Support\Str::limit(strip_tags($notice->summary), 300) }}</div>
                        <div class="mt-4">
                            <a href="{{ route('noticies.show', $notice->slug) }}" class="w-full text-gray-400 text-md hover:brightness-95 transition">VER MAIS</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info mt-8 text-center text-gray-700 bg-white border-0 py-6">Nenhuma notícia cadastrada no momento.</div>
    @endif

    <div class="mt-10 pt-10">
      <livewire:newsletter-form />
    </div>
</div>
@endsection
