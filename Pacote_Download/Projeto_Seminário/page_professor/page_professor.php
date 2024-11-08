<!-- PÁGINA DO PROFESSOR -->

<?php  
session_start();
include_once('../config.php');

if (!isset($_SESSION['professor_matricula']) || !isset($_SESSION['id_professor'])) {
    header('Location: ../login/login_professor/login_professor.html');
    exit();
}

$id_professor = $_SESSION['id_professor'];

$sql = "SELECT tm.id_turma_professor_materia, t.turma_nome, m.materia_nome 
FROM turma_professor_materia tm
JOIN turma t ON tm.id_turma = t.id_turma
JOIN materia m ON tm.id_materia = m.id_materia
WHERE tm.id_professor = $id_professor";

$result = mysqli_query($conexao, $sql);
$turmas_materias = mysqli_fetch_all($result, MYSQLI_ASSOC);

$professor_nome_completo = isset($_SESSION['professor_nome_completo']) ? $_SESSION['professor_nome_completo'] : 'Nome não disponível';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Professor</title>
    <link rel="stylesheet" href="style.css?v=1.5">
    <link rel="icon" type="image/x-icon" href="../images/UniSGE.png"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<header class="topo">
    <div class="logo">
        <img src="../images/UniSGE.png" alt="Logo" class="logo">
    </div>

    <div class="f_inst">
        <?php 
        echo "<p>Professor(a) - <u>$professor_nome_completo</u></p>";
        ?>
    </div>

    <div class="f_topo">
        <a href="sair_professor.php">&#x2B05; Sair</a>
    </div>
</header>

<div class="principal">

    <div class="alunos_notas">

<form id="form-selecao" method="POST" action="" class="selecao">
    <label for="turma_materia">Selecione a Turma e a Matéria:</label>
    <br>
    <select name="turma_materia" id="turma_materia">
        <?php foreach ($turmas_materias as $tm) : ?>
            <option value="<?= $tm['id_turma_professor_materia'] ?>">
                <?= $tm['turma_nome'] . " - " . $tm['materia_nome'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br>
    <button type="submit">Carregar Alunos</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['turma_materia'])) {
    $id_turma_professor_materia = intval($_POST['turma_materia']);

    // Busca alunos da turma
    $sql_alunos = "SELECT a.id_aluno, a.aluno_nome_completo, a.aluno_matricula 
                   FROM matricula m
                   JOIN aluno a ON m.id_aluno = a.id_aluno
                   JOIN turma_professor_materia tm ON m.id_turma = tm.id_turma
                   WHERE tm.id_turma_professor_materia = $id_turma_professor_materia 
                   ORDER BY a.aluno_nome_completo ASC";
    $result_alunos = mysqli_query($conexao, $sql_alunos);
    $alunos = mysqli_fetch_all($result_alunos, MYSQLI_ASSOC);
?>

<div class="accordion">
    <?php foreach ($alunos as $aluno) : ?>
        <div class="accordion-header">
            <?= htmlspecialchars($aluno['aluno_matricula']) . " - " . htmlspecialchars($aluno['aluno_nome_completo']) ?>
            <ion-icon name="chevron-down-outline" class="accordion-arrow"></ion-icon>
        </div>
        <div class="accordion-content">
            <form method="POST" action="salvar_notas.php">
                <input type="hidden" name="id_turma_professor_materia" value="<?= $id_turma_professor_materia ?>">
                <table>
                    <thead>
                        <tr>
                            <th>Nota 1</th>
                            <th>Nota 2</th>
                            <th>Nota 3</th>
                            <th>Nota 4</th>
                            <th>Média</th>
                            <th>Situação</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            // Busca as notas do aluno
                            $sql_notas = "SELECT * FROM nota 
                                          WHERE id_aluno = {$aluno['id_aluno']} 
                                          AND id_turma_professor_materia = $id_turma_professor_materia";
                            $result_notas = mysqli_query($conexao, $sql_notas);
                            $notas_aluno = mysqli_fetch_all($result_notas, MYSQLI_ASSOC);
                            $notas = [];
                            foreach ($notas_aluno as $nota) {
                                $notas[$nota['numero_nota']] = $nota['nota'];
                            }
                            ?>
                            <td><input type="number" name="notas[<?= $aluno['id_aluno'] ?>][1]" step="0.01" value="<?= $notas[1] ?? '' ?>"></td>
                            <td><input type="number" name="notas[<?= $aluno['id_aluno'] ?>][2]" step="0.01" value="<?= $notas[2] ?? '' ?>"></td>
                            <td><input type="number" name="notas[<?= $aluno['id_aluno'] ?>][3]" step="0.01" value="<?= $notas[3] ?? '' ?>"></td>
                            <td><input type="number" name="notas[<?= $aluno['id_aluno'] ?>][4]" step="0.01" value="<?= $notas[4] ?? '' ?>"></td>
                            <td>
                                <!-- Exibe média e status -->
                                <?php
                                $media = calcularMedia($aluno['id_aluno'], $id_turma_professor_materia);
                                echo number_format($media, 2);
                                ?>
                            </td>
                            <td><?php echo verificarStatus($media); ?></td>
                            <td><button type="submit" class="atualizar_notas">Atualizar Notas</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    <?php endforeach; ?>
</div>

        
<?php
}

function calcularMedia($id_aluno, $id_turma_professor_materia) {
    global $conexao;

    // Buscar notas do aluno
    $sql = "SELECT AVG(nota) as media FROM nota 
            WHERE id_aluno = $id_aluno 
            AND id_turma_professor_materia = $id_turma_professor_materia";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    return $row['media'] ?: 0; // Retorna 0 se não houver notas
}

function verificarStatus($media) {
    if ($media >= 7) {
        return "Aprovado";
    } elseif ($media >= 5) {
        return "Em recuperação";
    } else {
        return "Reprovado";
    }
}
?>
                </div>
            </div>
        </div>


    </div>
</div>
<script>
    const headers = document.querySelectorAll('.accordion-header');
    headers.forEach(header => {
        header.addEventListener('click', () => {
            const content = header.nextElementSibling;
            
            // Alterna a visibilidade do conteúdo
            content.style.display = content.style.display === 'block' ? 'none' : 'block';

            // Adiciona ou remove a classe 'active' no cabeçalho para rotacionar a seta
            header.classList.toggle('active');
        });
    });
</script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> 
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
