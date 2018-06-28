<main class="container">
    <div class="row">
        <form class="col s12" method="POST">
            <div class="row">
                
                    <div class="input-field col s6">
                        <i class="material-icons prefix">payment</i>
                        <input type="text" class="validate cpf"  name="cpf">
                        <label >CPF</label>
                    </div>
                
                <div class="input-field col s6">
                        <i class="material-icons prefix">photo_size_select_small</i>
                        <input type="text" class="validate"  name="cod_validacao">
                        <label >Código de Validação</label>
                    </div>

                </div>

                <div class="row">
                    <div class="col s1">
                        <button class="waves-effect blue btn" name="validar" type="submit">Validar</button>
                    </div>

            </div>
        </form>
    </div>

</main>