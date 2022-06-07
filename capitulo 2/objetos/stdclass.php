<?php
    $produto = new StdClass;
    $produto->descricao = 'chocolate';
    $produto->estoque = '100';
    $produto->preco = '7';

    echo '<pre>';
        print_r($produto);
    echo '</pre>';    

?>