<?php
    abstract class Logger {
        protected $filename; // local do arquivo de log

        public function __construct($filename)
        {
            $this->filename = $filename;
            file_put_contents($filename,''); // limpa o conteudo do arquivo
        }

        // define o metodo write como obrigatorio
        abstract function write($message);
    }