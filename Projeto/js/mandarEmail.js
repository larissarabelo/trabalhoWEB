$(document).ready(function(){


    $("voltar").click(function(){
        alert();

        window.location.href="./paginas/entrada.html";

    });

    $("#enviar").click(function(){
        $remetente=$("#remetente").val();
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
                "mensagem":$mensagem
            },
            success:function(retorno){
                switch(retorno){
                    //ARRUMAR
                    case 1:
                      alert("Email enviado para a copia também.");
                      window.location.href="../paginas/entrada.html";
                    break;
                    case 2:
                        alert("Email enviado sem copia.");
                        window.location.href="../paginas/entrada.html";
                    break;

                    case 3:
                        alert("Nao existe remetente ou destinatario. Por favor tente novamente");
                        
                        break;
                   
                }
            }
        });

    });
});