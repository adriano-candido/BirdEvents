<?php

require_once 'Nucleo/autoload.php';

use App\Controladores\Roteador;

Nucleo\DB::conectar("localhost", "root", "", "copex");

\session_start();

// Configura o local para português Brasil
setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
#echo strftime("%A, %d de %B de %Y", strtotime( date('Y-m-d H:i:s') ));

$roteador;

if (!isset($_SESSION['roteador'])) {
    $_SESSION['roteador'] = new Roteador();
}

$roteador = $_SESSION['roteador'];
$roteador->processar(NULL);
/*
$p = serialize(App\Util\Util::$permissoes);

$consulta = Nucleo\DB::getConexao()->prepare("INSERT INTO `vinculousuariopermissao`(`usuario`, `permissao`) VALUES (3, :p);");
        $consulta->bindValue(':p', $p);

        $consulta->execute();*/
?>
