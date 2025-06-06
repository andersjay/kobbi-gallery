@extends('layouts.app')
@section('content')
<div class="container-kobbi  pt-14 mx-auto pb-10">
    <h2 class="header-title-spacing text-3xl text-gray-950 font-light">NOTÍCIAS</h2>
    @if($noticies->count())
        <div class="space-y-8">
            @foreach($noticies as $notice)
                <div class="flex flex-col md:flex-row gap-6 md:items-center  bg-[#F3F3F3] rounded-xl md:p-5">
                    <div class="w-full md:w-1/4 flex-shrink-0 flex items-center">
                        <img src="{{ $notice->image_url }}" alt="{{ $notice->title }}" class="w-full max-w-[160px] aspect-square object-cover rounded-lg border border-gray-200 bg-[#7cc0e6] mx-auto">
                    </div>
                    <div class="w-full md:w-3/4">
                        <h6 class="text-lg text-gray-950 font-bold mb-1">{{ $notice->title }}</h6>
                        @if($notice->created_at)
                        <strong class="block text-gray-700 mb-2">{{ \Carbon\Carbon::parse($notice->created_at)->format('d/m/Y') }}</strong>
                        @endif
                        <div class="text-gray-700 text-base mb-1">{{ \Illuminate\Support\Str::limit(strip_tags($notice->summary), 300) }}</div>
                        <div class="mt-4">
                            <a href="{{ route('noticies.show', $notice->slug) }}" class="w-full bg-[#D1D1D1] text-black py-2 px-4 rounded font-semibold text-md hover:brightness-95 transition">Ver mais</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info mt-8 text-center text-gray-700 bg-[#F3F3F3] border-0 rounded-lg py-6">Nenhuma notícia cadastrada no momento.</div>
    @endif

    <div class="mt-10 pt-10">
      <livewire:newsletter-form />
    </div>
</div>
@endsection