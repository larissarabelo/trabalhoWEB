<?php
if($_POST){

    extract($_POST);

    $d = dir("../xml/");
    $cont = 0;
    $urlDest="";
    $urlReme="";
    $urlCopia="";
    $existeDest = false;
    $existeCopia=false;
    $idRemetente=null;
    $emailRemetente="";

    //ler quantas pastas tem no diretorio  XML de usuário existentes
    while(($dir = $d->read()) !== false){

        $cont++;
        $url = "../xml/".$dir;

        //email de entrada
        if(file_exists($url."/email/entrada")){
            //
            $str_xml = file_get_contents($url."/dados.xml");
            $xml = simplexml_load_string($str_xml);

            //verificar quem é o destinatario e colocar na sua pasta
            if($xml->email == $destinatario){
                $existeDest = true;
                
                $contEmailsEntrada = -1;
                $diretorio = $url."/email/entrada/";
                // esse seria o "handler" do diretório
                $dh = opendir($diretorio);
                // loop que busca todos os arquivos até que não encontre mais nada
                while (false !== ($filename = readdir($dh))) {
                    $contEmailsEntrada++;
                }
                $urlDest=$url."/email/entrada/$contEmailsEntrada";
            }
            
            //verificar quem é o do remetente
            $arr_id = explode("_",$dir);
            $idAtualDoLooping = $arr_id[1];

            if($idAtualDoLooping==$remetente){
                //achar remetente
                $str_xml = file_get_contents($url."/dados.xml");
                $xml = simplexml_load_string($str_xml);
                $emailRemetente= $xml->nome;
               
                $contEmailsEnviado = -1;
                $diretorio = $url."/email/enviado/";
                // esse seria o "handler" do diretório
                $dh = opendir($diretorio);
                // loop que busca todos os arquivos até que não encontre mais nada
                while (false !== ($filename = readdir($dh))) {
                    $contEmailsEnviado++;
                }
                $urlReme=$url."/email/enviado/$contEmailsEnviado";
            }

            if($xml->email == $copia){
                //achar o copia
                $existeCopia = true;
                $arrayId = explode(".",$dir);
                $idAtual = $arrayId[0];
                $idAtual = $idAtual + 1;
                
                $contEmailsCopia = -1;
                $diretorio = $url."/email/enviado/";
                // esse seria o "handler" do diretório
                $dh = opendir($diretorio);
                // loop que busca todos os arquivos até que não encontre mais nada
                while (false !== ($filename = readdir($dh))) {
                    $contEmailsCopia++;
                }
                $urlCopia=$url."/email/entrada/$contEmailsCopia";
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
                $xml->save($urlDest.".xml");
                $xml->save($urlReme.".xml");
                $xml->save($urlCopia.".xml");

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
                $xml->save($urlDest.".xml");
                $xml->save($urlReme.".xml");

            }
        }
    }

    if ($existeCopia){
        echo json_encode(1);
    }else{
        echo json_encode(2);
    }

}
else{
  echo json_encode(3);
}
?>