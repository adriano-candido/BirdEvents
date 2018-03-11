<main class="container">
    <div class="row">
        <form class="col s12" method="POST">
            <div class="row">
                <?php if (isset($aluno)): ?>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" class="validate" name="nome" value="<?= $aluno->getUsuario()->getNome(); ?>" <?= $disabled; ?>>
                        <label >Nome Completo</label>
                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">assignment_ind</i>
                        <input type="text" class="validate cpf" name="cpf" value="<?= $aluno->getUsuario()->getCPF(); ?>" disabled>
                        <label >CPF</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">phone</i>
                        <input type="text" class="validate" name="matricula" value="<?= $aluno->getMatricula(); ?>" <?= $disabled; ?>>
                        <label >Matricula</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">collections_bookmark</i>
                        <select name="curso" id="curso" <?= $disabled; ?>>
                            <option value="" disabled selected>Curso</option>
                            <?php if (isset($cursos) && count($cursos) > 0): foreach ($cursos as $curso): ?>
                                    <?php if ($curso->getId() == $aluno->getCurso()->getId()): ?>
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

                <div class="row">
                    <div class="col s1">
                        <input type="hidden" name="id[]" value="<?= $aluno->getId(); ?>">
                        <button class="waves-effect blue btn" name="<?= $acao; ?>" type="submit"><?= $acao; ?></button>
                    </div>

                <?php else: ?>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" class="validate" name="nome">
                        <label >Nome Completo</label>
                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">assignment_ind</i>
                        <input type="text" class="validate cpf" name="cpf">
                        <label >CPF</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">phone</i>
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
                                    <option value="<?= $curso->getNome(); ?>" ><?= $curso->getNome(); ?></option>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </select>
                        <label >Curso</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col s1">
                        <input type="hidden" name="id[]" value="0">
                        <button class="waves-effect blue btn" name="salvar" type="submit">salvar</button>
                    </div>

                <?php endif; ?>
                <div class="col s1 offset-s2 offset-l1">
                    <a href="aluno/pesquisa" class="waves-effect white blue-text btn">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

</main>