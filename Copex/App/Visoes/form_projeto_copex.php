<main class="container">

    <div class="row">
        <form class="col s12"  method="POST" enctype="multipart/form-data">
            <div class="section">
                <h5 class="blue-text text-darken-3">Informações Básicas</h5>
                <br>
                <div class="row">

                    <div class="col s6">
                        <h6 class="grey-text text-darken-4"><strong>Nome</strong></h6>
                        <p class="grey-text text-darken-2">nome do evento</p>
                    </div>

                    <div class="col s6">
                        <h6 class="grey-text text-darken-4"><strong>Curso</strong></h6>
                        <p class="grey-text text-darken-2">Curso</p>
                    </div>
                </div>

                <div class="row">

                    <div class="col s12">
                        <h6 class="grey-text text-darken-4"><strong>Descrição</strong></h6>
                        <p class="grey-text text-darken-2">Ao contrário da crença popular, Lipsum (Lorem Ipsum abreviado) não é simplesmente um texto qualquer com um monte de letras. Ela tem raízes numa peça clássica da literatura latina de 45 A.C., fazendo com que este famoso texto tenha mais de 2000 anos de idade. Richard McClintock, um professor de Latim na Hampden-Sydney College na Virginia, pesquisou uma das mais obscuras palavras em Latim, "consectetur", da passagem de Lipsum, e indo a fundo nas citações da literatura clássica descobriu de uma fonte segura que Lipsum vem das seções 1.10.32 e 1.10.33 do "de Finibus Bonorum et Malorum" (Os Extremos do Bem e do Mal) escrito por Cícero em 45 A.C.. Este livro trata da teoria de ética, muito popular durante a Renascença. A primeira linha de Lipsum, "Lorem ipsum dolor sit amet...", pode ser lida na seção 1.10.32.[1]</p>
                    </div>
                </div>

            </div>


            <div class="divider"></div>
            <div class="section">
                <h5 class="blue-text text-darken-3">Datas</h5>
                <br>
                <div class="row">
                    <div class="col s6">
                        <h6 class="grey-text text-darken-4"><strong>Início Inscrições</strong></h6>
                        <p class="grey-text text-darken-2">10-10-10</p>
                    </div>

                    <div class="col s6">
                        <h6 class="grey-text text-darken-4"><strong>Encerramento Inscrições</strong></h6>
                        <p class="grey-text text-darken-2">10-10-10</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <h6 class="grey-text text-darken-4"><strong>Início Evento</strong></h6>
                        <p class="grey-text text-darken-2">10-10-10</p>
                    </div>

                    <div class="col s6">
                        <h6 class="grey-text text-darken-4"><strong>Encerramento Evento</strong></h6>
                        <p class="grey-text text-darken-2">10-10-10</p>
                    </div>
                </div>
            </div>


            <div class="divider"></div>
            <div class="section">
                <h5 class="blue-text text-darken-3">Anexos</h5>
                <br>

                <ul class="collection with-header">
                    <li class="collection-header grey lighten-5">
                        <h6 class="grey-text text-darken-4">
                            <strong>Imagem</strong>
                        </h6>
                    </li>
                    <li class="collection-item">
                        <div>
                            <i class="material-icons left">image</i>
                            Alvin
                            <a href="#!" class="secondary-content">
                                <i class="material-icons right">visibility</i>
                                Visualizar Anexo
                            </a>
                        </div>
                    </li>
                    <li class="collection-header grey lighten-5">
                        <h6 class="grey-text text-darken-4">
                            <strong>Documentos</strong>
                        </h6>
                    </li>
                    <li class="collection-item">
                        <div><i class="material-icons ">picture_as_pdf</i>
                            Alvin
                            <a href="" class="secondary-content " >
                                <i class="material-icons right">visibility</i>
                                Visualizar Anexo
                            </a>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div><i class="material-icons">description</i>
                            Alvin
                            <a href="" class="secondary-content " >
                                <i class="material-icons right">visibility</i>
                                Visualizar Anexo
                            </a>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div><i class="material-icons">picture_as_pdf</i>
                            Alvin
                            <a href="" class="secondary-content " >
                                <i class="material-icons right">visibility</i>
                                Visualizar Anexo
                            </a>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div><i class="material-icons">description</i>
                            Alvin
                            <a href="" class="secondary-content " >
                                <i class="material-icons right">visibility</i>
                                Visualizar Anexo
                            </a>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="divider"></div>
            <div class="section">
                <h5 class="blue-text text-darken-3">Avaliação</h5>
                <br>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">offline_pin</i>
                        <select name="situacao" >
                            <option value="" disabled selected>Selecione a situação do Evento</option>

                            <option value="alteracao" >Aguardando alteração</option>
                            <option value="aprovado" >Aprovado</option>
                            <option value="reprovado" >Reprovado</option>

                        </select>
                        <label>Situação</label>
                    </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">archive </i>
                    <input  type="text" class="validate" name="caixaReferente">
                    <label for="caixaReferente">Caixa Referente</label>

            </div>
                </div>
                
                
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">description</i>
                        <textarea id="textarea" class="materialize-textarea" name="observacoes"></textarea>
                        <label for="textarea">Observações</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s1">
                    <input type="hidden" name="id[]" value="0">
                    <button class="waves-effect blue btn" name="salvar" type="submit">salvar</button>
                </div>

                <div class="col s1 offset-s2 offset-l1">
                    <a href="<?= $caminhoAtual ?>/eventos/pesquisar" class="waves-effect white blue-text btn">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

</main>
