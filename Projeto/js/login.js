$(document).ready(function(){
    $("#bCadastrar").click(function(){
        window.location.href="paginas/cadastro.html";
    });

    $("input").attr("required",true);

    $("form#formularioLogin").submit(function(){
        preenchido = true;

        $("input").each(function(id,input){
            if($(input).val()==""){
                preenchido = false
            }
        });

        if(preenchido){
            $.ajax({
                type:"post",
                dataType:"json",
                url:"./php/login.php",
                data:{
                    "email":$("#email").val(),
                    "senha":$("#senha").val()
                },
                success:function(retorno){
                    switch(retorno){
                        case 1:
                            window.location.href="./paginas/email.html";
                            break;
                        case -1:
                            alert("Acesso não autorizado.");
                            break;
                        case -2:
                            //nao há nenhum usuario
                            window.location.href="./paginas/cadastro.html";
                            break;
                        case -3:
                            alert("Login ou Senha Incorretos.")
                            break;
                    }
                }
            });
        }
        else{
            alert("Preencha todos os campos.");
        }
        return false;
    });
});