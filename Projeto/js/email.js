$(document).ready(function(){

    $("#caixaEntrada").click(function(){
        $.ajax({
            type:"post",
            dataType:"json",
            url:"../php/caixaEntrada.php",
            data:{
                "remetente": remetente,
                "assunto": assunto,
                "mensagem": mensagem
            },
            success:function(retorno){
                for(e=0; e<=retorno.leight; e++){
                    $("#mensagens").append("<tr><td>"
                    +remetente+"</td><td>"
                    +assunto+"</td><td>"
                    +mensagem+"</td></tr>");
                };
            }
        });
    });

    $("#enviados").click(function(){
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
        alert("Nao funciona");
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