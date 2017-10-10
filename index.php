<?php
   require 'conexao.php';
   $pdo = conexao();
?>

<!DOCTYPE html>
<html >
    <head>
        <title>Batata Doce</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">     
        <script type='text/javascript' src="lib/js/jquery-3.2.1.js"></script>     
        <script type='text/javascript' src="lib/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js" type="text/javascript"></script>
        <script src="lib/Application/BatataDoce.js"  type="text/javascript"></script>
        <script src="lib/Controllers/CtrlAlunos.js" type="text/javascript"></script>
        <script src="lib/Controllers/CtrlCursos.js" type="text/javascript"></script>
        <link rel="stylesheet" href="lib/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="lib/css/normalize.css" type="text/css">
        <link rel="stylesheet" href="lib/css/estilo.css" type="text/css">       
    </head>
    <body ng-app="BatataDoce" ng-controller="CtrlAlunos" id="inicio">
        <div class="row">
            <div class="col-xs-8 formulario">                
                <div class="formulario" ng-controller="CtrlCursos">
                    <form> 
                        <input type="text" ng-model="alunoID" class="hidden"/>
                        <p>Nome:</p> 
                        <input type="text" ng-model="nomeAluno" class="btn-block" placeholder="digite seu nome" required/><br><br>
                        <p>Telefone:</p>
                        <input type="text" ng-model="telefoneAluno" class="btn-block" placeholder="digite seu telefone" required/><br><br>
                        <p>Curso:</p>
                        <select id="selectCurso" ng-model="cursoAluno" ng-options="curso.nome_curso for curso in cursos track by curso.id" class="btn-block">
                            <option value="">Selecione uma opção</option>
                        </select>
                        <br><br>
                        <button ng-model="cadastrarAluno" ng-click="insereAlunos(nomeAluno, telefoneAluno, cursoAluno, alunoID); limpaTudo()" class="btn btn-primary btn-block">{{botao}}</button>
                    </form>  
                </div>
            </div>
            <div class="col-xs-8 tabela row">
                <table  class="table table-striped table-responsive" border='1'>
                    <thead class="row">
                        <tr class="row">
                            <th class="text-center">ID</th>
                            <th class="text-center">Aluno</th>
                            <th class="text-center">Telefone</th>
                            <th class="text-center">Curso</th>
                            <th colspan="2" class="text-center">Opções</th>
                        </tr>
                    </thead>
                    <tbody class="row">
                        <tr class="row" ng-repeat="aluno in alunos">
                            <td>{{ aluno.id }}</td>
                            <td>{{ aluno.nome }}</td>
                            <td>{{ aluno.telefone }}</td>
                            <td class="hidden">{{ aluno.curso }}</td>
                            <td>{{ aluno.nome_curso }}</td>
                            <td><button ng-click="recuperaDados(aluno)"class="btn btn-success" id='btnAlterar'><a href="#inicio">Alterar</a></button></td>
                            <td><button ng-click="deletaAluno(aluno)" class="btn btn-danger" id='btnApagar'>Apagar</button></td>
                        </tr>
                    </tbody>                    
                </table>
            </div>
        </div>
    </body>
</html>