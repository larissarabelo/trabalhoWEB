<?php

    $str_xml = file_get_contents("../xml/idAtual.xml");
    $xml = simplexml_load_string($str_xml);
    $idUser= $xml->id;
    //retorna o int do objeto
    $idUser=intval($idUser);

    echo json_encode($idUser);

?>
