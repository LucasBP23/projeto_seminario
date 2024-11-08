<!-- LISTA DE ALUNOS JÁ MATRICULADOS -->

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


// Verifica se o formulário foi enviado para excluir aluno
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Excluir aluno
    if (isset($_POST['excluir'])) {
        $id_matricula = $_POST['id_matricula'];

        // Exclui a matrícula
        $sql = "DELETE FROM matricula WHERE id_matricula = $id_matricula";
        if (mysqli_query($conexao, $sql)) {
            $mensagem_sucesso = "Aluno excluído da turma com sucesso!";
        } else {
            $mensagem_erro = "Erro ao excluir aluno: " . mysqli_error($conexao);
        }
    }

 // Transfere aluno
 if (isset($_POST['transferir'])) {
    $id_matricula = $_POST['id_matricula'];
    $nova_turma = $_POST['nova_turma'];

    // Atualiza a matrícula para a nova turma
    $sql = "UPDATE matricula SET id_turma = $nova_turma WHERE id_matricula = $id_matricula";
    if (mysqli_query($conexao, $sql)) {
        $mensagem_sucesso = "Aluno transferido para a nova turma com sucesso!";
    } else {
        $mensagem_erro = "Erro ao transferir aluno: " . mysqli_error($conexao);
    }
}
}



// Carrega as turmas disponíveis para a instituição
$turmas_sql = "SELECT * FROM turma WHERE id_curso IN (SELECT id_curso FROM curso WHERE id_instituicao = $id_instituicao)";
$turmas_result = mysqli_query($conexao, $turmas_sql);

// Lista os alunos da turma selecionada
$alunos_matriculados = [];
if (isset($_POST['turma_selecionada'])) {
    $id_turma = $_POST['turma_selecionada'];

    $alunos_sql = "SELECT a.id_aluno, a.aluno_nome_completo, a.aluno_cpf, a.aluno_matricula, m.id_matricula 
                   FROM aluno a 
                   JOIN matricula m ON a.id_aluno = m.id_aluno 
                   WHERE m.id_turma = $id_turma";
    $alunos_matriculados = mysqli_query($conexao, $alunos_sql);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Gerenciar Alunos na Turma</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Gerenciar Alunos na Turma</h2>

    <?php
    if ($mensagem_sucesso) echo "<div class='alert alert-success'>$mensagem_sucesso</div>";
    if ($mensagem_erro) echo "<div class='alert alert-danger'>$mensagem_erro</div>";
    ?>

    <form method="POST" action="">
        <div class="form-group">
            <label for="turma_selecionada">Selecione a Turma:</label>
            <select class="form-control" id="turma_selecionada" name="turma_selecionada" required>
                <option value="">Escolha a turma</option>
                <?php while ($turma = mysqli_fetch_assoc($turmas_result)) : ?>
                    <option value="<?= $turma['id_turma'] ?>"><?= $turma['turma_nome'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Listar Alunos</button>
    </form>

    <?php if (!empty($alunos_matriculados)) : ?>
        <h3>Alunos Matriculados</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Nome do Aluno</th>
                    <th>CPF do Aluno</th>
                    <th>Ação</th>
                    <th>Transferência</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($aluno = mysqli_fetch_assoc($alunos_matriculados)) : ?>
                    <tr>
                       <td><?= htmlspecialchars($aluno['aluno_matricula']) ?></td>
                        <td><?= htmlspecialchars($aluno['aluno_nome_completo']) ?></td>
                        <td><?= htmlspecialchars($aluno['aluno_cpf']) ?></td>
                        <td>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="id_matricula" value="<?= htmlspecialchars($aluno['id_matricula']) ?>">
                                <button type="submit" name="excluir" class="btn btn-danger" onclick="return confirm('Você realmente deseja excluir este aluno?');">Excluir</button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="id_matricula" value="<?= htmlspecialchars($aluno['id_matricula']) ?>">
                                <!-- <label for="nova_turma">Transferir para:</label> -->
                                <select name="nova_turma" required>
                                    <option value="">Escolha a nova turma</option>
                                    <?php
                                    // Carregue turmas do mesmo curso
                                    $turmas_do_curso_sql = "SELECT * FROM turma WHERE id_curso = (SELECT id_curso FROM turma WHERE id_turma = $id_turma)";
                                    $turmas_do_curso_result = mysqli_query($conexao, $turmas_do_curso_sql);
                                    while ($nova_turma = mysqli_fetch_assoc($turmas_do_curso_result)) : ?>
                                        <option value="<?= $nova_turma['id_turma'] ?>"><?= $nova_turma['turma_nome'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                                <button type="submit" name="transferir" class="btn btn-warning" onclick="return confirm('Você realmente deseja transferir este aluno?');">Transferir</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

</body>
</html>
