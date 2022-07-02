<?php 
    require_once 'classes/api/Transaction_log.php';
    require_once 'classes/api/Connection.php';
    require_once 'classes/api/Logger.php';
    require_once 'classes/api/LoggerTXT.php';
    require_once 'classes/api/Record.php';
    require_once 'classes/model/Produto.php';

    try {
        Transaction::open('estoque');
        Transaction::setLogger(new LoggerTXT('tmp/log_clone.txt'));
        Transaction::log('Clonado um produto');

        $p1 = Produto::find(2);
        $p2 = clone $p1;
        print $p2->descricao .= '(clonado)';
        $p2->store();

        Transaction::close();

    } catch (Exception $e) {
        Transaction::rollback();
        print $e->getMessage();
    }