<?php 

    if(!empty($_GET['id_instituicao'])) // Se não estiver vazio minha variavel/meu parametro id
    {

        include_once('../../config.php');


        $id_instituicao = $_GET['id_instituicao']; // variavel id que recebe meus parametros

        $sqlSelect = "SELECT * FROM secretaria WHERE id_instituicao=$id_instituicao";

        $result = $conexao->query($sqlSelect);

        //Teste
        // print_r($result);

        // Teste para verificar se tem mais de de uma linha, se tem então ele existe
        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM secretaria WHERE id_instituicao=$id_instituicao";
            $resultDelete = $conexao->query($sqlDelete);
            
        }
    }   
    header('Location: edit_secretaria.php');
    

    ?>