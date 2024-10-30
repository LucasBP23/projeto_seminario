<?php 
    if(isset($_POST['submit'])) // Se houver uma váriavel submit ele vai salvar os dados
    // primeiro tem que verificar um por um:
    {

        //TESTE PARA VER SE ESTÁ FUNCIONANDO
        // print_r('Nome da instituição: '.$_POST['instituicao_nome']);
        // print_r("<br>");
        // print_r("<br>");
        // print_r('Email: ' . $_POST['instituicao_email']);
        // print_r("<br>");
        // print_r('Telefone: ' . $_POST['instituicao_telefone']);
        // print_r("<br>");
        // print_r("<br>");
        // print_r('Senha: ' . $_POST['instituicao_senha_acesso']);
       

   
    
      //Incluindo a conexão com o arquivo config.php que faz conexão com o banco de dados
      include_once('../config.php');

    //Transformando os input em variáveis
    $instituicao_nome = $_POST['instituicao_nome'];
    $instituicao_email = $_POST['instituicao_email'];
    $instituicao_telefone = $_POST['instituicao_telefone'];
    $instituicao_senha_acesso = $_POST['instituicao_senha_acesso'];

    // Verifica se o e-mail já existe
    $verificaEmail = mysqli_query($conexao, "SELECT * FROM secretaria WHERE instituicao_email = '$instituicao_email'");


    if (mysqli_num_rows($verificaEmail) > 0) {
        // E-mail já existe
        echo "Este e-mail já está cadastrado.";
        echo "<script>alert('Este e-mail já está cadastrado.'); window.location='cad_secretaria.php'</script>";
    } else {
        // E-mail não existe, então insere o novo registro
        $result = mysqli_query($conexao, "INSERT INTO secretaria (instituicao_nome, instituicao_email, instituicao_telefone, instituicao_senha_acesso) VALUES ('$instituicao_nome', '$instituicao_email', '$instituicao_telefone', '$instituicao_senha_acesso')");
          // $conexao é do arquivo config.php, depois fical igual ao insert into do banco de dados, primeiro o comando, depois a tabela, depois as colunas, depois os valores.

        header('Location: ../login/login_secretaria/login_secretaria.html');
    }
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
    <link rel="stylesheet" href="cad_secretaria.css?v=1.1">
   
      
        
</head>
<body>
<a href="../home.php" style="color: white; background: red; position:relative; z-index: 10;">Voltar</a>
    <header class="topo">
        <h1>Formulário - Cadastre sua instuição de ensino.</h1>
    </header>

    <div class="box">  
        <fieldset>
            <legend>Formulário Secretaria</legend>
              
                <form action="cad_secretaria.php" method="post">
                    <br>
                    <div class="inputBox">
                        
                        <input type="text" name="instituicao_nome" id="instituicao_nome" class="inputUser" required>
                        <label for="instituicao_nome" class="labelInput">Nome da instituição: </label>

                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="email" name="instituicao_email" id="instituicao_email" class="inputUser"  required>
                        <label for="instituicao_email" class="labelInput">Email: </label>
                      
                        
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="tel" name="instituicao_telefone" id="instituicao_telefone" class="inputUser"  required>
                        <label for="instituicao_telefone" class="labelInput">Telefone: </label>
                    </div>

              
            
                

                    <h4>Cadastre uma senha</h4>
                    <div class="inputBox">
                        <input type="password" name="instituicao_senha_acesso" id="instituicao_senha_acesso" class="inputUser" required>
                        <label for="instituicao_senha_acesso"class="labelInput">Senha: </label>
                    </div>
                    <br><br>

    
    
                    <input type="submit" name="submit" id="submit" class="submit_form" value="Cadastrar">

            <div class="btn_login">
            <p>Já tem uma conta?<a href="../login/login_secretaria/login_secretaria.html" class="register-link">  Clique aqui.</a></p>
        </div>
                  
            </form>
        </fieldset>
    </div> 
    <div class="background_inf"></div>





</body>
</html>