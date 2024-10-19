<?php 
    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'seminario';

    
    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);


    //TESTE DE CONEXÃO
    // if($conexao->connect_errno)
    // {
    //     echo "Erro";

    // }
    // else{
    //     echo "Conexão efetuada com sucesso";
    // }
?>