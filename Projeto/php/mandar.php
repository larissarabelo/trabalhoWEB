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
        $existeReme = false;
        $existeCopia=false;


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
                if($xml->email == $remetente){
                    //achar remetente
                    $existeReme = true;
                    $urlReme=$url."/email/enviado/";
                }

                if($xml->email == $copia){
                    //achar o copia
                    $existeCopia = true;
                    $urlCopia=$url."/email/entrada/";
                }
            }
        }

        if($existeDest && $existeReme){
            if($existeCopia){
           
                //enviar se existir copia
        
                $xml = new DOMDocument("1.0");
                            
                $xml_envio = $xml->createElement("enviar");
        
                $xml_desti = $xml->createElement("destinatario",$destinatario);
                $xml_assunto = $xml->createElement("assunto",$assunto);
                $xml_mensagem = $xml->createElement("mensagem",$mensagem);
                $xml_remetente = $xml->createElement("remetente",$remetente);
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
                $xml_remetente = $xml->createElement("remetente",$remetente);
    
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
            echo json_encode(3);
            //deu ruim
        }
    }

    //retornos
    //if($cont == 2){
    //  echo json_encode(-2);
    //}
    //else{
    //  if($existe){
    //      echo json_encode(1);
    //  }
    //  else{
    //      echo json_encode(-3);
    //  }
    //}
    //else{
    //  echo json_encode(-1);
    //}
    else{
        Header("Location: ../html/login.html");
    }
}
exit();
?>