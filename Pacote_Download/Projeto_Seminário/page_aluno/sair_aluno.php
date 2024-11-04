
<?php 
session_start();

// Remove todas as variáveis de sessão relacionadas ao aluno
unset($_SESSION['aluno_matricula']);
unset($_SESSION['aluno_senha_acesso']);
unset($_SESSION['id_instituicao']);
unset($_SESSION['aluno_nome_completo']);
unset($_SESSION['id_aluno']); // Adicionado para limpar o id_aluno

// Redireciona para a página de login do aluno
header('Location: ../login/login_aluno/login_aluno.html');
exit();
?>