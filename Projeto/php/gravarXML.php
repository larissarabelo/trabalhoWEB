<?php

    $email =       $_POST["email"];
    $senha =       $_POST["senha"];


    $xml = new DOMDocument("1.0");

    $xml_dados = $xml->createElement("dados");

    $xml_email = $xml->createElement("email",$email);
    $xml_senha = $xml->createElement("senha",$senha);

    $xml_dados->appendChild($xml_email);
    $xml_dados->appendChild($xml_senha);

    $xml->appendChild($xml_dados);
    
    $xml->save("../xml/dados.xml");
    
    echo json_encode("Gravado com sucesso!");
?>