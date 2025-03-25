<div class="space-y-4">
    <h2 class="text-xl text-white font-bold">EXPOSICÃO ATUAL</h2>
    {{-- @dd($actualExhibition) --}}
    <div class="w-full flex flex-col gap-2 md:gap-0 md:grid md:grid-cols-2">
        <div>
           <div class="w-full max-w-[450px] h-[450px] md:max-w-[650px] md:h-[550px]">
                <img class="w-full h-full object-cover" src="{{ asset('storage/' . $actualExhibition->image) }}" alt="{{ $actualExhibition->title }}">
           </div>
        </div>
        <div class="flex flex-col gap-4">
            <h2 class="text-xl text-white font-bold mt-4">{{ $actualExhibition->title }}</h2>
            <h4 class="text-md text-gray-500">Autor: {{ $actualExhibition->author_name }}</h4>
            <span class="text-white text-md max-w-[600px]">{!!$actualExhibition->summary !!}</span>
            <div class="mt-4">
                <a href="{{ route('exhibitions') }}" class="text-md bg-white px-4 py-2 rounded-md text-black mt-4 border border-transparent hover:bg-black hover:border-white hover: hover:text-white transition-colors ">
                    Ver mais
                </a>
            </div>
        </div>
    </div>

</div>