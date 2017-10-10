<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    require './conexao.php';

    $json = json_decode(file_get_contents('php://input'),TRUE);

    $pdoAluno = conexao();
    $pdoAluno->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nome = $json["nome"];
    $telefone = $json["telefone"];
    $curso = $json["curso"];
    
    $queryPrepare = $pdoAluno->prepare("INSERT INTO tb_aluno (nome,telefone,curso) "
                                     . "VALUES (:nome, :telefone, :curso)");
    
    $queryPrepare->bindValue(':nome', $nome, PDO::PARAM_STR);
    $queryPrepare->bindValue(':telefone', $telefone, PDO::PARAM_STR);
    $queryPrepare->bindValue(':curso', $curso, PDO::PARAM_INT);
    $queryPrepare->execute();