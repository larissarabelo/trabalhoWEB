var mensagens=[];

$(document).ready(function(){

    verificarMensagens();

});

function verificarMensagens(){
    if(mensagens.length!=0){
        console.log("Há mais de um e-mail")
    }else{
        console.log("Não há emails")
    }

}