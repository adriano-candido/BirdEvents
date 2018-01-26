<?php

namespace App\Controladores;

use Nucleo\Controlador;

class AdminControle extends Controlador {

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

            case "usuarios":
                $this->subControle = $this->getControle('usuario');
                $this->subControle->processar($parametros);
                $this->dados['pagina'] = "Usuarios";
                break;
            
            case "projetos":
                $this->subControle = $this->getControle('projeto');
                $this->subControle->processar($parametros);
                $this->dados['pagina'] = "Projetos";
                break;
            
            case "eventos":
                $this->subControle = $this->getControle('evento');
                $this->subControle->processar($parametros);
                $this->dados['pagina'] = "Eventos";
                break;

            case "alunos":
                $this->subControle = $this->getControle('aluno');
                $this->subControle->processar($parametros);
                $this->dados['pagina'] = "Alunos";
                break;

            case "cursos":
                $this->subControle = $this->getControle('curso');
                $this->subControle->processar($parametros);
                $this->dados['pagina'] = "Cursos";
                break;

            case "professores":
                $this->subControle = $this->getControle('professor');
                $this->subControle->processar($parametros);
                $this->dados['pagina'] = "Professores";
                break;
            
            case "visitantes":
                $this->subControle = $this->getControle('visitante');
                $this->subControle->processar($parametros);
                $this->dados['pagina'] = "Visitantes";
                break;
            
            case "certificados":
                $this->subControle = $this->getControle('certificado');
                $this->subControle->processar($parametros);
                $this->dados['pagina'] = "Certificados";
                break;

            case "setores":
                $this->subControle = $this->getControle('setor');
                $this->subControle->processar($parametros);
                $this->dados['pagina'] = "Setores";
                break;
            
            case "vitrine":
                $this->subControle = $this->getControle('vitrine');
                $this->subControle->processar($parametros);
                $this->dados['pagina'] = "Vitrine";
                break;

            default :
                $this->redirecionar("Admin/vitrine");
        }
    }

    public function getSubControle() {
        return $this->subControle;
    }

    private function getControle($nomeSubControle) {
        if (!isset($this->subControles[$nomeSubControle])) {
            $class = 'App\\Controladores\\' . $nomeSubControle . 'Controle';
           
            $this->subControles[$nomeSubControle] = new $class('admin');
        }
        return $this->subControles[$nomeSubControle];
    }

    public function desenhar() {
        $this->subControle->desenhar();
    }

}
