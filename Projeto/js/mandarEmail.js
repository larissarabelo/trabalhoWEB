$(document).ready(function(){


    $("#voltar").click(function(){
        window.location.href="../paginas/email.html";
    });
    $("#enviar").click(function(){
        acharUser();
    });
    
});
function enviar(id){
    

    $remetente=id;
    $destinatario=$("#destinatario").val();
    $copia=$("#copia").val();
    $assunto=$("#assunto").val();
    $mensagem=$("#mensagem").val();

    $.ajax({
        type:"post",
        dataType:"json",
        url:"../php/mandar.php",
        data:{
            "remetente":$remetente,
            "destinatario":$destinatario,
            "copia":$copia,
            "assunto":$assunto,
            "mensagem":$mensagem,
            "id":id
        },
        success:function(retorno){
            console.log(retorno);
            switch(retorno){
                //ARRUMAR
                case 1:
                  alert("Email enviado para a copia também.");
                  window.location.href="../paginas/email.html";
                    break;
                case 2:
                    alert("Email enviado sem copia.");
                    window.location.href="../paginas/email.html";
                    break;
                case 3:
                    alert("Nao existe remetente ou destinatario. Por favor tente novamente");
                    break;           
            
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
                console.log(retorno);
                id=retorno;
                enviar(id);

            }
            
        });

}