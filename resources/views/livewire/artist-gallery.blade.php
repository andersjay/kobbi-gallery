<div class="pt-28 max-w-[1068px] w-full mx-auto bg-black">
    <h2 class="text-4xl text-white font-bold">ARTISTAS</h2>
    <div class="grid grid-cols-[400px_1fr] pt-12">
        <div class="w-full p-4">
            <ul>
                @foreach ($artists as $index => $artist)
                    <li class="cursor-pointer font-bold text-2xl p-2 
                    {{ $selectedArtist && $selectedArtist['name'] === $artist['name'] ? 'text-white' : 'text-gray-400' }}"
                        wire:click="selectArtist({{ $index }})">
                        {{ $artist['name'] }}
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="w-full p-6 text-white text-xl">
            @if ($selectedArtist)
                <div class="flex flex-wrap">
                    @foreach ($selectedArtist['gallery'] as $image)
                        <div class="w-full">
                            <div id="artist-gallery"></div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
