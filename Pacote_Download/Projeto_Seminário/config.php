<!-- FAZ A CONEXÃO COM O BANCO DE DADOS -->

<?php 
    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'db_unisge';

    
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