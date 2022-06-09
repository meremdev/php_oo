<?php
    require_once 'classes/Record.php';
    trait ObjectConversionTrait{
        public function toXML(){
            $data = array_flip($this->data);
            $xml = new SimpleXMLElement('<' .get_class($this).'/>');
            array_walk_recursive($data, array($xml, 'addChild'));
            return $xml->asXML();
        }

        public function toJSON(){
            return json_encode($this->data);
        }
    }

    class Pessoa extends Record{
        const TABLENAME = 'pessoas';
        use ObjectConversionTrait;
    }

    class Produto extends Record{
        const TABLENAME = 'produtos';

        use ObjectConversionTrait{
            toJSON as exportToJSON;
        }
    }

    $p =  new Pessoa;
    $p->nome = 'Maria da Silva';
    $p->endereco = 'Rua das Flores';
    $p->numero = '123';

    $p2 = new Produto;
    $p2->descricao = 'chocolate';
    $p2->preco = 7;
   

    print '<pre>';
    print $p->toXML();
    print $p->toJSON().'<br>';
    print $p2->exportToJSON();