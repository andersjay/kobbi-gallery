<div class="container px-8 md:px-0 pt-14 mb-14  w-full mx-auto bg-black ">
    <h2 class="text-4xl text-white font-bold">ARTISTAS</h2>
    <div class="lg:grid lg:grid-cols-[400px_1fr] pt-12">
        <div class="w-full lg:p-4">
            <ul id="artist-list">
                <li class="cursor-pointer font-bold text-2xl p-2 text-gray-400" data-id="1" onclick="selectArtist(1)">
                    Eduardo Kobbi
                </li>
                <li class="cursor-pointer font-bold text-2xl p-2 text-gray-400" data-id="2" onclick="selectArtist(2)">
                    Angelo Pastorello
                </li>
                <li class="cursor-pointer font-bold text-2xl p-2 text-gray-400" data-id="3" onclick="selectArtist(3)">
                    Antonio Saggese
                </li>
                <li class="cursor-pointer font-bold text-2xl p-2 text-gray-400" data-id="4" onclick="selectArtist(4)">
                    Christiana Carvalho
                </li>
                <li class="cursor-pointer font-bold text-2xl p-2 text-gray-400" data-id="5" onclick="selectArtist(5)">
                    Cristiano Xavier
                </li>
                <li class="cursor-pointer font-bold text-2xl p-2 text-gray-400" data-id="6" onclick="selectArtist(6)">
                    Eidi Feldon
                </li>
                <li class="cursor-pointer font-bold text-2xl p-2 text-gray-400" data-id="7" onclick="selectArtist(7)">
                    Érico Hiller
                </li>
                <li class="cursor-pointer font-bold text-2xl p-2 text-gray-400" data-id="8" onclick="selectArtist(8)">
                    Helo Mello
                </li>
                <li class="cursor-pointer font-bold text-2xl p-2 text-gray-400" data-id="9" onclick="selectArtist(9)">
                    Jean Manzon
                </li>
                <li class="cursor-pointer font-bold text-2xl p-2 text-gray-400" data-id="10" onclick="selectArtist(10)">
                    João Paulo Barbosa
                </li>
                <li class="cursor-pointer font-bold text-2xl p-2 text-gray-400" data-id="11" onclick="selectArtist(11)">
                    Juliana Naufel
                </li>
                <li class="cursor-pointer font-bold text-2xl p-2 text-gray-400" data-id="12" onclick="selectArtist(12)">
                    Luciano Candisani
                </li>
                <li class="cursor-pointer font-bold text-2xl p-2 text-gray-400" data-id="13" onclick="selectArtist(13)">
                    Luiz Aureliano
                </li>
                <li class="cursor-pointer font-bold text-2xl p-2 text-gray-400" data-id="14" onclick="selectArtist(14)">
                    Mayra Biajante
                </li>
                <li class="cursor-pointer font-bold text-2xl p-2 text-gray-400" data-id="15" onclick="selectArtist(15)">
                    Nelson Kojranski
                </li>
                <li class="cursor-pointer font-bold text-2xl p-2 text-gray-400" data-id="16" onclick="selectArtist(16)">
                    Sheila Oliveira
                </li>
                <li class="cursor-pointer font-bold text-2xl p-2 text-gray-400" data-id="17" onclick="selectArtist(17)">
                    Valdemir Cunha
                </li>
                <li class="cursor-pointer font-bold text-2xl p-2 text-gray-400" data-id="18" onclick="selectArtist(18)">
                    Willy Biondani
                </li>
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

        // 🔥 Carregar o JSON com as imagens dos artistas
        let artistImages = {};
        fetch('/js/artist-images.json')
            .then(response => response.json())
            .then(data => {
                artistImages = data;
                // Selecionar automaticamente o primeiro artista ao carregar a página
                let firstArtist = document.querySelector("#artist-list li");
                if (firstArtist) {
                    let firstArtistId = firstArtist.getAttribute("data-id");
                    firstArtist.classList.remove("text-gray-400");
                    firstArtist.classList.add("text-white");
                    selectArtist(firstArtistId);
                }
            })
            .catch(error => console.error('Erro ao carregar as imagens:', error));

        // 🎯 Função para mudar as imagens da galeria
        window.selectArtist = function(artistId) {
            console.log("🎨 Artista selecionado:", artistId);

            let images = artistImages[artistId]?.images || [];

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
    });
</script>
