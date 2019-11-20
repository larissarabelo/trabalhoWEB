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
 
    var id=0;
    $.ajax({
            type:"post",
            dataType:"json",
            url:"../php/retornarId.php",
            success:function(retorno){
                id=retorno;
                receberDados(id);

            }
            
        });

}


function listarUsers(){



}