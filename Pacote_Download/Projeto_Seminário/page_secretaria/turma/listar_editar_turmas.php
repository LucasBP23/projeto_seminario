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

// Função de edição e exclusão de turmas
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['editar'])) {
        $id_turma = $_POST['id_turma'];
        $novo_nome = $_POST['novo_nome'];


        // Verifica se já existe uma turma com o mesmo nome no mesmo curso
        $verifica_sql = "SELECT * FROM turma 
                    WHERE turma_nome = '$novo_nome' 
                    AND id_curso = (SELECT id_curso FROM turma WHERE id_turma = $id_turma) 
                    AND id_turma != $id_turma";
        $verifica_result = mysqli_query($conexao, $verifica_sql);


        if (mysqli_num_rows($verifica_result) > 0) {
            echo "<script>alert('Já existe uma turma com este nome no mesmo curso.');</script>";
        } else {
            // Atualizar o nome da turma se não houver duplicidade
            $sql = "UPDATE turma SET turma_nome='$novo_nome' WHERE id_turma=$id_turma";
            if (mysqli_query($conexao, $sql)) {
                echo "<script>alert('Nome da turma atualizado com sucesso!');</script>";
            } else {
                echo "<script>alert('Erro ao atualizar o nome da turma.');</script>";
            }
        }

    } elseif (isset($_POST['excluir'])) {
        $id_turma = $_POST['id_turma'];

        // Excluir a turma
        $sql = "DELETE FROM turma WHERE id_turma=$id_turma";
        if (mysqli_query($conexao, $sql)) {
            echo "<script>alert('Turma excluída com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao excluir a turma.');</script>";
        }
    }
}

     
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Lista de Turmas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Lista de Turmas</h2>

    <?php
    // Consulta para listar as turmas da instituição
    $sql = "SELECT turma.id_turma, turma.turma_nome, curso.nome_curso FROM turma
            INNER JOIN curso ON turma.id_curso = curso.id_curso
            WHERE curso.id_instituicao = $id_instituicao";
    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<table class="table table-bordered mt-3">
                <tr>
                    <th>Nome do Curso</th>
                    <th>Nome da Turma</th>
                    <th>Ações</th>
                </tr>';
        
        while ($turma = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $turma['nome_curso'] . '</td>
                    <td>
                        <form method="POST" action="" class="form-inline">
                            <input type="hidden" name="id_turma" value="' . $turma['id_turma'] . '">
                            <input type="text" name="novo_nome" class="form-control mr-2" value="' . $turma['turma_nome'] . '" required>
                    </td>
                    <td>
                            <button type="submit" name="editar" class="btn btn-warning btn-sm mr-2">Editar</button>
                        </form>
                        <form method="POST" action="" class="d-inline">
                            <input type="hidden" name="id_turma" value="' . $turma['id_turma'] . '">
                            <button type="submit" name="excluir" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                  </tr>';
        }
        echo '</table>';
    } else {
        echo '<p>Nenhuma turma cadastrada para esta instituição.</p>';
    }
    ?>
</div>
</body>
</html>
