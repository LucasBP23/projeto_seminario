<!-- VERIFICA O LOGIN DA SECRETARIA -->

<?php 
    //INICIANDO SESSÃO
    session_start();
    

// São os parametros que estão vindo lá do formulario do meu login
    if(isset($_POST['submit']) && !empty($_POST['instituicao_email']) && !empty($_POST['instituicao_senha_acesso'])) // se existir minha variavel post submit e o campo email e senha não estiverem vazio...
    {
        // ... ele vai deixar acessar o meu sistema...
        include_once('../../config.php'); // inclusão da conexão com o banco de dados
        $instituicao_email = $_POST['instituicao_email'];
        $instituicao_senha_acesso = $_POST['instituicao_senha_acesso'];
        

        //teste para verificar se o post está chegando na variavel
        // print_r('Email: ' . $instituicao_email);
        // print_r('<br>');
        // print_r('Senha: ' . $instituicao_senha_acesso);

        //VERIFICANDO SE ESSES PARAMETROS EXISTEM NO BANCO DE DADOS
        $sql = "SELECT * FROM secretaria WHERE instituicao_email = '$instituicao_email'";

        $result = $conexao->query($sql); // essa conexao foi feito no arquivo config.php
   
        if (mysqli_num_rows($result) < 1) {
            unset($_SESSION['instituicao_email']);
            unset($_SESSION['instituicao_senha_acesso']);
            header('Location: login_secretaria.html');
        } else {
    
            // Caso exista, obter os dados da secretaria
            $user_data = mysqli_fetch_assoc($result);
    
            // Verifica se a senha fornecida corresponde à senha hashada armazenada
            if (password_verify($instituicao_senha_acesso, $user_data['instituicao_senha_acesso'])) {
                // A senha está correta, armazena os dados da sessão


                $_SESSION['instituicao_email'] =$instituicao_email; // assim que entrar no sistema ele vai criar as variasveis session
                // Armazena o email, o id da instituicao e o nome da instituição na sessão
              $_SESSION['instituicao_email'] = $user_data['instituicao_email'];
              $_SESSION['id_instituicao'] = $user_data['id_instituicao'];  // Armazenar o id_instituicao da secretaria logada
              $_SESSION['instituicao_nome'] = $user_data['instituicao_nome']; 
    
              header('Location: ../../page_secretaria/page_secretaria.php');
                exit(); 
            } else {
                // Senha incorreta, ele não acessa e volta para a area de login.
                unset($_SESSION['instituicao_email']);
                unset($_SESSION['instituicao_senha_acesso']);
                header('Location: login_secretaria.html'); 
            }
        }
?>

<?php 
   
} else {
     // Caso os campos não estejam preenchidos, redireciona para a área de login da secretaria
    header('Location: login_secretaria.html');
   
}
?>
?>