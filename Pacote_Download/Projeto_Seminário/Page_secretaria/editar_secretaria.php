<?php 

    if(!empty($_GET['id_instituicao'])) // Se não estiver vazio minha variavel/meu parametro id
{

    //Incluindo a conexão com o arquivo config.php que faz conexão com o banco de dados
    include_once('../config.php');


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
            $instituicao_codigo = $user_data['instituicao_codigo'];
            $instituicao_email = $user_data['instituicao_email'];
            $instituicao_telefone = $user_data['instituicao_telefone'];
            $mantenedora = $user_data['mantenedora'];
            $tipo_instituicao =  $user_data['tipo_instituicao'];
            $instituicao_cidade = $user_data['instituicao_cidade'];
            $instituicao_estado = $user_data['instituicao_estado'];
            $instituicao_logradouro = $user_data['instituicao_logradouro'];
            $instituicao_numero = $user_data['instituicao_numero'];
            $instituicao_bairro = $user_data['instituicao_bairro'];
            $instituicao_complemento = $user_data['instituicao_complemento'];
            $instituicao_senha = $user_data['instituicao_senha'];
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
    <link rel="stylesheet" href="editar_secretaria.css">
   
      
        
</head>
<body>
<a href="edit_secretaria.php" style="color: white; background: red; position:relative; z-index: 10;">Voltar</a>
    <header class="topo">
    <h1>Formulário - Cadastre sua instuição de ensino.</h1>
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
                        <input type="number" name="instituicao_codigo" id="instituicao_codigo" class="inputUser"  value="<?php echo $instituicao_codigo?>" required>
                        <label for="instituicao_codigo" class="labelInput">CNPJ ou Código MEC: </label>
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

                    
                <div class="form-container">  
                <section class="coluna-50l">  
                    <h4>Tipo de mantenedora:</h4>
                    <input type="radio" id="publica" name="mantenedora" value="publica" <?php echo ($mantenedora == 'publica') ? 'checked' : '' ?> required>
                    <label for="publica">Pública</label>
                    <br>
                    <input type="radio" id="privada" name="mantenedora" value="privada" <?php echo ($mantenedora == 'privado') ? 'checked' : '' ?> required>
                    <label for="privado">Privada</label>
                    <br>
                    <input type="radio" id="outro" name="mantenedora" value="outro" <?php echo ($mantenedora == 'outro') ? 'checked' : '' ?> required>
                    <label for="outro">Outro</label>
                    </section>

                    <section class="coluna-50r" style="margin-left:0px; margin-top:3.5%">
                    <H4>Tipo de instituição: 
                    <select required name="tipo_instituicao" id="tipo_instituicao" class="caixa_form">
                        <option selected disabled value="">Escolha um tipo</option>
                        <option value="escola_fundamental" <?php echo ($tipo_instituicao == 'escola_fundamental') ? 'selected' : '' ?>>Escola fundamental</option>
                        <option value="escola_de_ensino_medio" <?php echo ($tipo_instituicao == 'escola_de_ensino_medio') ? 'selected' : '' ?>>Escola de ensino médio</option>
                        <option value="faculdade_universidade" <?php echo ($tipo_instituicao == 'faculdade_universidade') ? 'selected' : '' ?>>Faculdade/Universidade</option>
                        <option value="curso_tecnico_profissionalizante" <?php echo ($tipo_instituicao == 'curso_tecnico_profissionalizante') ? 'selected' : '' ?>>Curso técnico/Profissionalizante</option>
                        <option value="outro" <?php echo ($tipo_instituicao == 'outro') ? 'selected' : '' ?>>Outro</option>
                    </select>
                    </H4>
                    </section>
                </div>

                <h4>Endereço da instuição:</h4>
                    <section class="coluna-50l">
                        <div class="inputBox">
                            <input type="text" name="instituicao_cidade" id="instituicao_cidade" class="inputUser" value="<?php echo $instituicao_cidade?>"  required>
                            <label for="instituicao_cidade" class="labelInput">Cidade: </label>
                        </div>
                        </section>


                        <section class="coluna-50r">
                    <div class="inputBox">
                        <input type="" name="instituicao_estado" id="instituicao_estado" class="inputUser"  value="<?php echo $instituicao_estado?>" required>
                        <label for="instituicao_estado" class="labelInput">Estado</label>
                    </div>
                    </section>    

                   
                    <br><br><br>
    
                    <div class="inputBox">
                        <input type="text" name="instituicao_logradouro" id="instituicao_logradouro" class="inputUser" value="<?php echo $instituicao_logradouro?>" required>
                        <label for="instituicao_logradouro" class="labelInput">Logradouro: </label>
                        
                    </div>
                    <br><br>

                    <section class="coluna-50l">
                    <div class="inputBox">
                        <input type="number" name="instituicao_numero" id="instituicao_numero" class="inputUser" value="<?php echo $instituicao_numero?>" required>
                        <label for="instituicao_numero" class="labelInput">Número: </label>
                    </div>
                    </section>
                   
                    <section class="coluna-50r">
                    <div class="inputBox">
                        <input type="text" name="instituicao_bairro" id="instituicao_bairro" class="inputUser"  value="<?php echo $instituicao_bairro?>" required>
                        <label for="instituicao_bairro " class="labelInput">Bairro: </label>
                    </div>
                    </section>
                    
                    <br><br><br>

                    <div class="inputBox">
                        <input type="text" name="instituicao_complemento" id="instituicao_complemento" class="inputUser"  value="<?php echo $instituicao_complemento?>" required>
                        <label for="instituicao_complemento" class="labelInput">Complemento: </label>
                    </div>


                    <h4>Cadastre uma senha</h4>
                    <div class="inputBox">
                        <input type="text" name="instituicao_senha" id="instituicao_senha" class="inputUser" value="<?php echo $instituicao_senha?>" required>
                        <label for="instituicao_senha"class="labelInput">Senha: </label>
                    </div>
                    <br><br>

                    <!-- ficara escondido -->
                    <input type="hidden" name="id_instituicao" value="<?php echo $id_instituicao?>">
    
                    <input type="submit" name="update" id="update" class="submit_form" value="Atualizar">
                  
            </form>
        </fieldset>
    </div> 
    <div class="background_inf"></div>





</body>
</html>