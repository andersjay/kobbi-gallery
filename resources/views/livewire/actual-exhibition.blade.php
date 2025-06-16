<div class="container-kobbi px-8 mx-auto space-y-4">
    <div class="flex items-center gap-2">
        <span class="lg:mt-0 text-lg text-gray-950">ATUAL</span>
        <div class="h-[1px] bg-[#d1d1d1] w-full"></div>
    </div>

    <div class="w-full flex flex-col gap-2 md:grid md:grid-cols-[2fr_1fr] md:gap-4 lg:grid-cols-[1fr_1fr] lg:gap-8">
        <div class="flex justify-center md:justify-start hover:scale-105 transition-all duration-300">
            <a href="{{ route('exhibition', $actualExhibition->slug) }}" class="w-full max-w-[600px] h-auto md:h-[500px]">
                <img class="w-full h-full aspect-square md:object-contain"
                    src="{{ asset('storage/' . $actualExhibition->image) }}"
                    alt="{{ $actualExhibition->title }}">
            </a>
        </div>
        <div class="">
            <div class="md:h-auto flex flex-col gap-1">
                <h2 class="text-xl text-gray-950 font-bold mt-4 md:mt-0">{{ $actualExhibition->title }}</h2>
                <h4 class="text-md text-gray-500 {{$actualExhibition->is_collective === 1 ? 'uppercase' : '' }}">{{$actualExhibition->is_collective ===  1 ? 'EXPOSIÇÃO COLETIVA' : $actualExhibition->author_name}}</h4>
                <div class="actual-exhibition-summary text-md w-full text-justify">
                    {!! $actualExhibition->summary !!}
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('exhibition', $actualExhibition->slug) }}"
                    class="bg-[#d1d1d1] text-gray-950 px-4 py-2 rounded-sm mt-4 hover:brightness-95 transition-colors">
                    Ver exposição
                </a>
            </div>
        </div>
    </div>
    <style>
        .actual-exhibition-summary p {
            color: #000 !important;
        }
        </style>
</div>
