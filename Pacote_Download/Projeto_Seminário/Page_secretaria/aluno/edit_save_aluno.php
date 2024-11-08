<!-- ATUALIZA OS DADOS DO ALUNO -->

<?php 

include_once('../../config.php');

if(isset($_POST['update']))
{

            $id_aluno = $_POST['id_aluno'];
            $aluno_nome_completo = addslashes($_POST['aluno_nome_completo']);
            $aluno_data_nascimento = addslashes($_POST['aluno_data_nascimento']);
            $aluno_cpf = addslashes($_POST['aluno_cpf']);
            $aluno_cep = addslashes($_POST['aluno_cep']);
            $aluno_estado = addslashes($_POST['aluno_estado']);
            $aluno_cidade = addslashes($_POST['aluno_cidade']);
            $aluno_logradouro = addslashes($_POST['aluno_logradouro']);
            $aluno_bairro = addslashes($_POST['aluno_bairro']);
            $aluno_numero = addslashes($_POST['aluno_numero']);
            

           
           


    $sqlUpdate = "UPDATE aluno SET aluno_nome_completo='$aluno_nome_completo', aluno_data_nascimento='$aluno_data_nascimento',aluno_cpf='$aluno_cpf', aluno_cep='$aluno_cep',  aluno_estado='$aluno_estado', aluno_cidade='$aluno_cidade', aluno_logradouro='$aluno_logradouro', aluno_bairro='$aluno_bairro', aluno_numero='$aluno_numero' WHERE id_aluno='$id_aluno'"; 

    $result = $conexao->query($sqlUpdate);

}

header('Location: edit_aluno.php');
?>