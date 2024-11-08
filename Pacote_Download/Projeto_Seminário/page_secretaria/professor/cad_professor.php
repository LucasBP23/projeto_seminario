<!-- FORMULÁRIO PARA O CADASTRO DO PROFESSOR -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário para cadastro de professor</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="Images/UniSGE-removebg-preview.png"> <!--Coloca o logo no topo da guia da página-->
    <link rel="stylesheet" href="cad_professor.css?v=1.5">
   
      
        
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

                 
                    <div class="inputBox">
                    <input type="text" name="professor_cep" id="professor_cep" class="inputUser">
                    <label for="professor_cep" class="labelInput">CEP: </label>
                </div>
                
                <br><br>

                
                <section class="coluna-50l">
                    <div class="inputBox">
                        <input type="" name="professor_estado" id="professor_estado" class="inputUser"  required>
                        <label for="professor_estado" class="labelInput">Estado: </label>
                    </div>
                    </section>    

                    <section class="coluna-50r">
                        <div class="inputBox">
                            <input type="text" name="professor_cidade" id="professor_cidade" class="inputUser"  required>
                            <label for="professor_cidade" class="labelInput">Cidade: </label>
                        </div>
                    </section>


                <br><br><br>

                <div class="inputBox">
                    <input type="text" name="professor_logradouro" id="professor_logradouro" class="inputUser" required>
                    <label for="professor_logradouro" class="labelInput">Logradouro: </label>
                </div>

                <br><br>

                
                <section class="coluna-50l">
                <div class="inputBox">
                    <input type="text" name="professor_bairro" id="professor_bairro" class="inputUser" required>
                    <label for="professor_bairro" class="labelInput">Bairro: </label>
                </div>
                </section>

                



                    <section class="coluna-50r">
                    <div class="inputBox">
                        <input type="number" name="professor_numero" id="professor_numero" class="inputUser"  required>
                        <label for="professor_numero" class="labelInput">Número: </label>
                    </div>
                    </section>
                    <br><br><br>
                
        

                    
    
    
                    <input type="submit" name="submit" id="submit" class="submit_form" value="Cadastrar">
                  
            </form>
        </fieldset>
    </div> 
    <div class="background_inf"></div>




    <script src="cad_professor.js?v=1.5"></script>
</body>
</html>