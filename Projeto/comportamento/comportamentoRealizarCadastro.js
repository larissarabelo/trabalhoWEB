$(document).ready(function(){
   
        inserir();

    });

    function inserir(){

     $("#botaoCadastrar").click(function(){
          
        $nome= $("#nomeUser").val();
        $sobrenome= $("#sobrenomeUser").val();
        $email= $("#email").val();
        $senha= $("#senha").val();
        $confirmarSenha= $("#confirmarSenha").val();
        var numeroCaracteresSenha= $senha.length;

        console.log("LINDA");
       // var emailOk=false;
       var cadastroOK=false;


        
        if($nome==""||$sobrenome==""||$senha==""||$email==""||$confirmarSenha==""){
                var camposVazios=[];

                if($nome==""){
                    camposVazios.push("nome");
                    $("#nomeUser").addClass("error");

                }    
                if($sobrenome==""){
                    camposVazios.push("sobrenome");
                    $("#sobrenomeUser").addClass("error");


                }    
                if($email==""){
                    camposVazios.push("email");
                    $("#email").addClass("error");


                }  
                if($senha==""){

                    camposVazios.push("senha");
                    $("#senha").addClass("error");



                }  
                if($confirmarSenha==""){
                    camposVazios.push("confirmar senha");
                    $("#confirmarSenha").addClass("error");



                }  

                for (let cont = 0; cont < camposVazios.length; cont++) {
                    alert("Preencha o campo "+camposVazios[cont]);
                    
                }
        }
        
      
        if($senha.l!=$confirmarSenha){
                $("#confirmarSenha").addClass("error");
                alert("A senha e o cofirmar senha devem ser iguais.");
               
        }
            
        if(numeroCaracteresSenha<8){
                alert("Sua senha deve ter pelo menos 8 caracteres.");
    
        }
    
              
    });
    }