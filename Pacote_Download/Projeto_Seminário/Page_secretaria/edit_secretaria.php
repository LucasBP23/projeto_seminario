<?php 
    session_start();//teste
    // Verificar se o usuário está logado
if (!isset($_SESSION['instituicao_email'])) {
    // Se não estiver logado, redirecionar para a página de login
    header("Location: ../Login/login_secretaria/login_secretaria.php");
    exit();
}//teste


    include_once('../config.php');

    $id_instituicao = $_SESSION['id_instituicao']; //teste

        // $sql = "SELECT * FROM secretaria ORDER BY id_instituicao DESC";

        $sql = "SELECT * FROM secretaria WHERE id_instituicao = '$id_instituicao' ORDER BY id_instituicao DESC";//TESTE


        $result = $conexao->query($sql);

       

        // print_r($result);

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="edit_secretaria.css">

    <!-- Icone do google -->
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

    <h1>teste</h1>
    
    <div class="dados">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome da Instituição</th>
                    <th scope="col">CNPJ ou código MEC</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Tipo de mantenedora</th>
                    <th scope="col">Tipo de instituição</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Logradouro</th>
                    <th scope="col">Número</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Complemento</th>
                    <th scope="col">Senha</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php   
                    while($user_data = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>".$user_data['id_instituicao']."</td>";
                        echo "<td>".$user_data['instituicao_nome']."</td>";
                        echo "<td>".$user_data['instituicao_codigo']."</td>";
                        echo "<td>".$user_data['instituicao_email']."</td>";
                        echo "<td>".$user_data['instituicao_telefone']."</td>";
                        echo "<td>".$user_data['mantenedora']."</td>";
                        echo "<td>".$user_data['tipo_instituicao']."</td>";
                        echo "<td>".$user_data['instituicao_cidade']."</td>";
                        echo "<td>".$user_data['instituicao_estado']."</td>";
                        echo "<td>".$user_data['instituicao_logradouro']."</td>";
                        echo "<td>".$user_data['instituicao_numero']."</td>";
                        echo "<td>".$user_data['instituicao_bairro']."</td>";
                        echo "<td>".$user_data['instituicao_complemento']."</td>";
                        echo "<td>".$user_data['instituicao_senha']."</td>";
                        echo "<td>
                        <a class='icon_editar' href='editar_secretaria.php?id_instituicao=$user_data[id_instituicao]'>  $icon_editar 
                        </a>
                        <a class='icon_delete' href='delete_secretaria.php?id_instituicao=$user_data[id_instituicao]'>  $icon_delete
                        </a>
                        </td>";
                        echo "<tr>";

                    }   
                ?>
            </tbody>
        </table>
    </div>


</body>
</html>