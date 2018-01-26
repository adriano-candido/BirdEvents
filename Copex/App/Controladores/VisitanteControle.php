<?php

namespace App\Controladores;

use Nucleo\Controlador;
use Nucleo\EntidadeDAO;
use App\Modelos\Visitante;
use App\Util\Util;

class VisitanteControle extends Controlador {

    private $visitante;
    private $dao;

    public function __construct() {
        $this->layout = "layout_base";
        $this->visitante = new Visitante();
        $this->dao = new EntidadeDAO($this->visitante);
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
                $this->visao = 'form_visitante';
                $this->dados['pagina'] = "Visualização de Visitante";
                $this->dados['visitante'] = $this->visitante;
                $this->dados['acao'] = 'editar';
                $this->dados['disabled'] = 'disabled';

                //Verifica se houve ação
                if ($acao == 'editar') {
                    $this->redirecionar('visitante/edicao');
                }

                break;

            case 'edicao':
                //Prepara visualização da página
                $this->visao = 'form_visitante';
                $this->dados['pagina'] = "Edição de Visitante";
                $this->dados['visitante'] = $this->visitante;
                $this->dados['acao'] = 'salvar';
                $this->dados['disabled'] = '';

                //Verifica se houve ação
                if ($acao == 'salvar') {


                    $usuario = $this->visitante->getUsuario();
                    $usuario->setNome($_POST['nome']);
                    $this->dao->mudarEntidade('usuario')->salvar($usuario);
                    $usuario = $this->dao->pesquisarPorId($usuario->getId());

                    $visitante = $this->visitante;
                    $visitante->setUsuario($usuario);
                    
                    $this->dao->mudarEntidade('visitante')->salvar($visitante);

                    $this->visitante = $this->dao->pesquisarOnde('id', $visitante->getId())[0];
                    $this->dados['visitante'] = $this->visitante;

                    $this->retornos[] = "Visitante editado com sucesso!";
                }

                break;

            case 'cadastro':
            /* /Prepara visualização da página
              $this->visao = 'form_visitante';
              $this->dados['pagina'] = "Cadastro de Visitante";
              $this->dados['acao'] = 'salvar';
              $this->dados['disabled'] = '';

              $this->dados['cursos'] = $this->cursoDAO->pesquisarPorNome('');
              unset($this->dados['visitante']);

              //Verifica se houve ação
              if ($acao == 'salvar') {
              $visitante = new Visitante();

              $id = array_shift($_POST['id']);

              $visitante->setId($id);
              $visitante->setNome($_POST['nome']);
              $visitante->setCPF($_POST['cpf']);

              $this->dao->salvar($visitante);

              $this->visitante = $visitante;

              $this->redirecionar($this->caminhoAtual . '/visitantes/cadastro');
              }

              break;
             */
            default:
                $this->visao = 'pesquisa_visitante';
                $this->dados['pagina'] = "Lista de Visitantes";
                $this->pesquisar($acao);

                break;
        }
    }

    private function pesquisar($acao) {
        switch ($acao) {
            case 'visualizar':
                if (isset($_POST['id']) && $_POST['id'] !== '') {
                    $id = array_shift($_POST['id']);

                    $this->visitante = $this->dao->pesquisarPorId($id);

                    $this->redirecionar('visitante/visualizacao');
                }
                break;

            case 'editar':
                if (isset($_POST['id']) && $_POST['id'] !== '') {
                    $id = array_shift($_POST['id']);

                    $this->visitante = $this->dao->pesquisarPorId($id);

                    $this->dados['acao'] = 'salvar';
                    $this->dados['disabled'] = '';

                    $this->redirecionar('visitante/edicao');
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
                    $visitantes = [];
                    foreach ($usuarios as $usuario) {
                        if ($usuario->getTipoAcesso() == 'visitante') {
                            $visitantes[] = $this->dao->mudarEntidade('visitante')->pesquisarOnde('usuario', $usuario->getId())[0];
                        }
                    }
                    $this->dados['resultado'] = $visitantes;
                }  else if(!isset ($_POST['nome'])) {
                    $usuarios = $this->dao->mudarEntidade('usuario')->pesquisarLIVRE('order by id desc limit 50;', array());
                    $visitantes = [];
                    foreach ($usuarios as $usuario) {
                        if ($usuario->getTipoAcesso() == 'visitante') {
                            $visitantes[] = $this->dao->mudarEntidade('visitante')->pesquisarOnde('usuario', $usuario->getId())[0];
                        }
                    }
                    $this->dados['resultado'] = $visitantes;
                    
                } else {
                    unset($this->dados['resultado']);
                }
                break;
        }
    }

}


