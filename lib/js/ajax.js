//FUNÇÃO PARA POPULAR O SELECT COM OS CURSOS DISPONÍVEIS
$(document).ready(function (){
    $('#cmbCurso').empty();       //Limpa o combobox
    $.ajax({
        type: 'post',             //Define o método HTTP utilizado
        dataType: 'json',         //Define o tipo do retorno
        url: 'getCursos.php',     //Define o arquivo onde serão buscados os dados
        success: function (dados) {
            //Adiciona os regitros do JSON no combobox
            for (var i = 0; dados.length > i; i++){
                $('#cmbCurso').append('<option value=' + dados[i].id + '>' + dados[i].nome_curso + '</option>');
            }
        }
    });
});

//FUNÇÃO PARA POPULAR A TABELA COM OS ALUNOS
$(document).ready(function (){
    $('#tabela').empty();         //Limpa a tabela
    $.ajax({
        type: 'post',             //Define o método HTTP utilizado
        dataType: 'json',         //Define o tipo do retorno
        url: 'getAlunos.php',     //Define o arquivo onde serão buscados os dados
        success: function (dados) {
            for (var i = 0; dados.length > i; i++){
                //Adiciona os regitros do JSON na tabela
                $('#tabela').append('<tr>\n\
                                        <td>' + dados[i].id + '</td>\n\
                                        <td>' + dados[i].nome + '</td>\n\
                                        <td>' + dados[i].telefone + '</td>\n\
                                        <td>' + dados[i].nome_curso + '</td>\n\
                                     </tr>');
            }
        }
    });
});


