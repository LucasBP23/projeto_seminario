<?php 

include_once('../config.php');

if(isset($_POST['update']))
{
    $id_instituicao = $_POST['id_instituicao'];
    $instituicao_nome = $_POST['instituicao_nome'];
    $instituicao_codigo = $_POST['instituicao_codigo'];
    $instituicao_email = $_POST['instituicao_email'];
    $instituicao_telefone = $_POST['instituicao_telefone'];
    $mantenedora = $_POST['mantenedora'];
    $tipo_instituicao =  $_POST['tipo_instituicao'];
    $instituicao_cidade = $_POST['instituicao_cidade'];
    $instituicao_estado = $_POST['instituicao_estado'];
    $instituicao_logradouro = $_POST['instituicao_logradouro'];
    $instituicao_numero = $_POST['instituicao_numero'];
    $instituicao_bairro = $_POST['instituicao_bairro'];
    $instituicao_complemento = $_POST['instituicao_complemento'];
    $instituicao_senha = $_POST['instituicao_senha'];
           


    $sqlUpdate = "UPDATE secretaria SET instituicao_nome='$instituicao_nome', instituicao_codigo='$instituicao_codigo',instituicao_email='$instituicao_email', instituicao_telefone='$instituicao_telefone', mantenedora='$mantenedora', tipo_instituicao='$tipo_instituicao',instituicao_cidade='$instituicao_cidade',instituicao_estado='$instituicao_estado',instituicao_logradouro='$instituicao_logradouro', instituicao_numero='$instituicao_numero', instituicao_bairro='$instituicao_bairro', instituicao_complemento='$instituicao_complemento',instituicao_senha='$instituicao_senha' WHERE id_instituicao='$id_instituicao'"; 

    $result = $conexao->query($sqlUpdate);

}

header('Location: edit_secretaria.php');
?>