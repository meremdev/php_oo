<?php
    class Servico implements OrcavelIintarface{
        private $descricao;
        private $preco;

        public function __construct($descricao, $preco)
        {
            $this->descricao = $descricao;
            $this->preco = $preco;
        }

        public function getPreco()
        {
            return $this->preco;
        }
    }