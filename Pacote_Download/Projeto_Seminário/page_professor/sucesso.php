<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucesso</title>
    <link rel="stylesheet" href="style.css?v=1.1">
</head>
<body>
    <header>
        <h1>Operação Realizada com Sucesso!</h1>
    </header>
    
    <main>
        <p>As notas foram salvas com sucesso!</p>
        <a href="page_professor.php">Voltar à página do professor</a>
    </main>
    
    <footer>
        <p>&copy; <?= date("Y") ?> Sua Instituição de Ensino</p>
    </footer>
</body>
</html>