<?php
if($_POST){
    extract($_POST);
    if(isset($remetente ,$destinatario, $assunto, $mensagem)){
        $d = dir("../xml/");
        $cont = 0;
        $urlDest="";
        $urlReme="";
        $urlCopia="";
        $existeDest = false;
        $existeCopia=false;
        $idRemetente=null;
        $emailRemetente="";

        while(($dir = $d->read()) !== false){
            $cont++;
            $url = "../xml/".$dir;
            
            if(file_exists($url."/dados.xml")){
                $str_xml = file_get_contents($url."/dados.xml");
                $xml = simplexml_load_string($str_xml);
                if($xml->email == $destinatario){
                    $existeDest = true;
                    //achar destinatario
                   $urlDest=$url."/email/entrada/";

                }
                $arr_id = explode("_",$dir);
                $idAtualDoLooping = $arr_id[1];
                if($idAtualDoLooping==$remetente){
                    //achar remetente
                    $urlReme=$url."/email/enviado/";
                    
                    $str_xml = file_get_contents($url."/dados.xml");
                    $xml = simplexml_load_string($str_xml);
                    $emailRemetente= $xml->nome;
                    
                   
                }

                if($xml->email == $copia){
                    //achar o copia
                    $existeCopia = true;
                    $urlCopia=$url."/email/entrada/";
                    }
                }
            }
    }
   



        if($existeDest){
            if($existeCopia){
           
                //enviar se existir copia
        
                $xml = new DOMDocument("1.0");
                            
                $xml_envio = $xml->createElement("enviar");
        
                $xml_desti = $xml->createElement("destinatario",$destinatario);
                $xml_assunto = $xml->createElement("assunto",$assunto);
                $xml_mensagem = $xml->createElement("mensagem",$mensagem);
                $xml_remetente = $xml->createElement("remetente",$emailRemetente);
                $xml_copia = $xml->createElement("copia",$copia);
    
                $xml_envio->appendChild($xml_desti);
                $xml_envio->appendChild($xml_assunto);
                $xml_envio->appendChild($xml_mensagem);
                $xml_envio->appendChild($xml_remetente);
                $xml_envio->appendChild($xml_copia);
    
                $xml->appendChild($xml_envio);
                $xml->save($urlDest."caixa.xml");
                $xml->save($urlReme."enviados.xml");
                $xml->save($urlCopia."caixa.xml");
    
                echo json_encode(1);
        
            }

            else{
                //enviar sem copia:
                $xml = new DOMDocument("1.0");
                        
                $xml_envio = $xml->createElement("enviar");
    
                $xml_desti = $xml->createElement("destinatario",$destinatario);
                $xml_assunto = $xml->createElement("assunto",$assunto);
                $xml_mensagem = $xml->createElement("mensagem",$mensagem);
                $xml_remetente = $xml->createElement("remetente",$emailRemetente);
    
                $xml_envio->appendChild($xml_desti);
                $xml_envio->appendChild($xml_assunto);
                $xml_envio->appendChild($xml_mensagem);
                $xml_envio->appendChild($xml_remetente);
    
                $xml->appendChild($xml_envio);
                $xml->save($urlDest."caixa.xml");
                $xml->save($urlReme."enivados.xml");
                echo json_encode(2);
    
            }
        }
        
    else{
        //destinario n existe
    Header("Location: ../html/entrada.html");
    }   

  
    
}

//post n existe
else{
    echo json_encode(3); 
   }

exit();
?>