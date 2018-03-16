<?php
$imagemCodificada = "";
$textoTransformado = "nada";
$deveGerarPDF = true;

$usuario = new App\Modelos\Usuario();
$usuario->setNome('José');
$usuario->setTipoAcesso('professor');
$projeto = new \App\Modelos\Projeto();
$projeto->setNome('ADMTEC');

$marcacoes = [
    '<usuario/nome>' => $usuario->getNome(),
    '<usuario/tipoAcesso>' => $usuario->getTipoAcesso(),
    '<projeto/nome>' => $projeto->getNome()
];

if (isset($_FILES['imagem'])) {

    $imagem = fopen($_FILES['imagem']['tmp_name'], "r");

    $tamanho = filesize($_FILES['imagem']['tmp_name']);

    $imagemCodificada = base64_encode(fread($imagem, $tamanho));
} else {
    $deveGerarPDF = false;
}

if (isset($_POST['texto'])) {

    $textoOriginal = isset($_POST ['texto']) ? $_POST ['texto'] : 'nada';

    $textoTransformado = transformarTexto($textoOriginal, $marcacoes);
} else {
    $deveGerarPDF = false;
}

function transformarTexto($texto, $marcacoes) {
    foreach ($marcacoes as $chave => $valor) {
        $texto = str_replace($chave, $valor, $texto);
    }
    return $texto;
}

if ($deveGerarPDF) {

    $html = <<<HTML
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
            
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
            
        <style>
        * {
            margin:0px;
            padding:0px;
        }
        </style>
        
    </head>
    <body>
        <div class="white" style="position: relative; width: 1100px; height: 778px;  margin: 1% -5% -5% 1%;">    
            
            <div style=" position: absolute; transform: translateY(-50%); top: 50%; padding-left: 50px; padding-rigth: 50px">
                <b><h3 class="center-align" style=" font-family: 'Roboto Slab', serif;">
                    $textoTransformado
                </h3></b>                
            </div>
           <img src="data:image/jpg;base64, $imagemCodificada" width="100%" height="100%">
        </div>
    </body>
</html>
HTML;


    require_once("vendor\dompdf\autoload.inc.php");

    $dom = new Dompdf\Dompdf();

    $dom->load_html($html);

    $dom->setPaper('A4', 'landscape');

    $dom->render();

// Output the generated PDF to Browser
    $dom->stream(
            "saida", // Nome do arquivo de saída
            array(
        "Attachment" => false // Para download, altere para true 
            )
    );

    //echo $html;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <base href="/birdevents/Copex/" />
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


        <main class="container">

            <form class="col s12"  method="POST" enctype="multipart/form-data">


                <div class="section">
                    <div class="row">
                        <h5>Selecione a imagem para o certificado.</h5>
                    </div>

                    <div class="row center">
                        <div class="file-field input-field col s12">
                            <div class="btn blue">
                                <span>Selecionar arquivo</span>
                                <input type="file" name="imagem" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Selecione um arquivo" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section">

                    <div class="row">
                        <h5>Informe um texto para o certificado.</h5>                

                        <h6>Marcações disponíveis:</h6>
                        <?php foreach ($marcacoes as $key => $value) : ?>
                            <p><?= htmlspecialchars($key) ?></p>
                        <?php endforeach; ?>

                    </div>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">text_fields</i>
                        <textarea type="text" class="validate" name="texto" placeholder="Ex.: Certifico que o <usuario/nome> participou do projeto <projeto/nome> "></textarea>

                    </div>
                </div>


                <div class="row ">
                    <div class="center">
                        <button class="waves-effect blue btn" type="submit"><i class="material-icons left">settings</i>Gerar Certificado</button>
                    </div>
                </div>
                </div>

            </form>

        </main>

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
