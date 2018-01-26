<?php

namespace App\Controladores;

use Nucleo\Controlador;
use Nucleo\EntidadeDAO;
use App\Modelos\Certificado;
use App\Modelos\Login;
use App\Modelos\VinculoCertificadoUsuario;
use App\Util\Util;

class CertificadoControle extends Controlador {

    private $certificado;
    private $dao;

    public function __construct() {
        $this->layout = "layout_base";
        $this->certificado = new Certificado();
        $this->dao = new EntidadeDAO($this->certificado);
    }

    public function processar($parametros) {
        //Colhe a ação do botão digitado
        $acao = Util::get_post_action(
                        'visualizar', 'editar', 'salvar', 'excluir', 'vincular', 'desvincular', 'vinculados', 'entregar', 'pesquisar_certificados', 'pesquisar_usuarios', 'pesquisar_por_usuario'
        );

        //Colhe a pagina que deve ser apresentada
        $pagina = '';
        if (isset($parametros[1])) {
            $pagina = $parametros[1];
        }
        switch ($pagina) {
            case 'visualizacao':
                //Prepara visualização da página
                $this->visao = 'form_certificado';
                $this->dados['pagina'] = "Visualização de Certificado";
                $this->dados['certificado'] = $this->certificado;
                $this->dados['acao'] = 'editar';
                $this->dados['disabled'] = 'disabled';

                //Verifica se houve ação
                if ($acao == 'editar') {
                    $this->redirecionar('certificado/edicao');
                }

                break;

            case 'edicao':
                //Prepara visualização da página
                $this->visao = 'form_certificado';
                $this->dados['pagina'] = "Edição de Certificado";
                $this->dados['certificado'] = $this->certificado;
                $this->dados['acao'] = 'salvar';
                $this->dados['disabled'] = '';

                //Verifica se houve ação
                if ($acao == 'salvar') {
                    $certificado = new Certificado();

                    $certificado->setId($this->certificado->getId());
                    $certificado->setNome($_POST['nome']);
                    $certificado->setCaixaReferente($_POST['caixaReferente']);
                    $certificado->setAnoExercicio($_POST['anoExercicio']);

                    $this->dao->salvar($certificado);

                    $this->certificado = $certificado;
                    $this->dados['certificado'] = $this->certificado;

                    $this->retornos[] = "Certificado editado com sucesso!";
                }

                break;

            case 'cadastro':
                //Prepara visualização da página
                $this->visao = 'form_certificado';
                $this->dados['pagina'] = "Cadastro de Certificado";
                $this->dados['acao'] = 'salvar';
                $this->dados['disabled'] = '';
                unset($this->dados['certificado']);

                //Verifica se houve ação
                if ($acao == 'salvar') {
                    $certificado = new Certificado();

                    $certificado->setId(0);
                    $certificado->setNome($_POST['nome']);
                    $certificado->setCaixaReferente($_POST['caixaReferente']);
                    $certificado->setAnoExercicio($_POST['anoExercicio']);

                    $this->dao->salvar($certificado);

                    $this->certificado = $certificado;

                    $this->retornos[] = "Certificado cadastrado com sucesso!";
                }

                break;

            case 'pesquisa_por_usuario':
                $this->visao = 'pesquisa_certificado_por_usuario';
                $this->dados['pagina'] = "Lista de Certificados por Usuario";
                $this->pesquisar($acao);

                break;

            case 'vincular_certificados':
                $this->visao = 'vincular_certificado';
                $this->dados['pagina'] = "Vincular Certificados";

                $dao = new EntidadeDAO($this->certificado);

                if (!isset($_POST['nome_usuario']) && !isset($_POST['nome_certificado'])) {

                    $this->dados['certificadosDisponiveis'] = $dao->mudarEntidade('certificado')->pesquisarLIVRE('order by id desc limit 50;', array()); #unset($this->dados['certificadosDisponiveis']);
                    $this->dados['usuarios'] = $dao->mudarEntidade('usuario')->pesquisarLIVRE('order by id desc limit 50;', array());
                }
                //Verifica se houve ação
                switch ($acao) {
                    case 'pesquisar_certificados':
                        if (isset($_POST['nome_certificado']) && $_POST['nome_certificado'] !== '') {
                            $this->dados['certificadosDisponiveis'] = $dao->mudarEntidade('certificado')->pesquisarPorNome($_POST['nome_certificado']);
                        } else {
                            $this->dados['certificadosDisponiveis'] = $dao->mudarEntidade('certificado')->pesquisarLIVRE('order by id desc limit 50;', array()); #unset($this->dados['certificadosDisponiveis']);
                        }
                        break;

                    case 'pesquisar_usuarios':
                        if (isset($_POST['nome_usuario']) && $_POST['nome_usuario'] !== '') {
                            $this->dados['usuarios'] = $dao->mudarEntidade('usuario')->pesquisarPorNome($_POST['nome_usuario']);
                        } else {
                            $this->dados['usuarios'] = $dao->mudarEntidade('usuario')->pesquisarLIVRE('order by id desc limit 50;', array()); #unset($this->dados['usuarios']);
                        }
                        break;

                    case 'vincular':
                        $daoVinc = new EntidadeDAO(new VinculoCertificadoUsuario());
                        $daoUsuario = new EntidadeDAO(new \App\Modelos\Usuario());
                        $daoAluno = new EntidadeDAO(new \App\Modelos\Aluno());


                        if (isset($_POST['idCertificado']) && isset($_POST['idsUsuarios'])) {

                            $usuarios = $daoUsuario->pesquisarIN('id', $_POST['idsUsuarios']);

                            if (count($usuarios) > 0) {

                                foreach ($usuarios as $usuario) {
                                    $vinculos = $daoVinc->pesquisarOnde('usuario', $usuario->getId());

                                    $devoSalvar = true;

                                    foreach ($vinculos as $v) {
                                        if ($v->getCertificado() == $_POST['idCertificado']) {
                                            $devoSalvar = false;
                                            break;
                                        }
                                    }

                                    if ($devoSalvar) {
                                        $vinculo = new VinculoCertificadoUsuario();
                                        $vinculo->setId(0);
                                        $vinculo->setCertificado($_POST['idCertificado']);
                                        $vinculo->setUsuario($usuario->getId());
                                        $vinculo->setSituacao("Não Entregue");

                                        $daoVinc->salvar($vinculo);
                                        $this->retornos[] = 'Usuário ' . $usuario->getNome() . ' vinculado com sucesso!';
                                    } else {
                                        $this->retornos[] = 'O usuário ' . $usuario->getNome() . ' já estava vinculado.';
                                    }
                                }
                            } else {
                                $this->retornos[] = 'Não encontrado usuário correspondente';
                            }
                        } else if (isset($_FILES['arquivo']) && ($_FILES['arquivo']['name'] != '')) {

                            $dom = new \DOMDocument();
                            $dom->load($_FILES['arquivo']['tmp_name']);
                            $linhas = $dom->getElementsByTagName('Row');
                            foreach ($linhas as $linha) {
                                $celulas = $linha->getElementsByTagName('Cell');
                                foreach ($celulas as $index => $celula) {

                                    if (isset($_POST['tipoVinculo'])) {
                                        if ($_POST['tipoVinculo'] == 'matricula') {
                                            $alunos = $daoAluno->pesquisarOnde('matricula', $celula->nodeValue);
                                            if (count($alunos) > 0) {

                                                $vinculos = $daoVinc->pesquisarOnde('usuario', $alunos[0]->getUsuario()->getId());

                                                $devoSalvar = true;

                                                foreach ($vinculos as $v) {
                                                    if ($v->getCertificado() == $_POST['idCertificado']) {
                                                        $devoSalvar = false;
                                                        break;
                                                    }
                                                }

                                                if ($devoSalvar) {
                                                    $vinculo = new VinculoCertificadoUsuario();
                                                    $vinculo->setId(0);
                                                    $vinculo->setCertificado($_POST['idCertificado']);
                                                    $vinculo->setUsuario($alunos[0]->getUsuario()->getId());
                                                    $vinculo->setSituacao("Não Entregue");

                                                    $daoVinc->salvar($vinculo);
                                                } else {
                                                    $this->retornos[] = 'O aluno de Matrícula : ' . $celula->nodeValue . ' já estava vinculado.';
                                                }
                                            } else {
                                                $this->retornos[] = 'Não encontrado aluno correspondente para o Matrícula : ' . $celula->nodeValue;
                                            }
                                        } else if ($_POST['tipoVinculo'] == 'cpf') {
                                            $usuarios = $daoUsuario->pesquisarOnde('cpf', $celula->nodeValue);
                                            if (count($usuarios) > 0) {

                                                $vinculos = $daoVinc->pesquisarOnde('usuario', $usuarios[0]->getId());

                                                $devoSalvar = true;

                                                foreach ($vinculos as $v) {
                                                    if ($v->getCertificado() == $_POST['idCertificado']) {
                                                        $devoSalvar = false;
                                                        break;
                                                    }
                                                }

                                                if ($devoSalvar) {
                                                    $vinculo = new VinculoCertificadoUsuario();
                                                    $vinculo->setId(0);
                                                    $vinculo->setCertificado($_POST['idCertificado']);
                                                    $vinculo->setUsuario($usuarios[0]->getId());
                                                    $vinculo->setSituacao("Não Entregue");

                                                    $daoVinc->salvar($vinculo);
                                                } else {
                                                    $this->retornos[] = 'O usuário de CPF : ' . $celula->nodeValue . ' já estava vinculado.';
                                                }
                                            } else {
                                                $this->retornos[] = 'Não encontrado usuário correspondente para o CPF : ' . $celula->nodeValue;
                                            }
                                        }
                                    }
                                }
                            }
                        }


                        break;
                }
                break;

            case 'vinculados':
                //Prepara visualização da página


                $this->visao = 'usuarios_vinculados';
                $this->dados['pagina'] = $this->certificado->getNome();
                $this->dados['certificado'] = $this->certificado;

                $daoVinc = new EntidadeDAO(new VinculoCertificadoUsuario());
                $daoUsuario = new EntidadeDAO(new \App\Modelos\Usuario());

                $vinculos = $daoVinc->pesquisarOnde('certificado', $this->certificado->getId());

                $usuariosVinculados = [];

                foreach ($vinculos as $vinculo) {
                    $usuariosVinculados[] = $daoUsuario->pesquisarOnde('id', $vinculo->getUsuario())[0];
                }

                if (count($usuariosVinculados) > 0) {
                    $this->dados['usuariosVinculados'] = $usuariosVinculados;
                }


                //Verifica se houve ação
                if ($acao == 'desvincular') {
                    if (isset($_POST['idsUsuarios'])) {
                        $vinculosParaExcluir = $daoVinc->pesquisarOnde('certificado', $this->certificado->getId());
                        foreach ($_POST['idsUsuarios'] as $id) {
                            foreach ($vinculosParaExcluir as $vinc) {
                                if ($vinc->getUsuario() == $id) {
                                    $daoVinc->excluir($vinc->getId());
                                }
                            }
                        }
                    }
                    unset($this->dados['usuariosVinculados']);
                    $this->redirecionar('certificado/vinculados');
                }

                break;

            default:
                $this->visao = 'pesquisa_certificado';
                $this->dados['pagina'] = "Lista de Certificados";
                $this->pesquisar($acao);

                break;
        }
    }

