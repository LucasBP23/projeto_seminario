<!-- FAZ O TESTE PARA VERIFICAR SE OS DADOS UTILIZADOS NA ÁREA DE LOGIN CONDIZ COM O BANCO DE DADOS PARA EFETUAR A CONEXÃO OU VOLTAR PARA ÁREA DE LOGIN -->

<?php  
// Inicia a sessão
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
        header('Location: login_aluno.html');
    } else {
        // Caso exista, obter os dados do aluno
        $user_data = mysqli_fetch_assoc($result);

        // Verifica se a senha fornecida corresponde à senha hashada armazenada
        if (password_verify($aluno_senha_acesso, $user_data['aluno_senha_acesso'])) {
            // A senha está correta, armazena os dados da sessão
            $_SESSION['id_aluno'] = $user_data['id_aluno'];  // Armazena o id_professor
            $_SESSION['aluno_matricula'] = $user_data['aluno_matricula'];
            $_SESSION['id_instituicao'] = $user_data['id_instituicao'];  // Armazenar o id_instituicao da secretaria logada
            $_SESSION['aluno_nome_completo'] = $user_data['aluno_nome_completo'];

            header('Location: ../../page_aluno/page_aluno.php');
            exit(); 
        } else {
            // Senha incorreta
            unset($_SESSION['aluno_matricula']);
            unset($_SESSION['aluno_senha_acesso']);
            header('Location: login_aluno.html');
        }
    }
} else {
    // Caso não exista, ele não acessa e volta para a area de login.
    header('Location: login_aluno.html');
   
}
?>
