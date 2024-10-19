<?php 

    if(!empty($_GET['id_professor'])) // Se não estiver vazio minha variavel/meu parametro id
    {

        include_once('../config.php');


        $id_professor = $_GET['id_professor']; // variavel id que recebe meus parametros

        $sqlSelect = "SELECT * FROM professor WHERE id_professor=$id_professor";

        $result = $conexao->query($sqlSelect);

        //Teste
        // print_r($result);

        // Teste para verificar se tem mais de de uma linha
        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM professor WHERE id_professor=$id_professor";
            $resultDelete = $conexao->query($sqlDelete);
            
        }
    }   
    header('Location: edit_professor.php');
    

    ?>