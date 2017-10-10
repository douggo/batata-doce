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
    $id_aluno = $json["idAluno"];
    
    $queryPrepare = $pdoAluno->prepare("UPDATE tb_aluno "
                                     . "SET nome = :nome, telefone = :telefone, curso = :curso "
                                     . "WHERE id = :id");

    $queryPrepare->bindValue(':nome', $nome, PDO::PARAM_STR);
    $queryPrepare->bindValue(':telefone', $telefone, PDO::PARAM_STR);
    $queryPrepare->bindValue(':curso', $curso, PDO::PARAM_STR);
    $queryPrepare->bindValue(':id', $id_aluno,PDO::PARAM_INT);
    
    if  ($queryPrepare->execute()) {
        echo json_encode(true);
    }
    else
    {
        echo json_encode(false);
    }