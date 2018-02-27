<main class="container">
    <form class="col s12"  method="POST" enctype="multipart/form-data">

        <div class="section">
            <div class="row">
                <h5>Selecione um dos modelos abaixo para preencher e importar:</h5>
            </div>
            <div class="row">
                <div class="col s6">
                    <a download href="Arquivos/arquivo_cadastro_aluno.xml"><i class="material-icons left">file_download</i>Modelo arquivo Aluno</a>
                </div>
                <div class="col s6">
                    <a download href="Arquivos/arquivo_cadastro_professor.xml"><i class="material-icons left">file_download</i>Modelo arquivo Professor</a>
                </div>
            </div>
        </div>

        <div class="divider"></div>

        <div class="section">
            <div class="row">
                <h5>Selecione o arquivo preenchido e importe.</h5>
            </div>

            <div class="row center">
                <div class="file-field input-field col s12">
                    <div class="btn blue">
                        <span>Selecionar arquivo</span>
                        <input type="file" name="arquivo" required>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Selecione um arquivo" required>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="center">
                    <button class="waves-effect blue btn" name="importar" type="submit"><i class="material-icons left">cloud_upload</i>importar</button>
                </div>
            </div>
        </div>

    </form>

</main>