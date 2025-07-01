@php
    $imageUrl = null;
    if(isset($obra->image) && $obra->image) {
        $imageUrl = url('storage/' . $obra->image);
    } elseif(isset($obra->images) && is_array($obra->images) && count($obra->images) > 0) {
        $imageUrl = url('storage/' . $obra->images[0]);
    } elseif(isset($obra['image']) && $obra['image']) {
        $imageUrl = url('storage/' . $obra['image']);
    }

    Log::info('Email Template: interesse-artista rendering started', [
        'template' => 'interesse-artista',
        'customer_email' => $email ?? 'N/A',
        'customer_name' => $nome ?? 'N/A',
        'artwork_name' => $obra->name ?? 'N/A',
        'artist_name' => $artist->name ?? 'N/A',
        'image_url' => $imageUrl,
        'has_image' => $imageUrl !== null
    ]);
@endphp
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Interesse em Obra de Artista</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f7f7f7; margin: 0; padding: 0;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background: #f7f7f7; padding: 30px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); padding: 32px;">
                    <tr>
                        <td align="center" style="padding-bottom: 24px;">
                            <h2 style="color: #222; margin: 0 0 8px;">Novo interesse em obra de artista</h2>
                            <p style="color: #888; margin: 0;">Recebemos uma nova manifestação de interesse.</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3 style="color: #444; margin-bottom: 8px;">Dados do interessado</h3>
                            <p><strong>Nome:</strong> {{ $nome }}</p>
                            <p><strong>E-mail:</strong> {{ $email }}</p>
                            <p><strong>Mensagem:</strong><br>{!! nl2br(e($mensagem)) !!}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 24px;">
                            <h3 style="color: #444; margin-bottom: 8px;">Detalhes da Obra</h3>
                            @if(isset($obra->name))
                                <p><strong>Nome:</strong> {{ $obra->name }}</p>
                            @endif
                            @if(isset($obra->year))
                                <p><strong>Ano:</strong> {{ $obra->year }}</p>
                            @endif
                            @if(isset($obra->technique))
                                <p><strong>Técnica:</strong> {{ $obra->technique }}</p>
                            @endif
                            @if(isset($obra->size))
                                <p><strong>Tamanho:</strong> {{ $obra->size }}</p>
                            @endif
                            @if(isset($obra->description))
                                <p><strong>Descrição:</strong> {{ $obra->description }}</p>
                            @endif
                            @if(isset($obra->image) && $obra->image)
                                <p>
                                    <img src="{{ url('storage/' . $obra->image) }}" alt="Imagem da obra" style="max-width: 100%; height: auto; border-radius: 4px; margin-top: 8px; display: block;">
                                </p>
                            @elseif(isset($obra->images) && is_array($obra->images) && count($obra->images) > 0)
                                <p>
                                    <img src="{{ url('storage/' . $obra->images[0]) }}" alt="Imagem da obra" style="max-width: 100%; height: auto; border-radius: 4px; margin-top: 8px; display: block;">
                                </p>
                            @elseif(isset($obra['image']) && $obra['image'])
                                <p>
                                    <img src="{{ url('storage/' . $obra['image']) }}" alt="Imagem da obra" style="max-width: 100%; height: auto; border-radius: 4px; margin-top: 8px; display: block;">
                                </p>
                            @endif
                        </td>
                    </tr>
                    @if(isset($artist))
                    <tr>
                        <td style="padding-top: 24px;">
                            <h3 style="color: #444; margin-bottom: 8px;">Artista</h3>
                            <p><strong>Nome:</strong> {{ $artist->name }}</p>
                            <p><strong>Bio:</strong> {{ $artist->bio }}</p>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td align="center" style="padding-top: 32px; color: #aaa; font-size: 12px;">
                            Galeria de Arte &copy; {{ date('Y') }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html> 