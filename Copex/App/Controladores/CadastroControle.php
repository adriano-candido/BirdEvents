<?php

namespace App\Controladores;

use Nucleo\Controlador;
use App\Util\Util;

class CadastroControle extends Controlador {

    public function __construct() {
        $this->visao = 'form_participante';        
        $this->layout = "layout_base";
    }

    public function processar($parametros) {

        //Colhe a ação do botão digitado
        $acao = Util::get_post_action('salvar');

        if ($acao == "salvar") {
            $tipoAcesso = isset($_POST['tipoacesso']) ? $_POST['tipoacesso'] : "nada";

            $nome = isset($_POST['nome']) ? $_POST['nome'] : "nada";
            $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "nada";
            $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : "nada";

            switch ($tipoAcesso) {
                case 'aluno':
                    $matricula = isset($_POST['matricula']) ? $_POST['matricula'] : "nada";
                    $curso = isset($_POST['curso']) ? $_POST['curso'] : "nada";

                    echo " 'aluno cadastrado com sucesso <br>  " .
                    "nome: " . $nome . "    <br>  " .
                    "cpf: " . $cpf . "  <br>  " .
                    "telefone: " . $telefone . "  <br>  " .
                    "matricula: " . $matricula . "  <br>  " .
                    "curso: " . $curso ;
                    break;

                case 'professor':
                    $titulacao = isset($_POST['titulacao']) ? $_POST['titulacao'] : "nada";

                    echo "professor cadastrado com sucesso <br>  " .
                    "nome: " . $nome . "    <br>  " .
                    "cpf: " . $cpf . "  <br>  " .
                    "telefone: " . $telefone . "  <br>  " .
                    "titulacao: " . $titulacao;

                    break;

                case 'visitante':
                    echo "visitante cadastrado com sucesso <br>  " .
                    "nome: " . $nome . "    <br>  " .
                    "cpf: " . $cpf . "  <br>  " .
                    "telefone: " . $telefone;

                    break;

                default:
            }
        }
    }

}
