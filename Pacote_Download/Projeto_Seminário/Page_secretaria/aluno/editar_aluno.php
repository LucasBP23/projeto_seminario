<?php 

    if(!empty($_GET['id_aluno'])) // Se não estiver vazio minha variavel/meu parametro id
{

    //Incluindo a conexão com o arquivo config.php que faz conexão com o banco de dados
    include_once('../../config.php');


    $id_aluno = $_GET['id_aluno']; // variavel id que recebe meus parametros

    $sqlSelect = "SELECT * FROM aluno WHERE id_aluno=$id_aluno";

    $result = $conexao->query($sqlSelect);

    //Teste
    // print_r($result);

    // Teste para verificar se tem mais de de uma linha
    if($result->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result))
        {
            $aluno_nome_completo = $user_data['aluno_nome_completo'];
            $aluno_data_nascimento = $user_data['aluno_data_nascimento'];
            $aluno_cpf = $user_data['aluno_cpf'];
            $aluno_estado = $user_data['aluno_estado'];
            $aluno_cidade =  $user_data['aluno_cidade'];
            $aluno_endereco = $user_data['aluno_endereco'];
            // Capturar o id_instituicao da sessão
            // $id_instituicao = $_SESSION['id_instituicao'];
           
        }
        
    }
    else
    {
        header('Location: edit_aluno.php');
    }

}  

    //Caso o ID esteja vazio voltar
    else
    {
        header('Location: edit_aluno.php');
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
    <link rel="stylesheet" href="editar_aluno.css">
   
      
        
</head>
<body>
    <header class="topo">
        <a href="edit_aluno.php">Voltar</a>
    <h1>Formulário - Cadastro de aluno</h1>
</header>
    <div class="box">  
        <fieldset>
            <legend>Formulário aluno</legend>
              
                <form action="edit_save_aluno.php" method="post">
                    <br>
                    <div class="inputBox">
                        
                        <input type="text" name="aluno_nome_completo" id="aluno_nome_completo" class="inputUser" value="<?php echo $aluno_nome_completo?>" required>
                        <label for="aluno_nome_completo" class="labelInput">Nome completo: </label>

                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="date" name="aluno_data_nascimento" id="aluno_data_nascimento" class="inputUser" value="<?php echo $aluno_data_nascimento?>" required>
                        <label for="aluno_data_nascimento" class="labelInput">Data de nascimento: </label>
                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="text" name="aluno_cpf" id="aluno_cpf" class="inputUser" value="<?php echo $aluno_cpf?>"  required>
                        <label for="aluno_cpf" class="labelInput">CPF: </label>
                      
                        
                    </div>
                    <br><br>

                    <section class="coluna-50l">
                        <div class="inputBox">
                            <label for="aluno_estado" > <b>Estado: </b> </label>
                            <br>
                            <select id="aluno_estado" name="aluno_estado" class="inputUser" required>
                            <option value="<?php echo $aluno_estado?>"><?php echo $aluno_estado?></option>
                            </select>
                        </div>
                    </section>


                    <section class="coluna-50r">
                        <div class="inputBox">
                            <label for="aluno_cidade" > <b>Cidade: </b> </label>
                            <select id="aluno_cidade" name="aluno_cidade" class="inputUser" required>
                            <option value="<?php echo $aluno_cidade?>"><?php echo $aluno_cidade?></option>
                            </select>
                        </div>
                    </section>

                    <br><br><br>

                    <div class="inputBox">
                        <input type="text" name="aluno_endereco" id="aluno_endereco" class="inputUser" value="<?php echo $aluno_endereco?>"  required>
                        <label for="aluno_endereco" class="labelInput">Endereço: </label>
                        
                    </div>

                    <br><br>
                    
                    
                   
                    <input type="hidden" name="id_aluno" value="<?php echo $id_aluno ?>">
                    <input type="hidden" name="matricula_aluno" value="<?php echo $matricula_aluno ?>">
                    <input type="hidden" name="aluno_senha_acesso" value="<?php echo $aluno_senha_acesso ?>">
                    <input type="submit" name="update" id="update" class="submit_form" value="Atualizar">
                  
            </form>
        </fieldset>
    </div> 
    <div class="background_inf"></div>




    <script src="cad_aluno.js?v=1.3"></script>
</body>
</html>