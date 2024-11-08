<!-- PERMITE EDITAR O NOME E A DESCRIÇÃO DO CURSO -->

<?php
session_start();
include('../../config.php');

// Verifica se a secretaria está logada
if (!isset($_SESSION['id_instituicao'])) {
    header('Location: ../../login/login_secretaria/login_secretaria.html');
    exit();
}

// Verifica se o ID do curso foi passado via GET
if (isset($_GET['id_curso']) && is_numeric($_GET['id_curso'])) {
    $id_curso = $_GET['id_curso'];
} else {
    echo "Erro: ID do curso inválido ou não fornecido.";
    exit();
}

// Busca o curso no banco de dados
$sql = "SELECT * FROM curso WHERE id_curso = $id_curso";
$result = mysqli_query($conexao, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Curso não encontrado.";
    exit();
}

$curso = mysqli_fetch_assoc($result);

// Atualiza o curso no banco de dados após o envio do formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $novo_nome = $_POST['nome_curso'];
    $nova_descricao = $_POST['descricao'];

    $sql_update = "UPDATE curso SET nome_curso='$novo_nome', descricao='$nova_descricao' WHERE id_curso=$id_curso";
    if (mysqli_query($conexao, $sql_update)) {
        echo "<script>alert('Curso atualizado com sucesso!'); window.location.href='cad_curso.php';</script>";
    } else {
        echo "Erro ao atualizar curso: " . mysqli_error($conexao);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Curso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="../../images/UniSGE-removebg-preview.png"> <!--Coloca o logo no topo da guia da página-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Editar Curso</h2>
    <form method="POST">
        <div class="form-group">
            <label for="nome_curso">Nome do Curso:</label>
            <input type="text" class="form-control" id="nome_curso" name="nome_curso" value="<?php echo htmlspecialchars($curso['nome_curso']); ?>" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição do Curso:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required><?php echo htmlspecialchars($curso['descricao']); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="cad_curso.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>
</body>
</html>
