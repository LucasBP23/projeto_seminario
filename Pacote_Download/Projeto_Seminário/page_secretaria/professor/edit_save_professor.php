<!-- ATUALIZA AS ALTERAÇÕES NAS INFORMAÇÕES DO PROFESSOR -->

<?php 

include_once('../../config.php');

if(isset($_POST['update']))
{

            $id_professor = $_POST['id_professor'];
            $professor_nome_completo = addslashes($_POST['professor_nome_completo']);
            $professor_data_nascimento = addslashes($_POST['professor_data_nascimento']);
            $professor_cpf = addslashes($_POST['professor_cpf']);
            $professor_cep = addslashes($_POST['professor_cep']);
            $professor_estado = addslashes($_POST['professor_estado']);
            $professor_cidade = addslashes($_POST['professor_cidade']);
            $professor_logradouro = addslashes($_POST['professor_logradouro']);
            $professor_bairro = addslashes($_POST['professor_bairro']);
            $professor_numero = addslashes($_POST['professor_numero']);
          
           


  
    $sqlUpdate = "UPDATE professor SET professor_nome_completo='$professor_nome_completo', professor_data_nascimento='$professor_data_nascimento',professor_cpf='$professor_cpf', professor_cep='$professor_cep',  professor_estado='$professor_estado', professor_cidade='$professor_cidade', professor_logradouro='$professor_logradouro', professor_bairro='$professor_bairro', professor_numero='$professor_numero' WHERE id_professor='$id_professor'";  

    $result = $conexao->query($sqlUpdate);

    if ($result) {
        header('Location: edit_professor.php');
    } else {
        echo "Erro ao atualizar o professor: " . $conexao->error;
    }
}

$conexao->close();
?>