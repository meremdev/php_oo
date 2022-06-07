<?php
    //interpreta documento xml
    $xml = simplexml_load_file('paises2.xml');

    //exibe os atributos do objeto criado
    echo 'Nome: ' .$xml->nome. "<br>\n";
    echo 'Idioma: ' .$xml->idioma. "<br>\n";
    echo "*** Informações Geograficas ***<br>\n";
    echo 'Clima: '.$xml->geografia->clima. "<br>\n";
    echo 'Costa: '.$xml->geografia->costa. "<br>\n";
    echo 'Pico: '.$xml->geografia->pico. "<br>\n";