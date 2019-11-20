<?php
    $emails=array();
    if($_POST){
        extract($_POST);
        if(isset($userId)){
            $d = dir("../xml/");
            $contador = 0;
            $existemEmails = false;
            while(($dir = $d->read()) !== false){
                $contador++;
                $url = "../xml/usuario_"$userId."email/entrada".$dir;
                if(file_exists($url."/email/entrada/caixa.xml")){
                    $str_xml = file_get_contents($url."/dados.xml");
                    $xml = simplexml_load_string($str_xml);
                    array_push.($emails, $xml);
                
                }
            }
            $quantidade= count($emails);
            foreach(var i=0; i<$quantidade;i++){
                echo($emails[i]);

            }    

        }else{//userId n existe

        }
    }

?>