<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    require './conexao.php';
    $pdoCursos = conexao();
    
    $stmtCursos = $pdoCursos->prepare('SELECT * FROM tb_cursos ORDER BY nome_curso ASC');
    $stmtCursos->execute();
    $result = $stmtCursos->fetchAll(PDO::FETCH_ASSOC);
    
    $jsonResult = json_encode($result);
    echo $jsonResult;