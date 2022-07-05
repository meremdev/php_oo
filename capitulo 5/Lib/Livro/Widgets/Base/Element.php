<?php
namespace Livro\Widgets\Base;

class Element {
    protected $tagname;
    protected $properties;
    protected $childreen;

    public function __construct($name)
    {
        $this->tagname = $name; //define o nome do elemento
    }

    public function __set($name, $value)
    {
        //armazena os valores atribuidos ao array properties
        $this->properties[$name] = $value; 
    }

    public function __get($name)
    {
        //retorna os valores atribuidos ao array properties
        return isset($this->properties[$name]) ? $this->properties[$name] : NULL;
    }

    public function add($child){
        $this->childreen[] = $child;
    }

    public function show(){
        $this->open(); //abre a tag
        echo "\n";
        if($this->childreen){
            foreach($this->childreen as $child){
                if(is_object($child)){ //se for objeto
                    $child->show();
                }else if((is_string($child)) or (is_numeric($child))){
                    // se for texto
                    echo $child;
                }
            }
            $this->close(); //fecha a tag
        }
    }

    private function open(){
        //exibe a tag de abertura 
        echo "<{$this->tagname}";
        if($this->properties){
            //percorre as propriedades
            foreach($this->properties as $name=>$value){
                if(is_scalar($value)){
                    echo " {$name}=\"{$value}\"";
                }
            }
        }
        echo '>';
    }

    private function close() {
        echo "</{$this->tagname}>\n";
    }

    public function __toString()
    {
        ob_start();
        $this->show();
        $content = ob_get_clean();
        return $content;
    }
}