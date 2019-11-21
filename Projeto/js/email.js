$(document).ready(function(){

    acharUser();
    $("#enviados").click(function(){
        alert("Nao funciona");

    });

    $("#favoritos").click(function(){
        alert("Nao funciona");
    });

    $("#rascunho").click(function(){
        alert("Nao funciona");
    });

    $("#lixo").click(function(){
        alert("Nao funciona");
    });

    $("#excluidos").click(function(){
        
        
    });
    
    $("#arquivoMorto").click(function(){
        alert("Nao funciona");
    });

    $("#bNovaMensagem").click(function(){
        window.location.href="../paginas/mandarEmail.html";
    });
    
    $("#conta").click(function(){
        alert("Nao funciona");
    });

    $("#sair").click(function(){
        window.location.href="../index.html";
    });

    $("#barraPesquisa").click(function(){
    });

    $("#bPesquisa").click(function(){
        alert("Nao funciona");
    });
    
});


function acharUser(){

    var id=0;
    $.ajax({
            type:"post",
            dataType:"json",
            url:"../php/retornarId.php",
            success:function(retorno){
                //console.log(retorno);
                id=retorno;
                listar(id);

            }
            
        });



}

function listar(id){

    $userId=id;
    $.ajax({
        type:"post",
        dataType:"json",
        url:"../php/caixaEntrada.php",
        data:{
            userId: $userId
        },
        success:function(retorno){
            console.log(retorno);
            console.log("blz");
            for(e=0; e<=retorno.leight; e++){
                $("#mensagens").append("<tr><td>"+
                retorno.nome+      "</td><td>"+
                retorno.assunto+        "</td><td>"+
                retorno.mensagem+       "</td></tr>");
            };
        }
    });
}