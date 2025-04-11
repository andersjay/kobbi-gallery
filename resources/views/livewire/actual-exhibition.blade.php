<div class="container px-8 mx-auto space-y-4">
    <h2 class="mt-10 md:mt-8 md:mb-8 lg:mt-0 text-xl text-white font-bold">EXPOSIÇÃO ATUAL</h2>

    <div class="w-full flex flex-col gap-2 md:grid md:grid-cols-[2fr_1fr] md:gap-4 lg:grid-cols-[1fr_1fr] lg:gap-8">
        <div class="flex justify-center md:justify-start hover:scale-105 transition-all duration-300">
            <a href="{{ route('exhibition', $actualExhibition->id) }}" class="w-full max-w-[600px] h-auto md:h-[500px]">
                <img class="w-full h-full aspect-square md:object-contain"
                    src="{{ asset('storage/' . $actualExhibition->image) }}" 
                    alt="{{ $actualExhibition->title }}">
            </a>
        </div>
        <div class="">
            <div class="md:h-auto flex flex-col gap-1">
                <h2 class="text-xl text-white font-bold mt-4 md:mt-0">{{ $actualExhibition->title }}</h2>
                <h4 class="text-md text-gray-500">Autor: {{ $actualExhibition->author_name }}</h4>
                <span class="text-white text-md w-full">{!! $actualExhibition->summary !!}</span>
            </div>
            <div class="mt-4">
                <a href="{{ route('exhibition', $actualExhibition->id) }}"
                    class="text-md bg-white px-2 py-1 rounded-md text-black mt-4 border border-transparent 
                    hover:bg-black hover:border-white hover:text-white transition-colors">
                    Ver exposição
                </a>
            </div>
        </div>
    </div>
</div>