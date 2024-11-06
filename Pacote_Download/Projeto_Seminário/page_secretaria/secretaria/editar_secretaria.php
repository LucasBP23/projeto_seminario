<?php 

    if(!empty($_GET['id_instituicao'])) // Se não estiver vazio minha variavel/meu parametro id
{

    //Incluindo a conexão com o arquivo config.php que faz conexão com o banco de dados
    include_once('../../config.php');


    $id_instituicao = $_GET['id_instituicao']; // variavel id que recebe meus parametros

    $sqlSelect = "SELECT * FROM secretaria WHERE id_instituicao=$id_instituicao";

    $result = $conexao->query($sqlSelect);

    //Teste
    // print_r($result);

    // Teste para verificar se tem mais de de uma linha
    if($result->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result))
        {
            $instituicao_nome = $user_data['instituicao_nome'];
            $instituicao_email = $user_data['instituicao_email'];
            $instituicao_telefone = $user_data['instituicao_telefone'];
            // $instituicao_senha_acesso = $user_data['instituicao_senha_acesso'];
        }

    }
    else
    {
        header('Location: edit_secretaria.php');
    }

}  

    //Caso o ID esteja vazio voltar
    else
    {
        header('Location: edit_secretaria.php');
    }
    

?>








<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="Images/UniSGE-removebg-preview.png"> <!--Coloca o logo no topo da guia da página-->
    <link rel="stylesheet" href="editar_secretaria.css?v=1.4">
   
      
        
</head>
<body>
    <div class="voltar">
        <a href="edit_secretaria.php" style="position:relative; z-index: 10;">&#x2B05;</a>
    </div>

    <header class="topo">
    
</header>

    <div class="box">  
        <fieldset>
            <legend>Formulário Secretaria</legend>
              
                <form action="edit_save_secretaria.php" method="post">
                    <br>
                    <div class="inputBox">
                        
                        <input type="text" name="instituicao_nome" id="instituicao_nome" class="inputUser" value="<?php echo $instituicao_nome?>" required>
                        <label for="instituicao_nome" class="labelInput">Nome da instituição: </label>

                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="text" name="instituicao_email" id="instituicao_email" class="inputUser" value="<?php echo $instituicao_email?>" required>
                        <label for="instituicao_email" class="labelInput">Email: </label>
                      
                        
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="tel" name="instituicao_telefone" id="instituicao_telefone" class="inputUser" value="<?php echo $instituicao_telefone?>" required>
                        <label for="instituicao_telefone" class="labelInput">Telefone: </label>
                    </div>
                   

                 <br><br>
                    

                    <!-- ficara escondido -->
                    <input type="hidden" name="id_instituicao" value="<?php echo $id_instituicao?>">
                    <input type="hidden" name="instituicao_senha_acesso" value="<?php echo $instituicao_senha_acesso?>">
                    <input type="submit" name="update" id="update" class="submit_form" value="Atualizar">
                  
            </form>
        </fieldset>
    </div> 
    <div class="background_inf"></div>




<!--código para inserir icones do seguinte site: https://ionic.io/ionicons/usage-->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> 
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>