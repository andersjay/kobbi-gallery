<p><strong>Nome:</strong> {{ $nome }}</p>
<p><strong>E-mail:</strong> {{ $email }}</p>
<p><strong>Mensagem:</strong> {{ $mensagem }}</p>
<hr>
<p><strong>Obra de interesse:</strong></p>
<ul>
    <li><strong>Título:</strong> {{ $obra['name'] ?? '' }}</li>
    <li><strong>Ano:</strong> {{ $obra['year'] ?? '' }}</li>
    <li><strong>Técnica:</strong> {{ $obra['technique'] ?? '' }}</li>
    <li><strong>Tamanho:</strong> {{ $obra['size_cm'] ?? '' }}</li>
    <li><strong>Descrição:</strong> {{ $obra['description'] ?? '' }}</li>
</ul>
@if($obra['image'] ?? false)
    <p><img src="{{ asset('storage/' . $obra['image']) }}" alt="Obra" style="max-width:300px;"></p>
@endif
<p><strong>Exposição:</strong> {{ $exhibition->title }}</p> 