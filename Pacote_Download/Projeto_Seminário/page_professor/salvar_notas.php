<?php
include_once('../config.php');

// salvar_notas.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_turma_professor_materia = intval($_POST['id_turma_professor_materia']);
    $notas = $_POST['notas'];

    foreach ($notas as $id_aluno => $notas_aluno) {
        foreach ($notas_aluno as $numero_nota => $nota) {
            $id_aluno = intval($id_aluno);
            $nota = floatval($nota);
            $numero_nota = intval($numero_nota);

            // Verifica se a nota é válida
            if ($nota < 0 || $nota > 10) {
                // Pode redirecionar de volta com uma mensagem de erro ou tratar como preferir
                continue; // Pula para o próximo loop
            }

            // Verifica se a nota já existe
            $sql_verificar = "SELECT COUNT(*) as total FROM nota 
                              WHERE id_aluno = $id_aluno 
                              AND id_turma_professor_materia = $id_turma_professor_materia 
                              AND numero_nota = $numero_nota";
            $result_verificar = mysqli_query($conexao, $sql_verificar);
            $row = mysqli_fetch_assoc($result_verificar);

            if ($row['total'] == 0) {
                // Insere a nota se ainda não existir
                $sql_inserir = "INSERT INTO nota (id_aluno, id_turma_professor_materia, nota, numero_nota) 
                                VALUES ($id_aluno, $id_turma_professor_materia, $nota, $numero_nota)";
                mysqli_query($conexao, $sql_inserir);
            } else {
                // Atualiza a nota se já existir
                $sql_atualizar = "UPDATE nota SET nota = $nota 
                                  WHERE id_aluno = $id_aluno 
                                  AND id_turma_professor_materia = $id_turma_professor_materia 
                                  AND numero_nota = $numero_nota";
                mysqli_query($conexao, $sql_atualizar);
            }
        }
    }

    echo "<script>alert('Nota atualizada com sucesso: " . mysqli_error($conexao). " '); window.location='page_professor.php'</script>";
    exit();
}
