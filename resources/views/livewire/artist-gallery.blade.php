{{--<div class="container-kobbi pt-14 mx-auto pb-10 bg-white text-black">--}}
{{--    <h2 class="header-title-spacing text-3xl text-black font-light px-4">ARTISTAS</h2>--}}
{{--    <div class="lg:grid lg:grid-cols-[400px_1fr] pt-12">--}}
{{--        <div class="w-full lg:p-4">--}}
{{--            <!-- Select para Mobile -->--}}
{{--            <div class="lg:hidden w-full px-4">--}}
{{--                <select id="artist-select-mobile" class="w-full h-12 text-sm bg-transparent text-gray-400 border-2 border-gray-700 rounded-lg px-4 focus:outline-none focus:border-white focus:ring-2 focus:ring-white">--}}
{{--                    @foreach($artists as $artist)--}}
{{--                        <option value="{{ $artist->id }}">{{ $artist->name }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <!-- Lista para Desktop -->--}}
{{--            <ul id="artist-list" class="hidden lg:block">--}}
{{--                @foreach($artists as $artist)--}}
{{--                    <li class="cursor-pointer font-bold text-2xl p-2 text-gray-400" data-id="{{ $artist->id }}" onclick="selectArtist({{ $artist->id }})">--}}
{{--                        {{ $artist->name }}--}}
{{--                </li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}

{{--        <div class="w-full p-6 text-black text-xl">--}}
{{--            <div id="container-gallery">--}}
{{--                <div id="artist-gallery"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}
{{--<script>--}}
{{--    document.addEventListener("DOMContentLoaded", function() {--}}
{{--        console.log("✅ Página carregada!");--}}

{{--        let artistImages = {};--}}
{{--        fetch('/js/artist-images.json')--}}
{{--            .then(response => response.json())--}}
{{--            .then(data => {--}}
{{--                if(data) {--}}
{{--                    artistImages = data;--}}

{{--                    let firstArtist = document.querySelector("#artist-list li");--}}
{{--                    if (firstArtist) {--}}
{{--                        let firstArtistId = firstArtist.getAttribute("data-id");--}}
{{--                        firstArtist.classList.remove("text-gray-400");--}}
{{--                        firstArtist.classList.add("text-black");--}}
{{--                        selectArtist(firstArtistId);--}}
{{--                    }--}}

{{--                }--}}
{{--            })--}}
{{--            .catch(error => console.error('Erro ao carregar as imagens:', error));--}}

{{--        // Adicionar evento de change para o select mobile--}}
{{--        document.getElementById('artist-select-mobile').addEventListener('change', function(e) {--}}
{{--            selectArtist(e.target.value);--}}
{{--        });--}}

{{--        window.selectArtist = function(artistId) {--}}
{{--            console.log("🎨 Artista selecionado:", artistId);--}}

{{--            let images = artistImages[artistId]?.images || [];--}}


{{--            document.querySelectorAll("#artist-list li").forEach(li => {--}}
{{--                li.classList.remove("text-black");--}}
{{--                li.classList.add("text-gray-400");--}}
{{--            });--}}

{{--            let selectedArtist = document.querySelector(`[data-id='${artistId}']`);--}}
{{--            if (selectedArtist) {--}}
{{--                selectedArtist.classList.remove("text-gray-400");--}}
{{--                selectedArtist.classList.add("text-black");--}}
{{--            }--}}

{{--            jQuery("#artist-gallery").nanogallery2('destroy');--}}

{{--            jQuery("#artist-gallery").empty().nanogallery2({--}}
{{--                itemsBaseURL: '',--}}
{{--                items: images,--}}
{{--                galleryMosaic: [{--}}
{{--                        "w": 16,--}}
{{--                        "h": 18,--}}
{{--                        "c": 1,--}}
{{--                        "r": 1--}}
{{--                    },--}}
{{--                    {--}}
{{--                        "w": 8,--}}
{{--                        "h": 9,--}}
{{--                        "c": 21,--}}
{{--                        "r": 5--}}
{{--                    },--}}
{{--                    {--}}
{{--                        "w": 4,--}}
{{--                        "h": 6,--}}
{{--                        "c": 28,--}}
{{--                        "r": 2--}}
{{--                    },--}}
{{--                    {--}}
{{--                        "w": 4,--}}
{{--                        "h": 6,--}}
{{--                        "c": 19,--}}
{{--                        "r": 11--}}
{{--                    },--}}
{{--                    {--}}
{{--                        "w": 6,--}}
{{--                        "h": 8,--}}
{{--                        "c": 27,--}}
{{--                        "r": 10--}}
{{--                    }--}}
{{--                ],--}}
{{--                galleryMosaicXS: [{--}}
{{--                        "w": 6,--}}
{{--                        "h": 9,--}}
{{--                        "c": 1,--}}
{{--                        "r": 1--}}
{{--                    },--}}
{{--                    {--}}
{{--                        "w": 4,--}}
{{--                        "h": 4,--}}
{{--                        "c": 9,--}}
{{--                        "r": 3--}}
{{--                    },--}}
{{--                    {--}}
{{--                        "w": 2,--}}
{{--                        "h": 3,--}}
{{--                        "c": 12,--}}
{{--                        "r": 1--}}
{{--                    },--}}
{{--                    {--}}
{{--                        "w": 2,--}}
{{--                        "h": 3,--}}
{{--                        "c": 8,--}}
{{--                        "r": 5--}}
{{--                    },--}}
{{--                    {--}}
{{--                        "w": 3,--}}
{{--                        "h": 4,--}}
{{--                        "c": 12,--}}
{{--                        "r": 6--}}
{{--                    }--}}
{{--                ],--}}
{{--                galleryMaxRows: 1,--}}
{{--                galleryDisplayMode: 'rows',--}}
{{--                gallerySorting: 'random',--}}
{{--                thumbnailDisplayOrder: 'random',--}}
{{--                thumbnailAlignment: 'scaled',--}}
{{--                thumbnailHeight: 100,--}}
{{--                thumbnailWidth: 100,--}}
{{--                thumbnailGutterWidth: 0,--}}
{{--                thumbnailGutterHeight: 0,--}}
{{--                thumbnailBorderHorizontal: 0,--}}
{{--                thumbnailBorderVertical: 0,--}}
{{--                thumbnailLabel: {--}}
{{--                    display: false--}}
{{--                },--}}
{{--                galleryDisplayTransition: 'rotateX',--}}
{{--                galleryDisplayTransitionDuration: 1500,--}}
{{--                thumbnailDisplayTransition: 'scaleUp',--}}
{{--                thumbnailDisplayTransitionDuration: 600,--}}
{{--                thumbnailDisplayInterval: 30,--}}
{{--                viewerToolbar: {--}}
{{--                    display: true,--}}
{{--                    standard: 'label',--}}
{{--                    minimized: 'label'--}}
{{--                },--}}
{{--                viewerTools: {--}}
{{--                    topLeft: '',--}}
{{--                    topRight: 'rotateLeft, rotateRight, fullscreenButton, closeButton'--}}
{{--                },--}}
{{--                locationHash: false--}}
{{--            });--}}
{{--        };--}}
{{--    });--}}
{{--</script>--}}
