<?php

    // Inicio da conexão com o banco de dados utilizando PDO
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "sistema_ponto";
    // $port = 3306;

    try {
        // Conexão com a porta
        // $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname,$user, $pass);
        
        // conexão sem a porta
        $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
        // echo "Conexão com banco de dados realizado";
    } catch (PDOException $err) {
        echo "Erro Conexão com o banco de dados não realizado com sucesso. <h2> Erro gerado " . $err->getMessage() . "</H2>";
    }
    // Fim da conexão com o banco de dados