<?php

namespace App\Controladores;

use Nucleo\Controlador;
use App\Util\Util;

class ErrorControle extends Controlador {

    public function __construct() {
        $this->visao = 'error';
        $this->layout = "layout_base";
    }

    public function processar($parametros) {
        $this->dados['endereco'] = implode('/', $parametros);
        if (!Util::validaAcesso($parametros[0])) {
            $this->dados['mensagem'] = "Você não tem permissão para acessar este módulo.";
        } else {
            $this->dados['mensagem'] = "Página não encontrada.";
        }
        
    }

}
