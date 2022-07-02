<?php
    require_once 'classes/api/Transaction_log.php';
    require_once 'classes/api/Connection.php';
    require_once 'classes/api/Expression.php';
    require_once 'classes/api/Criteria.php';
    require_once 'classes/api/Repository.php';
    require_once 'classes/api/Record.php';
    require_once 'classes/api/Filter.php';
    require_once 'classes/api/Logger.php';
    require_once 'classes/api/LoggerTXT.php';
    require_once 'classes/model/Produto.php';

    try {
        //inicia transação com banco de dados
        Transaction::open('estoque');

        //define arquivo de log
        Transaction::setLogger(new LoggerTXT('tmp/log_colection_update.txt'));

        //define o criterio de seleção
        $criteria = new Criteria;
        $criteria->add(new Filter('preco_venda','<=',35));
        $criteria->add(new Filter('origem','=','N'));


        // cria o repositorio 
        $repository = new Repository('Produto');

        //carrega os objetos conforme o criterio
        $produtos = $repository->load($criteria);

        if($produtos){
            echo "Produtos <br>\n";

            //percorre todos os objetos
            foreach($produtos as $produto){
                $produto->preco_venda *=1.3;
                $produto->store();
            }
        }

        Transaction::close(); //fecha a transaçao


    } catch (Exception $e) {
        echo $e->getMessage();
        Transaction::rollback();
    }