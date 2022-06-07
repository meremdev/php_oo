<?php

use Pessoa as GlobalPessoa;

    class Pessoa{
        private $nome;
        private $endereco;
        private $nascimento;

        public function __construct($nome, $endereco)
        {
            $this->nome = $nome;
            $this->endereco = $endereco;
        }

        public function setNascimento($nascimento){
            $partes = explode('-',$nascimento);

            if(count($partes) == 3){
                if(checkdate($partes[1], $partes[2], $partes[0])){
                    $this->nascimento = $nascimento;
                    return true;
                }
                return false;
            }
            return false;
        }
    }

    $p1 = new Pessoa('maria da silva', 'rua bento gonçalves');

    if($p1->setNascimento('01 de maio de 2015')){
        print "atribuiu 01 de maio de 2015<br>\n";
    }else{
        print "não atribuiu 01 de maio de 2015<br>\n";
    }

    if($p1->setNascimento('2015-12-30')){
        print "atribuiu 2015-12-30";
    }else{
        print "não atribuiu 2015-12-30";
    }

  


?>