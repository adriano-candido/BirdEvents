<?php

namespace App\Controladores;

use Nucleo\Controlador;
use Nucleo\EntidadeDAO;
use App\Modelos\Professor;
use App\Util\Util;

class ProfessorControle extends Controlador {

    private $professor;
    private $dao;

    public function __construct() {
        $this->layout = "layout_base";
        $this->professor = new Professor();
        $this->dao = new EntidadeDAO($this->professor);
    }

    public function processar($parametros) {
        //Colhe a ação do botão digitado
        $acao = Util::get_post_action('visualizar', 'editar', 'salvar', 'excluir');

        //Colhe a pagina que deve ser apresentada
        $pagina = '';
        if (isset($parametros[1])) {
            $pagina = $parametros[1];
        }
        
        
        $this->dados['titulacoes'] = array(
            'graduado' => 'Graduado',
            'especialista' => 'Especialista',
            'mestre' => 'Mestre',
            'doutor' => 'Doutor',
            'phd' => 'PhD'
        );
        
        switch ($pagina) {
            case 'visualizacao':
                //Prepara visualização da página
                $this->visao = 'form_professor';
                $this->dados['pagina'] = "Visualização de Professor";
                $this->dados['professor'] = $this->professor;
                $this->dados['acao'] = 'editar';
                $this->dados['disabled'] = 'disabled';

                //Verifica se houve ação
                if ($acao == 'editar') {
                    $this->redirecionar('professor/edicao');
                }

                break;

            case 'edicao':
                //Prepara visualização da página
                $this->visao = 'form_professor';
                $this->dados['pagina'] = "Edição de Professor";
                $this->dados['professor'] = $this->professor;
                $this->dados['acao'] = 'salvar';
                $this->dados['disabled'] = '';

                //Verifica se houve ação
                if ($acao == 'salvar') {

                    $usuario = $this->professor->getUsuario();
                    $usuario->setNome($_POST['nome']);
                    $this->dao->mudarEntidade('usuario')->salvar($usuario);
                    $usuario = $this->dao->pesquisarPorId($usuario->getId());

                    $professor = $this->professor;
                    $professor->setUsuario($usuario);
                    $professor->setTitulacao($_POST['titulacao']);
                    $this->dao->mudarEntidade('professor')->salvar($professor);

                    $this->professor = $this->dao->pesquisarOnde('id', $professor->getId())[0];
                    $this->dados['professor'] = $this->professor;

                    $this->retornos[] = "Professor editado com sucesso!";
                }

                break;

            case 'cadastro':
                /* /Prepara visualização da página
                  $this->visao = 'form_professor';
                  $this->dados['pagina'] = "Cadastro de Professor";
                  $this->dados['acao'] = 'salvar';
                  $this->dados['disabled'] = '';
                  unset($this->dados['professor']);

                  //Verifica se houve ação
                  if ($acao == 'salvar') {
                  $professor = new Professor();

                  $id = array_shift($_POST['id']);

                  $professor->setId($id);
                  $professor->setNome($_POST['nome']);
                  $professor->setCPF($_POST['cpf']);
                  $professor->setTitulacao($_POST['titulacao']);

                  $this->dao->salvar($professor);

                  $this->professor = $professor;

                  $this->redirecionar($this->caminhoAtual . '/professores/cadastro');
                  }
                 */
                break;

            default:
                $this->visao = 'pesquisa_professor';
                $this->dados['pagina'] = "Lista de Professores";
                $this->pesquisar($acao);

                break;
        }
    }

    private function pesquisar($acao) {
        switch ($acao) {
            case 'visualizar':
                if (isset($_POST['id']) && $_POST['id'] !== '') {
                    $id = array_shift($_POST['id']);

                    $this->professor = $this->dao->pesquisarPorId($id);

                    $this->redirecionar('professor/visualizacao');
                }
                break;

            case 'editar':
                if (isset($_POST['id']) && $_POST['id'] !== '') {
                    $id = array_shift($_POST['id']);

                    $this->professor = $this->dao->pesquisarPorId($id);

                    $this->dados['acao'] = 'salvar';
                    $this->dados['disabled'] = '';

                    $this->redirecionar('professor/edicao');
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
                break;

            default:
                if (isset($_POST['nome']) && $_POST['nome'] !== '') {

                    $usuarios = $this->dao->mudarEntidade('usuario')->pesquisarPorNome($_POST['nome']);
                    $professores = [];
                    foreach ($usuarios as $usuario) {
                        if ($usuario->getTipoAcesso() == 'professor') {
                            $professores[] = $this->dao->mudarEntidade('professor')->pesquisarOnde('usuario', $usuario->getId())[0];
                        }
                    }
                    $this->dados['resultado'] = $professores;
                } else if(!isset ($_POST['nome'])) {
                    $usuarios = $this->dao->mudarEntidade('usuario')->pesquisarLIVRE('order by id desc limit 50;', array());
                    $professores = [];
                    foreach ($usuarios as $usuario) {
                        if ($usuario->getTipoAcesso() == 'professor') {
                            $professores[] = $this->dao->mudarEntidade('professor')->pesquisarOnde('usuario', $usuario->getId())[0];
                        }
                    }
                    $this->dados['resultado'] = $professores;
                    
                } else {
                    unset($this->dados['resultado']);
                }
                break;
        }
    }

}
