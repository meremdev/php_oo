<?php
    function __autoload($classe){
        //busca a classe no diretorio de classes...
        require_once "classes/{$classe}.php";
    }

    //instanciando novo produto
    $café = new Produto('maquina de cafe',10,299);

    echo '<pre>';
    var_dump($café);
    echo '</pre>';
