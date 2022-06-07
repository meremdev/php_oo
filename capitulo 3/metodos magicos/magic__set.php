<?php

use Titulo as GlobalTitulo;

    class Titulo{
        private $dt_vencimento, $valor, $juros, $multa;

        public function __set($propriedade, $valor)
        {
            print "Tentou gravar $propriedade = $valor. Use setValor()";
        }

        public function setValor($valor){
            if(is_numeric($valor)){
                $this->valor = $valor; 
            }
        }
    }

    $titulo = new Titulo;
    $titulo->valor = 12345;