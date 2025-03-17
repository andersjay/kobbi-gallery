<div class="px-4 pt-28 lg:max-w-[1068px] w-full mx-auto pb-10">
    <h2 class="text-4xl text-white font-bold">NOTÍCIAS</h2>
    <div class="md:grid md:grid-cols-2 mt-11">
        <a href="#" class="w-full flex flex-col gap-2">
            <div class="w-[480px] h-[300px]">
                <img class="w-full h-full object-cover" src="{{ asset('storage/' . $highlight->image) }}" alt="">
            </div>
            <h2 class="text-2xl text-white font-bold mt-4">{{ $highlight->title }}</h2>
            <span class="text-white text-xl">{{ $highlight->summary }}</span>
           <span>Leia mais</span>
        </a>
        <div class="flex flex-col gap-4">
            @foreach($noticies as $notice)
                <a href="#" class="grid grid-cols-2 gap-2">
                    <div class="w-full">
                        <h2 class="text-lg font-semibold text-white">{{ $notice->title }}</h2>
                        <span class="text-gray-500 text-sm flex flex-wrap">{{ $notice->summary }}</span>
                        <span class="text-gray-500">Leia mais</span>
                    </div>
                    <div class="w-full">
                       <div class="w-[222px] h-[143px]">
                            <img class="w-[222px] h-[143px] object-cover" src="{{ asset('storage/' . $notice->image) }}" alt="">
                       </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>        
</div>