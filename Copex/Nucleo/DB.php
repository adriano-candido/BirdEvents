<?php

namespace Nucleo;

use PDO;

class DB {

    private static $conexao;
    
    private static $config = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    );

    public static function conectar($host, $usuario, $senha, $banco) {
        if (!isset(self::$connection)) {
            try {
                self::$conexao = new PDO("mysql:host=$host;dbname=$banco;charset=utf8", $usuario, $senha, self::$config);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
    
    public static function getConexao() {
        return self::$conexao;
    }

}
