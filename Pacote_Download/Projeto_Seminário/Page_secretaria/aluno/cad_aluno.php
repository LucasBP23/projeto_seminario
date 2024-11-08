<!-- FORMULÁRIO PARA CADASTRO DO ALUNO -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de aluno</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="../../images/UniSGE-removebg-preview.png"> <!--Coloca o logo no topo da guia da página-->
    <link rel="stylesheet" href="cad_aluno.css?v=1.8">
   

        
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
                    
                        <br><br><br>

                
                <div class="inputBox">
                    <input type="text" name="aluno_cep" id="aluno_cep" class="inputUser">
                    <label for="aluno_cep" class="labelInput">CEP: </label>
                </div>
                
                <br><br>

                
                <section class="coluna-50l">
                    <div class="inputBox">
                        <input type="" name="aluno_estado" id="aluno_estado" class="inputUser"  required>
                        <label for="aluno_estado" class="labelInput">Estado: </label>
                    </div>
                    </section>    

                    <section class="coluna-50r">
                        <div class="inputBox">
                            <input type="text" name="aluno_cidade" id="aluno_cidade" class="inputUser"  required>
                            <label for="aluno_cidade" class="labelInput">Cidade: </label>
                        </div>
                    </section>


                <br><br><br>

                <div class="inputBox">
                    <input type="text" name="aluno_logradouro" id="aluno_logradouro" class="inputUser" required>
                    <label for="aluno_logradouro" class="labelInput">Logradouro: </label>
                </div>

                <br><br>

                
                <section class="coluna-50l">
                <div class="inputBox">
                    <input type="text" name="aluno_bairro" id="aluno_bairro" class="inputUser" required>
                    <label for="aluno_bairro" class="labelInput">Bairro: </label>
                </div>
                </section>

                



                    <section class="coluna-50r">
                    <div class="inputBox">
                        <input type="number" name="aluno_numero" id="aluno_numero" class="inputUser"  required>
                        <label for="aluno_numero" class="labelInput">Número: </label>
                    </div>
                    </section>
                    <br><br><br>



                    
    
    
                    <input type="submit" name="submit" id="submit" class="submit_form" value="Cadastrar">
                  
            </form>
        </fieldset>
    </div> 
    <div class="background_inf"></div>




<script src="cad_aluno.js?v=1.5"></script>


</body>
</html>