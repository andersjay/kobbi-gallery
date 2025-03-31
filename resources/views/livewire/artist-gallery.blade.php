<div class="container px-8 md:px-0 pt-14 mb-14  w-full mx-auto bg-black ">
    <h2 class="text-4xl text-white font-bold">ARTISTAS</h2>
    <div class="lg:grid lg:grid-cols-[400px_1fr] pt-12">
        <div class="w-full lg:p-4">
            <ul id="artist-list">
                {{-- @foreach ($artists as $artist) --}}
                    <li class="cursor-pointer font-bold text-2xl p-2 text-gray-400" data-id="1"
                        onclick="selectArtist(1)">
                        Eduardo Kobbi
                    </li>
                {{-- @endforeach --}}
            </ul>
        </div>

        <div class="w-full p-6 text-white text-xl">
            <div id="container-gallery">
                <div id="artist-gallery"></div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        console.log("✅ Página carregada!");

        // 🔥 Mock de imagens para cada artista
        const artistImages = {
            1: [{
                    src: "{{ asset('images/temp/1.jpg') }}",
                    srct: "{{ asset('images/temp/1.jpg') }}",
                    title: "Imagem 1"
                },
                {
                    src: "{{ asset('images/temp/2.jpg') }}",
                    srct: "{{ asset('images/temp/2.jpg') }}",
                    title: "Imagem 2"
                },
                {
                    src: "{{ asset('images/temp/3.jpg') }}",
                    srct: "{{ asset('images/temp/3.jpg') }}",
                    title: "Imagem 3"
                },
                {
                    src: "{{ asset('images/temp/4.jpg') }}",
                    srct: "{{ asset('images/temp/4.jpg') }}",
                    title: "Imagem 4"
                },
                {
                    src: "{{ asset('images/temp/5.jpg') }}",
                    srct: "{{ asset('images/temp/5.jpg') }}",
                    title: "Imagem 5"
                },
                {
                    src: "{{ asset('images/temp/6.jpg') }}",
                    srct: "{{ asset('images/temp/6.jpg') }}",
                    title: "Imagem 6"
                },
                {
                    src: "{{ asset('images/temp/7.jpg') }}",
                    srct: "{{ asset('images/temp/7.jpg') }}",
                    title: "Imagem 7"
                },
                {
                    src: "{{ asset('images/temp/8.jpg') }}",
                    srct: "{{ asset('images/temp/8.jpg') }}",
                    title: "Imagem 8"
                },
                {
                    src: "{{ asset('images/temp/9.jpg') }}",
                    srct: "{{ asset('images/temp/9.jpg') }}",
                    title: "Imagem 9"
                },
                {
                    src: "{{ asset('images/temp/10.jpg') }}",
                    srct: "{{ asset('images/temp/10.jpg') }}",
                    title: "Imagem 10"
                },
                {
                    src: "{{ asset('images/temp/11.jpg') }}",
                    srct: "{{ asset('images/temp/11.jpg') }}",
                    title: "Imagem 11"
                },
            ],
        };
        // 🎯 Função para mudar as imagens da galeria
        window.selectArtist = function(artistId) {
            console.log("🎨 Artista selecionado:", artistId);

            let images = artistImages[artistId] || [];

            // 🖼️ Atualizar classes de seleção
            document.querySelectorAll("#artist-list li").forEach(li => {
                li.classList.remove("text-white");
                li.classList.add("text-gray-400");
            });

            let selectedArtist = document.querySelector(`[data-id='${artistId}']`);
            if (selectedArtist) {
                selectedArtist.classList.remove("text-gray-400");
                selectedArtist.classList.add("text-white");
            }

            jQuery("#artist-gallery").nanogallery2('destroy');
            // 🚀 Atualizar galeria
            jQuery("#artist-gallery").empty().nanogallery2({
                itemsBaseURL: '',
                items: images,
                galleryMosaic: [{
                        "w": 16,
                        "h": 18,
                        "c": 1,
                        "r": 1
                    },
                    {
                        "w": 8,
                        "h": 9,
                        "c": 21,
                        "r": 5
                    },
                    {
                        "w": 4,
                        "h": 6,
                        "c": 28,
                        "r": 2
                    },
                    {
                        "w": 4,
                        "h": 6,
                        "c": 19,
                        "r": 11
                    },
                    {
                        "w": 6,
                        "h": 8,
                        "c": 27,
                        "r": 10
                    }
                ],
                galleryMosaicXS: [{
                        "w": 6,
                        "h": 9,
                        "c": 1,
                        "r": 1
                    },
                    {
                        "w": 4,
                        "h": 4,
                        "c": 9,
                        "r": 3
                    },
                    {
                        "w": 2,
                        "h": 3,
                        "c": 12,
                        "r": 1
                    },
                    {
                        "w": 2,
                        "h": 3,
                        "c": 8,
                        "r": 5
                    },
                    {
                        "w": 3,
                        "h": 4,
                        "c": 12,
                        "r": 6
                    }
                ],
                galleryMaxRows: 1,
                galleryDisplayMode: 'rows',
                gallerySorting: 'random',
                thumbnailDisplayOrder: 'random',
                thumbnailAlignment: 'scaled',
                thumbnailHeight: 100,
                thumbnailWidth: 100,
                thumbnailGutterWidth: 0,
                thumbnailGutterHeight: 0,
                thumbnailBorderHorizontal: 0,
                thumbnailBorderVertical: 0,
                thumbnailLabel: {
                    display: false
                },
                galleryDisplayTransition: 'rotateX',
                galleryDisplayTransitionDuration: 1500,
                thumbnailDisplayTransition: 'scaleUp',
                thumbnailDisplayTransitionDuration: 600,
                thumbnailDisplayInterval: 30,
                viewerToolbar: {
                    display: true,
                    standard: 'label',
                    minimized: 'label'
                },
                viewerTools: {
                    topLeft: '',
                    topRight: 'rotateLeft, rotateRight, fullscreenButton, closeButton'
                },
                locationHash: false
            });
        };

        // Selecionar automaticamente o primeiro artista ao carregar a página
        let firstArtist = document.querySelector("#artist-list li");
        if (firstArtist) {
            let firstArtistId = firstArtist.getAttribute("data-id");
            firstArtist.classList.remove("text-gray-400");
            firstArtist.classList.add("text-white");
            selectArtist(firstArtistId);
        }
    });
</script>
