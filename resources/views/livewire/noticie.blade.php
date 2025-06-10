<div class="container-kobbi  pt-14 mx-auto pb-10 border-t border-gray-800">
    <h2 class="header-title-spacing text-3xl text-white font-light">NOTÍCIAS</h2>
    <div class="md:grid md:grid-cols-2 md:gap-4 mt-11  content-between">
        <a href="{{$highlight->url}}" target="_blank" class="w-full flex flex-col gap-2">
            <div class="w-full max-w-[600px] h-[300px]">
                <img class="w-full h-full object-cover" src="{{ $highlight->image_url }}" alt="">
            </div>
           <h2 class="text-2xl text-white font-bold mt-4">{{ $highlight->title }}</h2>
            @if($highlight->date)
                <span class="text-gray-400 text-sm">{{ $highlight->date->format('d/m/Y') }}</span>
            @endif
            <span class="text-white text-xl max-w-[600px]">{{ $highlight->summary }}</span>
           <span>Leia mais</span>
       </a>
       <div class="flex flex-col gap-4">
            @foreach($noticies as $notice)
                <a href="{{$notice->url}}" target="_blank" class="grid grid-cols-2 gap-2">
                    <div class="w-full">
                        <h2 class="text-lg font-semibold text-white">{{ $notice->title }}</h2>
                        @if($notice->date)
                            <span class="text-gray-400 text-xs">{{ $notice->date->format('d/m/Y') }}</span>
                        @endif
                        <span class="text-gray-500 text-sm flex flex-wrap">{{ $notice->summary }}</span>
                        <span class="text-gray-500">Leia mais</span>
                    </div>
                    <div class="w-full">
                       <div class="w-full h-[143px]">
                            <img class="w-[222px] h-[143px] object-cover" src="{{ $notice->image_url }}" alt="">
                       </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>        
</div>