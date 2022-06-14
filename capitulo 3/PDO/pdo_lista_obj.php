<?php
    try{
        //instancia objeto PDO, conectando no MySql
        $conn = new PDO('mysql:host=localhost;port=3306;dbname=livro','root','');
        //executa uma instrução sql de consulta
        $result = $conn->query("SELECT codigo, nome FROM famosos");
        if($result){
            //percorre os resultados via iteração
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                //exibe os resultados
                echo $row->codigo. ' - ' .$row->nome . "<br>\n";
            }
        }
        //fecha a conexão
        $conn = null;

    }catch(PDOException $e){
        print "Erro!: ".$e->getMessage()."<br>";
    }