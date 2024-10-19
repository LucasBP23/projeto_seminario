<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="Images/UniSGE-removebg-preview.png"> <!--Coloca o logo no topo da guia da página-->
    <link rel="stylesheet" href="cad_professor.css">
   
      
        
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
                        
                        <input type="text" name="nome" id="nome" class="inputUser" required>
                        <label for="nome" class="labelInput">Nome completo: </label>

                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="number" name="cpf" id="cpf" class="inputUser" required>
                        <label for="cpf" class="labelInput">CPF: </label>
                    </div>
                    <br><br>

                    <div class="inputBox">
                        <input type="text" name="email" id="email" class="inputUser"  required>
                        <label for="email" class="labelInput">Email: </label>
                      
                        
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="tel" name="telefone" id="telefone" class="inputUser"  required>
                        <label for="telefone" class="labelInput">Telefone: </label>
                        
                    
                    </div>
                    <p>Sexo:</p>
                    <input type="radio" id="feminino" name="sexo" value="feminino" required>
                    <label for="feminino">Feminino</label>
                    <br>
                    <input type="radio" id="masculino" name="sexo" value="masculino" required>
                    <label for="masculino">Masculino</label>
                    <br>
                    <input type="radio" id="outro" name="sexo" value="outro" required>
                    <label for="outro">Outro</label>
                    <br><br>
    
                    <label for="nascimento"><b>Data de Nascimento:</b></label>
                    <input type="date" name="nascimento" id="nascimento" class="caixa_form" required>
                    <br><br><br>
    
                    <div class="inputBox">
                        <input type="text" name="materia" id="materia" class="inputUser"   required>
                        <label for="materia" class="labelInput">Matéria</label>
                       
                        
                    </div>
                    <br>
                    <H4>Titulação máxima: 
                    <select required name="titulacao_max" id="titulacao_max" class="caixa_form">
                        <option selected disabled value="">Escolha uma titulação</option>
                        <option value="licenciatura">Licenciatura</option>
                        <option value="bacharelado">Bacharelado</option>
                        <option value="mestrado">Mestrado</option>
                        <option value="doutorado">Doutorado</option>
                        <option value="outro">Outro</option>
                    </select>
                </H4>
                    <br>

                    <section class="coluna-50l">
                        <div class="inputBox">
                            <input type="text" name="cidade" id="cidade" class="inputUser"  required>
                            <label for="cidade" class="labelInput">Cidade: </label>
                        </div>
                        </section>


                        <section class="coluna-50r">
                    <div class="inputBox">
                        <input type="" name="estado" id="estado" class="inputUser"  required>
                        <label for="estado" class="labelInput">Estado</label>
                    </div>
                    </section>    

                   
                    <br><br><br>
    
                    <div class="inputBox">
                        <input type="text" name="logradouro" id="logradouro" class="inputUser"  required>
                        <label for="logradouro" class="labelInput">Logradouro: </label>
                        
                    </div>
                    <br><br>

                    <section class="coluna-50l">
                    <div class="inputBox">
                        <input type="number" name="numero" id="numero" class="inputUser"  required>
                        <label for="numero" class="labelInput">Número: </label>
                    </div>
                    </section>
                   
                    <section class="coluna-50r">
                    <div class="inputBox">
                        <input type="text" name="bairro" id="bairro" class="inputUser"  required>
                        <label for="bairro " class="labelInput">Bairro: </label>
                    </div>
                    </section>
                    
                    <br><br><br>

                    <div class="inputBox">
                        <input type="text" name="complemento" id="complemento" class="inputUser" required>
                        <label for="complemento" class="labelInput">Complemento: </label>
                        
                    </div>
                   

                    <h4>Cadastre uma senha</h4>
                    <div class="inputBox">
                        <input type="password" name="professor_senha" id="professor_senha" class="inputUser" required>
                        <label for="professor_senha"class="labelInput">Senha: </label>
                    </div>
                    <br><br>

                    
    
    
                    <input type="submit" name="submit" id="submit" class="submit_form" value="Cadastrar">
                  
            </form>
        </fieldset>
    </div> 
    <div class="background_inf"></div>





</body>
</html>