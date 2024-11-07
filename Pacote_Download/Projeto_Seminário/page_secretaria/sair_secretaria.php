<?php 
    session_start();
        // Remove todas as variáveis de sessão relacionadas a secretaria
        unset($_SESSION['instituicao_email']); 
        unset($_SESSION['instituicao_senha_acesso']);

        // Redireciona para a página de login da secretaria
        header('Location: ../login/login_secretaria/login_secretaria.html');

?>