<?php
if($_POST){
        extract($_POST);
        if(isset($nome,$sobrenome,$email,$senha)){
            $d = dir("../xml/");
            $existe = false;
            $cont = 0;
            while(($dir = $d->read()) !== false){
                $cont++;
                if($dir != "." && $dir != ".."){//o bicho é burro e acha q . e .. é diretorio
                    //Pesquisa XML
                    $str_xml = file_get_contents("../xml/".$dir."/dados.xml");
                    $xml = simplexml_load_string($str_xml);
                    if($xml->email == $email){
                        $existe = true;
                    }
                    //Achar proximo ID
                    $arrayId = explode("_",$dir);
                    $idAtual = $arrayId[1]; //PERGUNTAR CARLOS
                    if(!isset($maior) || $maior < $idAtual){
                        $maior = $idAtual;
                    }
                }
            }
            if($cont == 2){
                $maior = 0;
            }
            if($existe){
                echo json_encode(-1);
            }else{
                $url = "../xml/usuario_".($maior+1);
                if(!file_exists($url)){
                    mkdir($url);
                    mkdir($url."/email");
                    $pastas = array("entrada","enviado");
                    foreach($pastas as $pasta){
                        mkdir($url."/email/".$pasta);
                    }

                    $xml = new DOMDocument("1.0");
                    
                    $xml_dados = $xml->createElement("dados");

                    $xml_nome = $xml->createElement("nome",$nome);
                    $xml_sobren = $xml->createElement("sobrenome",$sobrenome);
                    $xml_email = $xml->createElement("email",$email);
                    $xml_senha = $xml->createElement("senha",$senha);
 
                    $xml_dados->appendChild($xml_nome);
                    $xml_dados->appendChild($xml_sobren);
                    $xml_dados->appendChild($xml_email);
                    $xml_dados->appendChild($xml_senha);

                    $xml->appendChild($xml_dados);
                    $xml->save($url."/dados.xml");
                    if(file_exists($url."/dados.xml")){
                        echo json_encode(1);
                    }else{
                        echo json_encode(-2);
                    }
                }
            }
        }else{
            Header("Location: ../html/cadastro.html"); //perguntar pq ele n usou o outro   
        }
    }else{
        Header("Location: ../html/cadastro.html");
    }
    exit();
?>