
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="Images/UniSGE-removebg-preview.png"> <!--Coloca o logo no topo da guia da página-->
    <link rel="stylesheet" href="cad_professor.css?v=1.3">
   
      
        
</head>
<body>
    <header class="topo">
    <h1>Formulário - Cadastro de Professor</h1>
</header>
    <div class="box">  
        <fieldset>
            <legend>Formulário Professor</legend>
              
                <form action="processar_cad_professor.php" method="post">
                    <br>
                    <div class="inputBox">
                        
                        <input type="text" name="professor_nome_completo" id="professor_nome_completo" class="inputUser" required>
                        <label for="professor_nome_completo" class="labelInput">Nome completo: </label>

                    </div>
                    <br><br>
                    <div class="inputBox">
                    <label for="professor_data_nascimento"><b>Data de Nascimento:</b></label>
                    <input type="date" name="professor_data_nascimento" id="professor_data_nascimento" class="inputUser" required>
                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="text" name="professor_cpf" id="professor_cpf" class="inputUser" required>
                        <label for="professor_cpf" class="labelInput">CPF: </label>
                    </div>
                    <br><br>

                 
                    <section class="coluna-50l">
                    <div class="inputBox">
                    <label for="professor_estado" > <b>Estado: </b> </label>
                    <br>
                    <select id="professor_estado" name="professor_estado" class="inputUser" required>
                    <option value="">Selecione um estado</option>
                    </select>
                    </div>
                    </section>
                    
                    <section class="coluna-50r">
                    <div class="inputBox">
                    <label for="professor_cidade" > <b>Cidade: </b> </label>
                    <select id="professor_cidade" name="professor_cidade" class="inputUser" required>
                    <option value="">Selecione uma cidade</option>
                    </select>
                    </div>
                    </section>

                    <br><br><br>

                    <div class="inputBox">
                        <input type="text" name="professor_endereco" id="professor_endereco" class="inputUser"  required>
                        <label for="professor_endereco" class="labelInput">Endereço: </label>
                      
                        
                    </div>

                    <br><br>
                
        

                    <!-- <div class="inputBox">

                        <input type="password" name="professor_senha_acesso" id="professor_senha_acesso" class="inputUser" required>
                        <label for="professor_senha_acesso"class="labelInput">Senha: </label>
                    </div>
                    <br><br> -->

                    
    
    
                    <input type="submit" name="submit" id="submit" class="submit_form" value="Cadastrar">
                  
            </form>
        </fieldset>
    </div> 
    <div class="background_inf"></div>




    <script src="cad_professor.js?v=1.3"></script>
</body>
</html>