<?php
    $file = new SplFileObject('spl_file_object.php');
    print 'Nome: '.$file->getFileName().'<br>'.PHP_EOL;
    print 'Extensão: '.$file->getExtension().'<br>'.PHP_EOL;

    $file2 = new SplFileObject("novo.txt","w");
    $bytes = $file2->fwrite('Ola Mundo PHP'.PHP_EOL);
    print 'Bytes escrito '.$bytes.PHP_EOL;