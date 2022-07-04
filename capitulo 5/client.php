<?php
try {
    $arguments = array();
    $arguments['encoding'] = 'UTF-8';
    $arguments['exceptions'] = true;

    //alterar aqui
    $arguments['location'] = 'http://localhost/phpoo/capitulo%205/soap.php?class=PessoaService';
    $arguments['uri'] = "http://test-uri/";
    $arguments['trace'] = 1;

    //cria o client
    $client = new SoapClient(NULL, $arguments);
    print_r($client->getData(19));
} catch (Exception $e) {
    echo $e->getMessage();
}