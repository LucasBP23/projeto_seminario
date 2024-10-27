<?php  
// SEMPRE QUE FOR TRABALHAR COM SESSÕES, TEM QUE INICIAR A SESSÃO ATRAVES DESSA TAG
session_start();

if (isset($_POST['submit']) && !empty($_POST['aluno_matricula']) && !empty($_POST['aluno_senha_acesso'])) {
    // ... ele vai deixar acessar o meu sistema...
    include_once('../../config.php'); // inclusão da conexão com o banco de dados
    $aluno_matricula = $_POST['aluno_matricula'];
    $aluno_senha_acesso = $_POST['aluno_senha_acesso'];

    //VERIFICANDO SE ESSES PARAMETROS EXISTEM NO BANCO DE DADOS
    $sql = "SELECT * FROM aluno WHERE aluno_matricula = '$aluno_matricula'";
    $result = $conexao->query($sql); // essa conexao foi feita no arquivo config.php

    if (mysqli_num_rows($result) < 1) {
        unset($_SESSION['aluno_matricula']);
        unset($_SESSION['aluno_senha_acesso']);
        header('Location: login_aluno.php');
    } else {
        // Caso exista, obter os dados do aluno
        $user_data = mysqli_fetch_assoc($result);

        // Verifica se a senha fornecida corresponde à senha hashada armazenada
        if (password_verify($aluno_senha_acesso, $user_data['aluno_senha_acesso'])) {
            // A senha está correta, armazena os dados da sessão
            $_SESSION['aluno_matricula'] = $user_data['aluno_matricula'];
            $_SESSION['id_instituicao'] = $user_data['id_instituicao'];  // Armazenar o id_instituicao da secretaria logada
            
            header('Location: ../../page_aluno/page_aluno.php');
            exit(); // teste
        } else {
            // Senha incorreta
            unset($_SESSION['aluno_matricula']);
            unset($_SESSION['aluno_senha_acesso']);
            header('Location: login_aluno.php');
        }
    }
} else {
    // Caso não exista, ele não acessa e volta para a area de login.
    header('Location: login_aluno.php');
   
}
?>
