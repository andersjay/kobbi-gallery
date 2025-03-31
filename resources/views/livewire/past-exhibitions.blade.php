<div class="mt-10 pt-10 border-t border-gray-800">
    <h2 class="text-xl text-white font-bold">EXPOSIÇÕES PASSADAS</h2>

    <div class="flex flex-col gap-10 md:grid md:grid-cols-2 xl:grid-cols-3">
        @foreach ($pastExhibitions as $pastExhibition)
        <div class="mt-4 flex flex-col gap-2 w-full hover:scale-105 transition-all duration-300">
           <a href="{{ route('exhibition', $pastExhibition->id) }}" class="w-full flex flex-col gap-2">
            <div class="w-full max-w-[400px] mx-auto">
                <div class="w-full aspect-square overflow-hidden">
                    <img class="w-full h-full object-cover" src="{{ asset('storage/' . $pastExhibition->image) }}" alt="">
                </div>
            </div>
           <div class="w-full flex flex-col gap-2 max-w-[400px] mx-auto">
            <h3 class="text-lg text-white font-bold">{{ $pastExhibition->title }}</h3>
            <p class="text-sm text-gray-400">{{ $pastExhibition->author_name }}</p>
            <p class="text-sm text-gray-400">{{ \Carbon\Carbon::parse($pastExhibition->start_date)->format('d/m/Y') }}</p>
            <a href="#" class="text-gray-400">Ver exposição</a>
           </div>
           </a>
        </div>
        @endforeach
    </div>
</div>