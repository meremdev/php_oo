<?php
    //declaração
    namespace Application;
    class Form{}

    namespace Components;

use SplFileInfo;

    class Form{}

    //utilização
    print '<pre>';
    var_dump(new Form); //Ex 1: object(components\Form)
    var_dump(new \Components\Form); //Ex 2: object(components\Form)
    var_dump(new \Application\Form); //Ex 3: object(Aplication\Form)
    var_dump(new \SplFileInfo('/etc/shaddow')); //Ex 4: object(SplFileInfo)
    var_dump(new SplFileInfo('/etc/shaddow')); //Ex 5: fatal error: class 'Components\SplFileInfo'

