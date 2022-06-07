<?php
    class Pessoa{
        public $nome;
        public $endereco;
        public $nascimento;
    }

    $p1 = new Pessoa;

    $p1->nome = 'maria da silva';
    $p1->endereco = 'rua bento gonçalves';
    $p1->nascimento = '01 de maio de 2015';
    $p1->telefone = '(51) 1234-5678'; //definida em tempo de execução
    echo '<pre>';
    print_r($p1);
    echo '</pre>';

?>