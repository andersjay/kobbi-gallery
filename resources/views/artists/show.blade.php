@extends('layouts.app')

@section('content')
    <div class="container px-8 pt-14 w-full mx-auto pb-10 ">
        <div class="max-w-7xl mx-auto mt-12 md:mt-0">
            <div class="md:grid md:grid-cols-[400px_1fr] md:items-start w-full flex flex-col items-center gap-2">
                <h1 class="md:text-3xl text-2xl my-2 text-gray-950 font-light mb-2">{{ $artist->name }}</h1>
                <div class="">
                    @if ($artist->artworks->count() > 0)
                        @php
                            $destaque = $artist->artworks->first();
                            $outras = $artist->artworks->slice(1);
                            $allArtworks = $artist->artworks->values();
                        @endphp
                        <div class="flex flex-col items-center mb-12">

                            <div class="w-full max-w-xl mx-auto mb-8">
                                @if (is_array($destaque->images) && count($destaque->images) > 0)
                                    <img src="{{ asset('storage/' . $destaque->images[0]) }}"
                                         alt="{{ $destaque->name }}"
                                         class="w-full h-[500px] object-contain mx-auto cursor-pointer"
                                         onclick="openArtworkModal(0)">
                                @else
                                    <div
                                        class="w-full aspect-square flex items-center justify-center bg-gray-200 rounded-lg">
                                        <span class="text-gray-400 text-7xl">{{ substr($destaque->name, 0, 1) }}</span>
                                    </div>
                                @endif
                            </div>

                        </div>
                        <!-- Modal navegável -->
                        <div id="artwork-modal"
                             style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.85); z-index:9999; align-items:center; justify-content:center;">
                            <button onclick="closeArtworkModal()"
                                    style="position:absolute; top:32px; right:48px; font-size:3rem; color:white; background:none; border:none; cursor:pointer;">
                                &times;
                            </button>
                            <div class="flex items-center justify-center w-full h-full" id="modal-overlay-bg">
                                <div id="modal-content"
                                     class="relative flex flex-col md:flex-row bg-white shadow-2xl max-w-6xl w-full min-h-[600px] max-h-[85vh] mx-8 overflow-hidden">
                                    <button id="modal-prev"
                                            class="hidden md:flex items-center justify-center bg-[#D1D1D1] hover:brightness-95 transition rounded-full w-12 h-12 absolute left-4 top-1/2 -translate-y-1/2 cursor-pointer shadow z-10 border-none"
                                            style="background:none;">
                                        <svg width="32" height="32" viewBox="0 0 32 32">
                                            <polyline points="20,8 12,16 20,24"
                                                      style="fill:none;stroke:black;stroke-width:3;stroke-linecap:round;stroke-linejoin:round">
                                            </polyline>
                                        </svg>
                                    </button>
                                    <div id="modal-main-content"
                                         class="flex-1 flex items-center justify-center relative bg-gray-100">
                                        <img id="artwork-modal-img" src="" alt=""
                                             class="w-full h-full object-cover">
                                    </div>
                                    <div id="modal-info-content"
                                         class="flex-1 flex flex-col justify-center items-start p-8 w-full max-w-md bg-white">
                                        <div class="mb-6">
                                            <div id="artwork-modal-artist"
                                                 class="text-xl text-black mb-4"></div>
                                            <div id="artwork-modal-title" class="text-lg text-black mb-2"></div>
                                            <div id="artwork-modal-description" class="text-black text-base mb-2"></div>
                                            <div id="artwork-modal-desc" class="text-black text-base mb-2"></div>
                                        </div>
                                        <button id="modal-interest"
                                                class="bg-[#D1D1D1] text-black px-6 py-3 font-medium text-base hover:brightness-95 transition border-none"
                                                style="border:none;">Registrar interesse
                                        </button>
                                    </div>
                                    <button id="modal-next"
                                            class="hidden md:flex items-center justify-center bg-[#D1D1D1] hover:brightness-95 transition rounded-full w-12 h-12 absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer shadow z-10 border-none"
                                            style="background:none;">
                                        <svg width="32" height="32" viewBox="0 0 32 32">
                                            <polyline points="12,8 20,16 12,24"
                                                      style="fill:none;stroke:black;stroke-width:3;stroke-linecap:round;stroke-linejoin:round">
                                            </polyline>
                                        </svg>
                                    </button>
                                </div>
                                <!-- Formulário de interesse -->
                                <form id="interest-form" method="POST" action="{{ route('exhibition.interest') }}"
                                      style="display:none;"
                                      class="absolute bg-white shadow-2xl max-w-6xl w-full min-h-[600px] flex flex-row mx-8 overflow-hidden">
                                    @csrf
                                    <input type="hidden" name="artist_id" value="{{ $artist->id }}">
                                    <input type="hidden" name="obra_index" id="artist-obra-index" value="">
                                    <button type="button" onclick="closeArtworkModal()"
                                            style="position:absolute; top:32px; right:32px; font-size:3rem; color:black; background:none; border:none; cursor:pointer; z-index:10;">
                                        &times;
                                    </button>

                                    <!-- Image section - left side -->
                                    <div class="flex-1 flex items-center justify-center bg-gray-100">
                                        <img id="form-artwork-img" src="" alt=""
                                             class="w-full h-full object-cover">
                                    </div>

                                    <!-- Form section - right side -->
                                    <div class="flex-1 flex flex-col justify-center p-8">
                                        <span class="text-2xl mb-8 text-black">CONSULTA DE INTERESSE:</span>
                                        <div class="mb-8">
                                            <div class="text-black text-lg font-semibold" id="form-artwork-artist"></div>
                                            <div class="text-black mt-2 text-base" id="form-artwork-title"></div>
                                            <div class="text-black text-sm mt-2" id="form-artwork-desc"></div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="interest-name" class="block  mb-1 text-black">Nome
                                                *</label>
                                            <input type="text" id="interest-name" name="name" required
                                                   class="w-full border border-gray-400 px-3 py-2 text-black">
                                        </div>
                                        <div class="mb-4">
                                            <label for="interest-email" class="block  mb-1 text-black">E-mail
                                                *</label>
                                            <input type="email" id="interest-email" name="email" required
                                                   class="w-full border border-gray-400 px-3 py-2 text-black">
                                        </div>
                                        <div class="mb-6">
                                            <label for="interest-message" class="block  mb-1 text-black">Mensagem
                                                *</label>
                                            <textarea id="interest-message" name="message" required
                                                      class="w-full border border-gray-400 px-3 py-2 min-h-[120px] text-black"></textarea>
                                        </div>
                                        <button type="submit"
                                                class="w-full bg-[#D1D1D1] text-black py-3  text-lg hover:brightness-95 transition">
                                            Enviar interesse
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <script>
                            const artworks = @json($allArtworks);
                            let currentModalIdx = 0;
                            let lastArtwork = null;

                            function openArtworkModal(idx) {
                                currentModalIdx = idx;
                                renderArtworkModal();
                                document.getElementById('artwork-modal').style.display = 'flex';
                                document.getElementById('artist-obra-index').value = idx;
                            }

                            function closeArtworkModal() {
                                document.getElementById('artwork-modal').style.display = 'none';
                                document.getElementById('modal-content').style.display = 'flex';
                                document.getElementById('interest-form').style.display = 'none';
                            }

                            function renderArtworkModal() {
                                const artwork = artworks[currentModalIdx];
                                console.log(artwork)
                                document.getElementById('artwork-modal-img').src = artwork.images && artwork.images.length > 0 ? '/storage/' +
                                    artwork.images[0] : '';
                                document.getElementById('artwork-modal-img').alt = artwork.name || '';
                                document.getElementById('artwork-modal-artist').textContent = artwork.artist?.name || '{{ $artist->name }}';
                                document.getElementById('artwork-modal-title').textContent = artwork.name || '';
                                document.getElementById('artwork-modal-desc').innerHTML = artwork.description || '';
                                document.getElementById('artwork-modal-description').innerHTML = artwork.technical_details || '';
                                document.getElementById('modal-prev').style.visibility = currentModalIdx > 0 ? 'visible' : 'hidden';
                                document.getElementById('modal-next').style.visibility = currentModalIdx < artworks.length - 1 ? 'visible' :
                                    'hidden';
                            }

                            document.getElementById('modal-prev').onclick = function () {
                                if (currentModalIdx > 0) {
                                    currentModalIdx--;
                                    renderArtworkModal();
                                }
                            };
                            document.getElementById('modal-next').onclick = function () {
                                if (currentModalIdx < artworks.length - 1) {
                                    currentModalIdx++;
                                    renderArtworkModal();
                                }
                            };
                            document.getElementById('artwork-modal').onclick = function (e) {
                                if (e.target === this || e.target.id === 'modal-overlay-bg') closeArtworkModal();
                            };
                            document.addEventListener('keydown', function (e) {
                                if (document.getElementById('artwork-modal').style.display === 'flex') {
                                    if (e.key === 'Escape') closeArtworkModal();
                                    if (e.key === 'ArrowLeft' && currentModalIdx > 0) {
                                        currentModalIdx--;
                                        renderArtworkModal();
                                    }
                                    if (e.key === 'ArrowRight' && currentModalIdx < artworks.length - 1) {
                                        currentModalIdx++;
                                        renderArtworkModal();
                                    }
                                }
                            });
                            document.getElementById('modal-interest').onclick = function () {
                                document.getElementById('modal-content').style.display = 'none';
                                document.getElementById('interest-form').style.display = 'flex';
                                // Preencher dados da obra no formulário
                                const artwork = artworks[currentModalIdx];
                                document.getElementById('form-artwork-img').src = artwork.images && artwork.images.length > 0 ?
                                    '/storage/' + artwork.images[0] : '';
                                document.getElementById('form-artwork-img').alt = artwork.name || '';
                                document.getElementById('form-artwork-artist').textContent = artwork.artist?.name || '{{ $artist->name }}';
                                document.getElementById('form-artwork-title').textContent = artwork.name || '';
                                document.getElementById('form-artwork-desc').innerHTML = artwork.description || '';
                                lastArtwork = artwork;
                            };
                            document.getElementById('interest-form').onsubmit = function (e) {
                                // e.preventDefault(); // Remover para permitir submit normal
                                // Aqui você pode fazer um fetch/ajax para enviar para o backend
                                // Exemplo: enviar para /api/interesse ou similar
                                // alert('Interesse enviado!');
                                // closeArtworkModal();
                            };
                        </script>
                    @else
                        <div class="flex flex-col items-center justify-center py-20">
                            <p class="text-gray-400 text-xl">Nenhuma obra cadastrada ainda.</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="w-full flex items-center justify-center my-5">
                <span class="text-gray-600 text-base text-left w-full max-w-[200px]">OBRAS EM DESTAQUE</span>
                <div class="h-[1px] bg-[#D1D1D1] w-full"></div>
            </div>
            @if ($outras->count() > 0)
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                    @foreach ($artist->artworks as $i => $artwork)
                        @continue($i === 0)
                        <div class="flex flex-col items-center">
                            <div class="w-full mb-2 flex items-center justify-center p-2">
                                @if (is_array($artwork->images) && count($artwork->images) > 0)
                                    <img src="{{ asset('storage/' . $artwork->images[0]) }}"
                                         alt="{{ $artwork->name }}"
                                         class="max-w-full max-h-[200px] object-contain cursor-pointer"
                                         onclick="openArtworkModal({{ $i }})">
                                @else
                                    <div class="w-full h-32 flex items-center justify-center">
                                                    <span
                                                        class="text-gray-400 text-4xl">{{ substr($artwork->name, 0, 1) }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if ($artist->description)
                <div class="w-full">
                    <div class=" w-full flex items-center justify-center my-5">
                        <span class="text-gray-600 text-base text-left w-full max-w-[200px]">SOBRE</span>
                        <div class="h-[1px] bg-[#D1D1D1] w-full"></div>
                    </div>
                    <div class="text-lg text-black mb-10 text-justify  mx-auto">{!! $artist->description !!} </div>
                </div>
            @else
                <div class="mb-10"></div>
            @endif
            <!-- Botão Voltar -->
            <div class="mt-12">
                <a href="{{ route('artists.index') }}"
                   class="inline-flex items-center text-blue-400 hover:text-blue-300 transition-colors">
                    <svg class="w-4 h-4 mr-2 text-gray-950 hover:text-gray-300 transition-colors" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    <span
                        class="text-gray-950 hover:text-gray-300 transition-colors">Voltar para lista de artistas</span>
                </a>
            </div>
        </div>
    </div>
    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK',
                    customClass: {
                        popup: 'rounded-xl'
                    }
                });
            });
        </script>
    @endif

    <div class="pt-6">
        <livewire:newsletter-form />
    </div>
@endsection
