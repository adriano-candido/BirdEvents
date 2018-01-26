<!DOCTYPE html>
<html lang="pt-BR">
    <base href="/Copex/" />
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Copex</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>

    <body>


        <div id="menu">

            <header  class="navbar-fixed">
                <nav class="blue">
                    <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
                    <span class="brand-logo center"><?php echo isset($pagina) ? $pagina : ''; ?></span>
                </nav>
            </header>

            <?php \App\Controladores\LoginControle::retornaNavPorAcesso(); ?>
        </div>

        <br>

        <?= $this->conteudo(); ?>
        
        <br>
        
        <footer class="page-footer blue">
            <div class="footer-copyright">
                <div class="container">
                    © 2018 Bird Arretados, Todos os direitos reservados.
                    <a class="grey-text text-lighten-4 right" href="http://www.birdarretados.com.br/fabrica/">Conheça o Bird Arretados!</a>
                </div>
            </div>
        </footer>

        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <?php echo isset($toast) ? $toast : ''; ?>

    </body>
</html>
