<main class="container">
    <div class="row">
        <form class="col s12" method="POST">
            <div class="row">
                <?php if (isset($certificado)): ?>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="nome" type="text" name="nome" value="<?= $certificado->getNome(); ?>" <?= $disabled; ?>>
                        <label for="nome">Nome</label>
                    </div>



                    <div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">archive </i>
                            <input  id="caixaReferente" type="text" name="caixaReferente" value="<?= $certificado->getCaixaReferente(); ?>" <?= $disabled; ?>>
                            <label for="caixaReferente">Caixa Referente</label>
                        </div>
                    </div>

                    <?php
                    $anos = [];
                    $anoInicial = 2010;
                    for ($i = 0; $i < 21; $i++) {
                        $anos[] = $anoInicial . ".1";
                        $anos[] = $anoInicial . ".2";
                        $anoInicial++;
                    }
                    ?>

                    <div class="input-field col s6 ">
                        <i class="material-icons prefix">event</i>
                        <select name="anoExercicio" <?= $disabled; ?>>
                            <option value="" disabled selected>Ano de Exercício</option>
                            <?php foreach ($anos as $ano): ?>
                                <?php if ($ano == $certificado->getAnoExercicio()): ?>
                                    <option value="<?= $ano; ?>" selected><?= $ano; ?></option>
                                <?php else : ?>
                                    <option value="<?= $ano; ?>" ><?= $ano; ?></option>

                                <?php
                                endif;
                            endforeach;
                            ?>
                        </select>
                        <label for="anoExercicio" >Ano de Exercício</label>
                    </div>

                </div>

                <div class="row">
                    <div class="col s1">
                        <button class="waves-effect blue btn" name="<?= $acao; ?>" type="submit"><?= $acao; ?></button>
                    </div>

                <?php else: ?>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="nome" type="text" name="nome">
                        <label for="nome">Nome</label>
                    </div>


                    <div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">archive </i>
                            <input  id="caixaReferente" type="text" name="caixaReferente">
                            <label for="caixaReferente">Caixa Referente</label>
                        </div>
                    </div>

                    <div>
                        <?php
                    $anos = [];
                    $anoInicial = 2010;
                    for ($i = 0; $i < 21; $i++) {
                        $anos[] = $anoInicial . ".1";
                        $anos[] = $anoInicial . ".2";
                        $anoInicial++;
                    }
                    ?>

                        <div class="input-field col s6">
                            <i class="material-icons prefix">event</i>
                            <select name="anoExercicio" <?= $disabled; ?>>
                                <option value="" disabled selected>Ano de Exercício</option>
                                <?php foreach ($anos as $ano): ?>

                                    <option value="<?= $ano; ?>" ><?= $ano; ?></option>

                                    <?php
                                endforeach;
                                ?>
                            </select>
                            <label for="anoExercicio">Ano de Exercício</label>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col s1">
                        <button class="waves-effect blue btn" name="salvar" type="submit">salvar</button>
                    </div>

                <?php endif; ?>
                <div class="col s1 offset-s2 offset-l1">
                    <a href="certificado/pesquisa" class="waves-effect white blue-text btn">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

</main>