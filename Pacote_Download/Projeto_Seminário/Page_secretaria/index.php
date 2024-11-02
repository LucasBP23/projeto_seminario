<?php 
    session_start();
    include_once('../config.php');
    // print_r($_SESSION);
    if((!isset($_SESSION['instituicao_email']) == true) and (!isset($_SESSION['instituicao_senha_acesso']) == true))
    {
        unset($_SESSION['instituicao_email']); // Caso não existra registro com aquele email ou senha vou mandar destruir qualquer variavel que tenha session email e session senha
        unset($_SESSION['instituicao_senha_acesso']);
        header('Location: ../login/login_secretaria/login_secretaria.html');
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
        <a href="../sair.php">&#x2B05; Sair</a>
    </div>

</header>

<div>
    <div class="menu">
        <!-- <label for="Cad_aluno">Cadastrar aluno</label>
        <input type="text"> -->
        <br> <a href="secretaria/pagina_inicial.html" target="iframe-menu"> <ion-icon name="home-sharp"></ion-icon>  Página inicial </a>
        <br>
        <hr>
        <a href="secretaria/edit_secretaria.php" target="iframe-menu">&#x270F;  Editar dados </a>
        <br>
        <hr>
        <a href="professor/cad_professor.php" target="iframe-menu"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar Professor</a>
        <br>
        <hr>
        <a href="professor/edit_professor.php" target="iframe-menu">&#x270F; Editar Professor</a>
        <br>
        <hr>
        <a href="aluno/cad_aluno.php" target="iframe-menu"> <ion-icon name="add-circle-outline"></ion-icon> Cadastrar aluno </a>
        <br>
        <hr>
        <a href="aluno/edit_aluno.php" target="iframe-menu">&#x270F; Editar aluno</a>
        <br>

        <hr>
        <a href="curso/cad_curso.php" target="iframe-menu"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar curso</a>
        <br>
      
        <hr>
        <a href="materia/cad_materia.php" target="iframe-menu"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar matéria</a>
        <br>
        <hr>
        <a href="turma/cadastro_turma.php" target="iframe-menu"><ion-icon name="add-circle-outline"></ion-icon> Cadastrar turma</a>
        <br>
        <hr>
        <a href="turma/listar_editar_turmas.php" target="iframe-menu">&#x270F; Lista de turmas</a>
        <br>
        <hr>
        <a href="matricular_professor/turma_professor_materia.php" target="iframe-menu"><ion-icon name="add-circle-outline"></ion-icon> Matricular professor</a>
        <br>
        <hr>
        <a href="matricular_professor/gerenciar_relacoes.php" target="iframe-menu">&#x270F; Editar relação professor</a>
        <br>
        
        <hr>
        <a href="matricular_aluno/matricular_aluno.php" target="iframe-menu"><ion-icon name="add-circle-outline"></ion-icon> Matricular aluno</a>
        <br>
        <hr>
        <a href="matricular_aluno/gerenciar_alunos_turma.php" target="iframe-menu">&#x270F; Editar matrícula aluno</a>
        <br>
        
        <!-- <hr>
        <a href="#" target="iframe-menu"> Emitir histórico</a>
        <br>
        <hr>  -->


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