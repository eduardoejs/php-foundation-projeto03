<?php
    $url = parse_url("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
    $path = explode('/',$url['path'],2);

    require_once("funcoes/funcoes_DB.php");

    function validar_rotas($rota) {

        $rotas_sistema = ["home", "empresa", "produtos", "servicos", "contato, 404"];

        if (in_array($rota[1], $rotas_sistema)):
            return $conteudo = listarConteudo('paginas', $rota[1]);
        elseif (isset($_POST['buscar'])):
            return $conteudo = buscar($_POST['buscar'],'paginas');
        elseif ($rota[1] == ""):
            return $conteudo = listarConteudo('paginas', 'home');
        elseif ($rota[1] == "contato"):
            return require_once('paginas/contato.php');
        else:
            http_response_code(404);
            return $conteudo = listarConteudo('paginas', '404');
        endif;
    }
?>
<div id="conteudo">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-6">.</div>
            <div class="col-md-6">.</div>
        </div>
        <?php
            $conteudo = validar_rotas($path);

            print "<h1>{$conteudo['titulo_pagina']}</h1>";

            if (http_response_code() == 404)
                print "<h3>{$conteudo['conteudo_pagina']}</h3>";
            else
                print "<p>{$conteudo['conteudo_pagina']}</p>";
        ?>
    </div>
</div>