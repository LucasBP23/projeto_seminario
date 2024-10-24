<?php 
    session_start();

        unset($_SESSION['instituicao_email']); // Caso não existra registro com aquele email ou senha vou mandar destruir qualquer variavel que tenha session email e session senha
        unset($_SESSION['instituicao_senha_acesso']);
        header('Location: Login/login_secretaria/login_secretaria.php');

?>