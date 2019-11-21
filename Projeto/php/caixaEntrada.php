<?php
   
    if($_POST){
        extract($_POST);
        if(isset($userId)){
            $d = dir("../xml/usuario_".$userId."/email/entrada/");
            $cont = 0;
            $url="";    
            $emails=  array();
            $emailsMsgs = array();
            $emailAssuntos = array();   
            $emailsNomes = array();
            $cont = -1;

            //ler quantas pastas tem no diretorio  XML de usuário existentes
            while(($dir = $d->read()) !== false){
                $cont++;

                $contEmailsEntrada=$cont+1;
                $extensao=".xml"

                $url =trim($dir.$contEmailsEntrada.$extensao);
              
              // $diretorio = $url;
               // esse seria o "handler" do diretório
             //  $dh = opendir($diretorio);
                 
             


                $str_xml = file_get_contents($url);
                $xml = simplexml_load_string($str_xml);
                $nome=$xml->remetente;
                $msg=$xml->mensagem;
                $assunto=$xml->assunto;

                array_push($emailsMsgs,$msg);
                array_push($emailsNomes,$nome);
                array_push($emailAssuntos,$assunto);


            }
        array_push($emails,$emailsMsgs);
        array_push($emails,$emailsNomes);       
        array_push($emails,$emailAssuntos);
        echo json_encode($emails);
    }else{
    echo json_encode(2);

    }
    }

?>