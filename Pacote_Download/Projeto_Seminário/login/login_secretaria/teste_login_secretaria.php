<?php 
    // SEMPRE QUE FOR TRABALHAR COM SESSÕES, TEM QUE INICIAR A SESSÃO ATRAVES DESSA TAG
    session_start();
    

// print_r($_REQUEST);  // São os parametros que estão vindo lá do formulario do meu login
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
        $sql = "SELECT * FROM secretaria WHERE instituicao_email = '$instituicao_email' and instituicao_senha_acesso = '$instituicao_senha_acesso'";

        $result = $conexao->query($sql); // essa conexao foi feito no arquivo config.php
   

        // print_r($sql);
        // print_r($result); // [num_rows] => 1 se aparecer assim é porque existe uma linha igual de email e senha

        //VERIFICANDO SE EXISTE OU NÃO ESSE EMAIL E SENHA
        // if(mysqli_num_rows($result) < 1)
        // {
        //     print_r('Não existe');
        // }
        // else
        // {
        //     print_r('Existe');
        // }
        if(mysqli_num_rows($result) < 1)
         {
            unset($_SESSION['instituicao_email']); // Caso não existra registro com aquele email ou senha vou mandar destruir qualquer variavel que tenha session email e session senha
            unset($_SESSION['instituicao_senha_acesso']);
            header('Location: login_secretaria.html');
         }

         else
         {
            // Caso exista, obter os dados da secretaria
        $user_data = mysqli_fetch_assoc($result);
            $_SESSION['instituicao_email'] =$instituicao_email; // assim que entrar no sistema ele vai criar as variasveis session email e session senha
            // $_SESSION['instituicao_senha_acesso'] =$instituicao_senha_acesso;
            // $_SESSION['id_instituicao'] =$id_instituicao;
              // Armazenar o email e o id_instituicao na sessão
            $_SESSION['instituicao_email'] = $user_data['instituicao_email'];
            $_SESSION['id_instituicao'] = $user_data['id_instituicao'];  // Armazenar o id_instituicao da secretaria logada
            $_SESSION['instituicao_nome'] = $user_data['instituicao_nome']; 


            header('Location: ../../page_secretaria/index.php');
            exit();//teste
         }
    }
    else
    {
        // ... Caso não exista, ele não acessa e volta para a area de login.
        header('Location: login_secretaria.html'); 
    }


?>