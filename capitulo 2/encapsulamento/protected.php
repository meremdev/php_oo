<?php

use Pessoa as GlobalPessoa;

    class Pessoa {
        protected $nome;

        public function __construct($nome)
        {
            $this->nome = $nome;
        }
    }

    class Funcionario extends Pessoa{
        private $cargo, $salario;

        public function contrata($c, $s){
            if(is_numeric($s) and $s > 0){
                $this->cargo = $c;
                $this->salario = $s;
            }
        }

        public function getInfo(){
            return "Nome: {$this->nome}, Salario: {$this->salario}";
        }
    }

    $p1 = new Funcionario('maria da silva','ruabento gonçalves');
    $p1->contrata('auxiliar administrativo', 1600);

    print $p1->getInfo();,
?>