@php
    Log::info('Email Template: interesse-acervo rendering started', [
        'template' => 'interesse-acervo',
        'customer_email' => $email ?? 'N/A',
        'customer_name' => $nome ?? 'N/A',
        'artwork_title' => $obra->title ?? 'N/A',
        'artwork_artist' => $obra->artist ?? 'N/A'
    ]);
@endphp
<p><strong>Nome:</strong> {{ $nome }}</p>
<p><strong>E-mail:</strong> {{ $email }}</p>
<p><strong>Mensagem:</strong> {{ $mensagem }}</p>
<hr>
<p><strong>Obra de interesse:</strong></p>
<ul>
    <li><strong>Título:</strong> {{ $obra->title ?? '' }}</li>
    <li><strong>Artista/Fotógrafo:</strong> {{ $obra->artist ?? '' }}</li>
    <li><strong>Ano:</strong> {{ $obra->year ?? '' }}</li>
    <li><strong>Tamanho:</strong> {{ $obra->size_cm ?? '' }}</li>
</ul>
@if($obra->image)
    <p><img src="{{ asset('storage/' . $obra->image) }}" alt="Obra" style="max-width:300px;"></p>
@endif 