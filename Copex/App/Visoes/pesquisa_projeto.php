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
        <ul class="collection" style="max-height: 300px; overflow-y: scroll">
            <?php if (isset($resultado) && count($resultado) > 0): foreach ($resultado as $projeto): ?>
                    <li class="collection-item">
                        <input class="limited" type="checkbox" id="<?= $projeto->getId() ?>" value="<?= $projeto->getId() ?>" name="id[]"/>
                        <label for="<?= $projeto->getId() ?>" ><?= $projeto->getNome() ?></label>
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

        <?php if (\App\Modelos\Login::checaPermissao("Projeto.Visualização")): ?> 
            <button id="visualizar" class="btn waves-effect waves-light" type="submit" name="visualizar" disabled="">
                <i class="material-icons">visibility</i>
            </button>
        <?php endif; ?>
        <?php if (\App\Modelos\Login::checaPermissao("Projeto.Edição")): ?> 
            <button id="editar" class="btn waves-effect waves-light" type="submit" name="editar" disabled="">
                <i class="material-icons">edit</i>
            </button>
        <?php endif; ?>
        <?php if (\App\Modelos\Login::checaPermissao("Projeto.Exclusão")): ?> 
            <button id="excluir" class="btn waves-effect waves-light" type="submit" name="excluir" disabled="">
                <i class="material-icons" >delete</i>
            </button>
        <?php endif; ?>


    </form> 

    <?php if (\App\Modelos\Login::checaPermissao("Projeto.Cadastro")): ?> 

        <div class="fixed-action-btn">
            <a href="projeto/cadastro" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
        </div>
    <?php endif; ?> 



</main>
