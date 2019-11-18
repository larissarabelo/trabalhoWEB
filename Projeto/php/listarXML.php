<?php
    if($_POST){
        extract($_POST);
        if(isset($email,$senha) || empty($email,$senha)){
            $xml_string = file_get_contents("../xml/dados.xml");
            $xml_objeto = simplexml_load_string($xml_string);

            if($xml_objeto->email == $email && $xml_objeto->senha == $senha){
                echo json_encode($returno == 1))
            }
            else{
                echo json_encode($returno == 2);
            }
        }
        else{
            echo json_encode($returno == 3);
        }
            
        
    }
    else{
        echo json_encode($returno == 4);
    }
?>