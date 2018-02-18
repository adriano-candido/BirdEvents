<main class="container">
    <div class="row">
        <form class="col s12" method="POST">
            <div class="row">
                <?php if (isset($visitante)): ?>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" class="validate" name="nome" value="<?= $visitante->getUsuario()->getNome(); ?>" <?= $disabled; ?>>
                        <label >Nome Completo</label>
                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">assignment_ind</i>
                        <input type="text" class="validate cpf" name="cpf" value="<?= $visitante->getUsuario()->getCPF(); ?>" disabled>
                        <label >CPF</label>
                    </div>

                </div>


                <div class="row">
                    <div class="col s1">
                        <button class="waves-effect blue btn" name="<?= $acao; ?>" type="submit"><?= $acao; ?></button>
                    </div>

                    <div class="col s1 offset-s2 offset-l1">
                        <a href="visitante/pesquisa" class="waves-effect white blue-text btn">Cancelar</a>
                    </div>

                <?php else: ?>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" class="validate" name="nome" required>
                        <label >Nome Completo</label>
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
                    <div class="col s1">
                        <button class="waves-effect blue btn" name="salvar" type="submit">salvar</button>
                    </div>

                    <div class="col s1 offset-s2 offset-l1">
                        <a href="vitrine" class="waves-effect white blue-text btn">Cancelar</a>
                    </div>

                <?php endif; ?>

            </div>
        </form>
    </div>

</main>