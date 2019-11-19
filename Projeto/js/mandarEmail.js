$(document).ready(function(){


    $("voltar").click(function(){
        alert();

        window.location.href="./paginas/entrada.html";

    });

    $("#enviar").click(function(){
        $remetente=$("#remetente").val();
        $destinatario=$("#destinatario").val();
        $destinatarioCopia=$("#copia").val();
        $assunto=$("#assunto").val();
        $mensagem=$("#mensagem").val();

        $.ajax({
            type:"post",
            dataType:"json",
            url:"../php/mandar.php",
            data:{
                "remetente":$remetente,
                "destinatario":$destinatario,
                "copia":$destinatarioCopia,
                "assunto":$assunto,
                "mensagem":$mensagem
            },
            success:function(retorno){
                switch(retorno){
                    //ARRUMAR
                    case 1:
                        alert("1");
                      //  window.location.href="./paginas/entrada.html";
                        break;
                  //  case -1:
                            alert("2");
                        //alert("Acesso não autorizado.");
                    //    break;
                    case -2:
                            alert("3");
                        //window.location.href="../paginas/cadastro.html";
                        break;
                   // case -3:
                     //       alert("4");

                        //alert("Login ou Senha Incorretos.")
                       // break;
                }
            }
        });

    });
});