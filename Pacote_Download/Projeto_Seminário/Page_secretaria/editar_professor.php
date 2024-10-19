<?php 

    if(!empty($_GET['id_professor'])) // Se não estiver vazio minha variavel/meu parametro id
{

    //Incluindo a conexão com o arquivo config.php que faz conexão com o banco de dados
    include_once('../config.php');


    $id_professor = $_GET['id_professor']; // variavel id que recebe meus parametros

    $sqlSelect = "SELECT * FROM professor WHERE id_professor=$id_professor";

    $result = $conexao->query($sqlSelect);

    //Teste
    // print_r($result);

    // Teste para verificar se tem mais de de uma linha
    if($result->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result))
        {
            $nome = $user_data['nome'];
            $cpf = $user_data['cpf'];
            $email = $user_data['email'];
            $telefone = $user_data['telefone'];
            $genero =  $user_data['sexo'];
            $data_nasc = $user_data['nascimento'];
            $materia = $user_data['materia'];
            $titulacao_max = $user_data['titulacao_max'];
            $cidade = $user_data['cidade'];
            $estado = $user_data['estado'];
            $logradouro = $user_data['logradouro'];
            $numero = $user_data['numero'];
            $bairro = $user_data['bairro'];
            $complemento = $user_data['complemento'];
            $professor_senha = $user_data['professor_senha'];
            // Capturar o id_instituicao da sessão
            // $id_instituicao = $_SESSION['id_instituicao'];
           
        }
        
    }
    else
    {
        header('Location: edit_professor.php');
    }

}  

    //Caso o ID esteja vazio voltar
    else
    {
        header('Location: edit_professor.php');
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
    <link rel="stylesheet" href="editar_professor.css">
   
      
        
</head>
<body>
    <header class="topo">
        <a href="edit_professor.php">Voltar</a>
    <h1>Formulário - Cadastro de Professor</h1>
</header>
    <div class="box">  
        <fieldset>
            <legend>Formulário Professor</legend>
              
                <form action="edit_save_professor.php" method="post">
                    <br>
                    <div class="inputBox">
                        
                        <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome?>" required>
                        <label for="nome" class="labelInput">Nome completo: </label>

                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="number" name="cpf" id="cpf" class="inputUser" value="<?php echo $cpf?>" required>
                        <label for="cpf" class="labelInput">CPF: </label>
                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="text" name="email" id="email" class="inputUser" value="<?php echo $email?>"  required>
                        <label for="email" class="labelInput">Email: </label>
                      
                        
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="tel" name="telefone" id="telefone" class="inputUser" value="<?php echo $telefone?>"  required>
                        <label for="telefone" class="labelInput">Telefone: </label>
                        
                    
                    </div>
                    <p>Sexo:</p>
                    <input type="radio" id="feminino" name="sexo" value="feminino" <?php echo ($genero == 'feminino') ? 'checked' : '' ?> required>
                    <label for="feminino">Feminino</label>
                    <br>
                    <input type="radio" id="masculino" name="sexo" value="masculino" <?php echo ($genero == 'masculino') ? 'checked' : '' ?> required>
                    <label for="masculino">Masculino</label>
                    <br>
                    <input type="radio" id="outro" name="sexo" value="outro" <?php echo ($genero == 'outro') ? 'checked' : '' ?> required>
                    <label for="outro">Outro</label>
                    <br><br>
    
                    <label for="nascimento"><b>Data de Nascimento:</b></label>
                    <input type="date" name="nascimento" id="nascimento" class="caixa_form" value="<?php echo $data_nasc?>" required>
                    <br><br><br>
    
                    <div class="inputBox">
                        <input type="text" name="materia" id="materia" class="inputUser" value="<?php echo $materia?>"   required>
                        <label for="materia" class="labelInput">Matéria</label>
                       
                        
                    </div>
                    <br>
                    <H4>Titulação máxima: 
                    <select required name="titulacao_max" id="titulacao_max" class="caixa_form">
                        <option selected disabled value="">Escolha uma titulação</option>
                        <option value="licenciatura" <?php echo ($titulacao_max == 'licenciatura') ? 'selected' : '' ?>>Licenciatura</option>
                        <option value="bacharelado" <?php echo ($titulacao_max == 'bacharelado') ? 'selected' : '' ?>>Bacharelado</option>
                        <option value="mestrado" <?php echo ($titulacao_max == 'mestrado') ? 'selected' : '' ?>>Mestrado</option>
                        <option value="doutorado" <?php echo ($titulacao_max == 'doutorado') ? 'selected' : '' ?>>Doutorado</option>
                        <option value="outro" <?php echo ($titulacao_max == 'outro') ? 'selected' : '' ?>>Outro</option>
                    </select>
                </H4>
                    <br>

                    <section class="coluna-50l">
                        <div class="inputBox">
                            <input type="text" name="cidade" id="cidade" class="inputUser" value="<?php echo $cidade?>" required>
                            <label for="cidade" class="labelInput">Cidade: </label>
                        </div>
                        </section>


                        <section class="coluna-50r">
                    <div class="inputBox">
                        <input type="" name="estado" id="estado" class="inputUser" value="<?php echo $estado?>"  required>
                        <label for="estado" class="labelInput">Estado</label>
                    </div>
                    </section>    

                   
                    <br><br><br>
    
                    <div class="inputBox">
                        <input type="text" name="logradouro" id="logradouro" class="inputUser" value="<?php echo $logradouro?>"  required>
                        <label for="logradouro" class="labelInput">Logradouro: </label>
                        
                    </div>
                    <br><br>

                    <section class="coluna-50l">
                    <div class="inputBox">
                        <input type="number" name="numero" id="numero" class="inputUser" value="<?php echo $numero?>"  required>
                        <label for="numero" class="labelInput">Número: </label>
                    </div>
                    </section>
                   
                    <section class="coluna-50r">
                    <div class="inputBox">
                        <input type="text" name="bairro" id="bairro" class="inputUser" value="<?php echo $bairro?>"  required>
                        <label for="bairro " class="labelInput">Bairro: </label>
                    </div>
                    </section>
                    
                    <br><br><br>

                    <div class="inputBox">
                        <input type="text" name="complemento" id="complemento" class="inputUser" value="<?php echo $complemento?>" required>
                        <label for="complemento" class="labelInput">Complemento: </label>
                        
                    </div>

                    <h4>Edite a senha</h4>
                    <div class="inputBox">
                        <input type="text" name="professor_senha" id="professor_senha" class="inputUser" value="<?php echo $professor_senha?>" required>
                        <label for="professor_senha"class="labelInput">Senha: </label>
                    </div>
                    <br><br>
    
                    <input type="hidden" name="id_professor" value="<?php echo $id_professor ?>">
                    <input type="submit" name="update" id="update" class="submit_form" value="Cadastrar">
                  
            </form>
        </fieldset>
    </div> 
    <div class="background_inf"></div>





</body>
</html>