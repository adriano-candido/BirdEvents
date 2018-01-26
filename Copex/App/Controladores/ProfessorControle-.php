<?php

namespace App\Controladores;

use Nucleo\Controlador;

class ProfessorControle extends Controlador {

    private $subControles = [];
    private $subControle;

    public function __construct() {     
    }

    public function processar($parametros) {

        //Colhe o subcontrole que deve ser executado
        $subControle = '';
        if (isset($parametros[1])) {
            $subControle = $parametros[1];
        }
        
        switch ($subControle) {

            case "eventos":
                $this->subControle = $this->getControle('evento');
                $this->subControle->processar($parametros);
                $this->dados['pagina'] = "Eventos";
                break;

            case "vitrine":
                $this->subControle = $this->getControle('vitrine');
                $this->subControle->processar($parametros);
                $this->dados['pagina'] = "Vitrine";
                break;
            
            default :
            $this->redirecionar("professor/vitrine");
        }
        
        
    }

    public function getSubControle() {
        return $this->subControle;
    }

    private function getControle($nomeSubControle) {
        if (!isset($this->subControles[$nomeSubControle])) {
            $class = 'App\\Controladores\\SubControladores\\' . $nomeSubControle . 'SubControle';
            $this->subControles[$nomeSubControle] = new $class('professor');
        }
        return $this->subControles[$nomeSubControle];
    }
    
    public function desenhar() {
        $this->subControle->desenhar();
    }
}
