<?php
function conexao() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    try {
        $conexao = new PDO("mysql:host=$host;dbname=batata_doce", 
                           $user, 
                           $pass,
                           array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexao;
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
}
