<?php
use Livro\Control\Page;
use Livro\Widgets\Base\Image;

class ExemploImageControl extends page{
    public function __construct()
    {
        parent::__construct();

        $img = new Image('App/Images/ubuntu.png');
        $img->style = 'margin: 20px';
        parent::add($img);
    }
}