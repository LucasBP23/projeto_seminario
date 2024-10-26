<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <link rel="stylesheet" href="style.css"> <!--Link css-->
    <link rel="icon" type="image/x-icon" href="../../images/Logo_Completo.png"> <!--Coloca o logo no topo da guia da página-->
</head>
<body>
    <header>
    
        <img src="../../images/UniSGE.png" alt="Logo" class="logo">
    
        
        <nav class="navigation">
            <a href="../../home.php">Home</a>
            <a href="../../home.php">Área de login</a>
            <a href="../Login_Professor/login_professor.php">Área do professor</a>
            <a href="../Login_aluno/login_aluno.php">Área do aluno</a>
            
            <button class="btnLogin-popup">Secretaria</button>
        </nav>
        
    </header>

   <div class="wrapper">
       
        <div class="form-box login">
           <h2>Login</h2> <!--Botão central-->
           <form action="../../teste_login.php" method="post">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" name="instituicao_email" id="instituicao_email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="password" name="instituicao_senha_acesso" id="instituicao_senha_acesso" required>
                    <label>Senha</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Lembrar de mim</label>
                    <a href="#">Esqueceu a senha?</a>
                </div>
                <input type="submit" class="btn" id="submit" name="submit" value="Login">
                </form>
        <div class="login-register">
            <p>Não tem uma conta?<a href="../../Cadastro_secretaria/cad_secretaria.php" class="register-link">  Cadastra-se.</a></p>
        </div>
        
        </div>
    </div>


    <!--código para inserir icones do seguinte site: https://ionic.io/ionicons/usage-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> 
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
