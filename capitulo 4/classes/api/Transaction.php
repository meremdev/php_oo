<?php
    final class Transaction {
        private static $conn; //conexão ativa
        private static $logger; //objeto de log

        public static function open($database){
            if(empty(self::$conn)){
                self::$conn = Connection::open($database);
                self::$conn->beginTransaction(); //inicia a transação
                self::$logger = null; //desliga o log de sql
            }
        }

        public static function get(){
            return self::$conn; //retorna conexão ativa
        }

        public static function rollback(){
            if(self::$conn){
                self::$conn->rollback(); //aplica as operações realizadas
                self::$conn = null;
            }
        }

        public static function close(){
            if(self::$conn){
                self::$conn->commit(); //desfaz as operações realizadas
                self::$conn = null;
            }
        }

        public static function setLogger(Logger $logger){
            self::$logger = $logger;
        }

        public static function log($message){
            if(self::$logger){
                self::$logger->write($message);
            }
        }
    }