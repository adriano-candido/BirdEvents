<?php

namespace Nucleo;

abstract class Controlador {

    protected $dados = array();
    protected $retornos = array();
    protected $visao = "";
    protected $layout = "";

    abstract function processar($parametros);

    public function desenhar() {
        $this->preparaRetornos();
        
        if (func_get_args() == false) {
            
            if (file_exists("App/Visoes/" . $this->layout . ".php")) {
                extract($this->dados);
                require_once("App/Visoes/" . $this->layout . ".php");
            } else {
                $this->conteudo();
            }
        } else {
            echo(func_get_args()[0]);
        }
        
        $this->dados['toast'] = '';
    }

    public function conteudo() {
        extract($this->dados);

        if (file_exists("App/Visoes/" . $this->visao . ".php")) {
            require_once("App/Visoes/" . $this->visao . ".php");
        }
    }

    public function redirecionar($url) {
        header("Location:" . \App\Util\Util::getBaseURL() . $url);
        header("Connection: close");
        exit;
    }

    protected function preparaRetornos(){
        $toast = "<script> \n $(document).ready(function () { ";
        if (count($this->retornos) > 0) {
            foreach ($this->retornos as $chave => $retorno) {
                $toast = $toast . "Materialize.toast(' " . $retorno . "', " . (3000 + 1000 * $chave) . "); \n";
            }
            $toast = $toast . "}); </script>";
            $this->dados['toast'] = $toast;
            unset($this->retornos);
        }
    }

}
