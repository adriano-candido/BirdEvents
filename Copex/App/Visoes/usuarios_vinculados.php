<main class="container">

    <form method="POST" >
              <ul class="collection" style="max-height: 300px; overflow-y: scroll">
                    <?php if (isset($usuariosVinculados) && count($usuariosVinculados) > 0): foreach ($usuariosVinculados as $usuario): ?>
                            <li class="collection-item ">
                                <input class="limited" type="checkbox" id="<?= $usuario->getId() ?>" value="<?= $usuario->getId() ?>" name="idsUsuarios[]"/>
                                <label for="<?= $usuario->getId() ?>" ><?= $usuario->getNome() ?></label>
                                
                                <span class="secondary-content"> <label style="text-transform: capitalize"><?= $usuario->getTipoAcesso() ?></label> CPF: <span class="cpf"><?= $usuario->getCpf() ?></span></span>

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
        <a href="certificado/pesquisa" class="waves-effect white blue-text btn">Voltar</a>
    </div>

</main>
