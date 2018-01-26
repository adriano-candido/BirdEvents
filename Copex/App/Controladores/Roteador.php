<?php

namespace App\Controladores;

use Nucleo\Controlador;
use App\Util\Util;

class Roteador extends Controlador {

    protected $controlador;
    protected $controladores = [];
    protected $url = [];

    public function processar($parametros) {
        if (isset($_GET['url'])) {
            $this->url = $this->parseURL($_GET['url']);
        } else {
            $this->redirecionar("vitrine");
        }

        $this->verificaControlador();
        $this->controlador->processar($this->url);
        $this->controlador->desenhar();
    }

    protected function parseURL($url) {
        return explode("/", filter_var(rtrim($url), FILTER_SANITIZE_URL));
    }

    protected function verificaControlador() {
        $nomeDaClasse = $this->url[0] . 'Controle';
        if (!file_exists('App/Controladores/' . $nomeDaClasse . '.php')) {
            $nomeDaClasse = 'errorControle';
        }

  
        if($nomeDaClasse != "loginControle" 
                && $nomeDaClasse != "vitrineControle" 
                && $nomeDaClasse != "errorControle" 
                && \App\Modelos\Login::checaPermissao($this->url[0].".".$this->url[1]) != 1){
            $this->redirecionar("error/" . $this->url[0].".".$this->url[1]);
        }
        $this->controlador = $this->getControle($nomeDaClasse);
    }

    protected function getControle($nomeDaClasse) {
        if (!isset($this->controladores[$nomeDaClasse])) {
            $controlador = 'App\\Controladores\\' . $nomeDaClasse;
            $this->controladores[$nomeDaClasse] = new $controlador();
        }

        return $this->controladores[$nomeDaClasse];
    }

}
