<?php 
    require_once 'veiculo.php';

    $rm = new ReflectionProperty('Automovel', 'placa');
    print $rm->getName().'<br>'.PHP_EOL;

    print $rm->isPrivate()? 'é privado' : 'não é privado';
    print '<br>'.PHP_EOL;

    print $rm->isStatic()? 'é estatico' : 'não é estatico';
    print '<br>'.PHP_EOL;
