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
                <div class="col s1">
                    <input type="hidden" name="id[]" value="0">
                    <button class="waves-effect blue btn" name="salvar" type="submit">salvar</button>
                </div>

                <div class="col s1 offset-s2 offset-l1">
                    <a href="<?= $caminhoAtual ?>/cursos/pesquisar" class="waves-effect white blue-text btn">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

</main>