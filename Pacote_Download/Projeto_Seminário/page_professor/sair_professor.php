<?php 
    session_start();

        unset($_SESSION['matricula_professor']);
        unset($_SESSION['professor_senha_acesso']);
        // unset($_SESSION['id_instituicao']);
        // unset($_SESSION['professor_nome_completo']);
        header('Location: ../login/login_professor/login_professor.html');

?>