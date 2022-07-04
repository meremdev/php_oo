<?php
    namespace Livro\Database;

    use PDO;

    use Exception;
    final class Connection {
        private function __construct(){}

        public static function open($name){
            //verifica se existe o arquivo de configuração para este banco de dados
            if(file_exists("App/Config/{$name}.ini")){
                $db = parse_ini_file("App/Config/{$name}.ini");
            }else{
                throw new Exception("Arquivo '$name' não encontrado");
            }

            //lê as informações contidas no arquivo
            $user = isset($db['user']) ? $db['user'] : Null;
            $pass = isset($db['pass']) ? $db['pass'] : Null;
            $name = isset($db['name']) ? $db['name'] : Null;
            $host = isset($db['host']) ? $db['host'] : Null;
            $type = isset($db['type']) ? $db['type'] : Null;
            $port = isset($db['port']) ? $db['port'] : Null;
            
            //descobre qual o tipo (driver) de banco de dados a ser utilizado
            switch($type){
                case 'pgsql':
                   $port = $port ? $port : '5432';
                   $conn = new PDO("pgsql:dbname={$name}; user={$user}; password={$pass}; host={$host}; port={$port}"); 
                break;

                case 'mysql':
                    $port = $port ? $port : '3306';
                    $conn = new PDO("mysql:host={$host};port={$port};dbname={$name}", $user, $pass); 
                break;

                case 'sqlite':
                    $conn = new PDO("sqlite:{$name}"); 
                break;

                case 'ibase':
                    $conn = new PDO("firebird:dbname={$name}", $user, $pass); 
                break;

                case 'oci8':
                    $conn = new PDO("oci:dbname={$name}", $user, $pass); 
                break;

                case 'mssql':
                    $conn = new PDO("mssql:host{$host},1443;dbname={$name}",$user,$pass); 
                break;
               
            }
            //define  para que o PDO lance exceções na ocorrencia de erros
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }

    }