    private function pesquisar($acao) {

        switch ($acao) {
            case 'visualizar':
                if (isset($_POST['id']) && $_POST['id'] !== '') {
                    $id = array_shift($_POST['id']);

                    $this->certificado = $this->dao->pesquisarPorId($id);

                    $this->redirecionar('certificado/visualizacao');
                }
                break;

            case 'editar':
                if (isset($_POST['id']) && $_POST['id'] !== '') {
                    $id = array_shift($_POST['id']);

                    $this->certificado = $this->dao->pesquisarPorId($id);

                    $this->dados['acao'] = 'salvar';
                    $this->dados['disabled'] = '';

                    $this->redirecionar('certificado/edicao');
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
                $this->retornos[] = "Certificado excluído com sucesso!";

                break;

            case 'pesquisar_por_usuario':

                $d = new EntidadeDAO(new \App\Modelos\Usuario());
                if (isset($_POST['nome']) && $_POST['nome'] !== '') {
                    $usuarios = $d->pesquisarPorNome($_POST['nome']);

                    if (count($usuarios) > 0) {

                        $this->dados['usuarios'] = $usuarios;

                        $idCertificados = [];


                        foreach ($usuarios as $usuario) {
                            $d->mudarEntidade('vinculocertificadousuario');
                            $vinculos = $d->pesquisarOnde('usuario', $usuario->getId());

                            if (count($vinculos) > 0) {
                                foreach ($vinculos as $vinculo) {
                                    $idCertificados[] = $vinculo->getCertificado();
                                }

                                $d->mudarEntidade('certificado');
                                $certificados = $d->pesquisarIN('id', $idCertificados);
                                unset($idCertificados);

                                $this->dados['certificados'][$usuario->getId()] = $certificados;
                                $this->dados['vinculos'][$usuario->getId()] = $vinculos;
                            }
                        }
                    } else {
                        unset($this->dados['usuarios']);
                    }
                } else {
                    unset($this->dados['usuarios']);
                }

                break;

            case 'entregar':

                $d = new EntidadeDAO(new VinculoCertificadoUsuario());

                $vinculosDoUsuario = $d->pesquisarOnde('usuario', $_POST['idUsuario']);

                $entregues = isset($_POST['entregues']) ? $_POST['entregues'] : [];

                foreach ($vinculosDoUsuario as $vinculo) {

                    if (in_array($vinculo->getId(), $entregues)) {
                        $vinculo->setSituacao('Entregue');
                    } else {
                        $vinculo->setSituacao('Não Entregue');
                    }
                    $d->salvar($vinculo);
                }

                $usuario = $d->mudarEntidade('usuario')->pesquisarPorId($_POST['idUsuario']);
                $_POST['nome'] = $usuario->getNome();
                $this->pesquisar('pesquisar_por_usuario');

                break;

            case 'vinculados':
                if (isset($_POST['id']) && $_POST['id'] !== '') {
                    $id = array_shift($_POST['id']);

                    $this->certificado = $this->dao->pesquisarPorId($id);

                    $this->redirecionar('certificado/vinculados');
                }
                break;

            default:

                if (Login::checaPermissao("Certificado.Visualização_Geral")) {
                    if (isset($_POST['nome']) && $_POST['nome'] !== '') {
                        $certificadosComEsseNome = $this->dao->pesquisarPorNome($_POST['nome']);
                        $certificadosComEsseAno = $this->dao->pesquisarOnde('anoExercicio', $_POST['nome']);
                        $this->dados['resultado'] = array_merge($certificadosComEsseNome, $certificadosComEsseAno);
                    } else if (!isset($_POST['nome'])) {
                        $this->dados['resultado'] = $this->dao->pesquisarLIVRE('order by id desc limit 50;', array());
                    } else {
                        unset($this->dados['resultado']);
                    }
                        
                } else {

                    $daoVinculo = new EntidadeDAO(new VinculoCertificadoUsuario);
                    $vinculos = $daoVinculo->pesquisarOnde('usuario', Login::getUsuario()->getId());

                    if (count($vinculos) > 0) {
                        foreach ($vinculos as $vinculo) {
                            $idCertificados[] = $vinculo->getCertificado();
                        }

                        $daoVinculo->mudarEntidade('certificado');
                        $certificados = $daoVinculo->pesquisarIN('id', $idCertificados);
                        unset($idCertificados);

                        $this->dados['vinculosDesseUsuario'] = $vinculos;
                        $this->dados['resultado'] = [];

                        if (isset($_POST['nome']) && $_POST['nome'] !== '') {
                            foreach ($certificados as $certificado) {
                                if (strpos($certificado->getNome(), $_POST['nome']) > -1 || $certificado->getAnoExercicio() == $_POST['nome']) {
                                    $this->dados['resultado'][] = $certificado;
                                }
                            }
                        } else if (!isset($_POST['nome'])) {
                            $this->dados['resultado'] = $certificados;
                        } else {
                            unset($this->dados['resultado']);
                        }
                    }
                }
                #----------------------
                break;
        }
    }

}
