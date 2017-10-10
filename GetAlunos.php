<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    require './conexao.php';
    $pdoAluno = conexao();
    $pdoAluno->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmtAluno = $pdoAluno->prepare("SELECT tba.id, tba.nome, tba.telefone, tba.curso, tbc.nome_curso "
                                  . "FROM tb_aluno tba "
                                  . "JOIN tb_cursos tbc on (tba.curso = tbc.id)");
    $stmtAluno->execute();
    $result = $stmtAluno->fetchAll(PDO::FETCH_ASSOC);
    
    $jsonResult = json_encode($result);
    echo $jsonResult;