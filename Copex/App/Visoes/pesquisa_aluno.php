<main class="container">

    <form method="POST" class="card row">
        <br>
        <div class="input-field col s8 offset-s1">
            <input  id="inp_pesquisar" type="text" class="validate" name="nome">
            <label for="inp_pesquisar">Pesquisar</label>
        </div>
        <button class="waves-effect btn-flat btn-large col s2" name="pesquisar"><i class="material-icons ">search</i></button>
    </form>

    <form method="POST">
        <ul class="collection"style="max-height: 300px; overflow-y: scroll">
            <?php if (isset($resultado) && count($resultado) > 0): foreach ($resultado as $aluno): ?>
                    <li class="collection-item ">
                        <input class="limited" type="checkbox" id="<?= $aluno->getId() ?>" value="<?= $aluno->getId() ?>" name="id[]"/>
                        <label for="<?= $aluno->getId() ?>" ><?= $aluno->getUsuario()->getNome() ?></label>
                        <span class="secondary-content">CPF: <span class="cpf"><?= $aluno->getUsuario()->getCpf() ?></span></span>

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

        <?php if (\App\Modelos\Login::checaPermissao("Aluno.Visualização")): ?>
            <button id="visualizar" class="btn waves-effect waves-light" type="submit" name="visualizar" title="Visualizar" disabled="">
                <i class="material-icons">visibility</i>
            </button>
        <?php endif; ?>
        <?php if (\App\Modelos\Login::checaPermissao("Aluno.Edicão")): ?>

            <button id="editar" class="btn waves-effect waves-light" type="submit" name="editar" title="Editar" disabled="">
                <i class="material-icons">edit</i>
            </button>

        <?php endif; ?>
    </form> 

</main>
