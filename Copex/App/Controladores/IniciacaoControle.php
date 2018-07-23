<?php

namespace App\Controladores;

use Nucleo\Controlador;
use Nucleo\EntidadeDAO;
use App\Modelos\SubmissaoIniciacao;
use App\Util\Util;

class IniciacaoControle extends Controlador {

    private $submissaoIniciacao;
    private $dao;

    public function __construct() {
        $this->layout = "layout_base";
        $this->submissaoIniciacao = new SubmissaoIniciacao();
        $this->dao = new EntidadeDAO($this->submissaoIniciacao);
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
                $this->visao = 'form_submissao_iniciacao';
                $this->dados['pagina'] = "Visualização de Submissão para Iniciação";
                $this->dados['submissao'] = $this->submissaoIniciacao;
                $this->dados['acao'] = 'editar';
                $this->dados['disabled'] = 'disabled';

                //Verifica se houve ação
                if ($acao == 'editar') {
                    $this->redirecionar('iniciacao/edicao');
                }

                break;

            case 'edicao':
                //Prepara visualização da página
                $this->visao = 'form_submissao_iniciacao';
                $this->dados['pagina'] = "Edição de Submissão para Iniciação";
                $this->dados['submissao'] = $this->submissaoIniciacao;
                $this->dados['acao'] = 'salvar';
                $this->dados['disabled'] = '';

                //Verifica se houve ação
                if ($acao == 'salvar') {
                    $submissao = new SubmissaoIniciacao();

                    $submissao->setId($this->submissaoIniciacao->getId());
                    $submissao->setTitulo($_POST['titulo']);
                    $submissao->setResumo($_POST['resumo']);
                    $submissao->setAutores($_POST['autores']);

                    #pega o anexo e coloca na pasat iniciacao/idIniciacao

                    $this->dao->salvar($submissao);

                    $this->submissaoIniciacao = $submissao;
                    $this->dados['submissao'] = $this->submissaoIniciacao;

                    $this->retornos[] = "Submissão editada com sucesso!";
                }

                break;

            case 'cadastro':
                //Prepara visualização da página
                $this->visao = 'form_submissao_iniciacao';
                $this->dados['pagina'] = "Cadastro de Submissão para Iniciação";
                $this->dados['acao'] = 'salvar';
                $this->dados['disabled'] = '';
                unset($this->dados['submissao']);

                //Verifica se houve ação
                if ($acao == 'salvar') {
                    $submissao = new SubmissaoIniciacao();
                    $id = 0;
                    $submissao->setId($id);
                    $submissao->setTitulo($_POST['titulo']);
                    $submissao->setResumo($_POST['resumo']);
                    $submissao->setAutores($_POST['autores']);

                    #___________________________________________

                    $errosAoSalvar = false;
                    if (($_FILES['arquivo']['size'] > 0)) {
                        $arquivo = $_FILES['arquivo'];
                        $extensão = strtolower(substr($arquivo['name'], strripos($arquivo['name'], ".")));

                        if (strtolower($extensão) != ".pdf") {
                            $this->retornos[] = $arquivo['name'] . " não é um arquivo válido! <br>Apenas o formato pdf é aceito.";
                            $errosAoSalvar = true;
                        }

                        if ($errosAoSalvar == false) {

                            $pasta = 'iniciacao\\' . date('Y') . '\\';

                            if (!file_exists($pasta)) {
                                mkdir($pasta, 0777, true);
                            }

                            $anexo = $pasta . date("m-d-h-i-s") . '_' . Util::tirarAcentos($arquivo['name']);

                            if (move_uploaded_file($arquivo['tmp_name'], $anexo) == false) {
                                $errosAoSalvar = true;
                            }
                            
                            $submissao->setAnexo($anexo);
                        }
                        
                    }
                    #_______________________________________________


                    if ($errosAoSalvar == false) {
                        $this->dao->salvar($submissao);

                        $this->submissaoIniciacao = $submissao;
                        $this->dados['submissao'] = $this->submissaoIniciacao;

                        $this->retornos[] = "Submissão cadastrada com sucesso!";
                    } 
                }

                break;

            default:
                $this->visao = 'pesquisa_submissao_iniciacao';
                $this->dados['pagina'] = "Lista de Submissões para Iniciação";
                $this->pesquisar($acao);

                break;
        }
    }

    private function pesquisar($acao) {
        switch ($acao) {
            case 'visualizar':
                if (isset($_POST['index']) && $_POST['index'] !== '') {
                    $index = array_shift($_POST['index']);

                    $submissaoSelecionada = $this->dados['resultado'][$index];

                    $this->submissaoIniciacao = $this->dao->pesquisarPorId($submissaoSelecionada->getId());

                    $this->redirecionar('iniciacao/visualizacao');
                }
                break;

            case 'editar':
                if (isset($_POST['index']) && $_POST['index'] !== '') {
                    $index = array_shift($_POST['index']);

                    $submissaoSelecionada = $this->dados['resultado'][$index];

                    $this->submissaoIniciacao = $this->dao->pesquisarPorId($submissaoSelecionada->getId());

                    $this->dados['acao'] = 'salvar';
                    $this->dados['disabled'] = '';

                    $this->redirecionar('iniciacao/edicao');
                }
                break;

            case 'excluir':
                foreach ($_POST['index'] as $index) {
                    $this->dao->excluir($index);
                    if (isset($_POST['titulo']) && $_POST['titulo'] !== '') {
                        $this->dados['resultado'] = $this->dao->pesquisarPorNome($_POST['titulo']);
                    } else {
                        unset($this->dados['resultado']);
                    }
                }
                $this->retornos[] = "Submissão excluída com sucesso!";

                break;

            default:
                if (isset($_POST['titulo']) && $_POST['titulo'] !== '') {
                    $this->dados['resultado'] = $this->dao->pesquisarLIVRE(
                                'where titulo like :titulo order by id desc',
                                array('titulo' => '%' . $_POST['titulo'] . '%')
                            );
                } else if (!isset($_POST['titulo'])) {
                    $this->dados['resultado'] = $this->dao->pesquisarLIVRE('order by id desc limit 50;', array());
                } else {
                    unset($this->dados['resultado']);
                }
                break;
        }
    }

}
