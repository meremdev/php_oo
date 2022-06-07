<?php
    //interpreta documento xml
    $xml = simplexml_load_file('paises.xml');

    //exibe as informações do objeto criado
    var_dump($xml);