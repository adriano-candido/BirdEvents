<main class="container">
    <div class="row">
        <form class="col s12" method="POST" name="form_usuario">
            <div class="row">
                <?php if (isset($usuario)): ?>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" class="validate" name="nome" value="<?= $usuario->getUsuario()->getNome(); ?>" <?= $disabled; ?> required>
                        <label >Nome Completo</label>
                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">assignment_ind</i>
                        <input type="text" class="validate cpf" name="cpf" value="<?= $usuario->getUsuario()->getCpf(); ?>" <?= $disabled; ?> required>
                        <label >CPF</label>
                    </div>

                    <div class="input-field col s6">
                        <i class="material-icons prefix">lock</i>
                        <input  type="text" class="validate" name="senha" value="<?= $usuario->getUsuario()->getSenha(); ?>" <?= $disabled; ?> required>
                        <label >Senha</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12 input-field">
                        <i class="material-icons prefix">assignment_ind</i> 
                        <label >Tipo de Acesso</label>
                        <input  type="text" class="validate" value="<?= $usuario->getUsuario()->getTipoAcesso(); ?>" disabled>

                    </div>
                </div>

                <?php
                switch ($usuario->getUsuario()->getTipoAcesso()) :
                    case "aluno":
                        ?> 
                        <div id="blocoaluno">
                            <div class="row">                        
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">assignment</i>
                                    <input type="text" class="validate" name="matricula"  value="<?= $usuario->getMatricula(); ?>" <?= $disabled; ?>>
                                    <label >Matricula</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">collections_bookmark</i>
                                    <select name="curso" <?= $disabled; ?>>
                                        <option value="" disabled selected>Curso</option>
                                        <?php if (isset($cursos) && count($cursos) > 0): foreach ($cursos as $curso):; ?>
                                                <?php if ($curso->getId() == $usuario->getCurso()->getId()): ?>
                                                    <option value="<?= $curso->getId(); ?>" selected><?= $curso->getNome(); ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $curso->getId(); ?>" ><?= $curso->getNome(); ?></option>

                                                <?php
                                                endif;
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>
                                    <label >Curso</label>
                                </div>
                            </div>

                        </div>

                        <?php
                        break;

                    case "professor":
                        ?> 
                        <div id="blocoprofessor">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">book</i>
                                    <select name="titulacao" id="titulacao" <?= $disabled; ?>>
                                        <option value="" <?= $disabled ?> selected>Titulação</option>
                                        <?php if (isset($titulacoes) && count($titulacoes) > 0): foreach ($titulacoes as $titulacao): ?>
                                                <?php if ($titulacao == $usuario->getTitulacao()): ?>
                                                    <option value="<?= $titulacao; ?>" selected><?= $titulacao; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $titulacao; ?>" ><?= $titulacao; ?></option>
                                                <?php
                                                endif;
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>
                                    <label >Titulação</label>
                                </div>
                            </div>

                        </div>

                        <?php
                        break;
                endswitch;
                ?>    

        </div>
        <div >
            <h5 class="grey-text text-darken-4 center">
                <i class="material-icons ">lock</i>    Permissões
            </h5>
        </div>
        <br>
        <ul class="collapsible" data-collapsible="expensive">
            <?php if (isset($permissoes) && count($permissoes) > 0): foreach ($permissoes as $index => $permissao) : ?>
                    <li>  
                        <div class="collapsible-header grey lighten-5 grey-text text-darken-4 ">
                            <input class="limited" type="checkbox" id="<?= $index; ?>" value="<?= $index; ?>" <?= $disabled; ?> />
                            <label for="<?= $index; ?>" ><strong><?= $index ?></strong></label>
                        </div>
                        <div class="collapsible-body">
                            <ul class="collection">
                                <?php foreach ($permissao as $opcao) : ?>
                                    <li class="collection-item">
                                        <input class="limited" type="checkbox" id="<?= $opcao['string']; ?>" value="<?= $opcao['string']; ?>" name="permissoes[]" <?= $disabled; ?> 
                                        <?php
                                        foreach ($permissoesVinculadas as $permissaoVinculada) :
                                            if ($permissaoVinculada == $opcao['string']) {
                                                echo 'checked';
                                                break;
                                            }
                                        endforeach;
                                        ?>
                                               />
                                        <label for="<?= $opcao['string'] ?>" ><?= str_replace("_", " ", $opcao['funcao']) ?></label>
                                    </li>
                                    <?php
                                endforeach;
                                ?>
                            </ul>
                        </div>
                    </li>
                    <?php
                endforeach;
            else:
                ?>
                <li class="collection-item">
                    <span class="title"></span>
                </li>
            <?php endif; ?>
        </ul>



        <div class="row">
            <div class="col s1">
                <input type="hidden" name="id[]" value="<?= $usuario->getId(); ?>">
                <button class="waves-effect blue btn" value="<?= $acao; ?>" name="<?= $acao; ?>" type="submit"><?= $acao; ?></button>
            </div>

        <?php else: ?>

            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" class="validate" name="nome" required>
                <label >Nome</label>
            </div>

        </div>

        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">assignment_ind</i>
                <input type="text" class="validate cpf" name="cpf" required>
                <label >CPF</label>
            </div>

            <div class="input-field col s6">
                <i class="material-icons prefix">lock</i>
                <input  type="text" class="validate" name="senha" required>
                <label >Senha</label>
            </div>
        </div>

        <div class="row">
            <div class="col s12 input-field">
                <i class="material-icons prefix">assignment_ind</i> 
                <label >Tipo de Acesso</label>

            </div>
        </div>

        <div class="row">
            <div class="input-field col s2">
                <input class="limited" type="radio" id="admin" value="admin" name="tipoacesso" checked/>
                <label for="admin" >Admin</label>

            </div>

            <div class="input-field col s3">
                <input class="limited" type="radio" id="funcionario" value="funcionario" name="tipoacesso"/>
                <label for="funcionario" >Funcionario</label>

            </div>

            <div class="input-field col s3">
                <input class="limited" type="radio" id="professor" value="professor" name="tipoacesso"/>
                <label for="professor" >Professor</label>

            </div>

            <div class="input-field col s2">
                <input class="limited" type="radio" id="aluno" value="aluno" name="tipoacesso" />
                <label for="aluno" >Aluno</label>

            </div>

            <div class="input-field col s1">
                <input class="limited" type="radio" id="visitante" value="visitante" name="tipoacesso" />
                <label for="visitante" >Visitante</label>

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
                        <?php if (isset($cursos) && count($cursos) > 0): foreach ($cursos as $curso): ?>
                                <option value="<?= $curso->getId(); ?>" ><?= $curso->getNome(); ?></option>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </select>
                    <label >Curso</label>
                </div>
            </div>

        </div>


        <div id="blocoprofessor" style="display: none;">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">book</i>
                    <select name="titulacao" id="titulacao" <?= $disabled; ?>>
                        <option value="" <?= $disabled ?> selected>Titulação</option>
                        <?php if (isset($titulacoes) && count($titulacoes) > 0): foreach ($titulacoes as $titulacao): ?>
                                <option value="<?= $titulacao; ?>" ><?= $titulacao; ?></option>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </select>
                    <label >Titulação</label>
                </div>


            </div>

        </div>
    </div>



    <div >
        <h5 class="grey-text text-darken-4 center">
            <i class="material-icons ">lock</i>    Permissões
        </h5>
    </div>
    <br>
    <ul class="collapsible" data-collapsible="expensive">
        <?php if (isset($permissoes) && count($permissoes) > 0): foreach ($permissoes as $index => $permissao) : ?>
                <li>  
                    <div class="collapsible-header grey lighten-5 grey-text text-darken-4 ">
                        <input class="limited" type="checkbox" id="<?= $index; ?>" value="<?= $index; ?>" <?= $disabled; ?> />
                        <label for="<?= $index; ?>" ><strong><?= $index ?></strong></label>
                    </div>
                    <div class="collapsible-body">
                        <ul class="collection">
                            <?php foreach ($permissao as $opcao) : ?>
                                <li class="collection-item">
                                    <input class="limited" type="checkbox" id="<?= $opcao['string']; ?>" value="<?= $opcao['string']; ?>" name="permissoes[]" <?= $disabled; ?> />
                                    <label for="<?= $opcao['string'] ?>" ><?= str_replace("_", " ", $opcao['funcao']) ?></label>
                                </li>
                                <?php
                            endforeach;
                            ?>
                        </ul>
                    </div>
                </li>
                <?php
            endforeach;
        else:
            ?>
            <li class="collection-item">
                <span class="title"></span>
            </li>
        <?php endif; ?>
    </ul>


    <div class="row">
        <div class="col s1">
            <button class="waves-effect blue btn" name="salvar" type="submit">salvar</button>
        </div>

    <?php endif; ?>
    <div class="col s1 offset-s2 offset-l1">
        <a href="usuario/pesquisa" class="waves-effect white blue-text btn">Cancelar</a>
    </div>
</div>

</form>
</div>

</main>