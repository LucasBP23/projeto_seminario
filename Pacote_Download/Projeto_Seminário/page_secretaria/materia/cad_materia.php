<!-- FAZ O CADASTRO DE MATÉRIA EM UM CURSO SELECIONADO -->

<?php
session_start();
include('../../config.php');

// Verifica se a secretaria está logada
if (!isset($_SESSION['id_instituicao'])) {
    header('Location: ../../login/login_secretaria/login_secretaria.html');
    exit();
}

$id_instituicao = $_SESSION['id_instituicao'];
$mensagem_sucesso = "";

// Carregar lista de cursos
$sql_cursos = "SELECT * FROM curso WHERE id_instituicao = $id_instituicao";
$result_cursos = mysqli_query($conexao, $sql_cursos);

// Cadastro ou atualização de matéria
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cadastrar'])) {
        $id_curso = $_POST['id_curso'];
        $nome_materia = $_POST['nome_materia'];

        // Verifica se a matéria já existe
        $verifica_materia = "SELECT * FROM materia WHERE materia_nome = '$nome_materia' AND id_curso = $id_curso";
        $resultado_verificacao = mysqli_query($conexao, $verifica_materia);
        
        if (mysqli_num_rows($resultado_verificacao) > 0) {
            echo "<script>alert('Matéria já cadastrada para este curso!');</script>";
        } else {
            $sql = "INSERT INTO materia (materia_nome, id_curso) VALUES ('$nome_materia', $id_curso)";
            if (mysqli_query($conexao, $sql)) {
                $mensagem_sucesso = "Matéria cadastrada com sucesso!";
            } else {
                echo "Erro ao cadastrar matéria: " . mysqli_error($conexao);
            }
        }
    } elseif (isset($_POST['editar'])) {
        $id_materia = $_POST['id_materia'];
        $novo_nome = $_POST['novo_nome'];

        // Verifica se a nova matéria já existe para o mesmo curso
        $sql_materia_atual = "SELECT * FROM materia WHERE id_materia = $id_materia";
        $resultado_materia_atual = mysqli_query($conexao, $sql_materia_atual);
        $materia_atual = mysqli_fetch_assoc($resultado_materia_atual);
        
        $id_curso = $materia_atual['id_curso']; // Pega o id do curso da matéria atual

        $verifica_novo_nome = "SELECT * FROM materia WHERE materia_nome = '$novo_nome' AND id_curso = $id_curso AND id_materia != $id_materia";
        $resultado_novo_nome = mysqli_query($conexao, $verifica_novo_nome);
        
        if (mysqli_num_rows($resultado_novo_nome) > 0) {
            echo "<script>alert('Este nome de matéria já existe para o curso selecionado!');</script>";
        } else {
            $sql = "UPDATE materia SET materia_nome='$novo_nome' WHERE id_materia=$id_materia";
            if (mysqli_query($conexao, $sql)) {
                $mensagem_sucesso = "Matéria atualizada com sucesso!";
            } else {
                echo "Erro ao atualizar matéria: " . mysqli_error($conexao);
            }
        }
    } elseif (isset($_POST['excluir'])) {
        $id_materia = $_POST['id_materia'];

        $sql = "DELETE FROM materia WHERE id_materia=$id_materia";
        mysqli_query($conexao, $sql);
    }
    // Listar matérias se um curso foi selecionado
$materias = [];
if (isset($_POST['id_curso_selecionado'])) {
    $id_curso_selecionado = $_POST['id_curso_selecionado'];
    $sql_materias = "SELECT * FROM materia WHERE id_curso = $id_curso_selecionado";
    $materias = mysqli_query($conexao, $sql_materias);
}
}



?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Cadastro de Matéria</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
        function exibirMensagem(mensagem) {
            if (mensagem) {
                alert(mensagem);
            }
        }
    </script>
</head>
<body onload="exibirMensagem('<?php echo $mensagem_sucesso; ?>')">
<div class="container mt-5">
    <h2>Cadastro de Matéria</h2>
    
    <!-- Seletor de curso para visualização e cadastro de matéria -->
    <form method="POST" action="" class="mb-3">
        <div class="form-group">
            <label for="id_curso_selecionado">Selecione um Curso para Ver as Matérias:</label>
            <select class="form-control" id="id_curso_selecionado" name="id_curso_selecionado" required onchange="this.form.submit()">
                <option value="">Selecione um curso</option>
                <?php
                while ($curso = mysqli_fetch_assoc($result_cursos)) {
                    echo '<option value="' . $curso['id_curso'] . '" ' . (isset($id_curso_selecionado) && $id_curso_selecionado == $curso['id_curso'] ? 'selected' : '') . '>' . $curso['nome_curso'] . '</option>';
                }
                ?>
            </select>
        </div>
    </form>

    <!-- Formulário de cadastro de matéria (apenas se um curso foi selecionado) -->
    <?php if (isset($id_curso_selecionado)): ?>
        <form method="POST" action="" class="mb-5">
            <input type="hidden" name="id_curso" value="<?php echo $id_curso_selecionado; ?>">
            <div class="form-group">
                <label for="nome_materia">Nome da Matéria:</label>
                <input type="text" class="form-control" id="nome_materia" name="nome_materia" required>
            </div>
            <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar Matéria</button>
        </form>
    <?php endif; ?>

    <!-- Lista de matérias do curso selecionado -->
    <h3>Lista de Matérias do Curso Selecionado</h3>
    <?php if (isset($id_curso_selecionado) && mysqli_num_rows($materias) > 0): ?>
        <table class="table table-bordered mt-3">
            <tr>
                <!-- <th>Id da Matéria</th> -->
                <th>Nome da Matéria</th>
                <th>Ações</th>
            </tr>
            <?php while ($materia = mysqli_fetch_assoc($materias)): ?>
                <tr>
                  
                    <td><?php echo $materia['materia_nome']; ?></td>
                    <td>
                        <form method="POST" action="" class="d-inline">
                            <input type="hidden" name="id_materia" value="<?php echo $materia['id_materia']; ?>">
                            <input type="text" name="novo_nome" class="form-control mb-2" placeholder="Novo nome" required>
                            <button type="submit" name="editar" class="btn btn-warning btn-sm">Editar</button>
                        </form>
                        <form method="POST" action="" class="d-inline">
                            <input type="hidden" name="id_materia" value="<?php echo $materia['id_materia']; ?>">
                            <button type="submit" name="excluir" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta matéria desse curso?');">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p><?php echo isset($id_curso_selecionado) ? 'Nenhuma matéria cadastrada para este curso.' : 'Selecione um curso para ver as matérias.'; ?></p>
    <?php endif; ?>
</div>
</body>
</html>
