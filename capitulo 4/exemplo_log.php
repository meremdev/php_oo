<?php
    require_once 'classes/ar/Produto_transaction_log.php';
    require_once 'classes/api/Connection.php';
    require_once 'classes/api/Transaction_log.php';
    require_once 'classes/api/Logger.php';
    require_once 'classes/api/LoggerTXT.php';

    try{
        Transaction::open('estoque');
        Transaction::setLogger(new LoggerTXT('tmp/log.txt'));
        Transaction::log('inserindo produto novo');

        $p1 = new Produto;
        $p1->descricao = 'Chocolate amargo';
        $p1->estoque = 80;
        $p1->preco_custo = 4;
        $p1->preco_venda = 7;
        $p1->codigo_barras = '68323452334234';
        $p1->data_cadastro = date('Y-m-d');
        $p1->origem = 'N';
        $p1->save();

        Transaction::close();
    }catch(Exception $e){
        Transaction::rollback();
        print $e->getMessage();
    }