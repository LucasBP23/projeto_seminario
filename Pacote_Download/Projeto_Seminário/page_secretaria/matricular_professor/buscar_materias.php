<?php
include('../../config.php');

// Recebe o id da turma
$id_turma = $_POST['id_turma'];

// Busca o id do curso associado à turma
$curso_sql = "SELECT id_curso FROM turma WHERE id_turma = $id_turma";
$curso_result = mysqli_query($conexao, $curso_sql);

if ($curso_row = mysqli_fetch_assoc($curso_result)) {
    $id_curso = $curso_row['id_curso'];

    // Busca as matérias do curso associado
    $materias_sql = "SELECT id_materia, materia_nome FROM materia WHERE id_curso = $id_curso";
    $materias_result = mysqli_query($conexao, $materias_sql);

    $materias = [];
    while ($materia = mysqli_fetch_assoc($materias_result)) {
        $materias[] = $materia;
    }

    echo json_encode($materias);
} else {
    echo json_encode([]);
}
?>
