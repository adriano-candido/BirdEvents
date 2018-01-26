<?php

namespace App\Controladores;

use Nucleo\Controlador;
use Nucleo\EntidadeDAO;
use App\Modelos\Curso;
use App\Util\Util;

class CursoControle extends Controlador {

    private $curso;
    private $dao;

    public function __construct() {
        $this->layout = "layout_base";
        $this->curso = new Curso();
        $this->dao = new EntidadeDAO($this->curso);
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
                $this->visao = 'form_curso';
                $this->dados['pagina'] = "Visualização de Curso";
                $this->dados['curso'] = $this->curso;
                $this->dados['acao'] = 'editar';
                $this->dados['disabled'] = 'disabled';

                //Verifica se houve ação
                if ($acao == 'editar') {
                    $this->redirecionar('curso/edicao');
                }

                break;

            case 'edicao':
                //Prepara visualização da página
                $this->visao = 'form_curso';
                $this->dados['pagina'] = "Edição de Curso";
                $this->dados['curso'] = $this->curso;
                $this->dados['acao'] = 'salvar';
                $this->dados['disabled'] = '';

                //Verifica se houve ação
                if ($acao == 'salvar') {
                    $curso = new Curso();

                    $curso->setId($this->curso->getId());
                    $curso->setNome($_POST['nome']);

                    $this->dao->salvar($curso);

                    $this->curso = $curso;
                    $this->dados['curso'] = $this->curso;
                    
                    $this->retornos[] = "Curso editado com sucesso!";
                }

                break;

            case 'cadastro':
                //Prepara visualização da página
                $this->visao = 'form_curso';
                $this->dados['pagina'] = "Cadastro de Curso";
                $this->dados['acao'] = 'salvar';
                $this->dados['disabled'] = '';
                unset($this->dados['curso']);

                //Verifica se houve ação
                if ($acao == 'salvar') {
                    $curso = new Curso();
                    $id = array_shift($_POST['id']);
                    $curso->setId($id);
                    $curso->setNome($_POST['nome']);

                    $this->dao->salvar($curso);

                    $this->curso = $curso;

                    $this->retornos[] = "Curso cadastrado com sucesso!";
                }

                break;

            default:
                $this->visao = 'pesquisa_curso';
                $this->dados['pagina'] = "Lista de Cursos";
                $this->pesquisar($acao);

                break;
        }
    }

    private function pesquisar($acao) {
        switch ($acao) {
            case 'visualizar':
                if (isset($_POST['id']) && $_POST['id'] !== '') {
                    $id = array_shift($_POST['id']);

                    $this->curso = $this->dao->pesquisarPorId($id);

                    $this->redirecionar('curso/visualizacao');
                }
                break;

            case 'editar':
                if (isset($_POST['id']) && $_POST['id'] !== '') {
                    $id = array_shift($_POST['id']);

                    $this->curso = $this->dao->pesquisarPorId($id);

                    $this->dados['acao'] = 'salvar';
                    $this->dados['disabled'] = '';

                    $this->redirecionar('curso/edicao');
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
                $this->retornos[] = "Curso excluído com sucesso!";

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
