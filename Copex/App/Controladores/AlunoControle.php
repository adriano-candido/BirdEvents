<?php

namespace App\Controladores;

use Nucleo\Controlador;
use Nucleo\EntidadeDAO;
use App\Modelos\Aluno;
use App\Modelos\Curso;
use App\Util\Util;

class AlunoControle extends Controlador {

    private $aluno;
    private $dao;
    private $cursoDAO;

    public function __construct() {
        $this->layout = "layout_base";
        $this->aluno = new Aluno();
        $this->dao = new EntidadeDAO($this->aluno);
        $this->cursoDAO = new EntidadeDAO(new Curso());
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
                $this->visao = 'form_aluno';
                $this->dados['pagina'] = "Visualização de Aluno";
                $this->dados['aluno'] = $this->aluno;
                $this->dados['cursos'] = $this->cursoDAO->pesquisarPorNome('');
                $this->dados['acao'] = 'editar';
                $this->dados['disabled'] = 'disabled';

                //Verifica se houve ação
                if ($acao == 'editar') {
                    $this->redirecionar('aluno/edicao');
                }

                break;

            case 'edicao':
                //Prepara visualização da página
                $this->visao = 'form_aluno';
                $this->dados['pagina'] = "Edição de Aluno";
                $this->dados['aluno'] = $this->aluno;
                $this->dados['cursos'] = $this->cursoDAO->pesquisarPorNome('');
                $this->dados['acao'] = 'salvar';
                $this->dados['disabled'] = '';

                //Verifica se houve ação
                if ($acao == 'salvar') {


                    $usuario = $this->aluno->getUsuario();
                    $usuario->setNome($_POST['nome']);
                    $this->dao->mudarEntidade('usuario')->salvar($usuario);
                    $usuario = $this->dao->pesquisarPorId($usuario->getId());

                    $aluno = $this->aluno;
                    $aluno->setUsuario($usuario);
                    $aluno->setMatricula($_POST['matricula']);
                    $aluno->setCurso($_POST['curso']);
                    $this->dao->mudarEntidade('aluno')->salvar($aluno);

                    $this->aluno = $this->dao->pesquisarOnde('id', $aluno->getId())[0];
                    $this->dados['aluno'] = $this->aluno;

                    $this->retornos[] = "Aluno editado com sucesso!";
                }

                break;

            case 'cadastro':
            /* /Prepara visualização da página
              $this->visao = 'form_aluno';
              $this->dados['pagina'] = "Cadastro de Aluno";
              $this->dados['acao'] = 'salvar';
              $this->dados['disabled'] = '';

              $this->dados['cursos'] = $this->cursoDAO->pesquisarPorNome('');
              unset($this->dados['aluno']);

              //Verifica se houve ação
              if ($acao == 'salvar') {
              $aluno = new Aluno();

              $id = array_shift($_POST['id']);

              $aluno->setId($id);
              $aluno->setNome($_POST['nome']);
              $aluno->setCPF($_POST['cpf']);
              $aluno->setMatricula($_POST['matricula']);
              $aluno->setCurso($_POST['curso']);

              $this->dao->salvar($aluno);

              $this->aluno = $aluno;

              $this->redirecionar($this->caminhoAtual . '/alunos/cadastro');
              }

              break;
             */
            default:
                $this->visao = 'pesquisa_aluno';
                $this->dados['pagina'] = "Lista de Alunos";
                $this->pesquisar($acao);

                break;
        }
    }

    private function pesquisar($acao) {
        switch ($acao) {
            case 'visualizar':
                if (isset($_POST['id']) && $_POST['id'] !== '') {
                    $id = array_shift($_POST['id']);

                    $this->aluno = $this->dao->pesquisarPorId($id);

                    $this->redirecionar('aluno/visualizacao');
                }
                break;

            case 'editar':
                if (isset($_POST['id']) && $_POST['id'] !== '') {
                    $id = array_shift($_POST['id']);

                    $this->aluno = $this->dao->pesquisarPorId($id);

                    $this->dados['acao'] = 'salvar';
                    $this->dados['disabled'] = '';

                    $this->redirecionar('aluno/edicao');
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
                    $alunos = [];
                    foreach ($usuarios as $usuario) {
                        if ($usuario->getTipoAcesso() == 'aluno') {
                            $alunos[] = $this->dao->mudarEntidade('aluno')->pesquisarOnde('usuario', $usuario->getId())[0];
                        }
                    }
                    $this->dados['resultado'] = $alunos;
                } else if(!isset ($_POST['nome'])) {
                    $usuarios = $this->dao->mudarEntidade('usuario')->pesquisarLIVRE('order by id desc limit 50;', array());
                    $alunos = [];
                    foreach ($usuarios as $usuario) {
                        if ($usuario->getTipoAcesso() == 'aluno') {
                            $alunos[] = $this->dao->mudarEntidade('aluno')->pesquisarOnde('usuario', $usuario->getId())[0];
                        }
                    }
                    $this->dados['resultado'] = $alunos;
                    
                } else {
                    unset($this->dados['resultado']);
                }
                break;
        }
    }

}
