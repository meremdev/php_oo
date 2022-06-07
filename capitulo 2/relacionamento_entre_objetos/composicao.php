<?php
    require_once 'classes/Produto.php';
    require_once 'classes/Caracteristica.php';

    //criação dos objetos
    $p1 = new produto('chocolate',10,7);

    //composição
    $p1->addCaracteristica('cor', 'branco');
    $p1->addCaracteristica('peso', '2,6 Kg');
    $p1->addCaracteristica('potencia', '20 watts RMS');

    print 'produto: '.$p1->getDescricao(). "<br>\n";
    foreach ($p1->getCaracteristicas() as $c) {
        print 'Caracteristica:'.$c->getNome().' - '.$c->getValor()."<br>\n";
    }
?>