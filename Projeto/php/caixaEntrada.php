<?php
    $emails=array();
    if($_POST){
        extract($_POST);
        if(isset($userId)){
            $d = dir("../xml/usuario_".$userId."/email/entrada/");
            $cont = 0;
            $url="";    
            $emails=  array();
        
        
            //ler quantas pastas tem no diretorio  XML de usuário existentes
            while(($dir = $d->read()) !== false){
        
               
               $url = $dir;
               $contEmailsEntrada = 0;
               $diretorio = $url;
               // esse seria o "handler" do diretório
               $dh = opendir($diretorio);
               // loop que busca todos os arquivos até que não encontre mais nada
               while (false !== ($filename = readdir($dh))) {
                   $contEmailsEntrada++;


                   $str_xml = file_get_contents($url.$contEmailsEntrada".xml");
                   $xml = simplexml_load_string($str_xml);

                   array_push($emails,$xml);
                   
               }


        }

        echo json_encode($emails);
    }
    }

?>