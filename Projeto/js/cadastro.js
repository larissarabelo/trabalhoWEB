$(document).ready(function(){

    $("input").attr("required",true);

    $("form").submit(function(){
        preenchido = true;
        $("input").each(function(id,input){
            if($(input).val()==""){
                preenchido = false;
            }
        });
        if(preenchido){
            if($.trim($("#senha").val())==$.trim($("#confSenha").val())){
                $.ajax({
                    type:"POST",
                    dataType:"json",
                    url:"../php/cadastro.php",
                    data:{
                        "nome": $("#nome").val(),
                        "sobrenome":$("#sobrenome").val(),
                        "email":$("#email").val(),
                        "senha":$("#senha").val()

                    },
                    success:function(retorno){
                        switch(retorno){
                            case 1:
                                alert("USUARIO CADASTRADO COM SUCESSO");
                                window.location.href="entrada.html";
                                break;
                            case -1:
                                alert("USUARIO JA CADASTRADO NO SISTEMA");
                                break;
                            case -2:
                                alert("SISTEMA SEM PERMISSAO NO SERIVDOR.");
                                break;
                        }
                    }
                });
            }
            else{
                alert("Senha diferente de Confirmar de Senha.");
            }
        }
        else{
            alert("Todos os campos devem ser preenchidos.");
        }
        return false;
    });
    $("#voltar").click(function(){
        window.location.href="../index.html";
    });
});