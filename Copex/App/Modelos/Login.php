<?php

namespace App\Modelos;

use Nucleo\DB;
use Nucleo\EntidadeDAO;
use App\Util\Util;

class Login {

    public static function logar($cpf, $senha) {
        $usuarios = self::pesquisarUsuarioPor($cpf, $senha);
        if (count($usuarios) > 0) {
            $_SESSION['usuario'] = $usuarios[0];
            return true;
        } else {
            return false;
        }
    }

    private static function pesquisarUsuarioPor($cpf, $senha) {
        $consulta = DB::getConexao()->prepare("SELECT * FROM usuario WHERE cpf=:cpf AND senha=:senha;");
        $consulta->bindValue(':cpf', $cpf);
        $consulta->bindValue(':senha', $senha);

        $consulta->execute();

        $resultado = $consulta->fetchAll(\PDO::FETCH_CLASS, '\\App\\Modelos\\Usuario');

        return $resultado;
    }

    public static function getUsuario() {
        if (isset($_SESSION['usuario'])) {
            return $_SESSION['usuario'];
        } else {
            return null;
        }
    }

    public static function sair() {
        unset($_SESSION['usuario']);
        session_destroy();
    }

    public static function getPermissoesUsuario() {
        $permissoesVinculadas = (new EntidadeDAO(new VinculoUsuarioPermissao()))->pesquisarOnde('usuario', self::getUsuario()->getId());
        $resultado = unserialize($permissoesVinculadas[0]->getPermissao());
        
        return $resultado;
    }

    public static function checaPermissao($permissao) {
        if(self::getUsuario() == null){
            return 0;
        }
        $permissoesVinculadas = unserialize((new EntidadeDAO(new VinculoUsuarioPermissao())
        )->pesquisarOnde('usuario', self::getUsuario()->getId())[0]->getPermissao());
        $temPermissao = 0;

        foreach ($permissoesVinculadas as $permissaoVinculada) {

            $pVinculada = strtolower(Util::tirarAcentos($permissaoVinculada));
            $pVinculada = substr($pVinculada, 0, strrpos($pVinculada, "."));

            $p = strtolower(Util::tirarAcentos($permissao));

            if ($pVinculada == $p) {
                $temPermissao = 1;
                break;
            }
        }
        return $temPermissao;
    }

}
