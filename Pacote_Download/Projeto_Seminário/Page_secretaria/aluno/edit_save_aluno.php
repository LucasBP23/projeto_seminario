<?php 

include_once('../../config.php');

if(isset($_POST['update']))
{

            $id_aluno = $_POST['id_aluno'];
            $aluno_nome_completo = addslashes($_POST['aluno_nome_completo']);
            $aluno_data_nascimento = addslashes($_POST['aluno_data_nascimento']);
            $aluno_cpf = addslashes($_POST['aluno_cpf']);
            $aluno_estado = addslashes($_POST['aluno_estado']);
            $aluno_cidade = addslashes($_POST['aluno_cidade']);
            $aluno_endereco = addslashes($_POST['aluno_endereco']);
            // $aluno_matricula = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT); // Gera matrícula aleatória
            // $aluno_senha = gerarSenha();
            // $aluno_senha_hash = password_hash($aluno_senha, PASSWORD_DEFAULT); // Hash da senha

           
           


    $sqlUpdate = "UPDATE aluno SET aluno_nome_completo='$aluno_nome_completo', aluno_data_nascimento='$aluno_data_nascimento',aluno_cpf='$aluno_cpf', aluno_estado='$aluno_estado', aluno_cidade='$aluno_cidade', aluno_endereco='$aluno_endereco' WHERE id_aluno='$id_aluno'"; 

    $result = $conexao->query($sqlUpdate);

}

header('Location: edit_aluno.php');
?>