<!DOCTYPE html>
<html lang="pt-BR">
    <base href="/MVC/" />
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>MVC</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>

    <body>
        <header  class="navbar-fixed">
            <nav class="blue">
                <span class="brand-logo center">Cadastro de Participante</span>
            </nav>

        </header>
        <main class="container">
            <div class="row">
                <form class="col s12" method="POST">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input type="text" class="validate" name="nome">
                            <label >Nome</label>
                        </div>

                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">assignment_ind</i>
                            <input type="text" class="validate" name="cpf">
                            <label >CPF</label>
                        </div>


                        <div class="input-field col s6">
                            <i class="material-icons prefix">phone</i>
                            <input type="text" class="validate" name="telefone" >
                            <label >Telefone</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 input-field">
                            <i class="material-icons prefix">assignment_ind</i> 
                            <label >Tipo de Acesso</label>

                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s4">
                            <input class="limited" type="radio" id="professor" value="professor" name="tipoacesso" />
                            <label for="professor" >Professor</label>

                        </div>

                        <div class="input-field col s4">
                            <input class="limited" type="radio" id="aluno" value="aluno" name="tipoacesso" />
                            <label for="aluno" >Aluno</label>

                        </div>

                        <div class="input-field col s4">
                            <input class="limited" type="radio" id="visitante" value="visitante" name="tipoacesso" checked/>
                            <label for="visitante" >Visitante</label>

                        </div>
                    </div>

                    <div id="blocoprofessor" style="display: none;">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">book</i>
                                <input type="text" class="validate" name="titulacao" >
                                <label >Titulação</label>
                            </div>
                        </div>
                    </div>


                    <div id="blocoaluno" style="display: none;">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">assignment</i>
                                <input type="text" class="validate" name="matricula" >
                                <label >Matricula</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">collections_bookmark</i>
                                <select name="curso">
                                    <option value="" disabled selected>Curso</option>
                                    <?php
                                    //exemplo em array, será substituido por consulta ao banco

                                    $cursos = array(
                                        0 => "Educação Física",
                                        1 => "ADS",
                                        2 => "Enfermagem",
                                        3 => "Fisioterapia"
                                    );

                                    if (isset($cursos) && count($cursos) > 0): foreach ($cursos as $curso):
                                            ?>
                                            <option value="<?= $curso; ?>" ><?= $curso; ?></option>
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </select>
                            </div>
                        </div>

                    </div>


                    <div class="row ">
                        <div class="col s1">
                            <button class="waves-effect blue btn" name="salvar" type="submit">salvar</button>
                        </div>


                        <div class="col s1 offset-s2 offset-l1">
                            <a href="evento" class="waves-effect white blue-text btn">Cancelar</a>
                        </div>
                    </div>


                </form>
            </div>

        </main>
        <footer>

        </footer>


        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>

    </body>
</html>
