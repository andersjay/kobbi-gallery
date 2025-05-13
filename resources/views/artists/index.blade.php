@extends('layouts.app')

@section('content')
    <div class="container px-8 pt-14 w-full mx-auto pb-10 ">
        <h2 class="text-4xl text-gray-950 font-bold md:mb-12 mt-12 md:mt-0">ARTISTAS</h2>
        <div class="lg:grid lg:grid-cols-[400px_1fr] pt-12">
            <div class="w-full lg:p-4">
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
                        <li class="cursor-pointer font-bold text-2xl p-2 text-gray-400" data-id="{{ $artist->id }}">
                            {{ $artist->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="w-full p-6 text-gray-950 text-xl">
                <div id="container-gallery">
                    <div id="artist-carousel" class="flex flex-col items-center justify-center min-h-[400px]"></div>
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
                            firstArtist.classList.remove("text-gray-400");
                            firstArtist.classList.add("text-gray-950");
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
                            li.classList.remove("text-gray-950");
                            li.classList.add("text-gray-400");
                        });
                        let selectedArtist = document.querySelector(`[data-id='${artistId}']`);
                        if (selectedArtist) {
                            selectedArtist.classList.remove("text-gray-400");
                            selectedArtist.classList.add("text-gray-950");
                        }
                        renderCarousel();
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
                    img.className = 'max-h-[500px] max-w-full rounded shadow-lg mx-auto cursor-zoom-in';
                    link.appendChild(img);
                    wrapper.appendChild(link);
                });
                const title = document.createElement('div');
                title.className = 'mt-4 text-center text-lg font-semibold';
                title.textContent = currentImages[currentIndex].title;
                const nav = document.createElement('div');
                nav.className = 'flex items-center justify-center gap-8 mt-6';
                const prevBtn = document.createElement('button');
                prevBtn.innerHTML = '⟨';
                prevBtn.className = 'text-3xl px-4 py-2 rounded hover:bg-gray-200 disabled:opacity-30';
                prevBtn.disabled = currentIndex === 0;
                prevBtn.onclick = function() {
                    if (currentIndex > 0) {
                        currentIndex--;
                        renderCarousel();
                    }
                };
                const nextBtn = document.createElement('button');
                nextBtn.innerHTML = '⟩';
                nextBtn.className = 'text-3xl px-4 py-2 rounded hover:bg-gray-200 disabled:opacity-30';
                nextBtn.disabled = currentIndex === currentImages.length - 1;
                nextBtn.onclick = function() {
                    if (currentIndex < currentImages.length - 1) {
                        currentIndex++;
                        renderCarousel();
                    }
                };
                nav.appendChild(prevBtn);
                nav.appendChild(nextBtn);
                carousel.appendChild(wrapper);
                carousel.appendChild(title);
                carousel.appendChild(nav);
                baguetteBox.run('.gallery-lightbox-wrapper', {
                    captions: true,
                    buttons: 'auto',
                });
            }
        });
    </script>
@endsection
