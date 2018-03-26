<main class="container">
    <div class="row">
        <form class="col s12" method="POST" name="form_certificado" enctype="multipart/form-data">
            <div class="row">
                <?php if (isset($certificado)): ?>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="nome" type="text" name="nome" value="<?= $certificado->getNome(); ?>" <?= $disabled; ?>>
                        <label for="nome">Nome</label>
                    </div>


                    <div class="col s12 input-field">
                        <i class="material-icons prefix">chrome_reader_mode</i> 
                        <label >Tipo de Certificado</label>
                        <input  type="text" class="validate" name="tipoCertificado" 
                                value="<?= $certificado instanceof \App\Modelos\Certificado ? "físico" : "digital" ?>" 
                                style="text-transform: capitalize"disabled>

                    </div>

                    <?php if ($certificado instanceof \App\Modelos\Certificado): ?>

                        <div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">archive </i>
                                <input  id="caixaReferente" type="text" name="caixaReferente" value="<?= $certificado->getCaixaReferente(); ?>" <?= $disabled; ?>>
                                <label for="caixaReferente">Caixa Referente</label>
                            </div>
                        </div>

                        <?php
                        echo isset($imagem) ? $imagem : '';
                        $anos = [];
                        $anoInicial = 2010;
                        for ($i = 0; $i < 21; $i++) {
                            $anos[] = $anoInicial . ".1";
                            $anos[] = $anoInicial . ".2";
                            $anoInicial++;
                        }
                        ?>

                        <div class="input-field col s6 ">
                            <i class="material-icons prefix">event</i>
                            <select name="anoExercicio" <?= $disabled; ?>>
                                <option value="" disabled selected>Ano de Exercício</option>
                                <?php foreach ($anos as $ano): ?>
                                    <?php if ($ano == $certificado->getAnoExercicio()): ?>
                                        <option value="<?= $ano; ?>" selected><?= $ano; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $ano; ?>" ><?= $ano; ?></option>

                                    <?php
                                    endif;
                                endforeach;
                                ?>
                            </select>
                            <label for="anoExercicio" >Ano de Exercício</label>
                        </div>

                    </div>

                <?php else : ?>


                    <div class="input-field col s12">
                        <i class="material-icons prefix">text_fields
                        <a class="btn-block tooltipped" data-html="true" data-position="bottom" data-delay="50" data-tooltip="
                           <strong>Marcações Disponíveis :</strong> <br><br>
                           <?php
                           foreach ($marcacoes as $marcacao => $valor) :?>
                               <?= $marcacao ?> <br><br> 
                            <?php endforeach; ?>">
                            <i class="material-icons right">info</i>
                        </a>
                    </i>
                        <textarea id="textarea" class="materialize-textarea" name="texto" placeholder="Ex.: Certifico que o usuario@nome participou do projeto projeto@nome " <?= $disabled; ?>><?= $certificado->getTexto(); ?></textarea>
                        <label for="textarea">Informe um texto para o certificado.</label>
                    </div>


                    <div class="section ">
                        <h6><strong>Fundo do Certificado</strong></h6>

                        <br>
                        <img id="imagemAtual" title="Clique para ampliar" class="materialboxed " width="100" src="data:image/jpg;base64,<?= $certificado->getImagem(); ?>">
                        <br>



                        <?php if ($acao == 'salvar'): ?>
                            <div class="file-field input-field col s6">

                                <div class="btn blue">
                                    <span>Selecione</span>
                                    <input type="file" name="imagem" >
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Selecione uma imagem para o certificado" >
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="input-field col s6">
                            <i class="material-icons prefix">book</i>
                            <select name="projeto" id="projeto" <?= $disabled; ?> >
                                <option value=""  selected>Projeto</option>
                                <?php
                                if (isset($projetos) && count($projetos) > 0):
                                    foreach ($projetos as $projeto):
                                        if ($certificado->getProjeto() == $projeto->getId()):
                                            ?>                                        
                                            <option value="<?= $projeto->getId(); ?>" selected><?= $projeto->getNome(); ?></option>
                                        <?php else : ?>
                                            <option value="<?= $projeto->getId(); ?>" ><?= $projeto->getNome(); ?></option>
                                        <?php
                                        endif;
                                    endforeach;
                                endif;
                                ?>
                            </select>
                            <label >Projeto</label>
                        </div>
                    </div>


            </div>
            <div class="row ">
                <div class="center">
                    <button class="waves-effect blue btn" type="submit" name="gerar"><i class="material-icons left">settings</i>Gerar Visualização</button>
                </div>
            </div>


    <?php endif; ?>

        <div class="row">
            <div class="col s1">
                <button class="waves-effect blue btn" name="<?= $acao; ?>" type="submit"><?= $acao; ?></button>
            </div>

