<!-- PERMITE VISUALIZAR A LISTA DE PROFESSORES ALOCADOS EM TURMA E MATERIAS ESPECIFICAS -->

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

// Excluir relação
if (isset($_GET['excluir'])) {
    $id_relacao = $_GET['excluir'];
    $delete_sql = "DELETE FROM turma_professor_materia WHERE id_turma_professor_materia = $id_relacao";

    if (mysqli_query($conexao, $delete_sql)) {
        $mensagem_sucesso = "Relação excluída com sucesso!";
    } else {
        $mensagem_erro = "Erro ao excluir a relação: " . mysqli_error($conexao);
    }
}


// Carrega todas as relações
$relacoes_sql = "SELECT tpm.id_turma_professor_materia, t.turma_nome, m.materia_nome AS nome_materia, p.professor_nome_completo AS nome_professor, p.professor_cpf
                 FROM turma_professor_materia tpm
                 JOIN turma t ON tpm.id_turma = t.id_turma
                 JOIN materia m ON tpm.id_materia = m.id_materia
                 JOIN professor p ON tpm.id_professor = p.id_professor
                 JOIN curso c ON t.id_curso = c.id_curso
                 WHERE c.id_instituicao = $id_instituicao";
$relacoes_result = mysqli_query($conexao, $relacoes_sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Gerenciar Relações</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Gerenciar Relações de Turma-Professor-Matéria</h2>

    <?php
    if ($mensagem_sucesso) echo "<div class='alert alert-success'>$mensagem_sucesso</div>";
    if ($mensagem_erro) echo "<div class='alert alert-danger'>$mensagem_erro</div>";
    ?>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Turma</th>
                <th>Matéria</th>
                <th>Professor</th>
                <th>CPF do Professor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($relacao = mysqli_fetch_assoc($relacoes_result)) : ?>
                <tr>
                    <td><?= $relacao['turma_nome'] ?></td>
                    <td><?= $relacao['nome_materia'] ?></td>
                    <td><?= $relacao['nome_professor'] ?></td>
                    <td><?= $relacao['professor_cpf'] ?></td>
                    <td>
                        <a href="editar_relacao.php?id_turma_professor_materia=<?= $relacao['id_turma_professor_materia'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="?excluir=<?= $relacao['id_turma_professor_materia'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta relação?');">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
