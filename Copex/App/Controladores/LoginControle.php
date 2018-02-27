<?php

namespace App\Controladores;

use Nucleo\Controlador;
use App\Modelos\Login;
use App\Util\Util;

class LoginControle extends Controlador {

    public function __construct() {
        $this->visao = "form_login";
        $this->layout = "layout_base";
    }

    public function processar($parametros) {
        $this->visao = "";

//Colhe a ação do botão clicado
        $acao = Util::get_post_action('logar', 'sair');

        if ($acao == 'sair') {
            Login::sair();
            $this->redirecionar('vitrine');
        }

//Verifica se houve ação
        if ($acao == 'logar') {

            if (isset($_POST["cpf"]) && isset($_POST["senha"])) {
                $pontos = array("-", ".");
                $cpf = str_replace($pontos, "", $_POST['cpf']);
                $logou = Login::logar($cpf, $_POST["senha"]);

                if ($logou) {
                    $this->redirecionar("vitrine");
                } else {
                    echo "<script> "
                    . "alert('Usuário ou senha inválidos!');"
                    . "window.location.href = 'vitrine';"
                    . "</script>";
                }
            }
        }
    }

    public static function retornaNavPorAcesso() {
        $acesso = "";

        if (\App\Modelos\Login::getUsuario() != null) {
            $acesso = \App\Modelos\Login::getUsuario()->getTipoAcesso();
        }

        if ($acesso != "") :

            $permissoes = [];
            $permissoesUsuario = Login::getPermissoesUsuario();

            for ($index = 0 ; $index < count($permissoesUsuario); $index++) {//for ($index = count($permissoesUsuario) - 1; $index >= 0; $index--) {
                $string = $permissoesUsuario[$index];
                Util::criarArrayPermissao($permissoes, $string);
            }
            ?> 
            <ul id="slide-out" class="collapsible side-nav" data-collapsible="accordion">
                <li>
                    <div class="center" >
                        <h2 class="icon-block"><i class="material-icons">group</i> </h2>
                        <span><?= \App\Modelos\Login::getUsuario()->getNome(); ?></span>
                    </div>
                </li>

                <li class="bold ">
                    <a href="<?= \App\Util\Util::getBaseURL() . 'vitrine' ?>" class="collapsible-header waves-effect blue-text">
                        <i class="material-icons"><?= Util::$icones['Home'] ?></i>Início</a>
                </li>

                <?php foreach ($permissoes as $index => $permissao) : ?>

                    <li class="bold ">
                        <a class="collapsible-header waves-effect blue-text">
                            <i class="material-icons"><?= Util::$icones[$index] ?></i><?= $index ?></a>
                        <ul class="collapsible-body">
                            <?php foreach ($permissao as $opcao) : ?>
                                <?php if ($opcao['mostrar'] == 1) : ?>
                                    <li><a href="<?= \App\Util\Util::getBaseURL() . strtolower(Util::tirarAcentos($index . "/" . $opcao['funcao'])) ?>"><?= str_replace("_", " ", $opcao['funcao']) ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </li>

                <?php endforeach; ?>

                <li class="bold ">
                    <form method="POST" action="<?= \App\Util\Util::getBaseURL() . 'login' ?>">
                        <a class="collapsible-header waves-effect blue-text"><i class="material-icons">power_settings_new</i>

                            <button class="collapsible-header waves-effect blue-text" type="submit" name="sair" >
                                sair
                            </button>
                        </a>
                    </form>
                </li>
            </ul>

            <?php
        else :
            ?>

            <ul id="slide-out" class="side-nav collapsible" data-collapsible="accordion">

                <li class="container">
                    <form method="POST" id="formLogin" action="<?= \App\Util\Util::getBaseURL() . 'login' ?>">
                        <div class="center row" >
                            <h2 class="icon-block"><i class="material-icons">group</i> </h2>
                            <span>Efetue Login</span>
                            <br>
                        </div>
                        <div class="row" >
                            <div class="input-field col s12">
                                <i class="material-icons prefix" >account_circle</i>
                                <input class="cpf" id="cpf" type="text" name="cpf" required="true">
                                <label for="cpf">CPF</label>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="input-field col s12">
                                <i class="material-icons prefix" >lock</i>
                                <input id="senha" type="password" name="senha"  required="true">
                                <label for="senha">Senha</label>
                            </div>
                        </div>

                        <div class="center">
                            <button class="btn waves-effect waves-light"  id="btLogar" name="logar" >Logar</button>
                        </div>


                    </form>
                    <div class="center">
                    <a href="visitante/cadastro">Cadastre-se</a>
                    </div>
                </li>

            </ul>


        <?php
        endif;
    }

}
