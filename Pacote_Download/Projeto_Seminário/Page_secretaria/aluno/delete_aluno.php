<!-- DELETA UM ALUNO -->

<?php 

    if(!empty($_GET['id_aluno'])) // Se não estiver vazio minha variavel/meu parametro id
    {

        include_once('../../config.php');


        $id_aluno = $_GET['id_aluno']; // variavel id que recebe meus parametros

        $sqlSelect = "SELECT * FROM aluno WHERE id_aluno=$id_aluno";

        $result = $conexao->query($sqlSelect);

        //Teste
        // print_r($result);

        // Teste para verificar se tem mais de de uma linha
        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM aluno WHERE id_aluno=$id_aluno";
            $resultDelete = $conexao->query($sqlDelete);
            
        }
    }   
    header('Location: edit_aluno.php');
    

    ?>