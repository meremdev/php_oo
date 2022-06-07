<?php
    class Produto{
        private $descricao;
        private $estoque;
        private $preco;

        public function __construct($descricao, $estoque, $preco){
            if(is_string($descricao)){
                $this->descricao = $descricao;
            }
            if(is_numeric($estoque) AND $estoque > 0){
                $this->estoque = $estoque;
            }
            if(is_numeric($preco) AND $preco > 0){
                $this->preco = $preco;
            }
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function getEstoque(){
            return $this->estoque;
        }

        public function getPreco(){
            return $this->preco;
        }
    }

    $p1 = new Produto('chocolate',10,5);
    print 'descricao: '.$p1->getDescricao().'<br>'.PHP_EOL;
    print 'descricao: '.$p1->getEstoque().'<br>'.PHP_EOL;
    print 'descricao: '.$p1->getPreco().'<br>'.PHP_EOL;
?>