<?php  
// SEMPRE QUE FOR TRABALHAR COM SESSÕES, TEM QUE INICIAR A SESSÃO ATRAVES DESSA TAG
session_start();

if (isset($_POST['submit']) && !empty($_POST['professor_matricula']) && !empty($_POST['professor_senha_acesso'])) {
    // ... ele vai deixar acessar o meu sistema...
    include_once('../../config.php'); // inclusão da conexão com o banco de dados
    $professor_matricula = $_POST['professor_matricula'];
    $professor_senha_acesso = $_POST['professor_senha_acesso'];

    //VERIFICANDO SE ESSES PARAMETROS EXISTEM NO BANCO DE DADOS
    $sql = "SELECT * FROM professor WHERE professor_matricula = '$professor_matricula'";
    
    $result = $conexao->query($sql); // essa conexao foi feita no arquivo config.php

    if (mysqli_num_rows($result) < 1) {
        // Matrícula não encontrada, volta para o login do professor
        unset($_SESSION['professor_matricula']);
        unset($_SESSION['professor_senha_acesso']);
        header('Location: login_professor.html');
    } else {
        // Caso exista, obter os dados do professor
        $user_data = mysqli_fetch_assoc($result);

        // Verifica se a senha fornecida corresponde à senha hashada armazenada
        if (password_verify($professor_senha_acesso, $user_data['professor_senha_acesso'])) {
            // A senha está correta, armazena os dados da sessão
            $_SESSION['id_professor'] = $user_data['id_professor'];  // Armazena o id_professor
            $_SESSION['professor_matricula'] = $user_data['professor_matricula'];
            $_SESSION['id_instituicao'] = $user_data['id_instituicao'];  // Armazenar o id_instituicao da secretaria logada
            $_SESSION['professor_nome_completo'] = $user_data['professor_nome_completo'];

            header('Location: ../../page_professor/page_professor.php');
            exit();
        } else {
            // Senha incorreta
            unset($_SESSION['professor_matricula']);
            unset($_SESSION['professor_senha_acesso']);
            header('Location: login_professor.html');
        }
    }
} else {
    // Caso não exista, ele não acessa e volta para a area de login.
    header('Location: login_professor.html');
   
}
?>
