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
        Transaction::setLogger(new LoggerTXT('tmp/log_colection_delete.txt'));

        //define o criterio de seleção
        $criteria = new Criteria;
        $criteria->add(new Filter('descricao','like','%WEBC%'), Expression::OR_OPERATOR);
        $criteria->add(new Filter('descricao','like','%FILMAD%'), Expression::OR_OPERATOR);
        


        // cria o repositorio 
        $repository = new Repository('Produto');

        //exclui os objetos conforme o criterio
        $repository->delete($criteria);
       
        Transaction::close(); //fecha a transaçao


    } catch (Exception $e) {
        echo $e->getMessage();
        Transaction::rollback();
    }