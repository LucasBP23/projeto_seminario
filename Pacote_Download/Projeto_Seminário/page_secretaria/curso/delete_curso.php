<!-- DELETA UM CURSO SELECIONADO -->

<?php 

    if(!empty($_GET['id_curso'])) // Se não estiver vazio minha variavel/meu parametro id
    {

        include_once('../../config.php');


        $id_curso = $_GET['id_curso']; // variavel id que recebe meus parametros

        $sqlSelect = "SELECT * FROM curso WHERE id_curso=$id_curso";

        $result = $conexao->query($sqlSelect);

        //Teste
        // print_r($result);

        // Teste para verificar se tem mais de de uma linha
        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM curso WHERE id_curso=$id_curso";
            $resultDelete = $conexao->query($sqlDelete);
            
        }
    }   
    header('Location: curso.php');
    

    ?>