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
$mensagem_erro = "";

// Cadastro de curso
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cadastrar'])) {
        $nome_curso = $_POST['nome_curso'];
        $descricao = $_POST['descricao'];

        $verifica_curso = "SELECT * FROM curso WHERE nome_curso = '$nome_curso' AND id_instituicao = $id_instituicao";
        $resultado_verificacao = mysqli_query($conexao, $verifica_curso);
        
        if (mysqli_num_rows($resultado_verificacao) > 0) {
            // Curso já existe, definir mensagem de erro
            echo "<script>alert('Curso já cadastrado para esta instituição!" . mysqli_error($conexao). " '); window.location='cad_curso.php'</script>";
        } else {
               // Curso não existe, proceder com o cadastro

        $sql = "INSERT INTO curso (nome_curso, descricao, id_instituicao) VALUES ('$nome_curso', '$descricao', $id_instituicao)";
        if (!mysqli_query($conexao, $sql)) {
            echo "Erro ao cadastrar curso: " . mysqli_error($conexao);
        }
        }
    } elseif (isset($_POST['editar'])) {
        $id_curso = $_POST['id_curso'];
        $novo_nome = $_POST['novo_nome'];
        $nova_descricao = $_POST['nova_descricao'];
        
        $sql = "UPDATE curso SET nome_curso='$novo_nome', descricao='$nova_descricao' WHERE id_curso=$id_curso";
        mysqli_query($conexao, $sql);
    } elseif (isset($_POST['excluir'])) {
        $id_curso = $_POST['id_curso'];
        
        $sql = "DELETE FROM curso WHERE id_curso=$id_curso";
        mysqli_query($conexao, $sql);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Cadastro de Curso</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Cadastro de Curso</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="nome_curso">Nome do Curso:</label>
            <input type="text" class="form-control" id="nome_curso" name="nome_curso" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição do Curso:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
        </div>
        <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar Curso</button>
    </form>

    <h3 class="mt-5">Lista de Cursos</h3>

    <?php
    // Consulta para listar cursos da instituição da secretaria logada
    $sql = "SELECT * FROM curso WHERE id_instituicao = $id_instituicao";
    $result = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<table class="table table-bordered mt-3">
                <tr>
                    <th>Id do curso</th>
                    <th>Nome do Curso</th>
                    <th>Descrição</th>
                    <th>Id da instituição</th>
                    <th>Ações</th>
                </tr>';
        
        while ($curso = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $curso['id_curso'] . '</td>
                    <td>' . $curso['nome_curso'] . '</td>
                    <td>' . $curso['descricao'] . '</td>
                    <td>' . $curso['id_instituicao'] . '</td>
                    <td>
                      <a href="editar_curso.php?id_curso=' . $curso['id_curso'] . '" class="btn btn-warning btn-sm">Editar</a>
                <form method="POST" action="" class="d-inline">
                    <input type="hidden" name="id_curso" value="' . $curso['id_curso'] . '">
                    <button type="submit" name="excluir" class="btn btn-danger btn-sm">Excluir</button>
                </form>
                    </td>
                  </tr>';
        }
        echo '</table>';
    } else {
        echo '<p>Nenhum curso cadastrado para esta instituição.</p>';
    }
    ?>
</div>
</body>
</html>
