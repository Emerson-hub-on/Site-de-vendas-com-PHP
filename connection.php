<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "celke";
    $port = 3306;

    try{
    
    $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

}
    catch(Exception $ex){
        die("Erro: Conexão não, caso esse problema persiste, entre em contato com o administrador.</br>");
    }
