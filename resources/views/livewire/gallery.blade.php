<script>
    let galleryImages = @json($images)
</script>
<div class="container px-8 md:px-8 pt-14 w-full mx-auto pb-10 border-t border-gray-800">
    <h2 class="text-4xl text-white font-bold">GALERIA</h2>
    <div class="mt-20">
        <div id="gallery"></div>
    </div>
    <div class="w-full flex flex-col gap-9 mt-40">
        <div class="max-w-[368px] mx-auto">
            <img src="{{ asset('images/logo-kobbi-2x.png') }}" alt="Logo Kobbi Gallery">
        </div>
        <span class="text-center text-lg text-white">
            Fundada na Vila Madalena, a Kobbi Gallery é um espaço dedicado à fotografia artística, conectando
            artistas contemporâneos ao mercado nacional e internacional. Com curadoria inovadora e um ambiente
            imersivo, celebramos a história da fotografia enquanto exploramos suas novas possibilidades.
        </span>
        <div class="w-full flex justify-center">
            <a href="{{ route('gallery') }}"
                class="bg-black py-3 px-6 text-white border-white rounded-md border hover:bg-white hover:text-black transition-colors">
                Conheça nossa história
            </a>
        </div>
    </div>
</div>
