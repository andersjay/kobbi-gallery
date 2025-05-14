<p><strong>Nome:</strong> {{ $nome }}</p>
<p><strong>E-mail:</strong> {{ $email }}</p>
<p><strong>Mensagem:</strong> {{ $mensagem }}</p>
<hr>
<p><strong>Obra de interesse:</strong></p>
<ul>
    <li><strong>Título:</strong> {{ $obra->name ?? '' }}</li>
    <li><strong>Descrição:</strong> {{ $obra->description ?? '' }}</li>
    <!-- Adicione outros campos conforme necessário -->
</ul>
@if($obra->images && count($obra->images))
    <p><img src="{{ asset('storage/' . $obra->images[0]) }}" alt="Obra" style="max-width:300px;"></p>
@endif
<p><strong>Artista:</strong> {{ $artist->name }}</p> 