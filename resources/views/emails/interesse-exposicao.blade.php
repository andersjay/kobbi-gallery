<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Interesse em Obra da Exposição</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f7f7f7; margin: 0; padding: 0;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background: #f7f7f7; padding: 30px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); padding: 32px;">
                    <tr>
                        <td align="center" style="padding-bottom: 24px;">
                            <h2 style="color: #222; margin: 0 0 8px;">Novo interesse em obra da exposição</h2>
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
                            @if(isset($obra['name']))
                                <p><strong>Nome:</strong> {{ $obra['name'] }}</p>
                            @endif
                            @if(isset($obra['artist']))
                                <p><strong>Artista:</strong> {{ $obra['artist'] }}</p>
                            @endif
                            @if(isset($obra['description']))
                                <p><strong>Descrição:</strong> {!! $obra['description'] !!}</p>
                            @endif
                            @if(isset($obra['image']))
                                <p>
                                    <img src="{{ asset('storage/' . $obra['image']) }}" alt="Imagem da obra" style="max-width: 100%; border-radius: 4px; margin-top: 8px;">
                                </p>
                            @endif
                        </td>
                    </tr>
                    @if(isset($exhibition))
                    <tr>
                        <td style="padding-top: 24px;">
                            <h3 style="color: #444; margin-bottom: 8px;">Exposição</h3>
                            <p><strong>Título:</strong> {{ $exhibition->title }}</p>
                            <p><strong>Descrição:</strong> {!! $exhibition->description !!}</p>
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