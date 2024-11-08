<!-- LISTA DE ALUNOS CADASTRADOS -->

<?php 
    session_start();//teste
    // Verificar se o usuário está logado
if (!isset($_SESSION['instituicao_email'])) {
    // Se não estiver logado, redirecionar para a página de login
    header("Location: ../login/login_secretaria/login_secretaria.html");
    exit();
}//teste


    include_once('../../config.php');

    $id_instituicao = $_SESSION['id_instituicao']; //teste


        $sql = "SELECT * FROM aluno WHERE id_instituicao = '$id_instituicao' ORDER BY aluno_nome_completo ASC";


        $result = $conexao->query($sql);

       

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de alunos</title>
    <link rel="stylesheet" href="edit_aluno.css?v=1.3">

    <!-- ICONES DO GOOGLE -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
</head>
<body>

<?php 
$icon_editar = '<span class="material-symbols-outlined">edit_square</span>';
$icon_delete = '<span class="material-symbols-outlined">delete</span>';
?>  
    <h1>Lista de alunos cadastrados.</h1>
    
    <div class="dados">
        <table class="table">
            <thead>
                <tr>
                    
                    <th scope="col">Nome</th>
                    <th scope="col">Data de nascimento</th>
                    <th scope="col">CPF</th>
                    <th scope="col">CEP</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Logradouro</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Número</th>
                    <th scope="col">Matricula</th>
                    
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php   
                    while($user_data = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                       
                        echo "<td>".$user_data['aluno_nome_completo']."</td>";
                        echo "<td>" . date("d/m/Y", strtotime($user_data['aluno_data_nascimento'])) . "</td>";
                        echo "<td>".$user_data['aluno_cpf']."</td>";
                        echo "<td>".$user_data['aluno_cep']."</td>";
                        echo "<td>".$user_data['aluno_estado']."</td>";
                        echo "<td>".$user_data['aluno_cidade']."</td>";
                        echo "<td>".$user_data['aluno_logradouro']."</td>";
                        echo "<td>".$user_data['aluno_bairro']."</td>";
                        echo "<td>".$user_data['aluno_numero']."</td>";
                        echo "<td>".$user_data['aluno_matricula']."</td>";
                        echo "<td>

                        <a class='icon_editar' href='editar_aluno.php?id_aluno=$user_data[id_aluno]'>
                        $icon_editar
                        </a>
                        <a class='icon_delete' href='delete_aluno.php?id_aluno=$user_data[id_aluno]' onclick='return confirm(\"Tem certeza que deseja deletar este aluno(a)?\");'>
                            $icon_delete
                        </a>
                    </td>";
                        echo "</tr>";
                    }   
                ?>
            </tbody>
        </table>
    </div>


</body>
</html>