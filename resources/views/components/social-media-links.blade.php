<div class="flex items-center gap-6">
    @forelse ($socialMedias as $socialMedia)
        <a href="{{ $socialMedia->url }}" target="_blank" title="{{ $socialMedia->name }}" class="text-gray-800 hover:text-gray-600 transition-colors">
            @if ($socialMedia->icon)
                <i class="ph ph-{{ $socialMedia->icon }} text-2xl"></i>
            @else
                @if (str_contains(strtolower($socialMedia->name), 'whatsapp'))
                    <i class="ph ph-whatsapp-logo text-2xl"></i>
                @elseif (str_contains(strtolower($socialMedia->name), 'instagram'))
                    <i class="ph ph-instagram-logo text-2xl"></i>
                @elseif (str_contains(strtolower($socialMedia->name), 'facebook'))
                    <i class="ph ph-facebook-logo text-2xl"></i>
                @elseif (str_contains(strtolower($socialMedia->name), 'email') || str_contains(strtolower($socialMedia->name), 'mail'))
                    <i class="ph ph-envelope text-2xl"></i>
                @elseif (str_contains(strtolower($socialMedia->name), 'twitter') || str_contains(strtolower($socialMedia->name), 'x'))
                    <i class="ph ph-twitter-logo text-2xl"></i>
                @elseif (str_contains(strtolower($socialMedia->name), 'linkedin'))
                    <i class="ph ph-linkedin-logo text-2xl"></i>
                @elseif (str_contains(strtolower($socialMedia->name), 'youtube'))
                    <i class="ph ph-youtube-logo text-2xl"></i>
                @elseif (str_contains(strtolower($socialMedia->name), 'tiktok'))
                    <i class="ph ph-tiktok-logo text-2xl"></i>
                @else
                    <span>{{ $socialMedia->name }}</span>
                @endif
            @endif
        </a>
    @empty
        <a href="https://web.whatsapp.com/send?phone=5511984202061&text=Olá!%20Gostaria%20de%20saber%20mais%20sobre%20a%20Kobbi%20Gallery" target="_blank" class="text-gray-800 hover:text-gray-600 transition-colors">
            <i class="ph ph-whatsapp-logo text-2xl"></i>
        </a>
        <a href="https://www.instagram.com/kobbi.gallery/" target="_blank" class="text-gray-800 hover:text-gray-600 transition-colors">
            <i class="ph ph-instagram-logo text-2xl"></i>
        </a>
    @endforelse
</div>