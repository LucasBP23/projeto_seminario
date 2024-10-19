<?php 

include_once('../config.php');

if(isset($_POST['update']))
{
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
           


    $sqlUpdate = "UPDATE professor SET nome='$nome', cpf='$cpf',email='$email', telefone='$telefone', sexo='$genero', nascimento='$data_nasc',materia='$materia',titulacao_max='$titulacao_max',cidade='$cidade', estado='$estado', logradouro='$logradouro', numero='$numero',bairro='$bairro',complemento='$complemento',professor_senha='$professor_senha' WHERE id_professor='$id_professor'"; 

    $result = $conexao->query($sqlUpdate);

}

header('Location: edit_professor.php');
?>