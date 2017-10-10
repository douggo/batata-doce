<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    require './conexao.php';
    
    $json = json_decode(file_get_contents('php://input'),TRUE);
    
    $pdoAluno = conexao();
    $pdoAluno->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id_aluno = $json["id"];
    
    $queryPrepare = $pdoAluno->prepare("DELETE FROM tb_aluno "
                                     . "WHERE id = :id");
    
    $queryPrepare->bindValue(':id', $id_aluno,PDO::PARAM_INT);
    
    if  ($queryPrepare->execute()) {
        echo json_encode(true);
    }
    else
    {
        echo json_encode(false);
    }