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
                            <h2 class="text-white text-3xl md:text-5xl lg:text-6xl font-medium">{{ $exhibition->title }}</h2>
                            @if ($exhibition->author_name && !$exhibition->is_collective)
                                <h3 class="text-white text-xl md:text-2xl font-light text-center">{{ $exhibition->author_name }}</h3>
                            @else
                                <h3 class="text-white text-xl md:text-2xl font-light text-center">
                                    EXPOSIÇÃO COLETIVA
                                </h3>
                            @endif
                            @if ($exhibition->year)
                                <p class="text-white text-lg md:text-2xl text-center font-light">{{ $exhibition->year }}</p>
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
                    @if ($exhibition->is_collective && $exhibition->photographers && $exhibition->photographers->count())
                        {!! $exhibition->photographers->map(function($photographer) {
                            return '<a href="' . route('artists.show', $photographer->id) . '" class="hover:underline font-medium">' . e($photographer->name) . '</a>';
                        })->implode(' - ') !!}
                    @else
                        {{ $exhibition->author_name }}
                    @endif
                </h3>
                <!-- Conteúdo Principal -->
                <div class="prose prose-lg max-w-none prose-invert columns-1 md:columns-2 w-full gap-x-10 description text-justify">
                    {!! $exhibition->description !!}
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
                        <div class="flex gap-6 overflow-x-auto pb-4">
                            @foreach ($exhibition->gallery as $idx => $item)
                                <div class="min-w-[320px] max-w-xs flex-shrink-0 p-4 cursor-pointer obra-card"
                                    data-idx="{{ $idx }}">
                                    <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] ?? '' }}"
                                        class="w-full mb-4">
                                    <div class="space-y-1">
                                        <p class="text-lg  text-gray-900 capitalize">{{ $item['name'] ?? '' }}</p>
                                        <p class="text-lg text-gray-700 capitalize">{{ $item['year'] ?? '' }}</p>
                                        <p class="text-lg text-gray-700 capitalize">{{ $item['technique'] ?? '' }}</p>
                                        <p class="text-lg text-gray-700 capitalize">{{ $item['size_cm'] ?? '' }} cm</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Modal de Obra -->
                    <div id="obra-modal"
                        style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.85); z-index:9999; align-items:center; justify-content:center;">
{{--                        <button onclick="closeObraModal()"--}}
{{--                            style="position:absolute; top:32px; right:48px; font-size:3rem; color:white; background:none; border:none; cursor:pointer;">&times;</button>--}}
                        <div class="flex items-center justify-center w-full h-full" id="obra-modal-overlay-bg">
                            <div id="obra-modal-content"
                                class="relative flex flex-col md:flex-row items-center justify-center bg-white shadow-2xl p-8 max-w-5xl w-full min-h-[500px] max-h-[80vh]">
                                <div class="flex-1 flex items-center justify-center relative transition-all duration-300">
                                    <img id="obra-modal-img" src="" alt=""
                                        class="max-w-[32vw] max-h-[60vh] ml-8 shadow-lg bg-gray-200">
                                </div>
                                <div
                                    class="flex-1 flex flex-col justify-center items-start md:pl-16 mt-8 md:mt-0 w-full max-w-md transition-all duration-300">
                                    <div class="mb-6">
                                        <div id="obra-modal-title" class="text-2xl  text-black mb-4"></div>
                                        <div class="text-lg text-black mb-2"><span class="">Ano:</span> <span
                                                id="obra-modal-year"></span></div>
                                        <div class="text-lg text-black mb-2"><span class="">Técnica:</span>
                                            <span id="obra-modal-technique"></span></div>
                                        <div class="text-lg text-black mb-2"><span class="">Tamanho:</span>
                                            <span id="obra-modal-size"></span></div>
                                        <div id="obra-modal-description" class="text-black text-base mb-6"></div>
                                    </div>
                                    <button id="obra-modal-interest"
                                        class="bg-[#D1D1D1] text-black px-6 py-3 font-medium text-base hover:brightness-95 transition border-none"
                                        style="border:none;">Registrar interesse</button>
                                </div>
                            </div>
                            <!-- Formulário de interesse -->
                            <form id="obra-interest-form" method="POST" action="{{ route('exhibition.interest') }}" style="display:none;"
                                class="absolute bg-white shadow-2xl p-8 max-w-2xl w-full min-h-[500px] flex flex-col justify-center">
                                @csrf
                                <input type="hidden" name="exhibition_id" value="{{ $exhibition->id }}">
                                <input type="hidden" name="obra_index" id="obra-index" value="">
                                <button type="button" onclick="closeObraModal()"
                                    style="position:absolute; top:32px; right:48px; font-size:3rem; color:black; background:none; border:none; cursor:pointer;">&times;</button>
                                <span class="text-2xl mb-8 text-black">FORMULÁRIO DE INTERESSE:</span>
                                <div class="flex items-start mb-8">
                                    <img id="obra-form-img" src="" alt=""
                                        class="w-24 h-24 object-cover mr-6 border border-gray-300">
                                    <div>
                                        <div class=" text-black" id="obra-form-title"></div>
                                        <div class="text-black" id="obra-form-year"></div>
                                        <div class="text-black" id="obra-form-technique"></div>
                                        <div class="text-black" id="obra-form-size"></div>
                                        <div class="text-black" id="obra-form-description"></div>
                                    </div>
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
                                    class="w-full bg-[#D1D1D1] text-black py-3  text-lg hover:brightness-95 transition">Enviar
                                    interesse</button>
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
                            document.getElementById('obra-modal-year').textContent = obra.year || '';
                            document.getElementById('obra-modal-technique').textContent = obra.technique || '';
                            document.getElementById('obra-modal-size').textContent = obra.size_cm ? obra.size_cm + ' cm' : '';
                            document.getElementById('obra-modal-description').textContent = obra.description || '';
                        }
                        document.querySelectorAll('.obra-card').forEach((el, idx) => {
                            el.onclick = function() {
                                openObraModal(idx);
                            };
                        });
                        document.getElementById('obra-modal-interest').onclick = function() {
                            document.getElementById('obra-modal-content').style.display = 'none';
                            document.getElementById('obra-interest-form').style.display = 'flex';
                            // Preencher dados da obra no formulário
                            const obra = obras[obraModalIdx];
                            document.getElementById('obra-form-img').src = obra.image ? '/storage/' + obra.image : '';
                            document.getElementById('obra-form-img').alt = obra.name || '';
                            document.getElementById('obra-form-title').textContent = obra.name || '';
                            document.getElementById('obra-form-year').textContent = obra.year ? 'Ano: ' + obra.year : '';
                            document.getElementById('obra-form-technique').textContent = obra.technique ? 'Técnica: ' + obra.technique :
                                '';
                            document.getElementById('obra-form-size').textContent = obra.size_cm ? 'Tamanho: ' + obra.size_cm + ' cm' :
                                '';
                            document.getElementById('obra-form-description').textContent = obra.description || '';
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
                                    <p class="text-sm text-gray-700">Ano: {{ $item['year'] ?? '' }}</p>
                                    <p class="text-sm text-gray-700">Técnica: {{ $item['technique'] ?? '' }}</p>
                                    <p class="text-sm text-gray-700">Tamanho: {{ $item['size_cm'] ?? '' }} cm</p>
                                    <p class="text-sm text-gray-700">{{ $item['description'] ?? '' }}</p>
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
