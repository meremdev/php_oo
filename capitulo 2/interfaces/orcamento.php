<?php
    require_once 'classes/Orcamento.php';
    require_once 'classes/Produto.php';

    $o = new Orcamento;

    $o->adiciona(new Produto('maquina de cafe',10,299),1);
    $o->adiciona(new Produto('barbeador eletrico',10,170),1);
    $o->adiciona(new Produto('barra de chocolate',10,7),3);

    print $o->calculaTotal();
?>