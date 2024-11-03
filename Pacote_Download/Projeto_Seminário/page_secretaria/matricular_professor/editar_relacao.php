<?php
session_start();
include('../../config.php');

if (!isset($_SESSION['id_instituicao'])) {
    header('Location: ../../login/login_secretaria/login_secretaria.html');
    exit();
}

$id_instituicao = $_SESSION['id_instituicao'];
$mensagem_sucesso = "";
$mensagem_erro = "";

// Verifica se o ID da relação foi passado
if (!isset($_GET['id_turma_professor_materia'])) {
    header('Location: gerenciar_relacoes.php');
    exit();
}

$id_relacao = $_GET['id_turma_professor_materia'];

// Carrega a relação atual
$relacao_sql = "SELECT * FROM turma_professor_materia WHERE id_turma_professor_materia = $id_relacao";
$relacao_result = mysqli_query($conexao, $relacao_sql);
$relacao = mysqli_fetch_assoc($relacao_result);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['atualizar'])) {
    $id_turma = $_POST['id_turma'];
    $id_materia = $_POST['id_materia'];
    $id_professor = $_POST['id_professor'];


    // Verifica se a matéria já está atribuída a outro professor na mesma turma
    $verifica_sql = "SELECT * FROM turma_professor_materia 
            WHERE id_materia = $id_materia 
            AND id_turma = $id_turma 
            AND id_turma_professor_materia != $id_relacao"; // Exclui a relação atual
    $verifica_result = mysqli_query($conexao, $verifica_sql);



    if (mysqli_num_rows($verifica_result) > 0) {
        $mensagem_erro = "Esta matéria já está cadastrada para esta turma com outro professor.";
    } else {
        // Atualiza a relação se não houver duplicidade
        $update_sql = "UPDATE turma_professor_materia SET id_turma = $id_turma, id_materia = $id_materia, id_professor = $id_professor WHERE id_turma_professor_materia = $id_relacao";
        
        if (mysqli_query($conexao, $update_sql)) {
            $mensagem_sucesso = "Relação atualizada com sucesso!";
        } else {
            $mensagem_erro = "Erro ao atualizar a relação: " . mysqli_error($conexao);
        }
    }
}


// Carrega turmas e professores
$turmas_sql = "SELECT turma.* FROM turma JOIN curso ON turma.id_curso = curso.id_curso WHERE curso.id_instituicao = $id_instituicao";
$turmas_result = mysqli_query($conexao, $turmas_sql);

$professores_sql = "SELECT * FROM professor WHERE id_instituicao = $id_instituicao";
$professores_result = mysqli_query($conexao, $professores_sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Editar Relação</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Editar Relação de Turma-Professor-Matéria</h2>

    <?php
    if ($mensagem_sucesso) echo "<div class='alert alert-success'>$mensagem_sucesso</div>";
    if ($mensagem_erro) echo "<div class='alert alert-danger'>$mensagem_erro</div>";
    ?>

    <form method="POST" action="">
        <div class="form-group">
            <label for="id_turma">Selecione a Turma:</label>
            <select class="form-control" id="id_turma" name="id_turma" required>
                <option value="">Escolha a turma</option>
                <?php while ($turma = mysqli_fetch_assoc($turmas_result)) : ?>
                    <option value="<?= $turma['id_turma'] ?>" <?= $turma['id_turma'] == $relacao['id_turma'] ? 'selected' : '' ?>><?= $turma['turma_nome'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="id_materia">Selecione a Matéria:</label>
            <select class="form-control" id="id_materia" name="id_materia" required>
                <option value="">Escolha a matéria</option>
                <?php
                // Carregue as matérias disponíveis e selecione a atual
                $materias_sql = "SELECT * FROM materia WHERE id_curso = (SELECT id_curso FROM turma WHERE id_turma = {$relacao['id_turma']})";
                $materias_result = mysqli_query($conexao, $materias_sql);
                while ($materia = mysqli_fetch_assoc($materias_result)) : ?>
                    <option value="<?= $materia['id_materia'] ?>" <?= $materia['id_materia'] == $relacao['id_materia'] ? 'selected' : '' ?>><?= $materia['materia_nome'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="id_professor">Selecione o Professor:</label>
            <select class="form-control" id="id_professor" name="id_professor" required>
                <option value="">Escolha o professor</option>
                <?php while ($professor = mysqli_fetch_assoc($professores_result)) : ?>
                    <option value="<?= $professor['id_professor'] ?>" <?= $professor['id_professor'] == $relacao['id_professor'] ? 'selected' : '' ?>><?= $professor['professor_nome_completo'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" name="atualizar" class="btn btn-primary">Atualizar Relação</button>
        <a href="gerenciar_relacoes.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>
</body>
</html>
