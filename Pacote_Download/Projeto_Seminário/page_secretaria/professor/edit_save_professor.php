<?php 

include_once('../../config.php');

if(isset($_POST['update']))
{

            $id_professor = $_POST['id_professor'];
            $professor_nome_completo = addslashes($_POST['professor_nome_completo']);
            $professor_data_nascimento = addslashes($_POST['professor_data_nascimento']);
            $professor_cpf = addslashes($_POST['professor_cpf']);
            $professor_estado = addslashes($_POST['professor_estado']);
            $professor_cidade = addslashes($_POST['professor_cidade']);
            $professor_endereco = addslashes($_POST['professor_endereco']);
            // $professor_matricula = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT); // Gera matrícula aleatória
            // $professor_senha = gerarSenha();
            // $professor_senha_hash = password_hash($professor_senha, PASSWORD_DEFAULT); // Hash da senha

           


    $sqlUpdate = "UPDATE professor SET professor_nome_completo='$professor_nome_completo', professor_data_nascimento='$professor_data_nascimento',professor_cpf='$professor_cpf', professor_estado='$professor_estado', professor_cidade='$professor_cidade', professor_endereco='$professor_endereco' WHERE id_professor='$id_professor'"; 

    $result = $conexao->query($sqlUpdate);

    if ($result) {
        header('Location: edit_professor.php');
    } else {
        echo "Erro ao atualizar o professor: " . $conexao->error;
    }
}

$conexao->close();
?>