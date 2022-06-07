<?php
     final class ContaPoupanca extends Conta {
        function retirar($quantia){
            if($this->saldo >= $quantia){
                $this->saldo -= $quantia;
            }else{
                return false; //retirada não permitida
            }
            return true; //retirad permitida
        }
    }
?>