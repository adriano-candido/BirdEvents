<main class="container">



    <form method="POST" >
        <ul class="collection">
            <?php if (isset($resultado) && count($resultado) > 0): foreach ($resultado as $aluno): ?>
                    <li class="collection-item">
                        <input class="limited" type="checkbox" id="<?= $aluno->getMatricula() ?>" value="<?= $aluno->getMatricula() ?>" name="matricula[]"/>
                        <label for="<?= $aluno->getMatricula() ?>" ><?= $aluno->getUsuario()->getNome() ?></label>
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


        <button id="desvincular" class="btn waves-effect waves-light" type="submit" name="desvincular" disabled="">
            Desvincular do certificado
        </button>


    </form> 

    <br>
    <br>


    <div class="col s1 offset-s2 offset-l1">
        <a href="<?= $caminhoAtual ?>/certificados/pesquisa" class="waves-effect white blue-text btn">Voltar</a>
    </div>

</main>
