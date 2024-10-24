<?php 

include_once('../config.php');

if(isset($_POST['update']))
{
    $id_instituicao = $_POST['id_instituicao'];
    $instituicao_nome = $_POST['instituicao_nome'];
    $instituicao_email = $_POST['instituicao_email'];
    $instituicao_telefone = $_POST['instituicao_telefone'];
    $mantenedora = $_POST['mantenedora'];
    $tipo_instituicao =  $_POST['tipo_instituicao'];
    $instituicao_cidade = $_POST['instituicao_cidade'];
    $instituicao_senha_acesso = $_POST['instituicao_senha_acesso'];
           


    $sqlUpdate = "UPDATE secretaria SET instituicao_nome='$instituicao_nome', instituicao_email='$instituicao_email', instituicao_telefone='$instituicao_telefone',instituicao_senha_acesso='$instituicao_senha_acesso' WHERE id_instituicao='$id_instituicao'"; 

    $result = $conexao->query($sqlUpdate);

}

header('Location: edit_secretaria.php');
?>