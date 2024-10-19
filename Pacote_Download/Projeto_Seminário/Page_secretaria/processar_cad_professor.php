<?php 

session_start(); 



    if(isset($_POST['submit'])) // Se houver uma váriavel submit ele vai salvar os dados
    // primeiro tem que verificar um por um:
    {

        //TESTE PARA VER SE ESTÁ FUNCIONANDO
        // print_r('Nome: '.$_POST['nome']);
        // print_r("<br>");
        // print_r('CPF: '.$_POST['cpf']);
        // print_r("<br>");
        // print_r('Email: ' . $_POST['email']);
        // print_r("<br>");
        // print_r('Telefone: ' . $_POST['telefone']);
        // print_r("<br>");
        // print_r('Sexo: ' . $_POST['genero']);
        // print_r("<br>");
        // print_r('Data de nascimento: ' . $_POST['nascimento']);
        // print_r("<br>");
        // print_r('Matéria: ' . $_POST['materia']);
        // print_r("<br>");
        // print_r('Titularidade máxima: ' . $_POST['titulacao_max']);
        // print_r("<br>");
        // print_r('Cidade: ' . $_POST['cidade']);
        // print_r("<br>");
        // print_r('Estado: ' . $_POST['estado']);
        // print_r("<br>");
        // print_r('Logradouro: ' . $_POST['logradouro']);
        // print_r("<br>");
        // print_r('Bairro: ' . $_POST['bairro']);
        // print_r("<br>");
        // print_r('Complemento: ' . $_POST['complemento']);
       

   
    
      //Incluindo a conexão com o arquivo config.php que faz conexão com o banco de dados
      include_once('../config.php');



// Verificar se o id_instituicao está na sessão
if (!isset($_SESSION['id_instituicao'])) {
    echo "Erro: ID da instituição não encontrado. Faça login novamente.";
    exit();
}     

    //Transformando os input em variáveis
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
$id_instituicao = $_SESSION['id_instituicao'];

    $result = mysqli_query($conexao, "INSERT INTO professor (nome, cpf, email, telefone, sexo, nascimento, materia, titulacao_max, cidade, estado, logradouro, numero, bairro, complemento, professor_senha, id_instituicao) VALUES ('$nome','$cpf', '$email', '$telefone', '$genero', '$data_nasc', '$materia', '$titulacao_max', '$cidade', '$estado', '$logradouro', '$numero', '$bairro', '$complemento','$professor_senha', '$id_instituicao')");  // $conexao é do arquivo config.php, depois fical igual ao insert into do banco de dados, primeiro o comando, depois a tabela, depois as colunas, depois os valores.



// Verificar se o professor foi inserido corretamente
if ($result) {
    echo "Professor(a) cadastrado com sucesso!";
    // Redirecionar para uma página, se necessário
    // header("Location: listar_professores.php");
} else {
    echo "Erro ao cadastrar o(a) professor(a): " . mysqli_error($conexao);
}

}

?>
