<?php 
session_start();
include('../../config.php');

// Verifica se a secretaria está logada
if (!isset($_SESSION['id_instituicao'])) {
    header('Location: ../../login/login_secretaria/login_secretaria.html');
    exit();
}

$id_instituicao = $_SESSION['id_instituicao'];
$mensagem_erro = "";
$mensagem_sucesso = "";

// Verifica o cadastro de uma nova turma
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cadastrar'])) {
    $turma_nome = $_POST['turma_nome'];
    $id_curso = $_POST['id_curso'];

    // Verifica se já existe uma turma com o mesmo nome no mesmo curso
    $verifica_turma = "SELECT * FROM turma WHERE turma_nome = '$turma_nome' AND id_curso = $id_curso";
    $resultado_verificacao = mysqli_query($conexao, $verifica_turma);

    if (mysqli_num_rows($resultado_verificacao) > 0) {
        // Se a turma já existe, define uma mensagem de erro
        $mensagem_erro = "Já existe uma turma com esse nome neste curso.";
    } else {
        // Caso não exista, insere a nova turma
        $sql = "INSERT INTO turma (turma_nome, id_curso) VALUES ('$turma_nome', $id_curso)";
        if (mysqli_query($conexao, $sql)) {
            $mensagem_sucesso = "Turma cadastrada com sucesso!";
        } else {
            $mensagem_erro = "Erro ao cadastrar turma: " . mysqli_error($conexao);
        }
    }
}

// Busca os cursos disponíveis na instituição
$cursos_query = "SELECT * FROM curso WHERE id_instituicao = $id_instituicao";
$cursos_result = mysqli_query($conexao, $cursos_query);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Cadastro de Turma</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Cadastro de Turma</h2>
    
    <?php
    if ($mensagem_sucesso) echo "<div class='alert alert-success'>$mensagem_sucesso</div>";
    if ($mensagem_erro) echo "<div class='alert alert-danger'>$mensagem_erro</div>";
    ?>
    
    <form method="POST" action="">
        <div class="form-group">
            <label for="turma_nome">Nome da Turma:</label>
            <input type="text" class="form-control" id="turma_nome" name="turma_nome" required>
        </div>
        <div class="form-group">
            <label for="id_curso">Selecione o Curso:</label>
            <select class="form-control" id="id_curso" name="id_curso" required>
                <option value="">Escolha o curso</option>
                <?php while ($curso = mysqli_fetch_assoc($cursos_result)) : ?>
                    <option value="<?= $curso['id_curso'] ?>"><?= $curso['nome_curso'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar Turma</button>
    </form>
</div>
</body>
</html>
