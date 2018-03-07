<?php

namespace App\Controladores;

use Nucleo\Controlador;
use Nucleo\EntidadeDAO;
use App\Modelos\Projeto;
use App\Modelos\Curso;
use App\Modelos\Setor;
use App\Modelos\VinculoAreaProjeto;
use App\Modelos\Login;
use App\Util\Util;

class ProjetoControle extends Controlador {

    private $projeto;
    private $dao;
    private $cursoDAO;

    public function __construct() {
        $this->layout = "layout_base";
        $this->projeto = new Projeto();
        $this->dao = new EntidadeDAO($this->projeto);
        $this->cursoDAO = new EntidadeDAO(new Curso());
    }

    public function processar($parametros) {

        //Colhe a ação do botão digitado
        $acao = Util::get_post_action('visualizar', 'editar', 'salvar', 'excluir', 'avaliar');

        //Colhe a pagina que deve ser apresentada
        $pagina = '';
        if (isset($parametros[1])) {
            $pagina = $parametros[1];
        }

        $this->dados['situacoes'] = array(
            'enviado' => 'Enviado',
            'alteracao' => 'Aguardando alteração',
            'aprovado' => 'Aprovado',
            'reprovado' => 'Reprovado'
        );

        switch ($pagina) {
            case 'visualizacao':
                //Prepara visualização da página
                $this->visao = 'detalhe_projeto_copex_1';
                $this->dados['pagina'] = "Visualização de Projeto";
                $this->dados['projeto'] = $this->projeto;
                $this->dados['cursos'] = (new EntidadeDAO(new Curso))->pesquisarPorNome('');
                $this->dados['setores'] = (new EntidadeDAO(new Setor))->pesquisarPorNome('');
                $daoVinculo = new EntidadeDAO(new VinculoAreaProjeto());
                $this->dados['areasVinculadas'] = $daoVinculo->pesquisarOnde('projeto', $this->projeto->getId());
                $this->dados['acao'] = 'editar';
                $this->dados['disabled'] = 'disabled';



                //Verifica se houve ação
                if ($acao == 'editar') {
                    $this->redirecionar('projeto/edicao');
                } elseif ($acao == 'avaliar') {
                    $obs = new \App\Modelos\Observacao();
                    $obs->setProjeto($this->projeto);
                    $obs->setUsuario(\App\Modelos\Login::getUsuario());
                    $obs->setDataPostagem(date('Y-m-d'));
                    $obs->setConteudo($_POST['observacao']);

                    $dao = new EntidadeDAO($obs);

                    $dao->salvar($obs);

                    $this->projeto->setSituacao($_POST['situacao']);
                    $this->dao->salvar($this->projeto);
                }

                $this->dados['anexos'] = (new EntidadeDAO(new \App\Modelos\Anexo()))->pesquisarOnde('projeto', $this->projeto->getId());
                $this->dados['observacoes'] = (new EntidadeDAO(new \App\Modelos\Observacao()))->pesquisarOnde('projeto', $this->projeto->getId());

                break;

            case 'edicao':
                //Prepara visualização da página
                $this->visao = 'form_projeto';
                $this->dados['pagina'] = "Edição de Projeto";
                $this->dados['projeto'] = $this->projeto;
                $this->dados['cursos'] = (new EntidadeDAO(new Curso))->pesquisarPorNome('');
                $this->dados['setores'] = (new EntidadeDAO(new Setor))->pesquisarPorNome('');
                $daoVinculo = new EntidadeDAO(new VinculoAreaProjeto());
                $this->dados['areasVinculadas'] = $daoVinculo->pesquisarOnde('projeto', $this->projeto->getId());
                $this->dados['acao'] = 'salvar';
                $this->dados['disabled'] = '';

                //Verifica se houve ação
                if ($acao == 'salvar') {
                    $projeto = $this->projeto;

                    $projeto->setNome($_POST['nome']);

                    $projeto->setTipo($_POST['tipoprojeto']);
                    $projeto->setDescricao($_POST['descricao']);
                    $projeto->setInicioOcorrencia(Util::formataDataAnoMesDia($_POST['inicioOcorrencia']));
                    $projeto->setfinalOcorrencia(Util::formataDataAnoMesDia($_POST['finalOcorrencia']));
                    if (isset($_POST['abrirInscricao'])) {
                        $projeto->setAbrirInscricao('Sim');
                        $projeto->setInicioInscricao(Util::formataDataAnoMesDia($_POST['inicioInscricao']));
                        $projeto->setFinalInscricao(Util::formataDataAnoMesDia($_POST['finalInscricao']));
                    } else {
                        $projeto->setAbrirInscricao(addslashes('Não'));
                        $projeto->setInicioInscricao('0000-00-00');
                        $projeto->setFinalInscricao('0000-00-00');
                    }
                    $projeto->setSituacao('enviado');

                    $errosAoSalvar = false;

                    #-------------------Prepara anexos---------------------------------

                    $anexos = [];

                    $documentosPermitidos = array(".doc", ".docx", ".ppt", ".pptx", ".xls", ".xlsx", ".pdf");
                    $imagensPermitidas = array(".gif", ".jpeg", ".jpg", ".png", ".bmp");



                    if ($_FILES['arquivos']['size'][0] > 0) {
                        $file;

                        for ($i = 0; $i < count($_FILES['arquivos']['name']); $i++) {
                            $file = $_FILES['arquivos'];
                            $extensão = strtolower(substr($file['name'][$i], strripos($file['name'][$i], ".")));

                            $tipo;

                            if (in_array($extensão, $documentosPermitidos)) {
                                $tipo = "/documentos/";

                                $anexo = new \App\Modelos\Anexo();
                                $anexo->setNome($file['name'][$i]);
                                $anexo->setTipo($tipo);
                                $anexo->setDataPostagem(date("Y-m-d"));

                                $anexos[$file['tmp_name'][$i]] = $anexo;
                            } else {
                                $this->retornos[] = $file['name'][$i] . " não é um arquivo válido!";
                                $errosAoSalvar = true;
                            }
                        }
                    }



                    if (($_FILES['imagem']['size'] > 0)) {
                        $imagem = $_FILES['imagem'];
                        $extensão = strtolower(substr($imagem['name'], strripos($imagem['name'], ".")));

                        $tipo;

                        if (in_array($extensão, $imagensPermitidas)) {
                            $tipo = "/imagens/";

                            $anexo = new \App\Modelos\Anexo();
                            $anexo->setNome($imagem['name']);
                            $anexo->setTipo($tipo);
                            $anexo->setDataPostagem(date("Y-m-d"));

                            $anexos[$imagem['tmp_name']] = $anexo;
                        } else {
                            $this->retornos[] = $imagem['name'] . " não é uma imagem válida!";
                            $errosAoSalvar = true;
                        }
                    }


                    if ($errosAoSalvar == false) {
                        #-----------------Salva Projeto----------------------

                        $this->dao->salvar($projeto);

                        $ultimoId = $projeto->getId();

                        $this->projeto = $projeto;

                        #-------------------Salva areas--------------------

                        $daoVinculo = new EntidadeDAO(new VinculoAreaProjeto());

                        $areasVinculadas = $daoVinculo->pesquisarOnde('projeto', $projeto->getId());

                        foreach ($areasVinculadas as $vinculo) {
                            $daoVinculo->excluir($vinculo->getId());
                        }

                        if ($projeto->getTipo() == "curso" || $projeto->getTipo() == "institucional") {
                            foreach ($_POST['curso'] as $curso) {
                                $vinculoAreaProjeto = new VinculoAreaProjeto();
                                $vinculoAreaProjeto->setId(0);
                                $vinculoAreaProjeto->setProjeto($ultimoId);
                                $vinculoAreaProjeto->setTipoArea("curso");
                                $vinculoAreaProjeto->setArea($curso);
                                $daoVinculo->salvar($vinculoAreaProjeto);
                            }
                        } else

                        if ($projeto->getTipo() == "outros") {

                            $vinculoAreaProjeto = new VinculoAreaProjeto();
                            $vinculoAreaProjeto->setId(0);
                            $vinculoAreaProjeto->setProjeto($ultimoId);
                            $vinculoAreaProjeto->setTipoArea("setor");
                            $vinculoAreaProjeto->setArea($_POST['setor']);
                            $daoVinculo->salvar($vinculoAreaProjeto);
                        }




                        #-------------------Salva anexos--------------------
                        $dao = new EntidadeDAO(new \App\Modelos\Anexo());

                        foreach ($anexos as $nomeTemp => $anexo) {
                            $anexo->setProjeto($this->projeto);

                            $pasta = 'uploads/projeto/' . md5($this->projeto->getId()) . $anexo->getTipo();

                            if (!file_exists($pasta)) {
                                mkdir($pasta, 0777, true);
                            }

                            $arquivo = $pasta . Util::tirarAcentos($anexo->getNome());

                            move_uploaded_file($nomeTemp, $arquivo);

                            $anexo->setLocalizacao($arquivo);

                            $dao->salvar($anexo);
                        }


                        #-----------------Salva Observação------------------

                        if ($_POST['observacao'] != '') {
                            $obs = new \App\Modelos\Observacao();
                            $obs->setProjeto($projeto);
                            $obs->setUsuario(\App\Modelos\Login::getUsuario());
                            $obs->setDataPostagem(date('Y-m-d'));
                            $obs->setConteudo($_POST['observacao']);

                            $dao = new EntidadeDAO($obs);

                            $dao->salvar($obs);
                        }

                        $this->retornos[] = "Projeto e anexos submetidos com sucesso!";
                    } else {
                        $this->retornos[] = "Não foi possível submeter o projeto!";
                    }
                }

                $this->dados['anexos'] = (new EntidadeDAO(new \App\Modelos\Anexo()))->pesquisarOnde('projeto', $this->projeto->getId());
                $this->dados['observacoes'] = (new EntidadeDAO(new \App\Modelos\Observacao()))->pesquisarOnde('projeto', $this->projeto->getId());


                break;


            case 'cadastro':
                //Prepara visualização da página
                $this->visao = 'form_projeto';
                $this->dados['pagina'] = "Cadastro de Projeto";
                $this->dados['acao'] = 'salvar';
                $this->dados['disabled'] = '';

                $this->dados['cursos'] = (new EntidadeDAO(new Curso))->pesquisarPorNome('');
                $this->dados['setores'] = (new EntidadeDAO(new Setor))->pesquisarPorNome('');

                unset($this->dados['projeto']);

                //Verifica se houve ação
                if ($acao == 'salvar') {

                    $projeto = new Projeto();

                    $projeto->setId(0);
                    $projeto->setNome($_POST['nome']);
                    $projeto->setTipo($_POST['tipoprojeto']);
                    $projeto->setDescricao($_POST['descricao']);
                    $projeto->setInicioOcorrencia(Util::formataDataAnoMesDia($_POST['inicioOcorrencia']));
                    $projeto->setfinalOcorrencia(Util::formataDataAnoMesDia($_POST['finalOcorrencia']));

                    if (isset($_POST['abrirInscricao'])) {
                        $projeto->setAbrirInscricao('Sim');
                        $projeto->setInicioInscricao(Util::formataDataAnoMesDia($_POST['inicioInscricao']));
                        $projeto->setFinalInscricao(Util::formataDataAnoMesDia($_POST['finalInscricao']));
                    } else {
                        $projeto->setAbrirInscricao(addslashes('Não'));
                        $projeto->setInicioInscricao('0000-00-00');
                        $projeto->setFinalInscricao('0000-00-00');
                    }
                    $projeto->setSituacao('enviado');

                    $usuario = (new EntidadeDAO(new \App\Modelos\Usuario()))->pesquisarOnde('id', \App\Modelos\Login::getUsuario()->getId())[0];

                    $projeto->setUsuario($usuario);

                    $errosAoSalvar = false;

                    #-------------------Prepara anexos---------------------------------

                    $anexos = [];

                    $documentosPermitidos = array(".doc", ".docx", ".ppt", ".pptx", ".xls", ".xlsx", ".pdf");
                    $imagensPermitidas = array(".gif", ".jpeg", ".jpg", ".png", ".bmp");

                    $file;

                    for ($i = 0; $i < count($_FILES['arquivos']['name']); $i++) {
                        $file = $_FILES['arquivos'];
                        $extensão = strtolower(substr($file['name'][$i], strripos($file['name'][$i], ".")));

                        $tipo;

                        if (in_array($extensão, $documentosPermitidos)) {
                            $tipo = "/documentos/";

                            $anexo = new \App\Modelos\Anexo();
                            $anexo->setNome($file['name'][$i]);
                            $anexo->setTipo($tipo);
                            $anexo->setDataPostagem(date("Y-m-d"));

                            $anexos[$file['tmp_name'][$i]] = $anexo;
                        } else {
                            $this->retornos[] = $file['name'][$i] . " não é um arquivo válido!";
                            $errosAoSalvar = true;
                        }
                    }

                    $imagem;
                    if (($_FILES['imagem']['size'] > 0)) {
                        $imagem = $_FILES['imagem'];
                    } else {
                        $imagem = array("name" => "img_padrao.png", "tmp_name" => "img/img_padrao.png");
                    }
                    $extensão = strtolower(substr($imagem['name'], strripos($imagem['name'], ".")));

                    $tipo;

                    if (in_array($extensão, $imagensPermitidas)) {
                        $tipo = "/imagens/";

                        $anexo = new \App\Modelos\Anexo();
                        $anexo->setNome($imagem['name']);
                        $anexo->setTipo($tipo);
                        $anexo->setDataPostagem(date("Y-m-d"));

                        $anexos[$imagem['tmp_name']] = $anexo;
                    } else {
                        $this->retornos[] = $imagem['name'] . " não é uma imagem válida!";
                        $errosAoSalvar = true;
                    }

                    if ($errosAoSalvar === false) {
                        #-----------------Salva Projeto----------------------

                        $projeto->setId($this->dao->salvar($projeto));

                        $ultimoId = $projeto->getId();

                        $this->projeto = $projeto;



                        #-------------------Salva areas--------------------

                        $daoVinculo = new EntidadeDAO(new VinculoAreaProjeto());

                        if ($projeto->getTipo() == "curso" || $projeto->getTipo() == "institucional") {
                            foreach ($_POST['curso'] as $curso) {
                                $vinculoAreaProjeto = new VinculoAreaProjeto();
                                $vinculoAreaProjeto->setId(0);
                                $vinculoAreaProjeto->setProjeto($ultimoId);
                                $vinculoAreaProjeto->setTipoArea("curso");
                                $vinculoAreaProjeto->setArea($curso);
                                $daoVinculo->salvar($vinculoAreaProjeto);
                            }
                        } else

                        if ($projeto->getTipo() == "outros") {

                            $vinculoAreaProjeto = new VinculoAreaProjeto();
                            $vinculoAreaProjeto->setId(0);
                            $vinculoAreaProjeto->setProjeto($ultimoId);
                            $vinculoAreaProjeto->setTipoArea("setor");
                            $vinculoAreaProjeto->setArea($_POST['setor']);
                            $daoVinculo->salvar($vinculoAreaProjeto);
                        }



                        #-------------------Salva anexos--------------------
                        $dao = new EntidadeDAO(new \App\Modelos\Anexo());

                        foreach ($anexos as $nomeTemp => $anexo) {
                            $anexo->setProjeto($this->projeto);

                            $pasta = 'uploads/projeto/' . md5($this->projeto->getId()) . $anexo->getTipo();

                            if (!file_exists($pasta)) {
                                mkdir($pasta, 0777, true);
                            }

                            $arquivo = $pasta . Util::tirarAcentos($anexo->getNome());


                            if (($anexo->getNome() == "img_padrao.png")) {
                                copy($nomeTemp, $arquivo);
                            } else {
                                move_uploaded_file($nomeTemp, $arquivo);
                            }
                            $anexo->setLocalizacao($arquivo);

                            $dao->salvar($anexo);
                        }


                        #-----------------Salva Observação------------------

                        if ($_POST['observacao'] != '') {
                            $obs = new \App\Modelos\Observacao();
                            $obs->setProjeto($projeto);
                            $obs->setUsuario(\App\Modelos\Login::getUsuario());
                            $obs->setDataPostagem(date('Y-m-d'));
                            $obs->setConteudo($_POST['observacao']);

                            $dao = new EntidadeDAO($obs);

                            $dao->salvar($obs);
                        }

                        $this->retornos[] = "Projeto e anexos submetidos com sucesso!";
                    } else {
                        $this->retornos[] = "Não foi possível submeter o projeto!";
                    }
                }

                break;

            default:
                $this->visao = 'pesquisa_projeto';
                $this->dados['pagina'] = "Lista de Projetos";
                $this->pesquisar($acao);


                break;
        }
    }

