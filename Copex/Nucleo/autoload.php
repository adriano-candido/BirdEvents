<?php

function __autoload($classe) {
    $caminho = str_replace('\\', '/', $classe) . '.php';
    if (file_exists($caminho)) {
        require $caminho;
    } else {
        echo $classe.  " não pode ser carregada, verificar.";
    }
}
