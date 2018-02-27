<?php

namespace App\Controladores;

use Nucleo\Controlador;
use Nucleo\EntidadeDAO;
use App\Modelos\Curso;
use App\Modelos\Usuario;
use App\Modelos\Aluno;
use App\Modelos\Professor;
use App\Util\Util;

class ConfiguracaoControle extends Controlador {

    private $dao;

    public function __construct() {
        $this->layout = "layout_base";
        $this->dao = new EntidadeDAO(new Usuario);
    }

    public function processar($parametros) {
        //Colhe a ação do botão digitado
        $acao = Util::get_post_action('importar');

        //Colhe a pagina que deve ser apresentada
        $pagina = '';
        if (isset($parametros[1])) {
            $pagina = $parametros[1];
        }

        switch ($pagina) {

            case 'importacao':
                //Prepara visualização da página
                $this->visao = 'form_importacao';
                $this->dados['pagina'] = "Importação de arquivos";

                //Verifica se houve ação
                if ($acao == 'importar') {

                    $cabecalhoAluno = ['NOME', 'CPF', 'SENHA', 'MATRÍCULA', 'CURSO'];
                    $cabecalhoProfessor = ['NOME', 'CPF', 'SENHA', 'TITULAÇÃO'];

                    if (isset($_FILES['arquivo'])) {

                        $tipoDeArquivoPermitido = ".xml";
                        $extensão = strtolower(substr($_FILES['arquivo']['name'], strripos($_FILES['arquivo']['name'], ".")));

                        if ($extensão != $tipoDeArquivoPermitido) {
                            $this->retornos[] = "Extensão de arquivo ($extensão) inválida!";
                        } else {
                            $dom = new \DOMDocument();
                            $dom->load($_FILES['arquivo']['tmp_name']);
                            $linhas = $dom->getElementsByTagName('Row');

                            $cabecalhoMontado = $this->montaCabecalho($linhas);

                            $tipoAcesso = 'semAcesso';
                            if ($this->confereCabecalho($cabecalhoAluno, $cabecalhoMontado)) {
                                $tipoAcesso = 'aluno';
                            } elseif ($this->confereCabecalho($cabecalhoProfessor, $cabecalhoMontado)) {
                                $tipoAcesso = 'professor';
                            }

                            if ($tipoAcesso !== 'semAcesso') {
                                $dadosUsuario = [];
                                foreach ($linhas as $indexLinha => $linha) {
                                    if ($indexLinha > 0) {
                                        $celulas = $linha->getElementsByTagName('Cell');
                                        $dadosUsuario['tipoAcesso'] = $tipoAcesso;
                                        $deveCadastrar = true;
                                        foreach ($celulas as $indexCelula => $celula) {
                                            if ($celula->nodeValue == '') {
                                                $deveCadastrar = false;
                                                break;
                                            }
                                            if ($indexCelula == 0) {
                                                $dadosUsuario['nome'] = $celula->nodeValue;
                                            } else
                                            if ($indexCelula == 1) {
                                                $dadosUsuario['cpf'] = $celula->nodeValue;
                                            } else
                                            if ($indexCelula == 2) {
                                                $dadosUsuario['senha'] = $celula->nodeValue;
                                            } else
                                            if ($indexCelula == 3) {
                                                $dadosUsuario['matricula'] = $celula->nodeValue;
                                                $dadosUsuario['titulacao'] = $celula->nodeValue;
                                            } else
                                            if ($indexCelula == 4) {
                                                $dadosUsuario['curso'] = $celula->nodeValue;
                                            }
                                        }

                                        if ($deveCadastrar) {
                                            $this->cadastrar($dadosUsuario);
                                        }
                                    }
                                }
                            } else {
                                $this->retornos[] = "Arquivo inválido!";
                            }
                        }
                    }
                }
                break;
        }
    }

    private function cadastrar($dadosUsuario) {
        $cpf = $this->formataCPF($dadosUsuario['cpf']);

        if ($this->jaExisteUsuarioComEsseCPF($cpf)) {
            $this->retornos[] = "CPF : $cpf já possui cadastro.";
        } else {
            $usuarioCadastrado = $this->cadastrarUsuario($dadosUsuario['nome'], $cpf, $dadosUsuario['senha'], $dadosUsuario['tipoAcesso']);

            if ($usuarioCadastrado->getTipoAcesso() == "aluno") {
                $this->cadastrarAluno($usuarioCadastrado, $dadosUsuario['matricula'], $dadosUsuario['curso']);
            } elseif ($usuarioCadastrado->getTipoAcesso() == "professor") {
                $this->cadastrarProfessor($usuarioCadastrado, $dadosUsuario['titulacao']);
            }
        }
    }

    private function cadastrarUsuario($nome, $cpf, $senha, $tipoAcesso) {
        $usuario = new Usuario();
        $usuario->setId(0);
        $usuario->setNome($nome);
        $usuario->setCpf($cpf);
        $usuario->setSenha($senha);
        $usuario->setTipoAcesso($tipoAcesso);

        $usuario->setId($this->dao->mudarEntidade('usuario')->salvar($usuario));

        return $usuario;
    }

    private function cadastrarAluno(Usuario $usuario, $matricula, $curso) {
        $aluno = new Aluno();
        $aluno->setId(0);
        $aluno->setUsuario($usuario);
        $aluno->setMatricula($matricula);
        $aluno->setCurso($curso);

        $this->dao->mudarEntidade('aluno')->salvar($aluno);
    }

    private function cadastrarProfessor(Usuario $usuario, $titulacao) {
        $professor = new Professor();
        $professor->setId(0);
        $professor->setUsuario($usuario);
        $professor->setTitulacao($titulacao);

        $this->dao->mudarEntidade('professor')->salvar($professor);
    }

    private function jaExisteUsuarioComEsseCPF($cpf) {
        $usuariosComEsseCPF = $this->dao->mudarEntidade('usuario')->pesquisarOnde('cpf', $cpf);
        return count($usuariosComEsseCPF) > 0;
    }

    private function formataCPF($cpf) {
        $pontos = array("-", ".");
        $cpfFormatado = str_replace($pontos, "", $cpf);
        return $cpfFormatado;
    }

    private function confereCabecalho($cabecalhoModelo, $cabecalhoParaValidar) {
        $ehValido = 1;
        if (count($cabecalhoModelo) !== count($cabecalhoParaValidar)) {
            $ehValido = 0;
        } else {
            foreach ($cabecalhoModelo as $index => $campoCabecalho) {
                if ($campoCabecalho != $cabecalhoParaValidar[$index]) {
                    $ehValido = 0;
                    $this->retornos[] = "Campo Inválido - ($cabecalhoParaValidar[$index]) !";
                    break;
                }
            }
        }

        return $ehValido;
    }

    private function montaCabecalho($linhas) {
        $cabecalho = [];
        foreach ($linhas as $linha) {
            $celulas = $linha->getElementsByTagName('Cell');
            foreach ($celulas as $celula) {
                $cabecalho[] = $celula->nodeValue;
            }
            break;
        }
        return $cabecalho;
    }

}
