/* global app */
app.controller('CtrlCursos', function($scope,$http){
    
    $scope.getCursos = function(){
        $http.get("GetCursos.php")
        .then(function(response){
            $scope.cursos = response.data;
        });
    };
    
    $scope.getCursos();
});


