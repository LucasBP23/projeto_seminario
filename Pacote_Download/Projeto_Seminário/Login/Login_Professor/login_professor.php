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
            <a href="#">Home</a>
            <a href="../../home.php">Área de login</a>
            <a href="../login_secretaria/login_secretaria.php">Área da secretaria</a>
            <a href="../Login_aluno/login_aluno.php">Área do aluno</a>
            <button class="btnLogin-popup">Professor</button>
        </nav>
        
    </header>

   <div class="wrapper">
        <div class="form-box login">
           <h2>Login</h2> <!--Botão central-->
           <form action="teste_login_professor.php" method="post">
                <div class="input-box">
                
                    <span class="icon">
                    <ion-icon name="person-circle-sharp"></ion-icon>
                    </span>
                    <input type="number" name="professor_matricula" id="professor_matricula" required>
                    <label for="professor_matricula">Matrícula</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="password" name="professor_senha_acesso" id="professor_senha_acesso" required>
                    <label for="professor_senha_acesso">Senha</label>
                </div>

                <input type="submit" class="btn" id="submit" name="submit" value="Login">
                
    
        <div class="sem_conta">
            <p>Não tem uma conta? <strong>Entre em contato com a secretaria.</strong></p>
        </div>
        </form>
        </div>
    </div>

        
    <!--código para inserir icones do seguinte site: https://ionic.io/ionicons/usage-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> 
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
