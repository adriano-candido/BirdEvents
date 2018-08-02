<main class="container">
    <form method="POST">
        <div class="row ">
            <?php if (!isset($certificadoAutentico)): ?>

                <div class="input-field col s6 offset-s3">
                    <i class="material-icons prefix">photo_size_select_small</i>
                    <input type="text" class="validate"  name="cod_validacao">
                    <label >Código de Validação</label>
                </div>
                <div class="input-field col s6 offset-s3">
                    <p><strong>*</strong>O código se encontra no canto inferior esquerdo do certificado.</p>
                </div>
            </div>


            <div class="row">
                <div class="col s2 offset-s5">
                    <button class="waves-effect blue btn" name="validar" type="submit">Validar</button>
                </div>

            </div>
        <?php else: ?>
            <!-- cewrtificado Autentico
            Certificado Emitido em nome de usuario
            CPF
            Evento
            <div class="">
                <div class="row center">
                    <div class="col s6 offset-s3">
                        <h1 class="grey-text text-darken-4">
                            <strong><i class="material-icons large">
                                    check_circle
                                </i></strong>
                        </h1>
                        <h6 class="grey-text text-darken-4"><strong>Certificado Autentico!</strong></h6>
                    </div>
                </div>
                <div class="row ">
                    <div class="col s6 offset-s4">
                        <h6 class="grey-text text-darken-4"><strong>Certificado emitido em nome de:</strong></h6>
                        <p class="grey-text text-darken-2"><?= $certificadoAutentico['usuario']->getNome() ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 offset-s4">
                        <h6 class="grey-text text-darken-4"><strong>CPF:</strong></h6>
                        <p class="grey-text text-darken-2 cpf"><?= $certificadoAutentico['usuario']->getCPF() ?></p>
                    </div>
                </div>
                <div class="row">                
                    <div class="col s6 offset-s4">
                        <h6 class="grey-text text-darken-4"><strong>Evento:</strong></h6>
                        <p class="grey-text text-darken-2"><?= $certificadoAutentico['certificado']->getNome() ?></p>
                    </div>
                </div>
            </div -->
            <div class="row">
                <div class="col s6 offset-s3">
                    <div class="card z-depth-3">
                        <div class="card-content white-text green z-depth-1">
                            <span class="card-title">
                                <div class="row center">
                                    <div class="col s6 offset-s3">
                                        <h1 class="withe-text">
                                            <strong><i class="material-icons large">
                                                    check_circle
                                                </i></strong>
                                        </h1>
                                        <h5 class="withe-text"><strong>Certificado Autêntico!</strong></h5>
                                    </div>
                                </div>
                            </span>
                        </div>
                        <div class="card-content">
                            <div class="row ">
                                <div class="col s6 offset-s3">
                                    <h6 class="grey-text text-darken-4"><strong>Emitido em nome de:</strong></h6>
                                    <p class="grey-text text-darken-2"><?= $certificadoAutentico['usuario']->getNome() ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6 offset-s3">
                                    <h6 class="grey-text text-darken-4"><strong>CPF:</strong></h6>
                                    <p class="grey-text text-darken-2 cpf"><?= $certificadoAutentico['usuario']->getCPF() ?></p>
                                </div>
                            </div>
                            <div class="row">                
                                <div class="col s6 offset-s3">
                                    <h6 class="grey-text text-darken-4"><strong>Evento:</strong></h6>
                                    <p class="grey-text text-darken-2"><?= $certificadoAutentico['certificado']->getNome() ?></p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>        

            <div class="row ">
                <div class="col s12 center">
                    <div class="col s6 offset-s3">
                        <button class="waves-effect blue btn" name="validarOutro" type="submit">Validar outro certificado</button>
                    </div>
                </div>

            </div>

        <?php endif; ?>
    </form>
</main>