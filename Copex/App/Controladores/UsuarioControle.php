<?php

namespace App\Controladores;

use Nucleo\Controlador;
use Nucleo\EntidadeDAO;
use App\Modelos\Curso;
use App\Modelos\Usuario;
use App\Modelos\Aluno;
use App\Modelos\Funcionario;
use App\Modelos\Visitante;
use App\Modelos\Admin;
use App\Modelos\Professor;
use App\Modelos\VinculoUsuarioPermissao;
use App\Util\Util;

class UsuarioControle extends Controlador {

    private $usuario;
    private $dao;

    public function __construct() {
        $this->layout = "layout_base";
        $this->usuario = new Usuario();
        $this->dao = new EntidadeDAO($this->usuario);
    }

    public function processar($parametros) {

        $this->dados['cursos'] = $this->dao->mudarEntidade('curso')->pesquisarPorNome('');

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
        $permissoes = [];

        foreach (Util::$permissoes as $permissao) {
            Util::criarArrayPermissao($permissoes, $permissao);
        }

        $this->dados['permissoes'] = $permissoes;
        
        switch ($pagina) {

            case 'visualizacao':

                //Prepara visualização da página
                $this->visao = 'form_usuario';
                $this->dados['pagina'] = "Visualização de Usuário";
                $this->dados['usuario'] = $this->usuario;
                $this->dados['acao'] = 'editar';
                $this->dados['disabled'] = 'disabled';
                $this->dados['permissoesVinculadas'] = unserialize((
                        new EntidadeDAO(new VinculoUsuarioPermissao())
                        )->pesquisarOnde('usuario', $this->usuario->getUsuario()->getId())[0]->getPermissao());

                //Verifica se houve ação
                if ($acao == 'editar') {
                    $this->redirecionar('usuario/edicao');
                }

                break;

            case 'edicao':
                //Prepara visualização da página
                $this->visao = 'form_usuario';
                $this->dados['pagina'] = "Edição de Usuário";
                $this->dados['usuario'] = $this->usuario;
                $this->dados['acao'] = 'salvar';
                $this->dados['disabled'] = '';
                $this->dados['permissoesVinculadas'] = unserialize((
                        new EntidadeDAO(new VinculoUsuarioPermissao())
                        )->pesquisarOnde('usuario', $this->usuario->getUsuario()->getId())[0]->getPermissao());


                //Verifica se houve ação
                if ($acao == 'salvar') {
                    $tipoAcesso = $this->usuario->getUsuario()->getTipoAcesso();

                    $usuario = new Usuario();

                    $usuario->setId($this->usuario->getUsuario()->getId());
                    $usuario->setNome($_POST['nome']);
                    $pontos = array("-", ".");
                    $cpf = str_replace($pontos, "", $_POST['cpf']);
                    $usuario->setCpf($cpf);
                    $usuario->setSenha($_POST['senha']);
                    $usuario->setTipoAcesso($tipoAcesso);

                    $usuariosComEsseCPF = $this->dao->mudarEntidade('usuario')->pesquisarOnde('cpf', $usuario->getCpf());

                    if (count($usuariosComEsseCPF) > 0 && $usuariosComEsseCPF[0]->getCpf() != $this->usuario->getUsuario()->getCpf()) {
                        $this->retornos[] = "CPF já está cadastrado. Informe um CPF diferente";
                    } else {

                        $this->dao->mudarEntidade('usuario')->salvar($usuario);

                        #----------------------Vinculando permissões--------------

                        $daoPermissao = new EntidadeDAO(new VinculoUsuarioPermissao());
                        $vinculo = $daoPermissao->pesquisarOnde('usuario', $this->usuario->getUsuario()->getId())[0];
                            $vinculo->setPermissao(serialize($_POST['permissoes']));

                            $daoPermissao->salvar($vinculo);
                        


                        #------------ Um case para cada variação de usuário ------------------------------------

                        switch ($tipoAcesso) {
                            case 'aluno':

                                $aluno = new Aluno();

                                $aluno->setId($this->usuario->getId());
                                $aluno->setUsuario($usuario);
                                $aluno->setMatricula($_POST['matricula']);
                                $aluno->setCurso($_POST['curso']);

                                $this->dao->mudarEntidade('aluno')->salvar($aluno);

                                $aluno = $this->dao->pesquisarPorId($this->usuario->getId());

                                $this->usuario = $aluno;
                                $this->retornos[] = "Aluno editado com sucesso!";
                                break;

                            case 'professor':
                                $professor = new Professor();

                                $professor->setId($this->usuario->getId());
                                $professor->setUsuario($usuario);
                                $professor->setTitulacao($_POST['titulacao']);

                                $this->dao->mudarEntidade('professor')->salvar($professor);

                                $professor = $this->dao->pesquisarPorId($this->usuario->getId());

                                $this->usuario = $professor;
                                $this->retornos[] = "Professor editado com sucesso!";

                                break;


                            case 'admin':

                                $admin = new Admin();

                                $admin->setId($this->usuario->getId());
                                $admin->setUsuario($usuario);

                                $this->dao->mudarEntidade('admin')->salvar($admin);

                                $admin = $this->dao->pesquisarPorId($this->usuario->getId());

                                $this->usuario = $admin;
                                $this->retornos[] = "Administrador editado com sucesso!";

                                break;

                            case 'funcionario':

                                $funcionario = new Funcionario();

                                $funcionario->setId($this->usuario->getId());
                                $funcionario->setUsuario($usuario);

                                $this->dao->mudarEntidade('funcionario')->salvar($funcionario);

                                $funcionario = $this->dao->pesquisarPorId($this->usuario->getId());

                                $this->usuario = $funcionario;
                                $this->retornos[] = "Funcionário editado com sucesso!";

                                break;

                            case 'visitante':

                                $visitante = new Visitante();

                                $visitante->setId($this->usuario->getId());
                                $visitante->setUsuario($usuario);

                                $this->dao->mudarEntidade('visitante')->salvar($visitante);

                                $visitante = $this->dao->pesquisarPorId($this->usuario->getId());

                                $this->usuario = $visitante;
                                $this->retornos[] = "Visitante editado com sucesso!";

                                break;


                            default:
                                break;
                        }
                    }
                }
                $this->dados['usuario'] = $this->usuario;

                $this->dados['permissoesVinculadas'] = unserialize((
                        new EntidadeDAO(new VinculoUsuarioPermissao())
                        )->pesquisarOnde('usuario', $this->usuario->getUsuario()->getId())[0]->getPermissao());


                break;

            case 'cadastro':

                //Prepara visualização da página
                $this->visao = 'form_usuario';
                $this->dados['pagina'] = "Cadastro de Usuário";
                $this->dados['acao'] = 'salvar';
                $this->dados['disabled'] = '';
                unset($this->dados['usuario']);

                //Verifica se houve ação
                if ($acao == 'salvar') {
                    $tipoAcesso = $_POST['tipoacesso'];

                    $usuario = new Usuario();

                    $usuario->setId(0);
                    $usuario->setNome($_POST['nome']);
                    $pontos = array("-", ".");
                    $cpf = str_replace($pontos, "", $_POST['cpf']);

                    $usuario->setCpf($cpf);
                    $usuario->setSenha($_POST['senha']);
                    $usuario->setTipoAcesso($tipoAcesso);

                    $usuariosComEsseCPF = $this->dao->mudarEntidade('usuario')->pesquisarOnde('cpf', $usuario->getCpf());


                    if (count($usuariosComEsseCPF) > 0) {
                        $this->retornos[] = "CPF já está cadastrado. Informe um CPF diferente";
                    } else {
                        $usuario->setId($this->dao->mudarEntidade('usuario')->salvar($usuario));

                        $this->usuario = $usuario;

                        #----------------------Vinculando permissões--------------

                        $daoPermissao = new EntidadeDAO(new VinculoUsuarioPermissao());

                        
                            $vinculo = new VinculoUsuarioPermissao();
                            $vinculo->setUsuario($this->usuario->getId());
                            $vinculo->setPermissao(serialize($_POST['permissoes']));
                            $daoPermissao->salvar($vinculo);
                        

                        #------------ Um case para cada variação de usuário ------------------------------------

                        switch ($tipoAcesso) {
                            case 'aluno':

                                $aluno = new Aluno();

                                $aluno->setId(0);
                                $aluno->setUsuario($usuario);
                                $aluno->setMatricula($_POST['matricula']);
                                $aluno->setCurso($_POST['curso']);

                                $this->dao->mudarEntidade('aluno')->salvar($aluno);
                                $this->retornos[] = "Aluno salvo com sucesso!";

                                break;

                            case 'professor':
                                $professor = new Professor();

                                $professor->setId(0);
                                $professor->setUsuario($usuario);
                                $professor->setTitulacao($_POST['titulacao']);


                                $this->dao->mudarEntidade('professor')->salvar($professor);
                                $this->retornos[] = "Professor salvo com sucesso!";


                                break;


                            case 'admin':

                                $admin = new Admin();

                                $admin->setId(0);
                                $admin->setUsuario($usuario);

                                $this->dao->mudarEntidade('admin')->salvar($admin);
                                $this->retornos[] = "Administrador salvo com sucesso!";

                                break;

                            case 'funcionario':

                                $funcionario = new Funcionario();

                                $funcionario->setId(0);
                                $funcionario->setUsuario($usuario);

                                $this->dao->mudarEntidade('funcionario')->salvar($funcionario);
                                $this->retornos[] = "Funcionario salvo com sucesso!";

                                break;

                            case 'visitante':

                                $visitante = new Visitante();

                                $visitante->setId(0);
                                $visitante->setUsuario($usuario);

                                $this->dao->mudarEntidade('visitante')->salvar($visitante);
                                $this->retornos[] = "Visitante salvo com sucesso!";

                                break;

                            default:
                                break;
                        }
                    }
                }

                break;

            default:
                $this->visao = 'pesquisa_usuario';
                $this->dados['pagina'] = "Lista de Usuarios";
                $this->pesquisar($acao);

                break;
        }
    }

