<!-- FAZ LOGOUT DA PÁGINA DO PROFESSOR -->

<?php 
session_start();

// Remove todas as variáveis de sessão relacionadas ao professor
unset($_SESSION['professor_matricula']);
unset($_SESSION['professor_senha_acesso']);
unset($_SESSION['id_instituicao']);
unset($_SESSION['professor_nome_completo']);
unset($_SESSION['id_professor']); // Adicionado para limpar o id_professor

// Redireciona para a página de login do professor
header('Location: ../login/login_professor/login_professor.html');
exit();
?>