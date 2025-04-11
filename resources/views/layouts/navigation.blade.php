<div>
    <div class="container mx-auto pt-6 md:px-8 lg:flex lg:justify-between hidden py-4 items-center {{ request()->routeIs('home') || request()->routeIs('exhibition') ? 'absolute left-0 right-0 z-20' : ''}}">
        <a href="{{ route('home') }}" class="w-40">
            <img src="/images/logo-kobbi.png" alt="Logo Kobbi Gallery" class="w-full">
        </a>
    
        <nav class="flex items-center gap-6">
            <a href="#" class="text-white hover:border-b-2 transition-all text-sm">ARTISTAS</a>
            <a href="{{ route('exhibitions') }}" class="text-white hover:border-b-2 transition-all text-sm">EXPOSIÇÕES</a>
            <a href="#" class="text-white hover:border-b-2 transition-all text-sm">PARCERIAS</a>
            <a href="{{ route('gallery') }}" class="text-white hover:border-b-2 transition-all text-sm">GALERIA</a>
            <a href="#" class="text-white hover:border-b-2 transition-all text-sm">NOTÍCIAS</a>
            <a href="#" class="text-white hover:border-b-2 transition-all text-sm">CONTATO</a>
            <a href="#" class="text-white hover:border-b-2 transition-all text-sm">LOJA</a>
    
        </nav>
    </div>

    <div class="lg:hidden flex w-full justify-between px-8 py-4 items-center absolute left-0 right-0 z-20">
        <a href="{{ route('home') }}"class="w-40">
            <img src="/images/logo-kobbi.png" alt="Logo Kobbi Gallery" class="w-full">
        </a>
        <div x-data="{ open: false }" class="relative w-full flex justify-end">
            <button @click="open = true" class="px-4 py-2 text-white rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu">
                    <line x1="4" x2="20" y1="12" y2="12"/>
                    <line x1="4" x2="20" y1="6" y2="6"/>
                    <line x1="4" x2="20" y1="18" y2="18"/>
                </svg>
            </button>
        
            <div x-show="open" x-transition.opacity.duration.300ms class="fixed inset-0 bg-black bg-opacity-50 z-40" @click="open = false"></div>

            <div x-show="open"
                x-transition:enter="transition transform ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95 translate-y-[-20px]"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition transform ease-in duration-300"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-95 translate-y-[-20px]"
                class="fixed inset-0 bg-black z-50 flex flex-col items-center justify-center transition-transform gap-10">
                
                <ul class="w-full max-w-md text-center">
                    <li>
                        <a href="#" class="block px-6 py-4 text-white text-2xl hover:text-gray-300 transition-colors">ARTISTAS</a>
                    </li>
                    <li>
                        <a href="{{ route('exhibitions') }}" class="block px-6 py-4 text-white text-2xl hover:text-gray-300 transition-colors">EXPOSIÇÕES</a>
                    </li>
                    <li>
                        <a href="#" class="block px-6 py-4 text-white text-2xl hover:text-gray-300 transition-colors">PARCERIAS</a>
                    </li>
                    <li>
                        <a href="{{ route('gallery') }}" class="block px-6 py-4 text-white text-2xl hover:text-gray-300 transition-colors">GALERIA</a>
                    </li>
                    <li>
                        <a href="#" class="block px-6 py-4 text-white text-2xl hover:text-gray-300 transition-colors">NOTÍCIAS</a>
                    </li>
                    <li>
                        <a href="#" class="block px-6 py-4 text-white text-2xl hover:text-gray-300 transition-colors">CONTATO</a>
                    </li>
                    <li>
                        <a href="#" class="block px-6 py-4 text-white text-2xl hover:text-gray-300 transition-colors">LOJA</a>
                    </li>
                </ul>
        
                <div class="w-40">
                    <img src="images/logo-kobbi.png" alt="Logo Kobbi Gallery" class="w-full">
                </div>

                <button @click="open = false" class="absolute top-4 right-4 p-3 text-white rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
        </div>
    </div>
</div>
