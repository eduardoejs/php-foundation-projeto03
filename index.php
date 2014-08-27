<?php
    /* Ativa as diretivas para exibição de avisos e erros que o sistema está tendo */
    error_reporting(E_ALL);
    ini_set("display_errors", true);
    error_reporting(E_ALL | E_STRICT);
?>
<?php require_once("estrutura/header.php"); ?>
<?php require_once("estrutura/menu-superior.php"); ?>
<?php require_once("paginas/conteudo.php") ?>
<?php require_once("estrutura/footer.php"); ?>



