<?php
    try{
        //instancia objeto PDO, conectando no MySql
        $conn = new PDO('mysql:host=localhost;port=3306;dbname=livro','root','');
        //executa uma serie de instruções sql
        $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (1, 'Érico Verissimo')"); 
        $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (2, 'Jhon Lennon')"); 
        $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (3, 'Mahatma Gandhi')"); 
        $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (4, 'Airton Senna')"); 
        $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (5, 'Charlie Chaplin')"); 
        $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (6, 'Anita Garibaldi')"); 
        $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (7, 'Mario Quintana')");
        //fecha a conexão
        $conn = null; 
    }catch(PDOException $e){
        //caso ocorra uma exeção, exibe na tela
    }