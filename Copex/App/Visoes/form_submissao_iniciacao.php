<main class="container">
    <div class="row">
        <form class="col s12" method="POST" enctype="multipart/form-data">
            <div class="row">
                <?php if (isset($submissao)): ?>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">title</i>
                        <input type="text" class="validate" name="titulo" value="<?= $submissao->getTitulo() ?>" <?= $disabled; ?> required>
                        <label >Título</label>
                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">description</i>
                        <textarea id="textarea" class="materialize-textarea" name="resumo" <?= $disabled; ?> required><?= $submissao->getResumo() ?></textarea>
                        <label for="textarea">Resumo</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" class="validate" name="autores" value="<?= $submissao->getAutores() ?>" <?= $disabled; ?> required>
                        <label >Autores</label>
                    </div>

                </div>

                <div>
                    <i class="material-icons left">picture_as_pdf</i>
                    <?=  $submissao->getTitulo(); ?>
                    <a href="<?= $submissao->getAnexo(); ?>" target="_black" class="secondary-content">
                        <i class="material-icons right">file_download</i>
                        Baixar Anexo
                    </a>
                </div>


                <div class="row">
                    <div class="col s1">
                        <button class="waves-effect blue btn" name="<?= $acao; ?>" type="submit"><?= $acao; ?></button>
                    </div>

                <?php else: ?>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">title</i>
                        <input type="text" class="validate" name="titulo" required>
                        <label >Título</label>
                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">description</i>
                        <textarea id="textarea" class="materialize-textarea" name="resumo" required></textarea>
                        <label for="textarea">Resumo</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" class="validate" name="autores" required>
                        <label >Autores</label>
                    </div>

                </div>

                <div class="row center">
                    <div class="file-field input-field col s12">
                        <div class="btn blue">
                            <span>Selecionar arquivo</span>
                            <input type="file" name="arquivo" required>
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Selecione um arquivo" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col s1">
                        <button class="waves-effect blue btn" name="salvar" type="submit">salvar</button>
                    </div>

                <?php endif; ?>
                <div class="col s1 offset-s2 offset-l1">
                    <a href="iniciacao/pesquisa" class="waves-effect white blue-text btn">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

</main>