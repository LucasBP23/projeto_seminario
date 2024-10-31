<?php 
    session_start();
    include_once('../config.php');

    // Verifica se o professor está logado
    if ((!isset($_SESSION['professor_matricula'])== true) and (!isset($_SESSION['professor_senha_acesso']) == true))
    {
        unset($_SESSION['professor_matricula']); 
        unset($_SESSION['professor_senha_acesso']);
        header('Location: ../login/login_professor/login_professor.html');
        exit();
    }


    // Pega o nome completo do professor da sessão
    // Pega o nome completo do professor da sessão
    $professor_nome_completo = isset($_SESSION['professor_nome_completo']) ? $_SESSION['professor_nome_completo'] : 'Nome não disponível';


?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Professor</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="../images/UniSGE.png"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<header class="topo">
    <div class="logo">
        <img src="../images/UniSGE.png" alt="Logo" class="logo">
    </div>

    <div class="f_inst">
        <?php 
        echo "<p>Professor - <u>$professor_nome_completo</u></p>";
        ?>
    </div>

    <div class="f_topo">
        <a href="sair_professor.php">&#x2B05; Sair</a>
    </div>
</header>

<div class="principal">
    <iframe id="iframe1" src="" width="80%" height="100%" frameborder="0" name="iframe-menu" title="Iframe-menu"></iframe>
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> 
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
