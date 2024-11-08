<!-- PERMITE ALOCAR PROFESSORES EM MATÉRIAS DE TURMAS ESPECÍFICAS -->

<?php
session_start();
include('../../config.php');

// Verifica se a secretaria está logada
if (!isset($_SESSION['id_instituicao'])) {
    header('Location: ../login/login_secretaria/login_secretaria.html');
    exit();
}

// Pega o id da instituição da secretaria logada
$id_instituicao = $_SESSION['id_instituicao'];
$mensagem_sucesso = "";
$mensagem_erro = "";

// Verifica se o formulário foi enviado para cadastrar a relação
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cadastrar'])) {
    $id_turma = $_POST['id_turma'];
    $id_materia = $_POST['id_materia'];
    $id_professor = $_POST['id_professor'];

    // Verifica se a combinação já existe
    $verifica_sql = "SELECT * FROM turma_professor_materia 
                     WHERE id_turma = $id_turma AND id_materia = $id_materia";
    $verifica_result = mysqli_query($conexao, $verifica_sql);

    if (mysqli_num_rows($verifica_result) > 0) {
        $mensagem_erro = "Já existe um professor para essa combinação de turma e matéria.";
    } else {
        // Insere a nova combinação
        $sql = "INSERT INTO turma_professor_materia (id_turma, id_materia, id_professor) 
                VALUES ($id_turma, $id_materia, $id_professor)";
        if (mysqli_query($conexao, $sql)) {
            $mensagem_sucesso = "Relação cadastrada com sucesso!";
        } else {
            $mensagem_erro = "Erro ao cadastrar a relação: " . mysqli_error($conexao);
        }
    }
}

// Carrega as turmas disponíveis para a instituição da secretaria logada
$turmas_sql = "SELECT turma.* 
               FROM turma 
               JOIN curso ON turma.id_curso = curso.id_curso 
               WHERE curso.id_instituicao = $id_instituicao";
$turmas_result = mysqli_query($conexao, $turmas_sql);

// Carrega todos os professores
$professores_sql = "SELECT * FROM professor WHERE id_instituicao = $id_instituicao";
$professores_result = mysqli_query($conexao, $professores_sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Cadastro de Turma-Professor-Matéria</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2>Cadastro de Turma-Professor-Matéria</h2>

    <?php
    if ($mensagem_sucesso) echo "<div class='alert alert-success'>$mensagem_sucesso</div>";
    if ($mensagem_erro) echo "<div class='alert alert-danger'>$mensagem_erro</div>";
    ?>

    <form method="POST" action="">
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

        <!-- Seleção de Matéria -->
        <div class="form-group">
            <label for="id_materia">Selecione a Matéria:</label>
            <select class="form-control" id="id_materia" name="id_materia" required>
                <option value="">Escolha a matéria</option>
            </select>
        </div>

        <!-- Seleção de Professor -->
        <div class="form-group">
            <label for="id_professor">Selecione o Professor:</label>
            <select class="form-control" id="id_professor" name="id_professor" required>
                <option value="">Escolha o professor</option>
                <?php while ($professor = mysqli_fetch_assoc($professores_result)) : ?>
                    <option value="<?= $professor['id_professor'] ?>"><?= $professor['professor_nome_completo'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar Relação</button>
    </form>
</div>

<script>
// AJAX para carregar as matérias de uma turma selecionada
$(document).ready(function() {
    $('#id_turma').change(function() {
        var turmaId = $(this).val();
        $.ajax({
            url: 'buscar_materias.php',
            method: 'POST',
            data: {id_turma: turmaId},
            dataType: 'json',
            success: function(data) {
                $('#id_materia').empty().append('<option value="">Escolha a matéria</option>');
                $.each(data, function(key, value) {
                    $('#id_materia').append('<option value="' + value.id_materia + '">' + value.materia_nome + '</option>');
                });
            }
        });
    });
});
</script>

</body>
</html>
