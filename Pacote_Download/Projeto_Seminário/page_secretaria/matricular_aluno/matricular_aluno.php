<!-- MATRICULA ALUNO EM UMA TURMA SELECIONADA -->

<?php
session_start();
include('../../config.php');

// Verifica se a secretaria está logada
if (!isset($_SESSION['id_instituicao'])) {
    header('Location: ../../login/login_secretaria/login_secretaria.html');
    exit();
}

// Pega o id da instituição da secretaria logada
$id_instituicao = $_SESSION['id_instituicao'];
$mensagem_sucesso = "";
$mensagem_erro = "";

// Verifica se o formulário foi enviado para matricular o aluno
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['matricular'])) {
    $id_aluno = $_POST['id_aluno'];
    $id_turma = $_POST['id_turma'];

    // Verifica se a matrícula já existe
    $verifica_sql = "SELECT * FROM matricula WHERE id_aluno = $id_aluno AND id_turma = $id_turma";
    $verifica_result = mysqli_query($conexao, $verifica_sql);

    if (mysqli_num_rows($verifica_result) > 0) {
        $mensagem_erro = "Este aluno já está matriculado nesta turma.";
    } else {
        // Insere a nova matrícula
        $sql = "INSERT INTO matricula (id_aluno, id_turma) VALUES ($id_aluno, $id_turma)";
        if (mysqli_query($conexao, $sql)) {
            $mensagem_sucesso = "Matrícula realizada com sucesso!";
        } else {
            $mensagem_erro = "Erro ao matricular o aluno: " . mysqli_error($conexao);
        }
    }
}

// Carrega todos os alunos da instituição
$alunos_sql = "SELECT * FROM aluno WHERE id_instituicao = $id_instituicao";
$alunos_result = mysqli_query($conexao, $alunos_sql);

// Carrega as turmas disponíveis para a instituição
$turmas_sql = "SELECT * FROM turma WHERE id_curso IN (SELECT id_curso FROM curso WHERE id_instituicao = $id_instituicao)";
$turmas_result = mysqli_query($conexao, $turmas_sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Matricular Aluno</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Matricular Aluno</h2>

    <?php
    if ($mensagem_sucesso) echo "<div class='alert alert-success'>$mensagem_sucesso</div>";
    if ($mensagem_erro) echo "<div class='alert alert-danger'>$mensagem_erro</div>";
    ?>

    <form method="POST" action="">
        <!-- Seleção de Aluno -->
        <div class="form-group">
            <label for="id_aluno">Selecione o Aluno:</label>
            <select class="form-control" id="id_aluno" name="id_aluno" required>
                <option value="">Escolha o aluno</option>
                <?php while ($aluno = mysqli_fetch_assoc($alunos_result)) : ?>
                    <option value="<?= $aluno['id_aluno'] ?>">
                <?= $aluno['aluno_matricula'] . " - " . $aluno['aluno_nome_completo'] ?>
                <?php endwhile; ?>
            </select>
        </div>

        <!-- Seleção de Turma -->
        <div class="form-group">
            <label for="id_turma">Selecione a Turma:</label>
            <select class="form-control" id="id_turma" name="id_turma" required>
                <option value="">Escolha a turma</option>
                <?php while ($turma = mysqli_fetch_assoc($turmas_result)) : ?>
                    <option value="<?= $turma['id_turma'] ?>"><?= $turma['turma_nome'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" name="matricular" class="btn btn-primary">Matricular Aluno</button>
    </form>
</div>

</body>
</html>
