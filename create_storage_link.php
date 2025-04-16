<?php
// Caminho absoluto para a pasta de armazenamento
$targetPath = __DIR__ . '/storage/app/public';
// Caminho absoluto para o link simbólico
$linkPath = __DIR__ . '/public/storage';

// Remover o link existente, se houver
if (is_link($linkPath)) {
    unlink($linkPath);
}

// Criar o link simbólico
if (function_exists('symlink')) {
    $result = symlink($targetPath, $linkPath);
    echo $result ? "Link simbólico criado com sucesso!" : "Falha ao criar link simbólico.";
} else {
    echo "A função symlink() não está disponível neste servidor.";
}

// Mostra os caminhos para verificação
echo "<br><br>Target Path: " . $targetPath;
echo "<br>Link Path: " . $linkPath;
?> 