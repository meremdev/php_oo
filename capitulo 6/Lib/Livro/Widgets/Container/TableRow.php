<?php
namespace Livro\Widgets\Container;

use Livro\Widgets\Base\Element;

class TableRow extends Element{
    public function __construct()
    {
        parent::__construct('tr');
    }

    public function addCell($value){
        //instancia objeto celula
        $cell = new TableCell($value);
        parent::add($cell);

        //retorna o objeto instanciado
        return $cell;
    }
}