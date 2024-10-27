<?php 

include_once('../config.php');

if(isset($_POST['update']))
{

            $id_professor = $_POST['id_professor'];
            $professor_nome_completo = $_POST['professor_nome_completo'];
            $professor_data_nascimento = $_POST['professor_data_nascimento'];
            $professor_cpf = $_POST['professor_cpf'];
            $professor_estado = $_POST['professor_estado'];
            $professor_cidade = $_POST['professor_cidade'];
            $professor_endereco = $_POST['professor_endereco'];
            // $professor_matricula = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT); // Gera matrícula aleatória
            // $professor_senha = gerarSenha();
            // $professor_senha_hash = password_hash($professor_senha, PASSWORD_DEFAULT); // Hash da senha

           


    $sqlUpdate = "UPDATE professor SET professor_nome_completo='$professor_nome_completo', professor_data_nascimento='$professor_data_nascimento',professor_cpf='$professor_cpf', professor_estado='$professor_estado', professor_cidade='$professor_cidade', professor_endereco='$professor_endereco' WHERE id_professor='$id_professor'"; 

    $result = $conexao->query($sqlUpdate);

}

header('Location: edit_professor.php');
?>