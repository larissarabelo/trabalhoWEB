$(document).ready(function(){
  $id=null;

        $.ajax({
            dataType:"json",
            url:"../php/retornarId.php",
            success:function(retorno){
                id=retorno;
                alert(id);
            }
        });

    
    
$("#bNovaMensagem").click(function(){
    window.location.href="../paginas/mandarEmail.html";

    });

//ajax

//segundo ajax

/*$.ajax({
    type:"POST",
    dataType:"json",
    url:"./php/caixaEntrada.php",
    data:{
        "id": $id
        
    },
    success:function(retorno){
        id=retorno;
    }
}

    

  */  
});