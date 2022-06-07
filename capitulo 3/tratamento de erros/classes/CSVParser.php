<?php
    class CSVParser {
        private $filename, $data, $header, $counter, $separator;

        public function __construct($filename, $separator = ',')
        {
            $this->filename = $filename;
            $this->separator = $separator;
            $this->counter = 1;
        }

        //função parse 1
        //
        // public function parse(){
        //     $this->data = file($this->filename);
        //     $this->header = str_getcsv($this->data[0], $this->separator);
        // }

        //função parse 2 die()
        //    
        // public function parse(){
        //     if(!file_exists($this->filename)){
        //         die("Arquivo {$this->filename} não existe");
        //     }
        //    
        //     if(!is_readable($this->filename)){
        //         die("Arquivo {$this->filename} sem permissão");
        //     }
        //   
        //     $this->data = file($this->filename);
        //     $this->header = str_getcsv($this->data[0], $this->separator);
        // }

        // função parse 3 flags TRUE FALSE
        // public function parse(){
        //     if(!file_exists($this->filename)){
        //         return FALSE;
        //     }
        //
        //     if(!is_readable($this->filename)){
        //         return FALSE;
        //     }
        //
        //     $this->data = file($this->filename);
        //     $this->header = str_getcsv($this->data[0], $this->separator);
        //     return TRUE;
        // }

        // função parse 4 Exception()
        // public function parse(){
        //     if(!file_exists($this->filename)){
        //         throw new Exception("Arquivo {$this->filename} não encontrado");
        //     }
        //
        //     if(!is_readable($this->filename)){
        //         throw new Exception("Arquivo {$this->filename} não pode se lido");
        //     }
        //
        //     $this->data = file($this->filename);
        //     $this->header = str_getcsv($this->data[0], $this->separator);
        //     return TRUE;
        // }

        public function parse(){
            if(!file_exists($this->filename)){
                throw new FileNotFoundException("Arquivo {$this->filename} não encontrado");
            }
        
            if(!is_readable($this->filename)){
                throw new FilePermissionException("Arquivo {$this->filename} não pode ser lido");
                
            }
        
            $this->data = file($this->filename);
            $this->header = str_getcsv($this->data[0], $this->separator);
            return TRUE;
        }

      
        public function fetch(){
            if(isset($this->data[$this->counter])){
                $row = str_getcsv($this->data[$this->counter ++], $this->separator);
                foreach ($row as $key => $value){
                    $row[$this->header[$key]] = $value;
                }
                return $row;
            }
        }
    }