    private function pesquisar($acao) {
        switch ($acao) {
            case 'visualizar':
                if (isset($_POST['id']) && $_POST['id'] !== '') {
                    $id = array_shift($_POST['id']);

                    $this->projeto = $this->dao->pesquisarPorId($id);

                    $this->redirecionar('projeto/visualizacao');
                }
                break;

            case 'editar':
                if (isset($_POST['id']) && $_POST['id'] !== '') {
                    $id = array_shift($_POST['id']);

                    $this->projeto = $this->dao->pesquisarPorId($id);

                    $this->dados['acao'] = 'salvar';
                    $this->dados['disabled'] = '';

                    $this->redirecionar('projeto/edicao');
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

                if (Login::checaPermissao("Projeto.Visualização_Geral")) {
                    if (isset($_POST['nome']) && $_POST['nome'] !== '') {
                        $this->dados['resultado'] = $this->dao->pesquisarPorNome($_POST['nome']);
                    } else if (!isset($_POST['nome'])) {
                        $this->dados['resultado'] = $this->dao->pesquisarLIVRE('order by id desc limit 50 ;', array());
                    } else {
                        unset($this->dados['resultado']);
                    }
                } else {
                    $idUsuarioLogado = Login::getUsuario()->getId();

                    if (isset($_POST['nome']) && $_POST['nome'] !== '') {
                        $this->dados['resultado'] = $this->dao->pesquisarLIVRE("WHERE nome LIKE :nome AND usuario ='$idUsuarioLogado'", array("nome" => "%" . $_POST['nome'] . "%"));
                    } else if (!isset($_POST['nome'])) {
                        $this->dados['resultado'] = $this->dao->pesquisarLIVRE("WHERE usuario ='$idUsuarioLogado' order by id desc limit 50 ;", array());
                    } else {
                        unset($this->dados['resultado']);
                    }
                }


                break;
        }
    }

}
