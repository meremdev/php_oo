<?php
    class Produto{
        private $descricao;
        private $estoque;
        private $preco;

        public function setDescricao($descricao){
            if (is_string($descricao)){
                $this->descricao = $descricao;
            }
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function setEstoque($estoque){
            if(is_numeric($estoque) AND $estoque > 0){
                $this->estoque = $estoque;
            }
        }

        public function getEstoque(){
            return $this->estoque;
        }
    }

    $p1 = new Produto;
    $p1->setDescricao('chocolate');
    $p1->setEstoque(10);

    print 'descricao: '.$p1->getDescricao().'<br>'.PHP_EOL;
    print 'descricao: '.$p1->getEstoque().'<br>'.PHP_EOL;
?>