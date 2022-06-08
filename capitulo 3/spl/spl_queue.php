<?php
    $ingredientes = new SplQueue();

    //acrescentando na fila
    $ingredientes->enqueue('peixe');
    $ingredientes->enqueue('sal');
    $ingredientes->enqueue('limão');

    foreach($ingredientes as $item){
        print 'item: '.$item.'<br>'.PHP_EOL;
    }

    print PHP_EOL;
    //removendo da fila
    print $ingredientes->dequeue().'<br>'.PHP_EOL;
    print 'Count: ' .$ingredientes->count().'<br>'.PHP_EOL;

    print $ingredientes->dequeue().'<br>'.PHP_EOL;
    print 'Count: ' .$ingredientes->count().'<br>'.PHP_EOL;

    print $ingredientes->dequeue().'<br>'.PHP_EOL;
    print 'Count: ' .$ingredientes->count().'<br>'.PHP_EOL;