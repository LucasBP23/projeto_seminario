<?php
session_start();
include_once('../config.php');

if (!isset($_SESSION['aluno_matricula']) || !isset($_SESSION['id_aluno'])) {
    header('Location: ../login/login_aluno/login_aluno.html');
    exit();
}

$id_aluno = $_SESSION['id_aluno'];

// Consulta para obter os dados do curso, turma, matérias e notas do aluno
$sql = "
SELECT 
    s.instituicao_nome, 
    c.nome_curso, 
    t.turma_nome, 
    m.materia_nome, 
    p.professor_nome_completo,
    n.numero_nota,
    n.nota
FROM matricula mat
JOIN aluno a ON mat.id_aluno = a.id_aluno
JOIN turma t ON mat.id_turma = t.id_turma
JOIN curso c ON t.id_curso = c.id_curso
JOIN secretaria s ON c.id_instituicao = s.id_instituicao
JOIN turma_professor_materia tpm ON tpm.id_turma = t.id_turma
JOIN materia m ON tpm.id_materia = m.id_materia
JOIN professor p ON tpm.id_professor = p.id_professor
LEFT JOIN nota n ON n.id_aluno = a.id_aluno AND n.id_turma_professor_materia = tpm.id_turma_professor_materia
WHERE a.id_aluno = $id_aluno
ORDER BY m.materia_nome, n.numero_nota";

$result = mysqli_query($conexao, $sql);

if (!$result) {
    die("Erro na consulta SQL: " . mysqli_error($conexao));
}

$dados = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (empty($dados)) {
    echo "<p>Nenhum dado encontrado para o aluno.</p>";
    exit();
}

$aluno_nome_completo = isset($_SESSION['aluno_nome_completo']) ? $_SESSION['aluno_nome_completo'] : 'Nome não disponível';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Portal do Aluno</title>
    <link rel="stylesheet" href="style.css?v=1.1">
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
        echo "<p>Aluno(a) - <u>$aluno_nome_completo</u></p>";
        ?>
    </div>

    <div class="f_topo">
        <a href="sair_aluno.php">&#x2B05; Sair</a>
    </div>
</header>
<h1>Bem-vindo ao Portal do Aluno</h1>

<h2>Instituição: <?= htmlspecialchars($dados[0]['instituicao_nome']) ?></h2>
<h3>Curso: <?= htmlspecialchars($dados[0]['nome_curso']) ?></h3>
<h3>Turma: <?= htmlspecialchars($dados[0]['turma_nome']) ?></h3>

<div class="dados">
    <table border="1" class="table">
        <thead>
            <tr>
                <th>Matéria</th>
                <th>Professor</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>
                <th>Nota 4</th>
                <th>Média</th>
                <th>Situação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $materia_atual = '';
            $notas = [0.00, 0.00, 0.00, 0.00];
            $media_total = 0;
            $contagem_notas = 0;
            $professor = '';

            foreach ($dados as $linha) {
                if ($linha['materia_nome'] !== $materia_atual && $materia_atual !== '') {
                    $media = $contagem_notas > 0 ? $media_total / $contagem_notas : 0;

                    // Define a situação com base na média
                    $situacao = 'Reprovado';
                    if ($media >= 7) {
                        $situacao = 'Aprovado';
                    } elseif ($media >= 5) {
                        $situacao = 'Em recuperação';
                    }

                    echo "<tr>
                        <td>" . htmlspecialchars($materia_atual) . "</td>
                        <td>" . htmlspecialchars($professor) . "</td>
                        <td>" . htmlspecialchars($notas[0]) . "</td>
                        <td>" . htmlspecialchars($notas[1]) . "</td>
                        <td>" . htmlspecialchars($notas[2]) . "</td>
                        <td>" . htmlspecialchars($notas[3]) . "</td>
                        <td>" . number_format($media, 2) . "</td>
                        <td>$situacao</td>
                    </tr>";

                    $notas = [null, null, null, null];
                    $media_total = 0;
                    $contagem_notas = 0;
                }

                $materia_atual = $linha['materia_nome'];
                $professor = $linha['professor_nome_completo'];
                $numero_nota = $linha['numero_nota'] - 1;
                if ($numero_nota >= 0 && $numero_nota < 4) {
                    $notas[$numero_nota] = $linha['nota'];
                    $media_total += $linha['nota'];
                    $contagem_notas++;
                }
            }

            $media = $contagem_notas > 0 ? $media_total / $contagem_notas : 0;
            $situacao = ($media >= 7) ? 'Aprovado' : (($media >= 5) ? 'Em recuperação' : 'Reprovado');
            echo "<tr>
                <td>" . htmlspecialchars($materia_atual) . "</td>
                <td>" . htmlspecialchars($professor) . "</td>
                <td>" . htmlspecialchars($notas[0]) . "</td>
                <td>" . htmlspecialchars($notas[1]) . "</td>
                <td>" . htmlspecialchars($notas[2]) . "</td>
                <td>" . htmlspecialchars($notas[3]) . "</td>
                <td>" . number_format($media, 2) . "</td>
                <td>$situacao</td>
            </tr>";
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
