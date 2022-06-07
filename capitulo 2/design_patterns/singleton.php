<?php
    require_once 'classes/Preferencias.php';

    //obtem uma instancia
    $p1 = Preferencias::getInstance();

    print 'A linguagem é: '.$p1->getData('language')."<br>\n";
    $p1->setData('language','pt');
    print 'A linguagem é: '.$p1->getData('language')."<br>\n";

    //obtem a mesma instancia
    $p2 = Preferencias::getInstance();

    print 'A linguagem é: '.$p2->getData('language')."<br>\n";
    
    // descomentar para gravar o valor
    //$p1->save();