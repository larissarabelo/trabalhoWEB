$(document).ready(function(){
    acharUser();

    $("#bNovaMensagem").click(function(){
        window.location.href="../paginas/mandarEmail.html";
    });

});

function receberDados(id){
    $userId=id;
    var retornoPHP=[];

    $.ajax({
        type:"post",
        dataType:"json",
        url:"../php/caixaEntrada.php",
        data:{
            "userId":$userId
        },
        success:function(retorno){
            for(var i=0; i<retorno.length;i++){
            retornoPHP.push(retorno[i]);
            }
        }
    });
}
function acharUser (){
    alert();
 
    var id=0;
    $.ajax({
        type:"post",
        dataType:"json",
        url:"../php/retornarId.php",
        success:function(retorno){
            id=retorno;
            listar(id);
        }
                
    });
}

function listar(id){

    $user=id;
    $.ajax({
        type:"post",
        dataType:"json",
        url:"../php/caixaEntrada.php",
        data:{
            "user":$user
        },
        success:function(retorno){
            alert("");
            $("mensagens").append("<tr> <td>Teste@eMailBoll.com</td> <td>Teste</td> <td>Teste2</td></tr>");
            console.log(retorno);
            //  tratarDados(retorno);         
        }
    });
}
/*
function tratarDados(retorno){
    tamanho = retorno.length;
    text = "<ul>";

    for (i = 0; i < tamanho; i++) {
        text += "<li>" + retorno[i].nom + "</li>";
      }
      text += "</ul>";


}

*/
