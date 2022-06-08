<?php

    require_once 'classes/Record.php';

    class Pessoa extends Record{
        const TABLENAME = 'pessoas';
    }

    class Fornecedor extends Record{
        const TABLENAME = 'fornecedores';
    }

    class Produto extends Record{
        const TABLENAME = 'produtos';
    }

    $p = new Pessoa;
    $p->load(1);
    print '<br>'.PHP_EOL;

    $P->nome = 'maria da silva';
    $P->endereco = 'rua das flores';
    $P->numero = '123';
    $p->save();

    print '<br>'.PHP_EOL;

    $p->delete(3);
    print '<br>'.PHP_EOL;
