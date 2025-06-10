@extends('layouts.app')

@section('content')
<div class="container-kobbi pt-14 mx-auto pb-10">
    <h2 class="header-title-spacing text-3xl text-gray-950 font-light border-b pb-2">OBRAS</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-8 justify-start">
        @foreach($acervo as $obra)
            <div class="flex flex-col items-center w-auto cursor-pointer" onclick="openArtworkModal({{ $obra->id }})">
                <div class="flex items-center justify-center" style="width:250px; height:250px;">
                    @if($obra->image)
                        <img src="{{ asset('storage/' . $obra->image) }}" alt="{{ $obra->title }}" class="object-contain w-full h-full" />
                    @else
                        <div class="bg-[#7cc0e6] w-full h-full flex items-center justify-center text-white text-2xl font-bold">OBRA</div>
                    @endif
                </div>
                <div class="mt-4 text-center">
                    <div class="text-black text-base tracking-widest uppercase">{{ $obra->artist ?? 'FOTÓGRAFO' }}</div>
                    <div class="text-black text-sm mt-1">
                        {{ $obra->title ?? '' }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-10 pt-10">
        <livewire:newsletter-form />
    </div>
</div>

<div id="artwork-modal" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.85); z-index:9999; align-items:center; justify-content:center;">
    {{-- <button onclick="closeArtworkModal()" style="position:absolute; top:32px; right:48px; font-size:3rem; color:white; background:none; border:none; cursor:pointer;" class="hidden md:flex">&times;</button> --}}
    <div class="flex items-center justify-center w-full h-full" id="modal-overlay-bg">
        <div id="modal-content" class="relative flex flex-col md:flex-row items-center justify-center bg-white shadow-2xl p-8 max-w-5xl w-full min-h-[500px] max-h-[80vh] mx-4">
            <div class="flex-1 flex items-center justify-center relative transition-all duration-300">
                <img id="artwork-modal-img" src="" alt="" class="max-w-[32vw] max-h-[60vh] ml-8 shadow-lg bg-gray-200">
            </div>
            <div class="flex-1 flex flex-col justify-center items-start md:pl-16 mt-8 md:mt-0 w-full max-w-md transition-all duration-300">
                <div class="mb-6">
                    <div id="artwork-modal-artist" class="text-2xl font-bold text-black mb-4"></div>
                    <div id="artwork-modal-title" class="text-lg text-black mb-2"></div>
                    <div id="artwork-modal-desc" class="text-black text-base mb-6"></div>
                </div>
                <button id="modal-interest" class="bg-[#D1D1D1] text-black px-6 py-3 font-medium text-base hover:brightness-95 transition border-none" style="border:none;">Registrar interesse</button>
            </div>
        </div>
        <!-- Formulário de interesse -->
        <form id="interest-form" method="POST" action="{{ route('exhibition.interest') }}" style="display:none;" class="absolute bg-white shadow-2xl p-8 max-w-2xl w-full min-h-[500px flex flex-col justify-center">
            @csrf
            <input type="hidden" name="collection_id" value="1"><!-- Será ajustado via JS -->
            <input type="hidden" name="obra_index" id="acervo-obra-index" value="">
            <button type="button" onclick="closeArtworkModal()" style="position:absolute; top:32px; right:48px; font-size:3rem; color:black; background:none; border:none; cursor:pointer;">&times;</button>
            <h2 class="text-2xl font-bold mb-8 text-black">FORMULÁRIO DE INTERESSE:</h2>
            <div class="flex items-start mb-8">
                <img id="form-artwork-img" src="" alt="" class="w-24 h-24 object-cover mr-6 border border-gray-300">
                <div>
                    <div class="font-bold text-black" id="form-artwork-artist"></div>
                    <div class="text-black" id="form-artwork-title"></div>
                    <div class="text-black" id="form-artwork-desc"></div>
                    <div class="text-gray-700 mt-4" id="form-artwork-additional-text"></div>
                </div>
            </div>
            <div class="mb-4">
                <label for="interest-name" class="block font-semibold mb-1 text-black">Nome *</label>
                <input type="text" id="interest-name" name="name" required class="w-full border border-gray-400 px-3 py-2 text-black">
            </div>
            <div class="mb-4">
                <label for="interest-email" class="block font-semibold mb-1 text-black">E-mail *</label>
                <input type="email" id="interest-email" name="email" required class="w-full border border-gray-400 px-3 py-2 text-black">
            </div>
            <div class="mb-6">
                <label for="interest-message" class="block font-semibold mb-1 text-black">Mensagem *</label>
                <textarea id="interest-message" name="message" required class="w-full border border-gray-400 px-3 py-2 min-h-[120px] text-black"></textarea>
            </div>
            <button type="submit" class="w-full bg-[#D1D1D1] text-black py-3 font-semibold text-lg hover:brightness-95 transition">Enviar interesse</button>
        </form>
    </div>
