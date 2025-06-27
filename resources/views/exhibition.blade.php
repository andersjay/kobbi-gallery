@extends('layouts.app')
@section('content')
    <div class="">
        <div class="swiper mySwiper w-full h-full mb-14">
            <div class="swiper-wrapper">
                <div class="swiper-slide text-center text-lg px-8 md:px-10 lg:px-6 xl:px-4 h-[510px] md:h-[810px] flex items-center justify-center"
                    style="background:
                        linear-gradient(to bottom, rgba(0, 0, 0, 0.6), transparent 50%),
                        url({{ asset('storage/' . $exhibition->banner) }});
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;">

                    <div class="max-w-[1440px] w-full mx-auto flex items-center justify-center">
                        <div class="flex flex-col space-y-1">

                            <span class="text-white text-3xl md:text-3xl lg:text-4xl">{{ $exhibition->title }}</span>
                            @if (!$exhibition->is_collective)
                                @if ($exhibition->artist)
                                    <span class="text-white text-xl md:text-xl text-center">
                                        <a href="{{ route('artists.show', $exhibition->artist->id) }}" class="hover:underline">
                                            {{ $exhibition->artist->name }}
                                        </a>
                                    </span>
                                @elseif ($exhibition->author_name)
                                    <span class="text-white text-xl md:text-xl text-center">{{ $exhibition->author_name }}</span>
                                @endif
                            @else
                                <h3 class="text-white text-xl md:text-2xl font-light text-center">
                                    EXPOSIÇÃO COLETIVA
                                </h3>
                            @endif
                            @if ($exhibition->year)
                                <p class="text-white text-lg md:text-xl text-center">{{ $exhibition->year }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next text-white"></div>
            <div class="swiper-button-prev text-white"></div>
        </div>
    </div>

    <div class="container-kobbi px-4 mx-auto mt-14">
        <div class="w-full gap-14">
            <div class="w-full">
                <h3 class="text-2xl md:text-3xl font-medium text-black {{$exhibition->is_collective ? 'text-center mb-4' : ''}}">
                    @if ($exhibition->is_collective && $exhibition->collective_artists)
                        {!! collect($exhibition->collective_artists)->map(function ($artist) {
                            $name = e($artist['name'] ?? '');
                            $link = $artist['link'] ?? null;
                            $wrappedName = '<span style="white-space: nowrap;">' . $name . '</span>';
                            return $link ? '<a href="' . e($link) . '" class="hover:underline font-medium">' . $wrappedName . '</a>' : $wrappedName;
                        })->implode(' - ') !!}
                    @else
                        @if ($exhibition->artist)
                            <a href="{{ route('artists.show', $exhibition->artist->id) }}" class="hover:underline font-medium">
                                {{ $exhibition->artist->name }}
                            </a>
                        @else
                            {{ $exhibition->author_name }}
                        @endif
                    @endif
                </h3>
                <!-- Conteúdo Principal -->
               <div class="flex flex-col md:grid md:grid-cols-2 gap-12 mt-10 relative">

                   <div class="prose prose-lg max-w-none prose-invert columns-1 w-full description text-justify md:pr-4">
                       {!! $exhibition->description !!}
                   </div>

                   <!-- Linha divisória -->
                   <div class="hidden md:block absolute left-1/2 top-0 bottom-0 w-px bg-gray-300 transform -translate-x-1/2"></div>

                   <div class="prose prose-lg max-w-none prose-invert columns-1 w-full description text-justify md:pl-4 mt-8 md:mt-0">
                       {!! $exhibition->description_en !!}
                   </div>
               </div>

                @if ($exhibition->pdf)
                    <div class="my-6 w-full flex items-center justify-end gap-2">
                        <a href="{{ asset('storage/' . $exhibition->pdf) }}" target="_blank" download
                            class="max-w-[150px] w-full inline-flex items-center gap-2 px-4 py-2 text-sm text-gray-700 transition">
                            <svg xmlns='http://www.w3.org/2000/svg' class='h-4 w-4' fill='none' viewBox='0 0 24 24'
                                stroke='currentColor'>
                                <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4v16m8-8H4' />
                            </svg>
                            BAIXAR PDF
                        </a>
                    </div>
                @endif
                <div class="my-6 w-full flex items-center gap-2">
                    <span class="text-gray-600 text-base text-left w-full max-w-[50px]">OBRAS</span>
                    <div class="h-[1px] bg-[#D1D1D1] w-full"></div>
                </div>
                @if ($exhibition->gallery)
                    <div class="mt-10">
                        <div class="flex items-center gap-6 overflow-x-hidden pb-4 h-[300px]">
                            @foreach ($exhibition->gallery as $idx => $item)
                                <div class="min-w-[320px] max-w-xs flex-shrink-0 cursor-pointer obra-card relative"
                                    data-idx="{{ $idx }}" style="width: 250px; height: 250px">
                                    <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] ?? '' }}"
                                        class="w-full h-full object-contain">
                                    <button class="bg-white bg-opacity-90 hover:bg-opacity-100 text-gray-800 px-3 py-1 m-0 text-sm font-medium rounded shadow transition">
                                        +INFO
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Modal de Obra -->
                    <div id="obra-modal"
                        style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.85); z-index:9999; align-items:center; justify-content:center;">
                        <button onclick="closeObraModal()"
                                style="position:absolute; top:32px; right:48px; font-size:3rem; color:white; background:none; border:none; cursor:pointer;">
                            &times;
                        </button>
                        <div class="flex items-center justify-center w-full h-full" id="obra-modal-overlay-bg">
                            <div id="obra-modal-content"
                                class="relative flex flex-col md:flex-row bg-white shadow-2xl max-w-6xl w-full min-h-[600px] max-h-[85vh] mx-8 overflow-hidden">
                                <button id="obra-modal-prev"
                                        class="hidden md:flex items-center justify-center bg-[#D1D1D1] hover:brightness-95 transition rounded-full w-12 h-12 absolute left-4 top-1/2 -translate-y-1/2 cursor-pointer shadow z-10 border-none"
                                        style="background:none;">
                                    <svg width="32" height="32" viewBox="0 0 32 32">
                                        <polyline points="20,8 12,16 20,24"
                                                  style="fill:none;stroke:black;stroke-width:3;stroke-linecap:round;stroke-linejoin:round">
                                        </polyline>
                                    </svg>
                                </button>
                                <div id="obra-modal-main-content"
                                     class="flex-1 flex items-center justify-center relative bg-gray-100">
                                    <img id="obra-modal-img" src="" alt=""
                                         class="w-full h-full object-cover">
                                </div>
                                <div id="obra-modal-info-content"
                                     class="flex-1 flex flex-col justify-center items-start p-8 w-full max-w-md bg-white">
                                    <div class="mb-6">
                                        <div id="obra-modal-artist" class="text-xl text-black mb-4"></div>
                                        <div id="obra-modal-title" class="text-lg text-black mb-2"></div>
                                        <div id="obra-modal-description" class="text-black text-base mb-6"></div>
                                    </div>
                                    <button id="obra-modal-interest"
                                        class="bg-[#D1D1D1] text-black px-6 py-3 font-medium text-base hover:brightness-95 transition border-none"
                                        style="border:none;">Registrar interesse</button>
                                </div>
                                <button id="obra-modal-next"
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
                            <form id="obra-interest-form" method="POST" action="{{ route('exhibition.interest') }}" style="display:none;"
                                class="absolute bg-white shadow-2xl max-w-6xl w-full min-h-[600px] flex flex-row mx-8 overflow-hidden">
                                @csrf
                                <input type="hidden" name="exhibition_id" value="{{ $exhibition->id }}">
                                <input type="hidden" name="obra_index" id="obra-index" value="">
                                <button type="button" onclick="closeObraModal()"
                                        style="position:absolute; top:32px; right:32px; font-size:3rem; color:black; background:none; border:none; cursor:pointer; z-index:10;">
                                    &times;
                                </button>

                                <!-- Image section - left side -->
                                <div class="flex-1 flex items-center justify-center bg-gray-100">
                                    <img id="obra-form-img" src="" alt=""
                                         class="w-full h-full object-cover">
                                </div>

                                <!-- Form section - right side -->
                                <div class="flex-1 flex flex-col justify-center p-8">
                                    <span class="text-2xl mb-8 text-black">CONSULTA DE INTERESSE:</span>
                                    <div class="mb-8">
                                        <div class="text-black text-lg font-semibold" id="obra-form-artist"></div>
                                        <div class="text-black mt-2 text-base" id="obra-form-title"></div>
                                        <div class="text-black text-sm mt-2" id="obra-form-description"></div>
                                    </div>
                                <div class="mb-4">
                                    <label for="obra-interest-name" class="block mb-1 text-black">Nome
                                        *</label>
                                    <input type="text" id="obra-interest-name" name="name" required
                                        class="w-full border border-gray-400  px-3 py-2 text-black">
                                </div>
                                <div class="mb-4">
                                    <label for="obra-interest-email" class="block mb-1 text-black">E-mail
                                        *</label>
                                    <input type="email" id="obra-interest-email" name="email" required
                                        class="w-full border border-gray-400  px-3 py-2 text-black">
                                </div>
                                <div class="mb-6">
                                    <label for="obra-interest-message"
                                        class="block mb-1 text-black">Mensagem *</label>
                                    <textarea id="obra-interest-message" name="message" required
                                        class="w-full border border-gray-400  px-3 py-2 min-h-[120px] text-black"></textarea>
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
                        const obras = @json($exhibition->gallery);
                        let obraModalIdx = 0;

                        function openObraModal(idx) {
                            obraModalIdx = idx;
                            renderObraModal();
                            document.getElementById('obra-modal').style.display = 'flex';
                            document.getElementById('obra-index').value = idx;
                        }

                        function closeObraModal() {
                            document.getElementById('obra-modal').style.display = 'none';
                            document.getElementById('obra-modal-content').style.display = 'flex';
                            document.getElementById('obra-interest-form').style.display = 'none';
                        }

                        function renderObraModal() {
                            const obra = obras[obraModalIdx];
                            document.getElementById('obra-modal-img').src = obra.image ? '/storage/' + obra.image : '';
                            document.getElementById('obra-modal-img').alt = obra.name || '';
                            document.getElementById('obra-modal-title').textContent = obra.name || '';
                            document.getElementById('obra-modal-artist').textContent = obra.artist || '';
                            document.getElementById('obra-modal-description').innerHTML = obra.description || '';

                            // Update navigation buttons visibility
                            document.getElementById('obra-modal-prev').style.visibility = obraModalIdx > 0 ? 'visible' : 'hidden';
                            document.getElementById('obra-modal-next').style.visibility = obraModalIdx < obras.length - 1 ? 'visible' : 'hidden';
                        }
                        document.querySelectorAll('.obra-card').forEach((el, idx) => {
                            el.onclick = function() {
                                openObraModal(idx);
                            };
                        });
                        // Navigation buttons
                        document.getElementById('obra-modal-prev').onclick = function() {
                            if (obraModalIdx > 0) {
                                obraModalIdx--;
                                renderObraModal();
                            }
                        };

                        document.getElementById('obra-modal-next').onclick = function() {
                            if (obraModalIdx < obras.length - 1) {
                                obraModalIdx++;
                                renderObraModal();
                            }
                        };

                        document.getElementById('obra-modal-interest').onclick = function() {
                            document.getElementById('obra-modal-content').style.display = 'none';
                            document.getElementById('obra-interest-form').style.display = 'flex';
                            // Preencher dados da obra no formulário
                            const obra = obras[obraModalIdx];
                            document.getElementById('obra-form-img').src = obra.image ? '/storage/' + obra.image : '';
                            document.getElementById('obra-form-img').alt = obra.name || '';
                            document.getElementById('obra-form-title').textContent = obra.name || '';
                            document.getElementById('obra-form-artist').textContent = obra.artist ? obra.artist : '';
                            document.getElementById('obra-form-description').innerHTML = obra.description || '';
                        };
                        document.getElementById('obra-interest-form').onsubmit = function(e) {
                            // Submissão normal do formulário
                        };
                        document.getElementById('obra-modal').onclick = function(e) {
                            if (e.target === this || e.target.id === 'obra-modal-overlay-bg') closeObraModal();
                        };
                        document.addEventListener('keydown', function(e) {
                            if (document.getElementById('obra-modal').style.display === 'flex') {
                                if (e.key === 'Escape') closeObraModal();
                                else if (e.key === 'ArrowLeft' && obraModalIdx > 0) {
                                    obraModalIdx--;
                                    renderObraModal();
                                }
                                else if (e.key === 'ArrowRight' && obraModalIdx < obras.length - 1) {
                                    obraModalIdx++;
                                    renderObraModal();
                                }
                            }
                        });
                    </script>
                @endif

                {{-- <!-- Seção do Autor -->
                @if ($exhibition->author_name || $exhibition->author_description)
                    <div class="bg-zinc-900 -2xl p-8 md:p-10">
                        <div class="flex flex-col items-start">
                            @if ($exhibition->author_name)
                                <h3 class="text-2xl md:text-3xl  text-black mb-6">{{ $exhibition->author_name }}</h3>
                            @endif
                            @if ($exhibition->author_description)
                                <div class="prose prose-lg max-w-none prose-invert prose-p:text-gray-300">
                                    {!! $exhibition->author_description !!}
                                </div>
                            @endif
                        </div>
                    </div>
                @endif --}}
            </div>

            {{-- <!-- Galeria Lateral -->
            @if ($exhibition->gallery)
                <div class="space-y-8">
                    <h3 class="text-2xl  text-gray-950">Obras</h3>
                    <div class="space-y-6">
                        @foreach ($exhibition->gallery as $item)
                            <div class="relative group border rounded-xl p-4 bg-white shadow">
                                <img src="{{ asset('storage/' . $item['image']) }}"
                                     alt="{{ $item['name'] ?? '' }}"
                                     class="w-full aspect-[4/3] object-cover rounded-xl transition-transform duration-300 group-hover:scale-[1.02] mb-4">
                                <div class="space-y-1">
                                    <p class="text-lg  text-gray-900">{{ $item['name'] ?? '' }}</p>
                                    <p class="text-sm text-gray-700">{{ $item['artist'] ?? '' }}</p>
                                    <p class="text-sm text-gray-700">{!! $item['description'] ?? '' !!}</p>
                                    </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif --}}
        </div>
        <div class="mt-10 pt-10">
            <livewire:newsletter-form />
        </div>

    </div>
    <style>
        .description * {
            color: #000 !important;
        }
    </style>
    @if(session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK',
                });
            });
        </script>
    @endif

@endsection

@push('styles')
<style>
    .prose-invert {
        --tw-prose-invert-body: theme('colors.gray.300');
        --tw-prose-invert-headings: theme('colors.white');
        --tw-prose-invert-links: theme('colors.white');
    }
</style>
@endpush
