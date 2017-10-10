/* global app */
app.controller('CtrlAlunos', function($scope, $http){
   
    var nomeBotao = 'Confirmar Edição';
    $scope.botao = "Cadastrar Aluno";
    
    $scope.getAlunos = function(){
        $http.get("GetAlunos.php").then(function(response){
            $scope.alunos = response.data;
        });        
    };
    
    $scope.getAlunos();
    
    $scope.limpaTudo = function() {
        $scope.nomeAluno = '';
        $scope.telefoneAluno = '';
        $scope.alunoID = '';
        this.cursoAluno = '';
    };
    
    $scope.recuperaDados = function(aluno){
        $scope.nomeAluno = aluno.nome;
        $scope.telefoneAluno = aluno.telefone;
        $scope.alunoID = aluno.id;
        $scope.botao = nomeBotao;
        document.getElementById("selectCurso").selectedIndex = aluno.curso;
    };
    
    $scope.insereAlunos = function(nomeAluno, telefoneAluno, cursoAluno){
        var payload = {
            nome: nomeAluno,
            telefone: telefoneAluno,
            curso: cursoAluno.id
        };
        
        var payloadAlter = {
            nome: nomeAluno,
            telefone: telefoneAluno,
            curso: cursoAluno.id,
            idAluno: $scope.alunoID
        };
        
        if (angular.equals($scope.botao, nomeBotao)) {
            $http.post("AlteraAluno.php", payloadAlter, {
                headers: {
                    'Content-Type': 'application/json; charset=utf-8'
                }
            }).then(function(){
                console.log(nomeAluno + ' foi alterado com sucesso!');
                $scope.getAlunos();
            }, function(){
                alert('ERRO!');
                console.log('Erro ao tentar alterar ' + nomeAluno + '!');
            });
            $scope.botao = 'Cadastrar Aluno';
        } else {
            $http.post("InsereAlunos.php", payload, {
                headers: {
                    'Content-Type': 'application/json; charset=utf-8'
                }
            }).then(function(){
                console.log(nomeAluno + ' foi inserido com sucesso!');
                $scope.getAlunos();
            }, function(){
                alert('ERRO!');
                console.log('Erro ao tentar incluír ' + nomeAluno + '!');
            });
        }
    };    

    $scope.deletaAluno = function (aluno){
        var payload = {
            id: aluno.id
        };
        
        $http.post("DeletaAlunos.php", payload, {
            headers: {
                'Content-Type': 'application/json; charset=utf-8'
            }
        }).then(function(){
            console.log(aluno.nome + ' foi excluído com sucesso!');
            $scope.getAlunos();
        }, function(){
            alert('ERRO!');
            console.log('Erro ao excluir o usuário desejado: ' + aluno.id + ' ' + aluno.nome +'.');
        });
    };
    
});