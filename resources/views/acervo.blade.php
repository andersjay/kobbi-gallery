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
                        {{ $obra->title ?? '' }}@if($obra->year), {{ $obra->year }}@endif<br>
                        @if($obra->size_cm){{ $obra->size_cm }} cm @endif
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
    <button onclick="closeArtworkModal()" style="position:absolute; top:32px; right:48px; font-size:3rem; color:white; background:none; border:none; cursor:pointer;">&times;</button>
    <div class="flex items-center justify-center w-full h-full" id="modal-overlay-bg">
        <div id="modal-content" class="relative flex flex-col md:flex-row bg-white shadow-2xl max-w-6xl w-full min-h-[600px] max-h-[85vh] mx-8 overflow-hidden">
            <button id="modal-prev" class="hidden md:flex items-center justify-center bg-[#D1D1D1] hover:brightness-95 transition rounded-full w-12 h-12 absolute left-4 top-1/2 -translate-y-1/2 cursor-pointer shadow z-10 border-none" style="background:none;">
                <svg width="32" height="32" viewBox="0 0 32 32">
                    <polyline points="20,8 12,16 20,24" style="fill:none;stroke:black;stroke-width:3;stroke-linecap:round;stroke-linejoin:round"></polyline>
                </svg>
            </button>
            <div id="modal-main-content" class="flex-1 flex items-center justify-center relative bg-gray-100">
                <img id="artwork-modal-img" src="" alt="" class="w-full h-full object-cover">
            </div>
            <div id="modal-info-content" class="flex-1 flex flex-col justify-center items-start p-8 w-full max-w-md bg-white">
                <div class="mb-6">
                    <div id="artwork-modal-artist" class="text-xl text-black mb-4"></div>
                    <div id="artwork-modal-title" class="text-lg text-black mb-2"></div>
                    <div id="artwork-modal-desc" class="text-black text-base mb-6"></div>
                </div>
                <button id="modal-interest" class="bg-[#D1D1D1] text-black px-6 py-3 font-medium text-base hover:brightness-95 transition border-none" style="border:none;">Registrar interesse</button>
            </div>
            <button id="modal-next" class="hidden md:flex items-center justify-center bg-[#D1D1D1] hover:brightness-95 transition rounded-full w-12 h-12 absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer shadow z-10 border-none" style="background:none;">
                <svg width="32" height="32" viewBox="0 0 32 32">
                    <polyline points="12,8 20,16 12,24" style="fill:none;stroke:black;stroke-width:3;stroke-linecap:round;stroke-linejoin:round"></polyline>
                </svg>
            </button>
        </div>
        <!-- Formulário de interesse -->
        <form id="interest-form" method="POST" action="{{ route('acervo.interesse') }}" style="display:none;" class="absolute bg-white shadow-2xl max-w-6xl w-full min-h-[600px] flex flex-row mx-8 overflow-hidden">
            @csrf
            <input type="hidden" name="artwork_id" id="acervo-artwork-id" value="">
            <button type="button" onclick="closeArtworkModal()" style="position:absolute; top:32px; right:32px; font-size:3rem; color:black; background:none; border:none; cursor:pointer; z-index:10;">&times;</button>
            
            <!-- Image section - left side -->
            <div class="flex-1 flex items-center justify-center bg-gray-100">
                <img id="form-artwork-img" src="" alt="" class="w-full h-full object-cover">
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
                <label for="interest-name" class="block mb-1 text-black">Nome *</label>
                <input type="text" id="interest-name" name="name" required class="w-full border border-gray-400 px-3 py-2 text-black">
            </div>
            <div class="mb-4">
                <label for="interest-email" class="block mb-1 text-black">E-mail *</label>
                <input type="email" id="interest-email" name="email" required class="w-full border border-gray-400 px-3 py-2 text-black">
            </div>
            <div class="mb-6">
                <label for="interest-message" class="block mb-1 text-black">Mensagem *</label>
                <textarea id="interest-message" name="message" required class="w-full border border-gray-400 px-3 py-2 min-h-[120px] text-black"></textarea>
            </div>
                <button type="submit" class="w-full bg-[#D1D1D1] text-black py-3 text-lg hover:brightness-95 transition">Enviar interesse</button>
            </div>
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
        document.getElementById('artwork-modal-desc').textContent = (obra.year ? 'Ano: ' + obra.year + ' ' : '') + (obra.size_cm ? '| Tamanho: ' + obra.size_cm + ' cm' : '');
        
        // Update navigation buttons visibility
        document.getElementById('modal-prev').style.visibility = currentModalIdx > 0 ? 'visible' : 'hidden';
        document.getElementById('modal-next').style.visibility = currentModalIdx < acervo.length - 1 ? 'visible' : 'hidden';
    }
    // Navigation buttons
    document.getElementById('modal-prev').onclick = function() {
        if (currentModalIdx > 0) {
            currentModalIdx--;
            renderArtworkModal();
        }
    };
    
    document.getElementById('modal-next').onclick = function() {
        if (currentModalIdx < acervo.length - 1) {
            currentModalIdx++;
            renderArtworkModal();
        }
    };
    
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
        document.getElementById('form-artwork-desc').textContent = (obra.year ? 'Ano: ' + obra.year + ' ' : '') + (obra.size_cm ? '| Tamanho: ' + obra.size_cm + ' cm' : '');
        document.getElementById('acervo-artwork-id').value = obra.id;
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
            else if (e.key === 'ArrowLeft' && currentModalIdx > 0) {
                currentModalIdx--;
                renderArtworkModal();
            }
            else if (e.key === 'ArrowRight' && currentModalIdx < acervo.length - 1) {
                currentModalIdx++;
                renderArtworkModal();
            }
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
