<main class="container">
    <div class="row">
        <form class="col s12" method="POST">
            <div class="row">
                <?php if (isset($professor)): ?>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" class="validate" name="nome" value="<?= $professor->getUsuario()->getNome(); ?>" <?= $disabled; ?>>
                        <label >Nome</label>
                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">assignment_ind</i>
                        <input type="text" class="validate cpf" name="cpf" value="<?= $professor->getUsuario()->getCPF(); ?>" disabled>
                        <label >CPF</label>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">book</i>
                            <select name="titulacao" id="titulacao" <?= $disabled; ?>>
                                <option value="" <?= $disabled ?> selected>Titulação</option>
                                <?php if (isset($titulacoes) && count($titulacoes) > 0): foreach ($titulacoes as $titulacao): ?>
                                        <?php if ($titulacao == $professor->getTitulacao()): ?>
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

                <div class="row">
                    <div class="col s1">
                        <input type="hidden" name="id[]" value="<?= $professor->getId(); ?>">
                        <button class="waves-effect blue btn" name="<?= $acao; ?>" type="submit"><?= $acao; ?></button>
                    </div>

                <?php else: ?>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" class="validate" name="nome">
                        <label >Nome</label>
                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">assignment_ind</i>
                        <input type="text" class="validate cpf" name="cpf">
                        <label >CPF</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">book</i>
                        <input type="text" class="validate" name="titulacao" >
                        <label >Titulação</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col s1">
                        <input type="hidden" name="id[]" value="0">
                        <button class="waves-effect blue btn" name="salvar" type="submit">salvar</button>
                    </div>

                <?php endif; ?>
                <div class="col s1 offset-s2 offset-l1">
                    <a href="professor/pesquisa" class="waves-effect white blue-text btn">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

</main>