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

            $id_professor = $_POST['id_professor'];
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $genero =  $_POST['sexo'];
            $data_nasc = $_POST['nascimento'];
            $materia = $_POST['materia'];
            $titulacao_max = $_POST['titulacao_max'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $logradouro = $_POST['logradouro'];
            $numero = $_POST['numero'];
            $bairro = $_POST['bairro'];
            $complemento = $_POST['complemento'];
            $professor_senha = $_POST['professor_senha'];
            // Capturar o id_instituicao da sessão
            // $id_instituicao = $_SESSION['id_instituicao'];
           


    $sqlUpdate = "UPDATE professor SET professor_nome_completo='$professor_nome_completo', professor_data_nascimento='$professor_data_nascimento',professor_cpf='$professor_cpf', professor_estado='$professor_estado', professor_cidade='$professor_cidade', professor_endereco='$professor_endereco' WHERE id_professor='$id_professor'"; 

    $result = $conexao->query($sqlUpdate);

}

header('Location: edit_professor.php');
?>