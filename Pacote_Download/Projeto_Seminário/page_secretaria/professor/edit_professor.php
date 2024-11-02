<?php 
    session_start();//teste
    // Verificar se o usuário está logado
if (!isset($_SESSION['instituicao_email'])) {
    // Se não estiver logado, redirecionar para a página de login
    header("Location: ../../login/login_secretaria/login_secretaria.html");
    exit();
}//teste


    include_once('../../config.php');

    $id_instituicao = $_SESSION['id_instituicao']; //teste

        // $sql = "SELECT * FROM secretaria ORDER BY id_instituicao DESC";

        $sql = "SELECT * FROM professor WHERE id_instituicao = '$id_instituicao' ORDER BY id_professor DESC";//TESTE


        $result = $conexao->query($sql);

       

        // print_r($result);

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="edit_professor.css?v=1.1">

    <!-- ICONES DO GOOGLE -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
</head>
<body>

<?php 
$icon_editar = '<span class="material-symbols-outlined">
edit_square
</span>';
$icon_delete = '<span class="material-symbols-outlined">
delete
</span>';
?>  
    <h1>Lista de professores cadastrados.</h1>
    
    <div class="dados">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data de nascimento</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Matricula</th>
                    <!-- <th scope="col">Titulação máxima</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Logradouro</th>
                    <th scope="col">Número</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Complemento</th> -->
                    <th scope="col">Senha</th>
                    <th scope="col">Id instituição</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php   
                    while($user_data = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>".$user_data['id_professor']."</td>";
                        echo "<td>".$user_data['professor_nome_completo']."</td>";
                        echo "<td>".$user_data['professor_data_nascimento']."</td>";
                        echo "<td>".$user_data['professor_cpf']."</td>";
                        echo "<td>".$user_data['professor_estado']."</td>";
                        echo "<td>".$user_data['professor_cidade']."</td>";
                        echo "<td>".$user_data['professor_endereco']."</td>";
                        echo "<td>".$user_data['professor_matricula']."</td>";
                        // echo "<td>".$user_data['titulacao_max']."</td>";
                        // echo "<td>".$user_data['cidade']."</td>";
                        // echo "<td>".$user_data['estado']."</td>";
                        // echo "<td>".$user_data['logradouro']."</td>";
                        // echo "<td>".$user_data['numero']."</td>";
                        // echo "<td>".$user_data['bairro']."</td>";
                        // echo "<td>".$user_data['complemento']."</td>";
                        echo "<td>".$user_data['professor_senha_acesso']."</td>";
                        echo "<td>".$user_data['id_instituicao']."</td>";
                        echo "<td>
                        <a class='icon_editar' href='editar_professor.php?id_professor=$user_data[id_professor]'>  $icon_editar 
                        </a>
                        <a class='icon_delete' href='delete_professor.php?id_professor=$user_data[id_professor]'>  $icon_delete
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