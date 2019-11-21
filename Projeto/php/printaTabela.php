<?php
if($_POST){
    extract($_POST);
    if(isset($email,$senha)){
        $d = dir("../xml/entrada");
        $contador = 0;
        $existe = false;

        while(($dir = $d->read()) !== false){
            $contador++;
            $url = "../xml/".$dir;

            if(file_exists($url."Projeto/xml/usuario_"+$id+"/email/entrada/"+$contador+".xml")){
                $str_xml = file_get_contents($url."/dados.xml");
                $xml = simplexml_load_string($str_xml);

                if($xml->email == $email && $xml->senha == $senha){
                    $existe = true;
                    $arr_id = explode("_",$dir);
                    $id = $arr_id[1];
                }
            }
        }

        if($contador == 2){
            echo json_encode(-2);
        }

        else{
            if($existe){
                echo json_encode(1);
            }
            else{
                echo json_encode(-3);
            }
        }
    }

    else{
        echo json_encode(-1);
    }
}

else{
    Header("Location: ../html/login.html");
}

exit();
?> 