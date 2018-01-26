<?php

namespace App\Controladores;

use Nucleo\Controlador;
use Nucleo\EntidadeDAO;
use App\Modelos\Setor;
use App\Util\Util;

class SetorControle extends Controlador {

    private $setor;
    private $dao;

    public function __construct() {
        $this->layout = "layout_base";
        $this->setor = new Setor();
        $this->dao = new EntidadeDAO($this->setor);
    }

    public function processar($parametros) {
        //Colhe a ação do botão digitado
        $acao = Util::get_post_action('visualizar', 'editar', 'salvar', 'excluir');

        //Colhe a pagina que deve ser apresentada
        $pagina = '';
        if (isset($parametros[1])) {
            $pagina = $parametros[1];
        }
        switch ($pagina) {
            case 'visualizacao':
                //Prepara visualização da página
                $this->visao = 'form_setor';
                $this->dados['pagina'] = "Visualização de Setor";
                $this->dados['setor'] = $this->setor;
                $this->dados['acao'] = 'editar';
                $this->dados['disabled'] = 'disabled';

                //Verifica se houve ação
                if ($acao == 'editar') {
                    $this->redirecionar('setor/edicao');
                }

                break;

            case 'edicao':
                //Prepara visualização da página
                $this->visao = 'form_setor';
                $this->dados['pagina'] = "Edição de Setor";
                $this->dados['setor'] = $this->setor;
                $this->dados['acao'] = 'salvar';
                $this->dados['disabled'] = '';

                //Verifica se houve ação
                if ($acao == 'salvar') {
                    $setor = new Setor();

                    $setor->setId($this->setor->getId());
                    $setor->setNome($_POST['nome']);

                    $this->dao->salvar($setor);

                    $this->setor = $setor;
                    $this->dados['setor'] = $this->setor;
                    
                    $this->retornos[] = "Setor editado com sucesso!";
                }

                break;

            case 'cadastro':
                //Prepara visualização da página
                $this->visao = 'form_setor';
                $this->dados['pagina'] = "Cadastro de Setor";
                $this->dados['acao'] = 'salvar';
                $this->dados['disabled'] = '';
                unset($this->dados['setor']);

                //Verifica se houve ação
                if ($acao == 'salvar') {
                    $setor = new Setor();
                    $id = array_shift($_POST['id']);
                    $setor->setId($id);
                    $setor->setNome($_POST['nome']);

                    $this->dao->salvar($setor);

                    $this->setor = $setor;

                    $this->retornos[] = "Setor cadastrado com sucesso!";
                }

                break;

            default:
                $this->visao = 'pesquisa_setor';
                $this->dados['pagina'] = "Lista de Setores";
                $this->pesquisar($acao);

                break;
        }
    }

    private function pesquisar($acao) {
        switch ($acao) {
            case 'visualizar':
                if (isset($_POST['id']) && $_POST['id'] !== '') {
                    $id = array_shift($_POST['id']);

                    $this->setor = $this->dao->pesquisarPorId($id);

                    $this->redirecionar('setor/visualizacao');
                }
                break;

            case 'editar':
                if (isset($_POST['id']) && $_POST['id'] !== '') {
                    $id = array_shift($_POST['id']);

                    $this->setor = $this->dao->pesquisarPorId($id);

                    $this->dados['acao'] = 'salvar';
                    $this->dados['disabled'] = '';

                    $this->redirecionar('setor/edicao');
                }
                break;

            case 'excluir':
                foreach ($_POST['id'] as $id) {
                    $this->dao->excluir($id);
                    if (isset($_POST['nome']) && $_POST['nome'] !== '') {
                        $this->dados['resultado'] = $this->dao->pesquisarPorNome($_POST['nome']);
                    } else {
                        unset($this->dados['resultado']);
                    }
                }
                $this->retornos[] = "Setor excluído com sucesso!";

                break;

            default:
                if (isset($_POST['nome']) && $_POST['nome'] !== '') {
                    $this->dados['resultado'] = $this->dao->pesquisarPorNome($_POST['nome']);
                } else if(!isset ($_POST['nome'])) {
                    $this->dados['resultado'] = $this->dao->pesquisarLIVRE('order by id desc limit 50;', array());
                } else {
                    unset($this->dados['resultado']);
                }
                break;
        }
    }

}
