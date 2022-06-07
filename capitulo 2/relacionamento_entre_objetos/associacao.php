<?php
    require_once 'classes/Fabricante.php';
    require_once 'classes/Produto.php';

    //criação dos objetos
    $p1 = new Produto('chocolate',10,7);
    $f1 = new Fabricante('chocolate factory','Willy Wonka street','1234985235');

    //associação
    $p1->setFabricante($f1);

    print 'A descrição é '.$p1->getDescricao(). "<br>\n";
    print 'A descrição é '.$p1->getFabricante()->getNome(). "<br>\n";
?>