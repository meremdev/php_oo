<?php

use Livro\Database\Transaction;

class PessoaServices{
    function getData($id_pessoa){
        try {
            $pessoa_array = array();
            Transaction::open('livro'); //inicia transação
            $pessoa = Pessoa::find($id_pessoa);
            if($pessoa){
                $pessoa_array = $pessoa->toArray();
            }else{
                return new SoapFault("server", "Pessoa {$id_pessoa} não encontrado");
            }
            Transaction::close(); //fecha transação
            return $pessoa_array;
        } catch (Exception $e) {
            Transaction::rollback(); //desfaz a tranzação
            return new SoapFault("server", $e->getMessage());
        }
    }
}