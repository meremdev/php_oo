<?php
    $file = new SplFileObject('spl_file_object2.php');

    print 'Forma 1: '.PHP_EOL;
    while(!$file->eof()){
        print '<pre>';
        print 'linha: '.$file->fgets();
        print '</pre>';
    }

    print PHP_EOL.PHP_EOL;

    print 'Forma 2: '.PHP_EOL;
    foreach($file as $linha => $conteudo){
        print "$linha: $conteudo";
    }