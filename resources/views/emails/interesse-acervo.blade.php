<p><strong>Nome:</strong> {{ $nome }}</p>
<p><strong>E-mail:</strong> {{ $email }}</p>
<p><strong>Mensagem:</strong> {{ $mensagem }}</p>
<hr>
<p><strong>Obra de interesse:</strong></p>
<ul>
    <li><strong>Título:</strong> {{ $obra->title ?? '' }}</li>
    <li><strong>Artista/Fotógrafo:</strong> {{ $obra->artist ?? '' }}</li>
</ul>
@if($obra->image)
    <p><img src="{{ asset('storage/' . $obra->image) }}" alt="Obra" style="max-width:300px;"></p>
@endif 