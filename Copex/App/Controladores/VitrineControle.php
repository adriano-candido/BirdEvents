<?php

namespace App\Controladores;

use Nucleo\Controlador;
use Nucleo\EntidadeDAO;
use App\Modelos\Projeto;
use App\Modelos\Login;
use \App\Modelos\Anexo;
use App\Util\Util;

class VitrineControle extends Controlador {

    private $dao;
    private $projetoDAO;

    public function __construct() {
        $this->visao = "vitrine";
        $this->layout = "layout_base";
        $this->dao = new EntidadeDAO(new Projeto());
        $this->projetoDAO = new EntidadeDAO(new Anexo());
    }

    public function processar($parametros) {
        $this->dados['pagina'] = "Vitrine de Projetos";

        $acao = Util::get_post_action('sair');
        if ($acao == 'sair') {
            Login::sair();
            $this->redirecionar('visitante');
        }


        $dataAtual = date('Y-m-d');
        //print_r($dataAtual);

        $dataInicio = date('Y-m-d', strtotime('+5 day'));
        //print_r($dataInicio);
        //$this->dados['projetos'] = $this->dao->pesquisarBETWEEN('inicioOcorrencia', $dataAtual, $dataInicio);
        $this->dados['projetos'] = $this->dao->pesquisarPorNome('');

        $this->projetoDAO = new EntidadeDAO(new Anexo());

        $idProjetos = [];
        foreach ($this->dados['projetos'] as $projeto) {
            $idProjetos[] = $projeto->getId();
        }

        if (count($idProjetos) > 0) {
            $anexos = $this->projetoDAO->pesquisarIN('projeto', $idProjetos);

            $imagens = [];
            foreach ($anexos as $anexo) {
                if ($anexo->getTipo() == '/imagens/') {
                    $imagens[] = $anexo;
                }
            }

            $this->dados['anexos'] = $imagens;
        }

        $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";
        $projeto = isset($_POST["projeto"]) ? $_POST["projeto"] : "";

        if ($acao == "inscrevase") {
            $this->visao = "";
            $this->layout = "";
            echo "Inscrição confirmada no projeto: " . $projeto;
        } 
    }

    public function desenhar() {
        parent::desenhar();
        $this->visao = "vitrine";
        $this->layout = "layout_base";
    }

}
