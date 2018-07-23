<?php

namespace App\Controladores;

use Nucleo\Controlador;
use App\Util\Util;

class Roteador extends Controlador {

    protected $controlador;
    protected $controladores = [];
    protected $url = [];

    public function processar($parametros) {
        
        if( strpos(\App\Util\Util::getBaseURL(), 'pg') > 0 && isset($_GET['pg'])){
                    $this->url = $this->parseURL($_GET['pg']);
        } else
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
        $nomeDaClasse = ucfirst($this->url[0]) . 'Controle';
        if (!file_exists('App/Controladores/' . $nomeDaClasse . '.php')) {
            $nomeDaClasse = 'ErrorControle';
        }

  
        if($nomeDaClasse != "LoginControle" 
                && $nomeDaClasse != "VitrineControle" 
                && $nomeDaClasse != "ErrorControle"
                && ($this->url[0] . "/" . $this->url[1] != "visitante/cadastro")                
                && \App\Modelos\Login::checaPermissao($this->url[0].".".$this->url[1]) != 1){
            $this->redirecionar("Error/" . $this->url[0].".".$this->url[1]);
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
