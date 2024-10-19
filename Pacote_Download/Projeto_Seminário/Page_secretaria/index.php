<?php 
    session_start();
    include_once('../config.php');
    // print_r($_SESSION);
    if((!isset($_SESSION['instituicao_email']) == true) and (!isset($_SESSION['instituicao_senha']) == true))
    {
        unset($_SESSION['instituicao_email']); // Caso não existra registro com aquele email ou senha vou mandar destruir qualquer variavel que tenha session email e session senha
        unset($_SESSION['instituicao_senha']);
        header('Location: Login/login_secretaria/login_secretaria.php');
    }

    
    $logado = $_SESSION['instituicao_email'];
    
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="../images/UniSGE.png"> <!--Coloca o logo no topo da guia da página-->
    

     <!-- Do google icones -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>
    
<header class="topo">
    <div class="logo">
        <img src="../images/UniSGE.png" alt="Logo" class="logo">
    </div>


    <div class="f_inst">
        <?php 
        echo "<P>Secretaria - <u>$logado</u></P>";
       
        ?>
    </div>

    <div class="f_topo">
        <a href="../sair.php">&#x2B05; Voltar ou sair</a>
    </div>

</header>

<div>
    <div class="menu">
        <!-- <label for="Cad_aluno">Cadastrar aluno</label>
        <input type="text"> -->
        <br>
        <a href="edit_secretaria.php" target="iframe-menu">&#x270F;  Editar dados </a>
        <br>
        <hr>
        <a href="Cad_professor.php" target="iframe-menu">Cadastrar Professor</a>
        <br>
        <hr>
        <a href="edit_professor.php" target="iframe-menu">Editar Professor</a>
        <br>
        <hr>
        <a href="cad_aluno.html" target="iframe-menu">  Cadastrar aluno </a>
        <br>
        <hr>
        <a href="edit_aluno.html" target="iframe-menu"><ion-icon name="pencil-outline"></ion-icon>Editar aluno</a>
        <br>
        <hr>
        <!-- <a href="Cad_turma.html"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar turma</a>
        <hr>
        <a href="Edit_turma.html">&#x270F; Editar Turma</a>
        <br>
        <hr>
        <a href="#"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar curso</a>
        <br>
        <hr>
        <a href="#" target="iframe-menu"><ion-icon name="pencil-outline"></ion-icon> Editar cursos</a>
        <br>
        <hr>
        <a href="#"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar disciplina</a>
        <br>
        <hr>
        <a href="#" target="iframe-menu"><ion-icon name="pencil-outline"></ion-icon> Editar disciplinas</a>
        <br>
        <hr>
        <a href="#"><ion-icon name="add-circle-outline"></ion-icon> Matricular aluno</a>
        <br>
        <hr>
        <a href="#" target="iframe-menu"><ion-icon name="pencil-outline"></ion-icon> Editar matrículas</a>
        <br>
        <hr>
        <a href="#" target="iframe-menu"> Emitir histórico</a>
        <br>
        <hr> -->


    </div>


    <div class="principal">
   
        <iframe id="iframe1" src="" width="80%" height="100%" frameborder="0" name="iframe-menu" title="Iframe-menu"></iframe>
    

    </div>

</div>

<!-- 
<button onclick="javascript:window.location.href='index.html'"> &#x2B05; Voltar</button> Em HTML para usar os simbolos usa primeiro &#x e depois coloca o código e no fim coloca ponto e virgula-->

<!-- //CRIAR UM FOOTER -->


<!--código para inserir icones do seguinte site: https://ionic.io/ionicons/usage-->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> 
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>