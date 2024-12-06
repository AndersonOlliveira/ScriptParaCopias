<?php

//este codigo eu crio uma copia do que esta sendo enviado para outro lugar passando o id quando ele for solicitado ou posso copiar tudo.

$diretorio = "DIRETORIO A SER COPIADO";
$diretorioE = "DIRETORIO PARA ONDE VAI";
 function copyDirectory($source, $destination) {
    // Verifica se o diretório de origem existe
    if (!is_dir($source)) {
        echo "Diretório de origem não encontrado.";
        return false;
    }

    // Verifica se o diretório de destino existe ou cria ele
    if (!is_dir($destination)) {
        mkdir($destination, 0777, true);
    }

    // Obtém uma lista dos arquivos e diretórios no diretório de origem
    $files = scandir($source);

    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            $sourcePath = $source . '/' . $file;
            $destinationPath = $destination . '/' . $file;

            if (is_dir($sourcePath)) {
                // Se for um diretório, chama recursivamente a função para copiá-lo
                copyDirectory($sourcePath, $destinationPath);
            } else {
                // Se for um arquivo, copia diretamente
                @copy($sourcePath, $destinationPath);
            }
        }
    }

    return true;
}

if (copyDirectory($diretorio, $diretorioE)) {
     echo "Diretório copiado com sucesso.";
} else {
    echo "Falha ao copiar o diretório.";
}


?>