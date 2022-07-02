<?php
    abstract class Record {
        protected $data; // array contendo dados do objeto

        public function __construct($id = null)
        {
            if($id){
                // se o Id for informado
                // carrega o objeto correspondente
                $object = $this->load($id);

                if($object){
                    $this->fromArray($object->toArray());
                }
            }
        }

        public function __clone()
        {
            unset($this->data['id']);
        }

        public function __set($prop, $value){
            
            if(method_exists($this, 'set_'.$prop)){
                // executa o metodo set_<propriedade>
                call_user_func(array($this, 'set_'.$prop), $value);
            }else{
                if($value === NULL){
                    unset($this->data[$prop]);
                }else{
                    $this->data[$prop] = $value; // atribui o valor da propridade
                }
            }
        }

        public function __get($prop){
            if(method_exists($this, 'get_'.$prop)){
                //executa o metodo get_<propriedade>
                return call_user_func(array($this, 'get_'.$prop));
            }else{
                if(isset($this->data[$prop])){
                    return $this->data[$prop];
                }
            }
        }

        public function __isset($prop)
        {
            return isset($this->data[$prop]);
        }

        public function getEntity(){
            $class = get_class($this); //obtem o nome da classe
            return constant("{$class}::TABLENAME"); //rertorna a constante de classe TABLENAME
        }

        public function fromArray($data){
            $this->data = $data;
        }

        public function toArray(){
            return $this->data;
        }

        public function store(){
            $prepared = $this->prepare($this->data);

            //verifica se tem ID ou se existe na base de dados 
            if(empty($this->data['id']) or (!$this->load($this->id))){
                //incrementa
                if(empty($this->data['id'])){
                    $this->id = $this->getLast() +1;
                    $prepared['id'] = $this->id;
                }

                //cria uma instrução de insert 
                $sql = "INSERT INTO {$this->getEntity()} ".
                '('. implode(', ', array_keys($prepared)).' )'.
                ' values '.
                '('.implode(', ', array_values($prepared)).' )';

            }else{
                // monta a string de update
                $sql = "UPDATE {$this->getEntity()}";
                // monta os peres: coluna=valor
                if($prepared){
                    foreach($prepared as $column => $value){
                       if($column !== 'id'){
                            $set[] = "{$column} = {$value}";
                       }
                    }
                }
                $sql.= ' SET '.implode(',',$set);
                $sql.= ' WHERE id='.(int) $this->data['id'];
            }

            //obtem transação ativa
            if($conn = Transaction::get()){
                Transaction::log($sql);
                $result = $conn->exec($sql);
                return $result;
            }else{
                throw new Exception('Não há transação ativa');
            }
 
        }

        public function load($id){
            //monta instrução de select
            $sql = "SELECT * FROM {$this->getEntity()}";
            $sql.= ' WHERE id='.(int) $id;

            //obtem transação ativa
            if($conn = Transaction::get()){
                //cria mensagem de log e executa consulta
                Transaction::log($sql);
                $result = $conn->query($sql);

                //se retornou algum dado
                if($result){
                    //retorna os dados em forma de objeto
                    $object = $result->fetchObject(get_class($this));
                }
                return $object;

            }else{
                throw new Exception('não há transação ativa');
            }
        }

        public function delete($id = null){
            //o ID é o parametro ou a propriedade ID
            $id = $id ? $id : $this->id;

            //monta a string de update
            $sql = "DELETE FROM {$this->getEntity()}";
            $sql .= ' WHERE id='.(int) $this->data['id'];

            //obtem transação ativa
            if($conn = Transaction::get()){
                //faz o log e executa o sql
                Transaction::log($sql);
                $result = $conn->exec($sql);
                return $result; //retorna o resultado
            }else{
                throw new Exception('não há trnasação ativa');
            }
        }

        public static function find($id){
            $classname = get_called_class();
            $ar = new $classname;
            return $ar->load($id);
        }

        private function getLast(){
            if($conn = Transaction::get()){
                $sql = "SELECT max(id) FROM {$this->getEntity()}";

                //cria log e executa instrução sql
                Transaction::log($sql);
                $result = $conn->query($sql);

                //retorna os dados do banco
                $row = $result->fetch();
                return $row[0];
            }else{
                throw new Exception('não há trnasação ativa');
            }
        }

        public function prepare($data){
            $prepared = array();
            foreach($data as $key => $value){
                if(is_scalar($value)){
                    $prepared[$key] = $this->escape($value);
                }
            }
            return $prepared;
        }

        public function escape($value){
            if(is_string($value) and (!empty($value))){
                //adiciona \ em aspas
                $value = addslashes($value);
                return "'$value'";

            }else if(is_bool($value)){
                return $value ? 'TRUE' : 'FALSE';

            }else if($value !== ''){
                return $value;

            }else{
                return "NULL";
            }
        }

    }