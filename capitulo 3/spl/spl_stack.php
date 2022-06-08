<?php
   $ingredientes = new SplStack();
   
   //acrescentando na pilha
   $ingredientes->push('peixe');
   $ingredientes->push('sal');
   $ingredientes->push('limão');

   foreach($ingredientes as $item){
       print 'item: '.$item.'<br>'.PHP_EOL;
   }

   print PHP_EOL;
   //removendo da pilha
   print $ingredientes->pop().'<br>'.PHP_EOL;
   print 'count: '.$ingredientes->count().'<br>'.PHP_EOL;

   print $ingredientes->pop().'<br>'.PHP_EOL;
   print 'count: '.$ingredientes->count().'<br>'.PHP_EOL;

   print $ingredientes->pop().'<br>'.PHP_EOL;
   print 'count: '.$ingredientes->count().'<br>'.PHP_EOL;