<?php 
    if(isset($_POST['submit'])) // Se houver uma váriavel submit ele vai salvar os dados
    // primeiro tem que verificar um por um:
    {

        //TESTE PARA VER SE ESTÁ FUNCIONANDO
        // print_r('Nome da instituição: '.$_POST['instituicao_nome']);
        // print_r("<br>");
        // print_r('Código da instituição: '.$_POST['instituicao_codigo']);
        // print_r("<br>");
        // print_r('Email: ' . $_POST['instituicao_email']);
        // print_r("<br>");
        // print_r('Telefone: ' . $_POST['instituicao_telefone']);
        // print_r("<br>");
        // print_r('Tipo de mantenedora: ' . $_POST['mantenedora']);
        // print_r("<br>");
        // print_r('Tipo de instituição: ' . $_POST['tipo_instituicao']);
        // print_r("<br>");
        // print_r('Cidade: ' . $_POST['instituicao_cidade']);
        // print_r("<br>");
        // print_r('Estado: ' . $_POST['instituicao_estado']);
        // print_r("<br>");
        // print_r('Logradouro: ' . $_POST['instituicao_logradouro']);
        // print_r("<br>");
        // print_r('Bairro: ' . $_POST['instituicao_bairro']);
        // print_r("<br>");
        // print_r('Complemento: ' . $_POST['instituicao_complemento']);
        // print_r("<br>");
        // print_r('Senha: ' . $_POST['instituicao_senha']);
       

   
    
      //Incluindo a conexão com o arquivo config.php que faz conexão com o banco de dados
      include_once('../config.php');

    //Transformando os input em variáveis
    $instituicao_nome = $_POST['instituicao_nome'];
    $instituicao_codigo = $_POST['instituicao_codigo'];
    $instituicao_email = $_POST['instituicao_email'];
    $instituicao_telefone = $_POST['instituicao_telefone'];
    $mantenedora = $_POST['mantenedora'];
    $tipo_instituicao =  $_POST['tipo_instituicao'];
    $instituicao_cidade = $_POST['instituicao_cidade'];
    $instituicao_estado = $_POST['instituicao_estado'];
    $instituicao_logradouro = $_POST['instituicao_logradouro'];
    $instituicao_numero = $_POST['instituicao_numero'];
    $instituicao_bairro = $_POST['instituicao_bairro'];
    $instituicao_complemento = $_POST['instituicao_complemento'];
    $instituicao_senha = $_POST['instituicao_senha'];


    $result = mysqli_query($conexao, "INSERT INTO secretaria (instituicao_nome, instituicao_codigo, instituicao_email, instituicao_telefone, mantenedora, tipo_instituicao, instituicao_cidade, instituicao_estado, instituicao_logradouro, instituicao_numero, instituicao_bairro, instituicao_complemento, instituicao_senha) VALUES ('$instituicao_nome','$instituicao_codigo', '$instituicao_email', '$instituicao_telefone', '$mantenedora', '$tipo_instituicao', '$instituicao_cidade', '$instituicao_estado', '$instituicao_logradouro', '$instituicao_numero', '$instituicao_bairro', '$instituicao_complemento', '$instituicao_senha')");  // $conexao é do arquivo config.php, depois fical igual ao insert into do banco de dados, primeiro o comando, depois a tabela, depois as colunas, depois os valores.

    header('Location: ../Login/login_secretaria/login_secretaria.php');

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
    <link rel="stylesheet" href="cad_secretaria.css">
   
      
        
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
                        <input type="number" name="instituicao_codigo" id="instituicao_codigo" class="inputUser" required>
                        <label for="instituicao_codigo" class="labelInput">CNPJ ou Código MEC: </label>
                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="text" name="instituicao_email" id="instituicao_email" class="inputUser"  required>
                        <label for="instituicao_email" class="labelInput">Email: </label>
                      
                        
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="tel" name="instituicao_telefone" id="instituicao_telefone" class="inputUser"  required>
                        <label for="instituicao_telefone" class="labelInput">Telefone: </label>
                    </div>

                    
                <div class="form-container">  
                <section class="coluna-50l">  
                    <h4>Tipo de mantenedora:</h4>
                    <input type="radio" id="publica" name="mantenedora" value="publica" required>
                    <label for="publica">Pública</label>
                    <br>
                    <input type="radio" id="privada" name="mantenedora" value="privada" required>
                    <label for="privada">Privada</label>
                    <br>
                    <input type="radio" id="outro" name="mantenedora" value="outro" required>
                    <label for="outro">Outro</label>
                    </section>

                    <section class="coluna-50r" style="margin-left:0px; margin-top:3.5%">
                    <H4>Tipo de instituição: 
                    <select required name="tipo_instituicao" id="tipo_instituicao" class="caixa_form">
                        <option selected disabled value="">Escolha um tipo</option>
                        <option value="escola_fundamental">Escola fundamental</option>
                        <option value="escola_de_ensino_medio">Escola de ensino médio</option>
                        <option value="faculdade_universidade">Faculdade/Universidade</option>
                        <option value="curso_tecnico_profissionalizante">Curso técnico/Profissionalizante</option>
                        <option value="outro">Outro</option>
                    </select>
                    </H4>
                    </section>
                </div>

                <h4>Endereço da instuição:</h4>
                    <section class="coluna-50l">
                        <div class="inputBox">
                            <input type="text" name="instituicao_cidade" id="instituicao_cidade" class="inputUser"  required>
                            <label for="instituicao_cidade" class="labelInput">Cidade: </label>
                        </div>
                        </section>


                        <section class="coluna-50r">
                    <div class="inputBox">
                        <input type="" name="instituicao_estado" id="instituicao_estado" class="inputUser"  required>
                        <label for="instituicao_estado" class="labelInput">Estado</label>
                    </div>
                    </section>    

                   
                    <br><br><br>
    
                    <div class="inputBox">
                        <input type="text" name="instituicao_logradouro" id="instituicao_logradouro" class="inputUser"  required>
                        <label for="instituicao_logradouro" class="labelInput">Logradouro: </label>
                        
                    </div>
                    <br><br>

                    <section class="coluna-50l">
                    <div class="inputBox">
                        <input type="number" name="instituicao_numero" id="instituicao_numero" class="inputUser"  required>
                        <label for="instituicao_numero" class="labelInput">Número: </label>
                    </div>
                    </section>
                   
                    <section class="coluna-50r">
                    <div class="inputBox">
                        <input type="text" name="instituicao_bairro" id="instituicao_bairro" class="inputUser"  required>
                        <label for="instituicao_bairro " class="labelInput">Bairro: </label>
                    </div>
                    </section>
                    
                    <br><br><br>

                    <div class="inputBox">
                        <input type="text" name="instituicao_complemento" id="instituicao_complemento" class="inputUser" required>
                        <label for="instituicao_complemento" class="labelInput">Complemento: </label>
                    </div>


                    <h4>Cadastre uma senha</h4>
                    <div class="inputBox">
                        <input type="password" name="instituicao_senha" id="instituicao_senha" class="inputUser" required>
                        <label for="instituicao_senha"class="labelInput">Senha: </label>
                    </div>
                    <br><br>

    
    
                    <input type="submit" name="submit" id="submit" class="submit_form" value="Cadastrar">

            <div class="btn_login">
            <p>Já tem uma conta?<a href="../Login/login_secretaria/login_secretaria.php" class="register-link">  Clique aqui.</a></p>
        </div>
                  
            </form>
        </fieldset>
    </div> 
    <div class="background_inf"></div>





</body>
</html>