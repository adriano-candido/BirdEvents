<main class="container row">

    <form method="POST" enctype="multipart/form-data">

        
        <div class="row z-depth-1 ">
            <div class="blue white-text center section ">            
                <h5> Usuários </h5>           
            </div>
            <div class="input-field col s8 offset-s1">
                <input  id="inp_pesquisar" type="text" class="validate" name="nome_usuario">
                <label for="inp_pesquisar">Pesquisar Usuarios</label>
            </div>
            <button class="waves-effect btn-flat btn-large col s2" name="pesquisar_usuarios"><i class="material-icons ">search</i></button>

            <div class="col s12">
                <ul class="collection" style="max-height: 300px; overflow-y: scroll">
                    <?php if (isset($usuarios) && count($usuarios) > 0): foreach ($usuarios as $usuario): ?>
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

            </div>
        </div>
        
        
        
        <br>

        <div class="row z-depth-1 ">
            <div class="blue white-text center section">            
                <h5> Certificados </h5>           
            </div>
            <div class="input-field col s8 offset-s1">
                <input  id="inp_pesquisar" type="text" class="validate" name="nome_certificado">
                <label for="inp_pesquisar">Pesquisar Certificados</label>
            </div>
            <button class="waves-effect btn-flat btn-large col s2" name="pesquisar_certificados"><i class="material-icons ">search</i></button>

            <div class="col s12">
                <ul class="collection" style="max-height: 200px; overflow-y: scroll">
                    <?php if (isset($certificadosDisponiveis) && count($certificadosDisponiveis) > 0): foreach ($certificadosDisponiveis as $certificado): ?>
                            <li class="collection-item">
                                <input class="limited" type="radio" id="certificado-<?= $certificado->getId() ?>" value="<?= $certificado->getId() ?>" name="idCertificado"/>
                                <label for="certificado-<?= $certificado->getId() ?>" ><?= $certificado->getNome() ?></label>
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

        <div class="col s12 center">
            <button id="vincular_certificado" class="btn waves-effect waves-light " type="submit" name="vincular" disabled="">
                Vincular
            </button>

            <a data-target="modal" id="vincular_arquivo" class="btn waves-effect waves-light" title="Vincular de Arquivo" disabled="">
                <i class="material-icons">attach_file</i>
            </a>
        </div>



        <!-- Modal Structure -->
        <div id="modal" class="modal bottom-sheet ">
            <div class="modal-content container">
                <h4>Vincular certificado</h4>
                <div class="row">
                    <div class="col s12" >

                        <div class="row">
                            <div class="row ">
                                <h6 class="grey-text text-darken-4 col s2">
                                    <strong>Tipo de Vínculo :</strong>
                                </h6>

                                <div class="col s3">
                                    <input class="limited" type="radio" id="matricula" value="matricula" name="tipoVinculo" checked=""/>
                                    <label for="matricula" >Por Matrícula</label>
                                </div>

                                <div class="col s3">
                                    <input class="limited" type="radio" id="cpf" value="cpf" name="tipoVinculo"/>
                                    <label for="cpf" >Por CPF</label>
                                </div>
                            </div>

                            <div class="file-field input-field ">
                                <div class="btn blue">
                                    <span>Selecione arquivo</span>
                                    <input type="file" name="arquivo">
                                </div>
                                <div class="file-path-wrapper">
                                    <input id="arquivo" class="file-path validate" type="text" placeholder="Selecione um arquivo EXCEL/XML">
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="input-field center ">
                                <button class="btn waves-effect waves-light blue" type="submit" name="vincular">
                                    Vincular
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>


    </form> 



    <div class="fixed-action-btn">
        <a href="certificado/cadastro" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
    </div>

</main>
