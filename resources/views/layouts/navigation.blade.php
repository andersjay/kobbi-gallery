<div>
    <div
        class="container mx-auto pt-6 md:px-8 lg:flex lg:justify-between hidden py-4 items-center {{ request()->routeIs('home') || request()->routeIs('exhibition') ? 'absolute left-0 right-0 z-20' : '' }}">
        @if (request()->routeIs('home') || request()->routeIs('exhibition'))
            <a href="{{ route('home') }}" class="w-40">
                <img src="{{ asset('images/logo-white.png') }}" alt="Logo Kobbi Gallery" class="w-full">
            </a>
        @else
            <a href="{{ route('home') }}" class="w-40">
                <img src="{{ asset('images/logo-kobbi.png') }}" alt="Logo Kobbi Gallery" class="w-full">
            </a>
        @endif

        <nav class="flex items-center gap-6">
            <a href="{{ route('gallery') }}"
                class="{{ request()->routeIs('gallery') ? (request()->routeIs('home') || request()->routeIs('exhibition') ? 'text-gray-100 border-b border-gray-100' : 'text-gray-950 border-b border-gray-950') : (request()->routeIs('home') || request()->routeIs('exhibition') ? 'text-gray-100 hover:border-b' : 'text-gray-950 hover:border-b border-gray-950') }} transition-all text-lg font-light">GALERIA</a>

            <a href="{{ route('artists.index') }}"
                class="{{ request()->routeIs('artists.index') ? (request()->routeIs('home') || request()->routeIs('exhibition') ? 'text-gray-100 border-b border-gray-100' : 'text-gray-950 border-b border-gray-950') : (request()->routeIs('home') || request()->routeIs('exhibition') ? 'text-gray-100 hover:border-b border-gray-100' : 'text-gray-950 hover:border-b border-gray-950') }} transition-all text-lg font-light">ARTISTAS</a>

            <a href="{{ route('exhibitions') }}"
                class="{{ request()->routeIs('exhibitions') ? (request()->routeIs('home') || request()->routeIs('exhibition') ? 'text-gray-100 border-b border-gray-100' : 'text-gray-950 border-b border-gray-950') : (request()->routeIs('home') || request()->routeIs('exhibition') ? 'text-gray-100 hover:border-b' : 'text-gray-950 hover:border-b border-gray-950') }} transition-all text-lg font-light">EXPOSIÇÕES</a>

            <a href="{{ route('agenda.index') }}"
                class="{{ request()->routeIs('agenda.index') ? (request()->routeIs('home') || request()->routeIs('exhibition') ? 'text-gray-100 border-b border-gray-100' : 'text-gray-950 border-b border-gray-950') : (request()->routeIs('home') || request()->routeIs('exhibition') ? 'text-gray-100 hover:border-b border-gray-100' : 'text-gray-950 hover:border-b border-gray-950') }} transition-all text-lg font-light">AGENDA</a>

            {{-- <a href="#" class="{{ request()->routeIs('home') || request()->routeIs('exhibition') ? 'text-gray-100 hover:border-b' : 'text-gray-950'}} transition-all text-lg font-light">PARCERIAS</a> --}}
            <a href="{{ route('noticies') }}"
                class="{{ request()->routeIs('noticies') ? (request()->routeIs('home') || request()->routeIs('exhibition') ? 'text-gray-100 border-b border-gray-100' : 'text-gray-950 border-b border-gray-950') : (request()->routeIs('home') || request()->routeIs('exhibition') ? 'text-gray-100 hover:border-b' : 'text-gray-950 hover:border-b border-gray-950') }} transition-all text-lg font-light">NOTÍCIAS</a>

            <a href="{{ route('acervo.index') }}"
                class="{{ request()->routeIs('acervo.index') ? (request()->routeIs('home') || request()->routeIs('exhibition') ? 'text-gray-100 border-b border-gray-100' : 'text-gray-950 border-b border-gray-950') : (request()->routeIs('home') || request()->routeIs('exhibition') ? 'text-gray-100 hover:border-b border-gray-100' : 'text-gray-950 hover:border-b border-gray-950') }} transition-all text-lg font-light">ACERVO</a>

            <a href="{{ route('contact') }}"
                class="{{ request()->routeIs('contact') ? (request()->routeIs('home') || request()->routeIs('exhibition') ? 'text-gray-100 border-b border-gray-100' : 'text-gray-950 border-b border-gray-950') : (request()->routeIs('home') || request()->routeIs('exhibition') ? 'text-gray-100 hover:border-b' : 'text-gray-950 hover:border-b border-gray-950') }} transition-all text-lg font-light">CONTATO</a>

            {{-- <a href="#" class="{{ request()->routeIs('home') || request()->routeIs('exhibition') ? 'text-gray-100 hover:border-b' : 'text-gray-950'}} transition-all text-lg font-light">LOJA</a> --}}

        </nav>
    </div>

    <div class="lg:hidden flex w-full justify-between px-8 py-4 items-center absolute left-0 right-0 z-20">
        <a href="{{ route('home') }}"class="w-40">
            <img src="{{ asset('images/logo-kobbi.png') }}" alt="Logo Kobbi Gallery" class="w-full">
        </a>
        <div x-data="{ open: false }" class="relative w-full flex justify-end">
            <button @click="open = true"
                class="px-4 
             py-2 
              rounded-md
              {{ request()->routeIs('home') || request()->routeIs('exhibition') ? 'text-gray-100 ' : 'text-gray-950' }}
              ">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-menu">
                    <line x1="4" x2="20" y1="12" y2="12" />
                    <line x1="4" x2="20" y1="6" y2="6" />
                    <line x1="4" x2="20" y1="18" y2="18" />
                </svg>
            </button>

            <div x-show="open" x-transition.opacity.duration.300ms class="fixed inset-0 bg-black bg-opacity-50 z-40"
                @click="open = false"></div>

            <div x-show="open" x-transition:enter="transition transform ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95 translate-y-[-20px]"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition transform ease-in duration-300"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-95 translate-y-[-20px]"
                class="fixed inset-0 bg-[#f5f5f5] z-50 flex flex-col items-center justify-center transition-transform gap-10">

                <ul class="w-full max-w-md text-center">
                    <li>
                        <a href="{{ route('gallery') }}"
                            class="block px-6 py-4 text-2xl transition-colors {{ request()->routeIs('gallery') ? 'text-gray-950 border-b border-gray-950' : 'text-gray-950 hover:text-gray-700' }}">GALERIA</a>
                    </li>
                    <li>
                        <a href="{{ route('artists.index') }}"
                            class="block px-6 py-4 text-2xl transition-colors {{ request()->routeIs('artists.index') ? 'text-gray-950 border-b border-gray-950' : 'text-gray-950 hover:text-gray-700' }}">ARTISTAS</a>
                    </li>
                    <li>
                        <a href="{{ route('exhibitions') }}"
                            class="block px-6 py-4 text-2xl transition-colors {{ request()->routeIs('exhibitions') ? 'text-gray-950 border-b border-gray-950' : 'text-gray-950 hover:text-gray-700' }}">EXPOSIÇÕES</a>
                    </li>
                    <li>
                        <a href="{{ route('agenda.index') }}"
                            class="block px-6 py-4 text-2xl transition-colors {{ request()->routeIs('agenda.index') ? 'text-gray-950 border-b border-gray-950' : 'text-gray-950 hover:text-gray-700' }}">AGENDA</a>
                    </li>

                    <li>
                        {{-- <a href="#" class="block px-6 py-4 text-gray-950 text-2xl hover:text-gray-700 transition-colors">PARCERIAS</a> --}}
                    </li>
                    <li>
                        <a href="{{ route('noticies') }}"
                            class="block px-6 py-4 text-2xl transition-colors {{ request()->routeIs('noticies') ? 'text-gray-950 border-b border-gray-950' : 'text-gray-950 hover:text-gray-700' }}">NOTÍCIAS</a>
                    </li>   

                    <li>
                        <a href="{{ route('acervo.index') }}"
                            class="block px-6 py-4 text-2xl transition-colors {{ request()->routeIs('acervo.index') ? 'text-gray-950 border-b border-gray-950' : 'text-gray-950 hover:text-gray-700' }}">ACERVO</a>
                    </li>

                    <li>
                        <a href="{{ route('contact') }}"
                            class="block px-6 py-4 text-2xl transition-colors {{ request()->routeIs('contact') ? 'text-gray-950 border-b border-gray-950' : 'text-gray-950 hover:text-gray-700' }}">CONTATO</a>
                    </li>
                    <li>
                        {{-- <a href="#" class="block px-6 py-4 text-gray-950 text-2xl hover:text-gray-700 transition-colors">LOJA</a> --}}
                    </li>
                </ul>

                <div class="w-40">
                    <img src="{{ asset('images/logo-kobbi.png') }}" alt="Logo Kobbi Gallery" class="w-full">
                </div>

                <button @click="open = false" class="absolute top-4 right-4 p-3 text-gray-950 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-x">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