<?php else: ?>

            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input id="nome" type="text" name="nome">
                <label for="nome">Nome</label>
            </div>
        </div>

        <div class="section">
            <div class="row ">
                <div class="col s12 input-field">
                    <i class="material-icons prefix">chrome_reader_mode</i> 
                    <label >Tipo de Certificado</label>

                </div>
            </div>

            <div class="row center">
                <div class="input-field col s5">
                    <input class="limited" type="radio" id="digital" value="digital" name="tipoCertificado" checked=""/>
                    <label for="digital" >Digital</label>

                </div>

                <div class="input-field col s5">
                    <input class="limited" type="radio" id="fisico" value="fisico" name="tipoCertificado" />
                    <label for="fisico" >Físico</label>

                </div>

            </div>
        </div>

        <div class="divider"></div>

        <div class="section" id="blocoCertificadoDigital" style="display: ">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">text_fields
                        <a class="btn-block tooltipped" data-html="true" data-position="bottom" data-delay="50" data-tooltip="
                           <strong>Marcações Disponíveis :</strong> <br><br>
                           <?php
                           foreach ($marcacoes as $marcacao => $valor) :?>
                               <?= $marcacao ?> <br><br> 
                            <?php endforeach; ?>">
                            <i class="material-icons right">info</i>
                        </a>
                    </i>
                    <textarea id="textarea" class="materialize-textarea" name="texto" placeholder="Ex.: Certifico que o usuario@nome participou do projeto projeto@nome " ></textarea>
                    <label for="textarea">Informe um texto para o certificado.</label>
                </div>
            </div>

            <div class="section ">
                <h6><strong>Fundo do Certificado</strong></h6>

                <div class="row ">
                    <div class="file-field input-field col s6">
                        <div class="btn blue">
                            <span>Selecione</span>
                            <input type="file" name="imagem" >
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Selecione uma imagem para o certificado" >
                        </div>
                    </div>



                    <div class="input-field col s6">
                        <i class="material-icons prefix">book</i>
                        <select name="projeto" id="projeto" >
                            <option value=""  selected>Projeto</option>
                            <?php
                            if (isset($projetos) && count($projetos) > 0):
                                foreach ($projetos as $projeto):
                                    ?>                                        
                                    <option value="<?= $projeto->getId(); ?>" ><?= $projeto->getNome(); ?></option>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </select>
                        <label >Projeto</label>
                    </div>


                </div>
                <div class="row ">
                    <div class="center">
                        <button class="waves-effect blue btn" type="submit" name="gerar"><i class="material-icons left">settings</i>Gerar Visualização</button>
                    </div>
                </div>

            </div>

            <div class="row section" id="blocoCertificadoFisico" style="display: none">
                <div class="input-field col s6">
                    <i class="material-icons prefix">archive </i>
                    <input  id="caixaReferente" type="text" name="caixaReferente" >
                    <label for="caixaReferente">Caixa Referente</label>
                </div>


                <?php
                $anos = [];
                $anoInicial = 2010;
                for ($i = 0; $i < 21; $i++) {
                    $anos[] = $anoInicial . ".1";
                    $anos[] = $anoInicial . ".2";
                    $anoInicial++;
                }
                ?>

                <div class="input-field col s6">
                    <i class="material-icons prefix">event</i>
                    <select name="anoExercicio" <?= $disabled; ?>>
                        <option value="" disabled selected>Ano de Exercício</option>
    <?php foreach ($anos as $ano): ?>

                            <option value="<?= $ano; ?>" ><?= $ano; ?></option>

                            <?php
                        endforeach;
                        ?>
                    </select>
                    <label for="anoExercicio">Ano de Exercício</label>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col s1">
                <button class="waves-effect blue btn" name="salvar" type="submit">salvar</button>
            </div>

<?php endif; ?>
        <div class="col s1 offset-s2 offset-l1">
            <a href="certificado/pesquisa" class="waves-effect white blue-text btn">Cancelar</a>
        </div>
    </div>
</form>
</div>

</main>