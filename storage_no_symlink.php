<?php
// Caminho absoluto para a pasta de armazenamento
$sourcePath = __DIR__ . '/storage/app/public/';
// Caminho absoluto para a pasta pública
$destPath = __DIR__ . '/public/storage/';

// Função para copiar arquivos recursivamente
function copyDirectory($source, $destination) {
    if (!is_dir($destination)) {
        mkdir($destination, 0755, true);
    }
    
    $dir = opendir($source);
    while (($file = readdir($dir)) !== false) {
        if ($file != '.' && $file != '..') {
            $srcFile = $source . '/' . $file;
            $destFile = $destination . '/' . $file;
            
            if (is_dir($srcFile)) {
                copyDirectory($srcFile, $destFile);
            } else {
                copy($srcFile, $destFile);
                echo "Copiado: $destFile<br>";
            }
        }
    }
    closedir($dir);
    return true;
}

// Verificar se o diretório de destino existe
if (!is_dir($destPath)) {
    mkdir($destPath, 0755, true);
    echo "Diretório criado: $destPath<br>";
}

// Copiar arquivos
$result = copyDirectory($sourcePath, $destPath);
echo $result ? "Arquivos copiados com sucesso!" : "Falha ao copiar arquivos.";

// Mostrar os caminhos para verificação
echo "<br><br>Caminho de origem: " . $sourcePath;
echo "<br>Caminho de destino: " . $destPath;
?> 