</div>

<script>
    const acervo = @json($acervo);
    let currentModalIdx = 0;
    let lastObra = null;
    function openArtworkModal(idx) {
        currentModalIdx = idx;
        renderArtworkModal();
        document.getElementById('artwork-modal').style.display = 'flex';
        document.getElementById('acervo-obra-index').value = idx;
        document.querySelector('input[name=collection_id]').value = 1; // Ajuste se tiver mais de uma coleção
    }
    function closeArtworkModal() {
        document.getElementById('artwork-modal').style.display = 'none';
        document.getElementById('modal-content').style.display = 'flex';
        document.getElementById('interest-form').style.display = 'none';
    }
    function renderArtworkModal() {
        const obra = acervo[currentModalIdx] || acervo.find(a => a.id === currentModalIdx) || acervo[0];
        document.getElementById('artwork-modal-img').src = obra.image ? '/storage/' + obra.image : '';
        document.getElementById('artwork-modal-img').alt = obra.title || '';
        document.getElementById('artwork-modal-artist').textContent = obra.artist || '';
        document.getElementById('artwork-modal-title').textContent = obra.title || '';
        document.getElementById('artwork-modal-desc').textContent = obra.description || '';
        const additionalTextElement = document.getElementById('form-artwork-additional-text');
        if (obra.additional_text) {
            additionalTextElement.innerHTML = obra.additional_text;
            additionalTextElement.style.display = 'block';
        } else {
            additionalTextElement.innerHTML = '';
            additionalTextElement.style.display = 'none';
        }
    }
    document.querySelectorAll('.flex.flex-col.items-center.w-auto.cursor-pointer').forEach((el, idx) => {
        el.onclick = function() { openArtworkModal(idx); };
    });
    document.getElementById('modal-interest').onclick = function() {
        document.getElementById('modal-content').style.display = 'none';
        document.getElementById('interest-form').style.display = 'flex';
        // Preencher dados da obra no formulário
        const obra = acervo[currentModalIdx] || acervo.find(a => a.id === currentModalIdx) || acervo[0];
        document.getElementById('form-artwork-img').src = obra.image ? '/storage/' + obra.image : '';
        document.getElementById('form-artwork-img').alt = obra.title || '';
        document.getElementById('form-artwork-artist').textContent = obra.artist || '';
        document.getElementById('form-artwork-title').textContent = obra.title || '';
        document.getElementById('form-artwork-desc').textContent = obra.description || '';
        lastObra = obra;
    };
    document.getElementById('interest-form').onsubmit = function(e) {
        // Submissão normal do formulário
    };
    document.getElementById('artwork-modal').onclick = function(e) {
        if(e.target === this || e.target.id === 'modal-overlay-bg') closeArtworkModal();
    };
    document.addEventListener('keydown', function(e) {
        if(document.getElementById('artwork-modal').style.display === 'flex') {
            if(e.key === 'Escape') closeArtworkModal();
        }
    });
</script>
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