<?php

function conectarDB(){
    try {
        include('config.php');

        $pdo = new \PDO($dsn.";dbname={$dbname}", $usuario, $senha, $opcoes);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (\PDOException $e) {
        die("Erro: Código: {$e->getCode()}: Mensagem: {$e->getMessage()}");
    }

    return $pdo;
}

function listarConteudo($tabela, $pagina){
    $sql = "Select * from {$tabela} where pagina = :pagina";

    $pdo = conectarDB();
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue("pagina", $pagina);
    $stmt->execute();

    $conteudo = $stmt->fetch(PDO::FETCH_ASSOC);

    return $conteudo;
}

function buscar($palavra, $tabela){
    try{
        if (!empty($palavra)){
            $sql = "Select * from {$tabela} where conteudo_pagina like :palavra;";

            $pdo = conectarDB();
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue("palavra", "%{$palavra}%");
            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    } catch(\PDOException $e){
        die("Erro: Código: {$e->getCode()}: Mensagem: {$e->getMessage()}");
    }

    if(count($resultados) > 0){
        print "<h1>Resultados encontrados:<br></h1>";
        print "<h3>A busca pela palavra [$palavra] retornou os seguintes resultados: </h3>";
        foreach($resultados as $pagina){
            print "<a href='{$pagina['pagina']}'>{$pagina['titulo_pagina']}</a><br/>";
        }
    }else{
        print "<h1>Resultado da busca: </h1><br/>";
        print "<h2>Não foram encontradas páginas com a palavra [{$palavra}]...</h2>";
    }
}