<main class="container">

    <form method="POST" class="card row">
        <br>
        <div class="input-field col s8 offset-s1">
            <input  id="inp_pesquisar" type="text" class="validate" name="matricula">
            <label for="inp_pesquisar">Pesquisar Matricula</label>
        </div>
        <button class="waves-effect btn-flat btn-large col s2" name="pesquisar_por_aluno"><i class="material-icons ">search</i></button>
    </form>

    <form method="POST" enctype="multipart/form-data">
        <ul class="collection with-header">

            <?php if (isset($resultado) && count($resultado) > 0): ?>

                <li class="collection-header">
                    <h5 class="center"> <?= $aluno->getUsuario()->getNome() . '   -   CPF: ' . $aluno->getUsuario()->getCpf(); ?> </h5>
                    <span class="right"> Situação </span>
                    <span > Certificados </span>

                </li> 

                <?php
                foreach ($resultado as $index => $certificado):
                    ?>

                    <li class="collection-item">
                        <strong class="blue-text"><?= $certificado->getNome() ?></strong>
                        <div class="switch secondary-content">
                            <strong >Foi Entregue : </strong>

                            <label>
                                Não
                                <input type="checkbox" name="entregues[]" value="<?= $vinculos[$index]->getId() ?>" <?php if ($vinculos[$index]->getSituacao() == 'Entregue') echo 'checked=""'; ?>>
                                <span class="lever"></span>
                                Sim
                            </label>
                        </div>
                    </li>

                    <?php
                endforeach;
            else:
                ?>
                <li class="collection-item">
                    <span class="title"> A pesquisa não retornou resultado.</span>
                </li>
            </ul>
        <?php endif; ?>

        </ul>
        <button id="entregar" class="btn waves-effect waves-light" type="submit" name="entregar" >
            Confirmar Entrega
        </button>


    </form> 


</main>
