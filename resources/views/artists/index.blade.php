@extends('layouts.app')

@section('content')
    <div class="container-kobbi  pt-14 mx-auto pb-10">
        <h2 class="header-title-spacing text-3xl text-gray-950 font-light">ARTISTAS</h2>
        <div class="lg:grid lg:grid-cols-[400px_1fr] pt-12">
            <div class="w-full lg:p-4 lg:sticky lg:top-4 lg:self-start">
                <div class="lg:hidden w-full px-4">
                    <select id="artist-select-mobile"
                        class="w-full h-12 text-sm bg-transparent text-black border-2 border-gray-700 rounded-lg px-4 focus:outline-none focus:border-gray-950 focus:ring-2 focus:ring-gray-950">
                        @foreach ($artists as $artist)
                            <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                        @endforeach
                    </select>
                </div>
                <ul id="artist-list" class="hidden lg:block">
                    @foreach ($artists as $artist)
                        <li class="cursor-pointer text-xl p-2 font-normal uppercase tracking-wide {{ $artist->is_represented ? 'underline underline-offset-4' : 'text-gray-400' }}"
                            data-id="{{ $artist->id }}"
                            data-represented="{{ $artist->is_represented ? '1' : '0' }}">
                            {{ $artist->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="w-full text-gray-950 text-xl lg:sticky lg:top-4 lg:self-start">
                <div id="container-gallery">
                    <div id="artist-carousel" class="flex flex-col items-center justify-center min-h-[500px] py-8"></div>
                    <div id="artwork-info" class="mt-4 text-center hidden">
                        <h3 id="artwork-title" class="text-lg font-semibold text-gray-500">qu</h3>
                        <p id="artwork-description" class="text-sm text-gray-600 mt-2"></p>
                    </div>
                </div>
            </div>

            <div class="flex md:hidden">
                <button id="mobile-artist-link"
                    class="mt-4 w-full h-12 bg-gray-950 text-white rounded-lg font-semibold text-lg"
                    style="display:block;">Ver artista</button>
            </div>
        </div>
        <div class="flex flex-col items-center justify-center">
    </div>
    <div class="mt-10 pt-10">
        <livewire:newsletter-form />
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let artistImages = {};
            let currentIndex = 0;
            let currentImages = [];
            fetch('/js/artist-images.json')
                .then(response => response.json())
                .then(data => {
                    if (data) {
                        artistImages = data;
                        let firstArtist = document.querySelector("#artist-list li");
                        if (firstArtist) {
                            let firstArtistId = firstArtist.getAttribute("data-id");
                            firstArtist.classList.remove("text-gray-400", "text-gray-600", "font-semibold");
                            firstArtist.classList.add("text-gray-950", "font-bold");
                            selectArtist(firstArtistId);
                        }
                    }
                })
                .catch(error => console.error('Erro ao carregar as imagens:', error));
            document.getElementById('artist-select-mobile').addEventListener('change', function(e) {
                selectArtist(e.target.value);
            });
            document.querySelectorAll('#artist-list li').forEach(function(li) {
                li.addEventListener('mouseover', function() {
                    selectArtist(this.getAttribute('data-id'));
                });
                li.addEventListener('click', function() {
                    window.location.href = '/artistas/' + this.getAttribute('data-id');
                });
            });
            document.getElementById('mobile-artist-link').addEventListener('click', function() {
                var select = document.getElementById('artist-select-mobile');
                var artistId = select.value;
                window.location.href = '/artistas/' + artistId;
            });
            window.selectArtist = function(artistId) {
                // Buscar imagens do resource do artista
                fetch(`/artistas/${artistId}/imagens`)
                    .then(response => response.json())
                    .then(data => {
                        currentImages = data.images || [];
                        currentIndex = 0;
                        document.querySelectorAll("#artist-list li").forEach(li => {
                            li.classList.remove("text-gray-950", "font-bold");
                            const isRepresented = li.getAttribute('data-represented') === '1';
                            if (isRepresented) {
                                li.classList.add("text-gray-400", "font-normal");
                            } else {
                                li.classList.add("text-gray-400");
                                li.classList.remove("font-semibold");
                            }
                        });
                        let selectedArtist = document.querySelector(`[data-id='${artistId}']`);
                        if (selectedArtist) {
                            selectedArtist.classList.remove("text-gray-400", "text-gray-600");
                            selectedArtist.classList.add("text-gray-950");
                        }
                        renderCarousel();
                        const artworkTitle = document.getElementById('artwork-title');
                        if (selectedArtist && selectedArtist.getAttribute('data-represented') === '1') {
                            artworkTitle.textContent = 'representação exclusiva Kobbi Gallery';
                        } else {
                            artworkTitle.textContent = '';
                        }
                    });
            };

            function renderCarousel() {
                const carousel = document.getElementById('artist-carousel');
                carousel.innerHTML = '';
                if (currentImages.length === 0) {
                    carousel.innerHTML =
                        '<div class="text-gray-400 text-center">Nenhuma obra cadastrada para este artista.</div>';
                    return;
                }
                const wrapper = document.createElement('div');
                wrapper.className = 'gallery-lightbox-wrapper flex items-center justify-center';
                // Renderiza todos os links, mas só mostra a imagem atual
                currentImages.forEach((imgData, idx) => {
                    const link = document.createElement('a');
                    link.href = imgData.src;
                    link.className = 'gallery-lightbox';
                    link.setAttribute('data-caption', imgData.title);
                    link.style.display = idx === currentIndex ? 'block' : 'none';
                    const img = document.createElement('img');
                    img.src = imgData.src;
                    img.alt = imgData.title;
                    img.className = 'max-h-[300px] max-w-full shadow-lg mx-auto cursor-zoom-in';
                    link.appendChild(img);
                    wrapper.appendChild(link);
                });
                // Update artwork info
                const artworkInfo = document.getElementById('artwork-info');
                const artworkTitle = document.getElementById('artwork-title');
                const artworkDescription = document.getElementById('artwork-description');

                if (currentImages[currentIndex]) {
                    // artworkTitle.textContent = currentImages[currentIndex].title || 'Sem título';
                    artworkDescription.textContent = currentImages[currentIndex].description || '';
                    artworkInfo.classList.remove('hidden');
                } else {
                    artworkInfo.classList.add('hidden');
                }
                carousel.appendChild(wrapper);
                baguetteBox.run('.gallery-lightbox-wrapper', {
                    captions: true,
                    buttons: 'auto',
                });
            }
        });
    </script>
@endsection
