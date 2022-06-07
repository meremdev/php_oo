<?php
    class Software{
        private $id;
        private $nome;
        public static $contador;

        function __construct($nome)
        {
            self::$contador ++;

            $this->id = self::$contador;
            $this->nome = $nome;
            print "Software {$this->id} - {$this->nome} <br>\n" ;
        }
    }

    //cria novos objetos
    new Software('dia');
    new Software('gimp');
    new Software('gnumeric');

    echo 'Quantidade criada'.Software::$contador;
?>