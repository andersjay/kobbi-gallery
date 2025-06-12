<div class="container-kobbi  pt-4 mx-auto pb-10 mt-10">
    <div class="flex items-center gap-2">
        <span class="header-title-spacing text-lg text-gray-950">ANTERIORES</span>
        <div class="h-[1px] bg-[#d1d1d1] w-full"></div>
    </div>

    <div class="flex flex-col gap-10 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @foreach ($pastExhibitions as $pastExhibition)
            <div class="mt-4 flex flex-col gap-2 w-full hover:scale-105 transition-all duration-300">
                <a href="{{ route('exhibition', $pastExhibition->slug) }}" class="w-full flex flex-col gap-2">
                    <div class="w-full max-w-[400px h-auto">
                        <div class="w-full aspect-square overflow-hidden">
                            <img class="w-full h-full object-cover" src="{{ asset('storage/' . $pastExhibition->image) }}"
                                alt="{{ $pastExhibition->title }}">
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-2">
                        <div>
                            <span class="text-md text-gray-950 mt-0 p-0">{{ $pastExhibition->title }}</span>
                            <p class="text-sm text-gray-700 p-0 mt-0 {{$pastExhibition->author_name === 'Exposição Coletiva' ? 'uppercase' : '' }}">{{ $pastExhibition->author_name }}</p>
                            <p class="text-sm text-gray-700 p-0 mt-0">
                            {{ \Carbon\Carbon::parse($pastExhibition->start_date)->format('d/m/Y') }}</p>
                        </div>

                        <a href="{{route('exhibition', $pastExhibition->slug)}}" class="text-gray-700">Ver exposição</a>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
