<!-- APRESENTA OS DADOS DA SECRETARIA CADASTRADA -->

<?php 
    session_start();
    // Verificar se o usuário está logado
if (!isset($_SESSION['instituicao_email'])) {
    // Se não estiver logado, redirecionar para a página de login
    header("Location: ../../login/login_secretaria/login_secretaria.html");
    exit();
}//teste


    include_once('../../config.php');

    $id_instituicao = $_SESSION['id_instituicao']; 


        $sql = "SELECT * FROM secretaria WHERE id_instituicao = '$id_instituicao' ORDER BY id_instituicao DESC";


        $result = $conexao->query($sql);

       

        // print_r($result);

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secretaria cadastrada</title>
    <link rel="stylesheet" href="edit_secretaria.css?v=1.3">

    <!-- Icone do google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

</head>
<body>
<?php 


$icon_editar = '<span class="material-symbols-outlined">edit_square</span>';




?>

    <h1>Edite os dados da instituição</h1>
    
    <div class="dados">
        <table class="table">
            <thead>
                <tr>
                    
                    <th scope="col">Nome da Instituição</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                   
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php   
                    while($user_data = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                      
                        echo "<td>".$user_data['instituicao_nome']."</td>";
                        echo "<td>".$user_data['instituicao_email']."</td>";
                        echo "<td>".$user_data['instituicao_telefone']."</td>";
                     
                        echo "<td>
                      
                       <a class='icon_editar' href='editar_secretaria.php?id_instituicao=$user_data[id_instituicao]'>
                        $icon_editar
                    </a>
                   
                    </td>";
                        echo "<tr>";

                    }   
                ?>
            </tbody>
        </table>
    </div>


    <!--código para inserir icones do seguinte site: https://ionic.io/ionicons/usage-->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> 
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>