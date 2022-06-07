<?php
    require_once 'classes/Orcamento.php';
    require_once 'classes/OcavelIinterface.php';
    require_once 'classes/Produto.php';
    require_once 'classes/Servico.php';

    $o = new Orcamento;

    $o->adiciona( new Produto('maquina de cafe',10,299),1);
    $o->adiciona( new Produto('barbeador eletrico',10,170),1);
    $o->adiciona( new Produto('maquina de cafe',10,7),3);

    $o->adiciona( new Servico('corte de grama',20),1);
    $o->adiciona( new Servico('corte de barba',20),1);
    $o->adiciona( new Servico('maquina de cafe',50),1);

    print $o->calculaTotal();