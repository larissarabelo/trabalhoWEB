$(document).ready(function(){
    $("#bEntrar").click(function(){
        login();
    });
    
    $("#bCadastrar").click(function(){
        cadastro();
    });

    $("#bCancelar").click(function(){
        window.location.href = "../index.html";
    });
       
    function login(){
        var ajax_email      = $("#tEmail").val();
        var ajax_senha      = $("#tSenha").val();

        if(ajax_email==""||ajax_senha==""){
            alert("Preencha todos os campos!");
        }

        else{
            alert();
            $.ajax({
                type:       "POST",
                dataType:   "json",
                url:        "php/listarXML.php",
                data:{
                    "email": email,
                    "senha": senha

                },

                success:function(retorno){
                    if(retorno == 1){
                        alert("Bem vindo!");
                        location.replace("./paginas/Email.html");
                    }
                    else if(retorno == 2){
                        alert("Email ou Senha incorretos!");
                    }
                    else if(retorno == 3){
                        alert("Preencha todos os campos!");
                    }
                    
                }                     
            });
        }
    };

    function cadastro(){
        var ajax_nome       = $("cNome").val();
        var ajax_sobrenome  = $("cSobrenome").val();
        var ajax_email      = $("#cEmail").val();
        var ajax_senha      = $("#cSenha").val();
        var ajax_confSenha  = $("#cSenhaConf").val();


        if(ajax_nome==""||ajax_sobrenome==""||ajax_email==""||ajax_senha==""||ajax_confSenha==""){
            alert("Preencha todos os campos!");
        }

        else if(ajax_senha!=ajax_confSenha){
            alert("Senha e Confirmar Senha não condizem!");
        }

        else{
            $.ajax({
                type:       "POST",
                dataType:   "json",
                url:        "../php/gravarXML.php",

                data:{
                    "nome": nome,
                    "sobrenome": sobrenome,
                    "email": email,
                    "senha": senha
                },

                success:function(retorno){
                    alert(retorno);
                    location.replace("../Index.html");
                }
            });
        }   
    };
});