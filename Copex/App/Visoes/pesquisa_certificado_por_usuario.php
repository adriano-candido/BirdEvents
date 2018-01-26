<main class="container">

    <form method="POST" class="card row">
        <br>
        <div class="input-field col s8 offset-s1">
            <input  id="inp_pesquisar" type="text" class="validate" name="nome">
            <label for="inp_pesquisar">Pesquisar</label>
        </div>
        <button class="waves-effect btn-flat btn-large col s2" name="pesquisar_por_usuario"><i class="material-icons ">search</i></button>
    </form>

    <ul class="collapsible" data-collapsible="accordion">
        <?php
        if (isset($usuarios) && count($usuarios) > 0):
            foreach ($usuarios as $usuario) :
                ?>

                <li class="bold ">
                    <div class="collapsible-header waves-effect ">
                        <div>
                            <span><?= $usuario->getNome() ?></span>

                            <span class="secondary-content"> <label style="text-transform: capitalize"><?= $usuario->getTipoAcesso() ?></label> CPF: <span class="cpf"><?= $usuario->getCpf() ?></span></span>

                        </div>
                    </div>
                    <ul class="collapsible-body">
                        <?php
                        if (isset($certificados) && count($certificados) > 0):
                            ?>
                            <li>


                                <?php if (isset($certificados[$usuario->getId()])): ?>
                                    <form method="POST" class="container">
                                        <ul class="collection with-header">
                                            <li class="collection-header grey lighten-5">
                                                <strong class="grey-text text-darken-4">Certificado</strong>
                                                <div class="secondary-content">
                                                    <strong class="grey-text text-darken-4">Situação</strong>
                                                </div>
                                            </li>
                                            <?php
                                            foreach ($certificados[$usuario->getId()] as $index => $certificado):
                                                ?>

                                                <li class="collection-item">
                                                    <strong class="blue-text"><?= $certificado->getNome() ?></strong>
                                                    <div class="switch secondary-content">
                                                        <strong >Foi Entregue : </strong>

                                                        <label>
                                                            Não
                                                            <input type="checkbox" name="entregues[]" value="<?= $vinculos[$usuario->getId()][$index]->getId() ?>" <?php if ($vinculos[$usuario->getId()][$index]->getSituacao() == 'Entregue') echo 'checked=""'; ?>>
                                                            <span class="lever"></span>
                                                            Sim
                                                        </label>
                                                    </div>
                                                </li>

                                            <?php endforeach; ?>

                                        </ul>
                                        <div class="section center">
                                            <input type="hidden" name="idUsuario" value="<?= $usuario->getId(); ?>"/>
                                            <button id="entregar" class="btn waves-effect waves-light " type="submit" name="entregar" >
                                                Salvar
                                            </button>
                                        </div>
                                    </form>
                                <?php else: ?>
                                    <div class="center">Sem certificados</div>
                                <?php endif; ?>

                            </li>

                        <?php endif; ?>
                    </ul>
                </li>

            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</main>
