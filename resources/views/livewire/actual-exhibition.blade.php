<div class="space-y-4">
    <h2 class="text-xl text-white font-bold">EXPOSIÇÃO ATUAL</h2>

    <div class="w-full flex flex-col gap-2 md:gap-4 md:grid md:grid-cols-2">
        <div class="flex justify-center md:justify-start">
            <div class="w-full max-w-[450px] h-auto md:max-w-[650px]">
                <img class="w-full h-auto rounded-md object-cover"
                    src="{{ asset('storage/' . $actualExhibition->image) }}" 
                    alt="{{ $actualExhibition->title }}">
            </div>
        </div>
        <div class="">
            <div class="md:h-auto flex flex-col gap-4">
                <h2 class="text-xl text-white font-bold mt-4 md:mt-0">{{ $actualExhibition->title }}</h2>
                <h4 class="text-md text-gray-500">Autor: {{ $actualExhibition->author_name }}</h4>
                <span class="text-white text-md max-w-[600px]">{!! $actualExhibition->summary !!}</span>
            </div>
            <div class="mt-4">
                <a href="{{ route('exhibitions') }}"
                    class="text-md bg-white px-2 py-1 rounded-md text-black mt-4 border border-transparent 
                    hover:bg-black hover:border-white hover:text-white transition-colors">
                    Ver exposição
                </a>
            </div>
        </div>
    </div>
</div>