<!-- Usado para criar a secretaria -->

<?php
include('../config.php'); // Incluindo a conexão com o banco de dados

// Definindo as informações do usuário
$instituicao_nome = "Colégio Horizonte Brilhante";
$instituicao_email = "contato@horizontebrilhante.edu.br"; // E-mail do usuário
$instituicao_telefone = "(21) 1234-5678";
$instituicao_senha = "horizonte@2024"; // Senha para o usuário
$instituicao_senha_acesso = password_hash($instituicao_senha, PASSWORD_DEFAULT); // Hash da senha

// Verifica se o email já está cadastrado para evitar duplicação
$verificar_email_sql = "SELECT * FROM secretaria WHERE instituicao_email = '$instituicao_email'";
$verificar_email_result = mysqli_query($conexao, $verificar_email_sql);


if (mysqli_num_rows($verificar_email_result) > 0) {
    echo "Erro: O email já está cadastrado.";
} else {
    // Insere o novo usuário na tabela professor
    $sql = "INSERT INTO secretaria (instituicao_nome, instituicao_email, instituicao_telefone, instituicao_senha_acesso) VALUES ('$instituicao_nome', '$instituicao_email', '$instituicao_telefone', '$instituicao_senha_acesso')";

    if (mysqli_query($conexao, $sql)) {
        echo "Usuário criado com sucesso!";
    } else {
        echo "Erro ao criar usuário: " . mysqli_error($conexao);
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>
