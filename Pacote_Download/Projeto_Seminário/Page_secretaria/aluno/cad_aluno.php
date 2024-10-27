
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="Images/UniSGE-removebg-preview.png"> <!--Coloca o logo no topo da guia da página-->
    <link rel="stylesheet" href="cad_aluno.css?v=1.4">
   
      
        
</head>
<body>
    <header class="topo">
    <h1>Formulário - Cadastro de aluno</h1>
</header>
    <div class="box">  
        <fieldset>
            <legend>Formulário aluno</legend>
              
                <form action="processar_cad_aluno.php" method="post">
                    <br>
                    <div class="inputBox">
                        
                        <input type="text" name="aluno_nome_completo" id="aluno_nome_completo" class="inputUser" required>
                        <label for="aluno_nome_completo" class="labelInput">Nome completo: </label>

                    </div>
                    <br><br>
                    <div class="inputBox">
                    <label for="aluno_data_nascimento"><b>Data de Nascimento:</b></label>
                    <input type="date" name="aluno_data_nascimento" id="aluno_data_nascimento" class="inputUser" required>
                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="text" name="aluno_cpf" id="aluno_cpf" class="inputUser" required>
                        <label for="aluno_cpf" class="labelInput">CPF: </label>
                    </div>
                    <br><br>

                 
                    <section class="coluna-50l">
                    <div class="inputBox">
                    <label for="aluno_estado" > <b>Estado: </b> </label>
                    <br>
                    <select id="aluno_estado" name="aluno_estado" class="inputUser" required>
                    <option value="">Selecione um estado</option>
                    </select>
                    </div>
                    </section>
                    
                    <section class="coluna-50r">
                    <div class="inputBox">
                    <label for="aluno_cidade" > <b>Cidade: </b> </label>
                    <select id="aluno_cidade" name="aluno_cidade" class="inputUser" required>
                    <option value="">Selecione uma cidade</option>
                    </select>
                    </div>
                    </section>

                    <br><br><br>

                    <div class="inputBox">
                        <input type="text" name="aluno_endereco" id="aluno_endereco" class="inputUser"  required>
                        <label for="aluno_endereco" class="labelInput">Endereço: </label>
                      
                        
                    </div>

                    <br><br>
                
        

                    <!-- <div class="inputBox">

                        <input type="password" name="aluno_senha_acesso" id="aluno_senha_acesso" class="inputUser" required>
                        <label for="aluno_senha_acesso"class="labelInput">Senha: </label>
                    </div>
                    <br><br> -->

                    
    
    
                    <input type="submit" name="submit" id="submit" class="submit_form" value="Cadastrar">
                  
            </form>
        </fieldset>
    </div> 
    <div class="background_inf"></div>




    <script src="cad_aluno.js?v=1.1"></script>
</body>
</html>