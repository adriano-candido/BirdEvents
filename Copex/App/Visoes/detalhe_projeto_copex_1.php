<main class="container">

    <ul class="collapsible" data-collapsible="expansible">
        <li>
            <div class="collapsible-header active"><h5 class="blue-text text-darken-3 valign-wrapper"><i class="material-icons">info</i>Informações Básicas</h5></div>
            <div class="collapsible-body">
                <div class="row">

                    <div class="col s4">
                        <h6 class="grey-text text-darken-4"><strong>Nome</strong></h6>
                        <p class="grey-text text-darken-2"><?= $projeto->getNome() ?></p>
                    </div>

                    <div class="col s4">
                        <h6 class="grey-text text-darken-4"><strong>Tipo</strong></h6>
                        <p class="grey-text text-darken-2"><?= $projeto->getTipo() ?></p>
                    </div>


                    <div class="col s4">
                        <h6 class="grey-text text-darken-4"><strong>Usuário Responsável</strong></h6>
                        <p class="grey-text text-darken-2"><?= $projeto->getUsuario()->getNome() ?></p>
                    </div>

                </div>

                <div class="col s12 container">

                    <ul class="collection with-header " >
                        <li class="collection-header grey lighten-5">
                            <h6 class="grey-text text-darken-4">
                                <strong>Area(s) Vinculada(s)</strong>
                            </h6>
                        </li>
                        <li class="collection-item">
                            <ul style="max-height: 300px; overflow-y: scroll">
                                <?php foreach ($areasVinculadas as $areaVinculada): ?>
                                    <li class="collection-item">
                                        <div>
                                            <strong class="grey-text text-darken-4 secondary-content "><?= $areaVinculada->getTipoArea() ?></strong>

                                            <?php
                                            $areas = $areaVinculada->getTipoArea() == "setor" ? $setores : $cursos;
                                            foreach ($areas as $area) {
                                                if ($area->getId() == $areaVinculada->getArea()) {
                                                    echo '<div class="grey-text text-darken-4 ">' . $area->getNome() . '</div>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </li>
                                    <?php
                                endforeach;
                                ?>
                            </ul>
                        </li>                            
                    </ul>
                </div>

                <div class="row">

                    <div class="col s12">
                        <h6 class="grey-text text-darken-4"><strong>Descrição</strong></h6>
                        <textarea class="grey-text text-darken-2 materialize-textarea" disabled><?= $projeto->getDescricao() ?></textarea>
                    </div>
                </div>

            </div>

        </li>
        <li>
            <div class="collapsible-header"><h5 class="blue-text text-darken-3 valign-wrapper"><i class="material-icons ">event</i>Datas</h5></div>
            <div class="collapsible-body">

                <div class="row">
                    <div class="col s6">
                        <h6 class="grey-text text-darken-4"><strong>Início Projeto</strong></h6>
                        <p class="grey-text text-darken-2"><?php echo \App\Util\Util::formataDataDiaMesAno($projeto->getInicioOcorrencia()); ?></p>
                    </div>

                    <div class="col s6">
                        <h6 class="grey-text text-darken-4"><strong>Encerramento Projeto</strong></h6>
                        <p class="grey-text text-darken-2"><?php echo \App\Util\Util::formataDataDiaMesAno($projeto->getFinalOcorrencia()); ?></p>
                    </div>
                </div>


                <div class="row">
                    <div class="col s12">
                        <h6 class="grey-text text-darken-4"><strong>Deseja Abrir Inscrição:</strong> <?= $projeto->getAbrirInscricao(); ?> </h6>
                    </div>
                </div>

                <?php if ($projeto->getAbrirInscricao() == 'Sim') : ?>

                    <div class="row">
                        <div class="col s6">
                            <h6 class="grey-text text-darken-4"><strong>Início Inscrições</strong></h6>
                            <p class="grey-text text-darken-2"><?php echo \App\Util\Util::formataDataDiaMesAno($projeto->getInicioInscricao()); ?></p>
                        </div>

                        <div class="col s6">
                            <h6 class="grey-text text-darken-4"><strong>Encerramento Inscrições</strong></h6>
                            <p class="grey-text text-darken-2"><?php echo \App\Util\Util::formataDataDiaMesAno($projeto->getFinalInscricao()); ?></p>
                        </div>
                    </div>

                <?php endif; ?>

            </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header"><h5 class="blue-text text-darken-3 valign-wrapper"><i class="material-icons">attach_file</i>Anexos</h5></div>
            <div class="collapsible-body">
                <ul class="collection with-header">
                    <li class="collection-header grey lighten-5">
                        <h6 class="grey-text text-darken-4">
                            <strong>Imagem</strong>
                        </h6>
                    </li>
                    <li class="collection-item">
                        <ul style="max-height: 150px; overflow-y: scroll">
                            <?php foreach ($anexos as $anexo): if ($anexo->getTipo() == '/imagens/'): ?>

                                    <li class="collection-item">

                                        <div>
                                            <i class="material-icons left">image</i>
                                            <?= $anexo->getNome(); ?>
                                            <div class="secondary-content">
                                                <img title="Clique para ampliar" class="materialboxed" width="50" src="<?= $anexo->getLocalizacao(); ?>">
                                            </div>
                                        </div>

                                    </li>
                                    <?php
                                endif;
                            endforeach;
                            ?>
                        </ul>

                    <li class="collection-header grey lighten-5">
                        <h6 class="grey-text text-darken-4">
                            <strong>Documentos</strong>
                        </h6>
                    </li>
                    <li class="collection-item">
                        <ul style="max-height: 150px; overflow-y: scroll">
                            <?php foreach ($anexos as $anexo): if ($anexo->getTipo() !== '/imagens/'): ?>

                                    <li class="collection-item">

                                        <div>
                                            <i class="material-icons left"><?php
                                                if (in_array('pdf', explode(".", $anexo->getNome()))) {
                                                    echo 'picture_as_pdf';
                                                } else {
                                                    echo 'description';
                                                }
                                                ?></i>
                                            <?= $anexo->getNome(); ?>
                                            <a href="<?= $anexo->getLocalizacao(); ?>" target="_black" class="secondary-content">
                                                <i class="material-icons right">file_download</i>
                                                Baixar Anexo
                                            </a>
                                        </div>

                                    </li>
                                    <?php
                                endif;
                            endforeach;
                            ?>

                        </ul>
                    </li>

                </ul>
            </div>
        </li>
        <li>
            <div class="collapsible-header active"><h5 class="blue-text text-darken-3 valign-wrapper"><i class="material-icons">assignment_turned_in</i>Avaliação</h5></div>
            <div class="collapsible-body"><div class="row">
                    <div class="row">
                        <div class="col s6">
                            <h6 class="grey-text text-darken-4"><strong>Situação</strong></h6>
                            <p class="grey-text text-darken-2"><?= $situacoes[$projeto->getSituacao()] ?></p>
                        </div>


                    </div>

                    <div class="col s12 container">

                        <ul class="collection with-header " >
                            <li class="collection-header grey lighten-5">
                                <h6 class="grey-text text-darken-4">
                                    <strong>Observações</strong>
                                </h6>
                            </li>
                            <li class="collection-item">
                                <ul style="max-height: 300px; overflow-y: scroll">
                                    <?php foreach ($observacoes as $observacao): ?>

                                        <li class="collection-item">
                                            <p class="grey-text text-darken-4 secondary-content" >
                                                <?php echo \App\Util\Util::formataDataDiaMesAno($observacao->getDataPostagem()); ?>
                                            </p>
                                            <div>
                                                <strong class="grey-text text-darken-4"><?= $observacao->getUsuario()->getNome(); ?></strong>

                                                <p class="grey-text text-darken-2" >
                                                    <?= $observacao->getConteudo(); ?>
                                                </p>
                                            </div>
                                        </li>
                                        <?php
                                    endforeach;
                                    ?>
                                </ul>
                            </li>                            
                        </ul>
                    </div>

                </div>
            </div>
        </li>
    </ul>

    <?php
    if (\App\Modelos\Login::checaPermissao("Projeto.Avaliar")) :
        if ($projeto->getSituacao() == "enviado"):
            ?> 
            <div class="row">
                <div class="col s1">
                    <button data-target="modal" class="waves-effect blue btn modal-trigger" >Avaliar</button>
                </div>

                <!-- Modal Structure -->
                <div id="modal" class="modal bottom-sheet ">
                    <div class="modal-content container">
                        <h3>Avaliar o Projeto</h3>
                        <form method="POST" enctype="multipart/form-data" class="row">
                            <div class="col s8" >
                                <div class="row">

                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">collections_bookmark</i>
                                        <select name="situacao" id="situacao" required="">
                                            <option value="" disabled selected>Selecione a situação do Projeto</option>

                                            <option value="alteracao" ><?= $situacoes['alteracao']; ?></option>
                                            <option value="aprovado" ><?= $situacoes['aprovado']; ?></option>
                                            <option value="reprovado" ><?= $situacoes['reprovado']; ?></option>

                                        </select>
                                        <label for="situacao">Situação</label>
                                    </div>

                                    <div class="input-field col s12" >
                                        <i class="material-icons prefix">description</i>
                                        <textarea id="textarea" class="materialize-textarea" name="observacao" required></textarea>
                                        <label for="textarea">Observação</label>
                                    </div>


                                    <div class="file-field input-field col s12">
                                        <div class="btn blue">
                                            <span>Selecionar arquivo</span>
                                            <input type="file" name="arquivo" >
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" placeholder="Selecione um arquivo" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="fixed-action-btn col s2 offset-s7">
                                <div class=" row">
                                    <button class="col s12 modal-action waves-effect blue btn" name="avaliar">Enviar Avaliação</button>
                                </div>

                                <div class=" row">
                                    <a class="col s12 modal-action modal-close waves-effect blue-text white btn">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            <?php endif; ?> 


            <div class="col s1 offset-s2 offset-l1">
                <a href="projeto/pesquisa" class="waves-effect white blue-text btn">Voltar</a>
            </div>

            <?php
        else :
            if ($projeto->getSituacao() == "alteracao"):
                ?> 
                <div class="row">
                    <form method="POST" class="col s1">
                        <button class="waves-effect blue btn" name="editar" type="submit">Editar</button>
                    </form>
                <?php endif; ?> 


                <div class="col s1 offset-s2 offset-l1">
                    <a href="projeto/pesquisa" class="waves-effect white blue-text btn">Voltar</a>
                </div>
            <?php endif; ?>
            <br>

            </main>