    private function pesquisar($acao) {
        switch ($acao) {
            case 'visualizar':
                if (isset($_POST['id']) && $_POST['id'] !== '') {
                    $id = array_shift($_POST['id']);

                    $tipoAcesso = $this->dao->mudarEntidade('usuario')->pesquisarPorId($id)->getTipoAcesso();

                    $this->usuario = $this->dao->mudarEntidade($tipoAcesso)->pesquisarOnde('usuario', $id)[0];

                    $this->redirecionar('usuario/visualizacao');
                }
                break;

            case 'editar':
                if (isset($_POST['id']) && $_POST['id'] !== '') {
                    $id = array_shift($_POST['id']);

                    $tipoAcesso = $this->dao->mudarEntidade('usuario')->pesquisarPorId($id)->getTipoAcesso();

                    $this->usuario = $this->dao->mudarEntidade($tipoAcesso)->pesquisarOnde('usuario', $id)[0];

                    $this->dados['acao'] = 'salvar';
                    $this->dados['disabled'] = '';

                    $this->redirecionar('usuario/edicao');
                }
                break;

            case 'excluir':
                foreach ($_POST['id'] as $id) {
                    $tipoAcesso = $this->dao->mudarEntidade('usuario')->pesquisarPorId($id)->getTipoAcesso();
                    $segundaExclusao = $this->dao->mudarEntidade($tipoAcesso)->pesquisarOnde('usuario', $id)[0]->getId();


                    $this->dao->mudarEntidade($tipoAcesso)->excluir($segundaExclusao);
                    $this->dao->mudarEntidade('usuario')->excluir($id);

                    if (isset($_POST['nome']) && $_POST['nome'] !== '') {
                        $this->dados['resultado'] = $this->dao->mudarEntidade('usuario')->pesquisarPorNome($_POST['nome']);
                    } else {
                        unset($this->dados['resultado']);
                    }
                }
                $this->retornos[] = "Usuário excluído com sucesso!";

                break;

            default:

                if (isset($_POST['nome']) && $_POST['nome'] !== '') {
                    $this->dados['resultado'] = $this->dao->mudarEntidade('usuario')->pesquisarPorNome($_POST['nome']);
                } else if (!isset($_POST['nome'])) {
                    $this->dados['resultado'] = $this->dao->mudarEntidade('usuario')->pesquisarLIVRE('order by id desc limit 50;', array());
                } else {
                    unset($this->dados['resultado']);
                }
                break;
        }
    }

}
