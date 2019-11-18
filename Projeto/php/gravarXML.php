<?php

    $nome =        $_POST["nome"];
    $sobrenome =   $_POST["sobrenome"];
    $email =       $_POST["email"] + "@emailBoll";
    $senha =       $_POST["senha"];


    $xml = new DOMDocument("1.0");

    $xml_dados = $xml->createElement("dados");
    
    $xml_email = $xml->createElement("nome",$nome);
    $xml_senha = $xml->createElement("sobrenome",$sobrenome);
    $xml_email = $xml->createElement("email",$email);
    $xml_senha = $xml->createElement("senha",$senha);

    $xml_dados->appendChild($xml_nome);
    $xml_dados->appendChild($xml_sobrenome);
    $xml_dados->appendChild($xml_email);
    $xml_dados->appendChild($xml_senha);

    $xml->appendChild($xml_dados);
    
    $xml->save("../xml/dados.xml");
    
    echo json_encode("Gravado com sucesso!");
?>