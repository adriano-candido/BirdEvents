<main class="container">

    <form method="POST" class="card row">
        <br>
        <div class="input-field col s8 offset-s1">
            <input  id="inp_pesquisar" type="text" class="validate" name="nome">
            <label for="inp_pesquisar">Pesquisar</label>
        </div>
        <button class="waves-effect btn-flat btn-large col s2" name="pesquisar"><i class="material-icons ">search</i></button>
    </form>

    <form method="POST" enctype="multipart/form-data">
        <ul class="collection" style="max-height: 300px; overflow-y: scroll">
            <?php if (isset($resultado) && count($resultado) > 0): foreach ($resultado as $index => $certificado): ?>
                    <li class="collection-item">
                        <input class="limited" type="checkbox" id="<?= $index ?>" value="<?= $index ?>" name="index[]"/>
                        <label for="<?= $index ?>" ><?= $certificado->getNome() ?></label>        
                        <?php
                        if (isset($vinculosDesseUsuario)):
                            foreach ($vinculosDesseUsuario as $vinculo):
                                if ($vinculo->getCertificado() == $certificado->getId()):
                                    if ($certificado instanceof App\Modelos\Certificado):
                                        ?>

                                        <span class="secondary-content">Situação: <span ><?= $vinculo->getSituacao() ?></span></span>
                                        <?php else:
                                        ?>
                                        <div class="secondary-content">
                                            <strong><a target="_blank" title="Imprimir" href="certificado/pesquisa/impressao/<?= $index ?>"><i class="material-icons right">print</i></a></strong>
                                        </div>
                                    <?php
                                    endif;
                                endif;
                            endforeach;
                        endif;
                        if ($certificado instanceof App\Modelos\CertificadoDigital):
                            ?>
                            <div class="secondary-content">
                                <strong><i class="material-icons left">fingerprint</i>Digital</strong>
                            </div>
                        <?php endif;
                        ?>
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

        <?php if (\App\Modelos\Login::checaPermissao("Certificado.Visualização")): ?>
            <button id="visualizar" class="btn waves-effect waves-light" type="submit" name="visualizar" title="Visualizar" disabled="">
                <i class="material-icons">visibility</i>
            </button>
        <?php endif; ?>
        <?php if (\App\Modelos\Login::checaPermissao("Certificado.Edição")): ?>
            <button id="editar" class="btn waves-effect waves-light" type="submit" name="editar" title="Editar" disabled="">
                <i class="material-icons">edit</i>
            </button>
        <?php endif; ?>
        <?php if (\App\Modelos\Login::checaPermissao("Certificado.Vinculados")): ?>
            <button id="vinculados" class="btn waves-effect waves-light" type="submit" name="vinculados" title="Usuarios Vinculados" disabled="">
                <i class="material-icons">account_circle</i>
            </button>
        <?php endif; ?>
    </form> 

    <?php if (\App\Modelos\Login::checaPermissao("Certificado.Cadastro")): ?>
        <div class="fixed-action-btn">
            <a href="certificado/cadastro" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
        </div>
    <?php endif; ?>
</main>
