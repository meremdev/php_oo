<?php
use Livro\Control\Page;
use Livro\Widgets\Container\Table;

class ExemploTableControl extends Page{
    public function __construct()
    {
        parent::__construct();

        //constroi a matriz com os dados
        $dados[] = array(1, 'maria da silva', 'http://www.maria.com.br', 1200);
        $dados[] = array(2, 'pedro cardoso', 'http://www.pedro.com.br', 800);
        $dados[] = array(3, 'joão de barro', 'http://www.joao.com.br', 1500);
        $dados[] = array(3, 'joana pereira', 'http://www.joana.com.br', 700);
        $dados[] = array(3, 'erasmo carlos', 'http://www.erasmo.com.br', 2500);

        //instancia objeto tabela e define algumas propriedades
        $tabela = new Table;
        $tabela->width = 600;
        $tabela->style = 'margin: 20px';

        //instancia uma linha para o cabeçalho´
        $cabecalho = $tabela->addRow();
        $cabecalho->style = 'background: #a0a0a0';

        //adiciona celulas de cabeçalho
        $cabecalho->addCell('Codigo');
        $cabecalho->addCell('Nome');
        $cabecalho->addCell('Site');
        $cabecalho->addCell('Salario');

        $i = 0;
        $total = 0;
        //percorre os dados
        foreach($dados as $pessoa){
            //verifica qual cor utilizar para o fundo
            $bgcolor = ($i % 2) == 0 ? '#d0d0d0' : '#ffffff';

            //adicina linha para os dados
            $linha = $tabela->addRow();
            $linha->style = "background: $bgcolor";

            //adiciona celulas
            $linha->addCell($pessoa[0]);
            $linha->addCell($pessoa[1]);
            $linha->addCell($pessoa[2]);

            $x = $linha->addCell($pessoa[3]);
            $x->align = 'right';
            $total += $pessoa[3];
            $i++;
        }

        //instancia uma linha para totalizador
        $linha = $tabela->addRow();

        //adiciona celulas
        $celula = $linha->addCell('Total');
        $celula->style = "background: whiteSmoke";
        $celula->colspan = 3;

        $celula = $linha->addCell($total);
        $celula->style = "background: #FFF08C; text-align:right";

        //exibe a tabela
        $tabela->show();
    }
}