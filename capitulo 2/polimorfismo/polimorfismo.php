<?php
    echo '<pre>';
    require_once 'classes/Conta.php';
    require_once 'classes/ContaCorrente.php';
    require_once 'classes/ContaPoupanca.php';
    echo '</pre>';

    // criação dos objetos
    $contas = array();

    $contas[] = new ContaCorrente(6677, "CC.1234.56",100,500);
    $contas[] = new ContaPoupanca(6678, "CC.1234.57",100);

    //percorre as contas

    foreach($contas as $key => $conta){
        print "Conta: {$conta->getInfo()}<br>\n";
        print "Saldo atual: {$conta->getSaldo()}<br>\n";
        $conta->depositar(200);
        print "deposito de 200 <br>\n";
        print "Saldo atual: {$conta->getSaldo()}<br>\n";

        if($conta->retirar(700)){
            print "Retirada de: 700<br>\n";
        }else{
            print "Rtirada de: 700 (não permitida)";
        }

        print "Saldo atual: {$conta->getSaldo()}";

      
    }

   
?>