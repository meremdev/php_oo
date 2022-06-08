<?php
    $dir = opendir('/temp');

    while($arquivo = readdir($dir)){
        print $arquivo.'<br>'.PHP_EOL;
    }

    closedir($dir);