<main class="container">

    <div class="row">
        <form class="col s12"  method="POST" enctype="multipart/form-data" name="form_projeto">
            <div class="section">
                <h5 class="blue-text text-darken-3">Informações Básicas</h5>
                <br>
                <div class="row">
                    <?php if (isset($projeto)): ?>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">event</i>
                            <input type="text" class="validate" name="nome" value="<?= $projeto->getNome(); ?>" required>
                            <label >Nome</label>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col s12 input-field">
                            <i class="material-icons prefix">assignment_ind</i> 
                            <label >Tipo de Projeto</label>

                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s4">
                            <input class="limited" type="radio" id="institucional" value="institucional" name="tipoprojeto" <?php if ($projeto->getTipo() == 'institucional') echo 'checked'; ?> <?= $disabled; ?> />
                            <label for="institucional" >Institucional</label>

                        </div>

                        <div class="input-field col s4">
                            <input class="limited" type="radio" id="curso" value="curso" name="tipoprojeto" <?php if ($projeto->getTipo() == 'curso') echo 'checked'; ?> <?= $disabled; ?> />
                            <label for="curso" >Curso</label>

                        </div>

                        <div class="input-field col s4">
                            <input class="limited" type="radio" id="outros" value="outros" name="tipoprojeto" <?php if ($projeto->getTipo() == 'outros') echo 'checked'; ?>  <?= $disabled; ?> />
                            <label for="outros" >Outros</label>

                        </div>

                    </div>

                    <div id="blocosetor" style="display: none;">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">collections_bookmark</i>
                                <select name="setor" <?= $disabled; ?>>
                                    <option value="" disabled selected>Setor</option>
                                    <?php
                                    if (isset($setores) && count($setores) > 0):
                                        foreach ($setores as $setor):
                                            ?>
                                            <?php foreach ($areasVinculadas as $areaVinculada) : ?>
                                                <?php if ($areaVinculada->getTipoArea() == "setor" && $areaVinculada->getArea() == $setor->getId()): ?>
                                                    <option value="<?= $setor->getId(); ?>" selected><?= $setor->getNome(); ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $setor->getId(); ?>" ><?= $setor->getNome(); ?></option>

                                                <?php
                                                endif;
                                            endforeach;
                                        endforeach;
                                    endif;
                                    ?>
                                </select>
                                <label >Setor</label>
                            </div>
                        </div>
                    </div>

                    <div id="blococurso" style="display: none;">

                        <ul class="collection with-header" style="max-height: 300px; overflow-y: scroll">
                            <li class="collection-header ">
                                <span class="title">Selecione o(s) Curso(s) :</span>
                            </li>
                            <?php
                            if (isset($cursos) && count($cursos) > 0):
                                foreach ($cursos as $curso):
                                    ?>
                                    <li class=" collection-item">
                                        <input class="limited" type="checkbox" id="<?= $curso->getId() ?>" value="<?= $curso->getId() ?>" name="curso[]" <?= $disabled; ?> <?php
                                        foreach ($areasVinculadas as $areaVinculada) {
                                            if ($areaVinculada->getTipoArea() != "setor" && $areaVinculada->getArea() == $curso->getId())
                                                echo 'checked';
                                        }
                                        ?> />
                                        <label for="<?= $curso->getId() ?>" ><?= $curso->getNome() ?></label>
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


                    </div>
                </div>


                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">description</i>
                        <textarea id="textarea" class="materialize-textarea" name="descricao" required><?= $projeto->getDescricao(); ?></textarea>
                        <label for="textarea">Descrição do Projeto</label>
                    </div>
                </div>


        </div>

        <div class="divider"></div>
        <div class="section">
            <h5 class="blue-text text-darken-3">Datas</h5>
            <br>

            <h6 class="grey-text text-darken-4">
                <strong>Inscrições</strong>
            </h6>

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">border_color</i>

                    <input type="text" class="datepicker" name="inicioInscricao" id="inicioInscricao" data-value="<?= $projeto->getInicioInscricao(); ?>" required>
                    <label for="inicioInscricao">Início das Inscrições</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">border_color</i>

                    <input type="text" class="datepicker" name="finalInscricao" id="finalInscricao" data-value="<?= $projeto->getFinalInscricao(); ?>" required>
                    <label for="finalInscricao">Encerramento das Inscrições</label>
                </div>
            </div>
        </div>

        <h6 class="grey-text text-darken-4">
            <strong>Projeto</strong>
        </h6>

        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">date_range</i>

                <input type="text" class="datepicker" name="inicioOcorrencia" id="inicioOcorrencia" data-value="<?= $projeto->getInicioOcorrencia(); ?>" required>
                <label for="inicioOcorrencia">Início do Projeto</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">date_range</i>

                <input type="text" class="datepicker" name="finalOcorrencia" id="finalOcorrencia" data-value="<?= $projeto->getFinalOcorrencia(); ?>" required>
                <label for="finalOcorrencia">Encerramento do Projeto</label>
            </div>
        </div>

        <div class="divider"></div>
        <div class="section">
            <h5 class="blue-text text-darken-3">Anexos</h5>
            <br>

            <h6 class="blue-text text-darken-3 valign-wrapper">Anexos anteriores </h6></div>
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

        <br>
        <h6 class="blue-text text-darken-3 valign-wrapper">Novos Anexos</h6>
        <br>
        <h6 class="grey-text text-darken-4">
            <strong>Imagem</strong>
        </h6>

        <div class="row">
            <div class="file-field input-field">
                <div class="btn blue">

                    <span>Selecionar arquivo</span>
                    <input type="file" name="imagem" >

                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Selecione uma imagem" >
                </div>
            </div>
        </div>

        <h6 class="grey-text text-darken-4">
            <strong>Documentos</strong>
        </h6>

        <div class="row">
            <div class="file-field input-field">
                <div class="btn blue">
                    <span>Selecionar arquivo</span>
                    <input type="file" name="arquivos[]" multiple >
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Selecione um ou mais documentos" >
                </div>
            </div>
        </div>

    </div>

    <div class="divider"></div>
    <div class="section">
        <h5 class="blue-text text-darken-3">Avaliação</h5>
        <br>
        <div class="row">
            <div class="col s6">
                <h6 class="grey-text text-darken-4"><strong>Situação</strong></h6>
                <p class="grey-text text-darken-2"><?= $situacoes[$projeto->getSituacao()]; ?></p>
            </div>

        </div>



        <div class="row">
            <div class="col s12">
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

    <?php if ($projeto->getSituacao() == "alteracao"):
        ?> 
        <div class="row">
            <div class="col s1">
                <button class="waves-effect blue btn" name="salvar" type="submit">salvar</button>
            </div>
        <?php endif; ?> 



    <?php else: ?>

        <div class="input-field col s12">
            <i class="material-icons prefix">event</i>
            <input type="text" class="validate" name="nome" required>
            <label >Nome</label>
        </div>


        <!--div class="input-field col s6">
            <i class="material-icons prefix">collections_bookmark</i>
            <select name="curso" required>
                <option value="" disabled selected>Selecione um Curso</option>
        <?php if (isset($cursos) && count($cursos) > 0): foreach ($cursos as $curso): ?>
                                                                <option value="<?= $curso->getId(); ?>" ><?= $curso->getNome(); ?></option>
                <?php
            endforeach;
        endif;
        ?>
            </select>
            <label>Curso</label>
        </div -->
    </div>


    <div class="row">
        <div class="col s12 input-field">
            <i class="material-icons prefix">assignment_ind</i> 
            <label >Tipo de Projeto</label>

        </div>
    </div>

    <div class="row">
        <div class="input-field col s4">
            <input class="limited" type="radio" id="institucional" value="institucional" name="tipoprojeto" />
            <label for="institucional" >Institucional</label>

        </div>

        <div class="input-field col s4">
            <input class="limited" type="radio" id="curso" value="curso" name="tipoprojeto"/>
            <label for="curso" >Curso</label>

        </div>

        <div class="input-field col s4">
            <input class="limited" type="radio" id="outros" value="outros" name="tipoprojeto" checked=""/>
            <label for="outros" >Outros</label>

        </div>

    </div>

    <div id="blocosetor" style="display: none;">
        <div class="row"> 
            <div class="input-field col s12">
                <span class="title">Selecione o Setor :</span><br>

                <select name="setor" <?= $disabled; ?>>
                    <option value="" disabled selected>Setor</option>
                    <?php if (isset($setores) && count($setores) > 0): foreach ($setores as $setor):; ?>

                            <option value="<?= $setor->getId(); ?>" ><?= $setor->getNome(); ?></option>

                            <?php
                        endforeach;
                    endif;
                    ?>
                </select>
            </div>
        </div>
    </div>

    <div id="blococurso" style="display: none;">


        <span class="title">Selecione o(s) Curso(s) :</span>

        <ul class="collection" style="max-height: 300px; overflow-y: scroll">

            <?php if (isset($cursos) && count($cursos) > 0): foreach ($cursos as $curso): ?>
                    <li class="collection-item">
                        <input class="limited" type="checkbox" id="<?= $curso->getId() ?>" value="<?= $curso->getId() ?>" name="curso[]"/>
                        <label for="<?= $curso->getId() ?>" ><?= $curso->getNome() ?></label>
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


    </div>
    </div>




    <div class="row">
        <div class="input-field col s12">
            <i class="material-icons prefix">description</i>
            <textarea id="textarea" class="materialize-textarea" name="descricao" required></textarea>
            <label for="textarea">Descrição do Projeto</label>
        </div>
    </div>


    </div>

    <div class="divider"></div>
    <div class="section">
        <h5 class="blue-text text-darken-3">Datas</h5>
        <br>

        <h6 class="grey-text text-darken-4">
            <strong>Inscrições</strong>
        </h6>

        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">border_color</i>

                <input type="text" class="datepicker" name="inicioInscricao" id="inicioInscricao" required>
                <label for="inicioInscricao">Início das Inscrições</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">border_color</i>

                <input type="text" class="datepicker" name="finalInscricao" id="finalInscricao" required>
                <label for="finalInscricao">Encerramento das Inscrições</label>
            </div>
        </div>
    </div>

    <h6 class="grey-text text-darken-4">
        <strong>Projeto</strong>
    </h6>

    <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">date_range</i>

            <input type="text" class="datepicker" name="inicioOcorrencia" id="inicioOcorrencia" required>
            <label for="inicioOcorrencia">Início do Projeto</label>
        </div>
        <div class="input-field col s6">
            <i class="material-icons prefix">date_range</i>

            <input type="text" class="datepicker" name="finalOcorrencia" id="finalOcorrencia" required>
            <label for="finalOcorrencia">Encerramento do Projeto</label>
        </div>
    </div>

    <div class="divider"></div>
    <div class="section">
        <h5 class="blue-text text-darken-3">Anexos</h5>
        <br>

        <h6 class="grey-text text-darken-4">
            <strong>Imagem</strong>
        </h6>

        <div class="row">
            <div class="file-field input-field">
                <div class="btn blue">

                    <span>Selecionar arquivo</span>
                    <input type="file" name="imagem">

                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Selecione uma imagem">
                </div>
            </div>
        </div>

        <h6 class="grey-text text-darken-4">
            <strong>Documentos</strong>
        </h6>

        <div class="row">
            <div class="file-field input-field">
                <div class="btn blue">
                    <span>Selecionar arquivo</span>
                    <input type="file" name="arquivos[]" multiple required>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Selecione um ou mais documentos" required>
                </div>
            </div>
        </div>

    </div>

    <div class="divider"></div>
    <div class="section">
        <h5 class="blue-text text-darken-3">Avaliação</h5>
        <br>
        <div class="row">
            <div class="col s6">
                <h6 class="grey-text text-darken-4"><strong>Situação</strong></h6>
                <p class="grey-text text-darken-2">Aguardando Envio</p>
            </div>

        </div>



        <div class="row">
            <div class="col s6">
                <h6 class="grey-text text-darken-4"><strong>Observações</strong></h6>
                <p class="grey-text text-darken-2">Aguardando Envio</p>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col s1">
            <input type="hidden" name="id[]" value="0">
            <button class="waves-effect blue btn" name="salvar" type="submit">salvar</button>
        </div>

    <?php endif; ?>
    <div class="col s1 offset-s2 offset-l1">
        <a href="projeto/pesquisa" class="waves-effect white blue-text btn">Cancelar</a>
    </div>
</div>
</form>
</div>

</main>
