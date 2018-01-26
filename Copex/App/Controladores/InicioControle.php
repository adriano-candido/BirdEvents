<?php

namespace App\Controladores;

use Nucleo\Controlador;
use Nucleo\EntidadeDAO;
use App\Modelos\Projeto;
use App\Modelos\Login;
use App\Util\Util;

class InicioControle extends Controlador {

    private $subControles = [];
    private $subControle;

    public function __construct() {
        $this->visao = "vitrine";
    }

    public function processar($parametros) {

        //Colhe o subcontrole que deve ser executado
        $subControle = '';
        if (isset($parametros[1])) {
            $subControle = $parametros[1];
        }

        switch ($subControle) {
            case "vitrine" :
                $this->subControle = $this->getControle('vitrine');
                $this->subControle->processar($parametros);
                $this->dados['pagina'] = "Vitrine";
                break;

            default :
                $this->redirecionar("inicio/vitrine");
        }
    }

    public function getSubControle() {
        return $this->subControle;
    }

    private function getControle($nomeSubControle) {
        if (!isset($this->subControles[$nomeSubControle])) {
            $class = 'App\\Controladores\\' . $nomeSubControle . 'Controle';
            $this->subControles[$nomeSubControle] = new $class('funcionario');
        }
        return $this->subControles[$nomeSubControle];
    }

    public function desenhar() {
        $this->subControle->desenhar();
    }

}
