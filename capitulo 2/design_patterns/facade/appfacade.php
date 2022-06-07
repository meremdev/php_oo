<?php
    $ps =  new PagSeguroFacade('BRL'); // chamada a facade

    $product = new stdClass;
    $product->id = 5;
    $product->description = 'pendrive';
    $product->price = 10;
    
    $ps->addItem($product,3);


    