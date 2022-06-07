<?php
    //interpreta o documento XML
    $xml = simplexml_load_file('paises3.xml');

    echo 'Nome: '.$xml->nome."<br>\n";
    echo 'Idioma: '.$xml->idioma."<br>\n";
    echo "<br>\n";

    // voce pode acessar um estado diretamente pelo seu indice
    // echo $xml->estados->nome[0];

    foreach($xml->estados->nome as $estado){
        echo 'Estado: '.$estado."<br>\n";
    }