// excluir_nota.php
<?php 
include_once('../config.php');

if (isset($_GET['id_nota'])) {
    $id_nota = intval($_GET['id_nota']);
    $sql_excluir = "DELETE FROM nota WHERE id_nota = $id_nota";
    mysqli_query($conexao, $sql_excluir);
    header("Location: sucesso.php");
    exit();
}

?>
