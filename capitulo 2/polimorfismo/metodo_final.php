<?php
    require_once 'classes/Conta.php';
    require_once 'classes/ContaCorrente.php';

    class ContaEspecial extends ContaCorrente {
        public function retirar($quantia){
            $this->saldo = $quantia;
        }
    }
?>