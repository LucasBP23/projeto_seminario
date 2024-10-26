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
            $professor_nome_completo = $user_data['professor_nome_completo'];
            $professor_data_nascimento = $user_data['professor_data_nascimento'];
            $professor_cpf = $user_data['professor_cpf'];
            $professor_estado = $user_data['professor_estado'];
            $professor_cidade =  $user_data['professor_cidade'];
            $professor_endereco = $user_data['professor_endereco'];
            // $materia = $user_data['materia'];
            // $titulacao_max = $user_data['titulacao_max'];
            // $cidade = $user_data['cidade'];
            // $estado = $user_data['estado'];
            // $logradouro = $user_data['logradouro'];
            // $numero = $user_data['numero'];
            // $bairro = $user_data['bairro'];
            // $complemento = $user_data['complemento'];
            // $professor_senha = $user_data['professor_senha'];
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
                        
                        <input type="text" name="professor_nome_completo" id="professor_nome_completo" class="inputUser" value="<?php echo $professor_nome_completo?>" required>
                        <label for="professor_nome_completo" class="labelInput">Nome completo: </label>

                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="date" name="professor_data_nascimento" id="professor_data_nascimento" class="inputUser" value="<?php echo $professor_data_nascimento?>" required>
                        <label for="professor_data_nascimento" class="labelInput">Data de nascimento: </label>
                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="text" name="professor_cpf" id="professor_cpf" class="inputUser" value="<?php echo $professor_cpf?>"  required>
                        <label for="professor_cpf" class="labelInput">CPF: </label>
                      
                        
                    </div>
                    <br><br>

                    <section class="coluna-50l">
                        <div class="inputBox">
                            <label for="professor_estado" > <b>Estado: </b> </label>
                            <br>
                            <select id="professor_estado" name="professor_estado" class="inputUser" required>
                            <option value="<?php echo $professor_estado?>"><?php echo $professor_estado?></option>
                            </select>
                        </div>
                    </section>


                    <section class="coluna-50r">
                        <div class="inputBox">
                            <label for="professor_cidade" > <b>Cidade: </b> </label>
                            <select id="professor_cidade" name="professor_cidade" class="inputUser" required>
                            <option value="<?php echo $professor_cidade?>"><?php echo $professor_cidade?></option>
                            </select>
                        </div>
                    </section>

                    <br><br><br>

                    <div class="inputBox">
                        <input type="text" name="professor_endereco" id="professor_endereco" class="inputUser" value="<?php echo $professor_endereco?>"  required>
                        <label for="professor_endereco" class="labelInput">Endereço: </label>
                        
                    </div>

                    <br><br>
                    
                    
                   
                    <input type="hidden" name="id_professor" value="<?php echo $id_professor ?>">
                    <input type="hidden" name="matricula_professor" value="<?php echo $matricula_professor ?>">
                    <input type="hidden" name="professor_senha_acesso" value="<?php echo $professor_senha_acesso ?>">
                    <input type="submit" name="update" id="update" class="submit_form" value="Atualizar">
                  
            </form>
        </fieldset>
    </div> 
    <div class="background_inf"></div>




    <script src="cad_professor.js?v=1.3"></script>
</body>
</html>