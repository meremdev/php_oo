<?php
use Livro\Control\Page;

class TwigListControl extends Page{
    public function __construct()
    {
        parent::__construct();
        require_once 'Lib/Twig/Autoloader.php';
        Twig_Autoloader::register();

        $loader = new Twig_Loader_Filesystem('App/Resources');
        $twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate('list.html');

        $replaces = array();
        $replaces['titulo'] = 'Lista de pessoas';

        $replaces['pessoas'] = array(
            array('codigo' => '1',
                    'nome' => 'Anita Garibaldi',
                    'endereco' => 'Rua dos Gauderios'
                ),
            
            array('codigo' => '2',
                'nome' => 'Bento Gonçalves',
                'endereco' => 'Rua do Gauderios'
            ), 
            
            array('codigo' => '3',
                'nome' => 'Giusppe Garibaldi',
                'endereco' => 'Rua dos Gauderios'
            )
        );

        $content = $template->render($replaces);
        echo $content;
    }
}