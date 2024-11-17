# Projeto seminário - Sistema de Gestão Escolar


## Autores


- Joaquim Augusto de Almeida Canais Neto
- Leandro Silva de Oliveira
- Lucas Braga Pimenta de Oliveira
- Paulo Henrique da Silva Moreno
- Samuel Ignácio Passos Ferreira



## 🔗 Link projeto_seminario
-https://github.com/LucasBP23/projeto_seminario.git

## UniSGE - Sistema de Gestão Escolar

A criação de aplicações web tem se consolidado como uma das áreas mais dinâmicas e essenciais para o desenvolvimento de tecnologias digitais, atendendo a uma ampla gama de necessidades comerciais, educacionais e de entretenimento. O PHP, uma das linguagens de programação mais populares para o desenvolvimento web, destaca-se por sua simplicidade, flexibilidade e ampla adoção em projetos que exigem soluções rápidas e eficientes. De acordo com Turini (2015), o PHP é amplamente utilizado devido à sua curva de aprendizado acessível, o que o torna uma escolha predominante entre desenvolvedores de todos os níveis. Além disso, frameworks como Laravel expandem suas capacidades, permitindo a criação de aplicações sofisticadas com padrões avançados de desenvolvimento.
Dentro desse contexto, a aplicação UniSGE, possui acesso a tela de cadastros em PHP, como apresentado neste estudo, oferece uma solução prática e acessível para finalidade de automatização dos processos, desde o uso pelo aluno a administração escolar. Com uma interface intuitiva, o gerenciador escolar facilita a rotina de professores, coordenadores e alunos, promovendo maior eficiência e integração nas operações da escola. Ele oferece recursos para gerenciar matrículas, controle de notas, histórico escolar, calendário acadêmico, financeiro, comunicação com pais e alunos.
 👋





## Aplicações utilizadas neste projeto

No front foi utilizado HTML, CSS, JavaScript e Bootstrap.

No Back-End foi utilizado o PHP.

No banco de dados foi utilizado o MySQL.

Utilizamos a API viacep.com.br/ws/01001000/json/, que busca os endereços pelo Cep

A comunicação entre o front-end e o back-end é realizada diretamente por meio de requisições de formulários, onde os dados são processados no servidor e armazenados ou recuperados diretamente no banco de dados.

## Sistema de Cadastro de Notas Escolares
Este projeto apresenta um sistema de cadastro de notas escolares desenvolvido para um seminário acadêmico. O sistema permite o registro, atualização e visualização das notas dos alunos de forma organizada e eficiente. Ele é projetado para simplificar o gerenciamento das avaliações e contribuir para o acompanhamento do desempenho escolar.

A aplicação é de fácil utilização e pode ser integrada em diversos contextos educacionais, promovendo a centralização e o acesso simplificado às informações acadêmicas.


## Esse é projeto escolar:


- Apresentado no trabalho requisitado pela faculdade Uniasselvi


### 1. Login da secretaria
- Descrição: Permite que a secretaria acesse o sistema da secretaria.
- Página: `login/login_secretaria/login_secretaria.php`
- Funções: Verifica as credenciais e, após a autenticação, redireciona o usuário à página inicial da secretaria.
- Formato de Exibição: O login é feito por meio de um formulário com os campos:
  
  | Campo       | Descrição                  |
  |-------------|----------------------------|
  | Email | Identificação do usuário |
  | Senha       | Senha pessoal do usuário   |

- *Fluxo*: 
   - **Usuários Autenticados**: Após o login, o sistema redireciona o usuário da secretaria para a área `page_secretaria/page_secretaria.php`
         - **Usuários Não Autenticados**:São redirecionados para a área de login da secretaria novamente.


### 2. Editar Secretaria
- *Descrição*: Permite visualizar e editar os dados da secretaria. 
- *Página*: page_secretaria/secretaria/edit_secretaria.php 
- *Formato de Exibição*: Os dados da secretaria são exibidos em uma tabela com os seguintes campos: 

| Campo | Descrição | 
|--------------------|------------------------------|
| Nome da instituição | Nome da instituição de ensino | 
| Email | Email da secretaria| 
| Telefone | Telefone da secretaria | 

- *Exemplo de Exibição*: 

| Nome da instituição | Email  | Telefone | 
|----------------|--------------------|---------------|
| Colégio Horizonte Brilhante | contato@horizontebrilhante.edu.br | (21) 1234-5678|



### 3. Cadastrar professor
 *Descrição*: Permite o cadastro de um novo professor no sistema,  gerando automaticamente um número de matrícula e uma senha para o login.
- *Página*: page_secretaria/professor/cad_professor.php
- *Formulário*: inclui campos para nome, data de nascimento, CPF, CEP, estado, cidade, logradouro, bairro, número e gera um número de matrícula e senha aleatório para fazer login.
- Geração Automática: O sistema gera automaticamente um número de matrícula único e uma senha para o professor realizar o login.


### 4. Editar professor
- *Descrição*: Permite visualizar e editar os dados dos professores cadastrados. 
- *Página*: page_secretaria/professor/edit_professor.php 
- *Formato de Exibição*: Os dados dos professores são exibidos em uma tabela com os seguintes campos: 

| Campo | Descrição | 
|--------------------|------------------------------|
| Nome | Nome do professor | 
| Data de nascimento | Data de nascimento do professor | 
| CPF | CPF do professor | 
| CEP | CEP do professor | 
| Estado | Estado do professor | 
| Cidade | Cidade do professor | 
| Logradouro | Logradouro do professor | 
| Bairro | Bairro do professor | 
| Número | Número do endereço do professor | 
| Matrícula | Matrícula do professor | 
| Ações | Para editar ou excluir os dados do professor | 

- *Exemplo de Exibição*: 

| Nome | Data de nascimento | CPF | CEP | Estado | Cidade | Logradouro | Bairro | Número | Matrícula | Ações |
|----------------|--------------------|---------------|----------------|--------------------|---------------|----------------|--------------------|---------------|----------------|--------------------|
| Enrico Sérgio Nicolas Cardoso | 22/08/1994 | 986.659.417-38 | 23916-175 | RJ | Nova Iguaçu | Rua Nossa Senhora Aparecida | Monsuaba | 589 | 940793 | Editar ou excluir |




### 5. Cadastrar aluno.
 *Descrição*: Permite o cadastro de um novo aluno no sistema, gerando automaticamente um número de matrícula e uma senha para o login.
- *Página*: page_secretaria/aluno/cad_aluno.php
- *Formulário*: inclui campos para nome, data de nascimento, CPF, CEP, estado, cidade, logradouro, bairro, número e gera um número de matrícula e senha aleatório para fazer login..
- Geração Automática: O sistema gera automaticamente um número de matrícula único e uma senha para o aluno realizar o login.





### 6. Editar aluno
- *Descrição*: Permite  visualizar, editar e excluir os dados dos alunos cadastrados. 
- *Página*: page_secretaria/aluno/edit_aluno.php 
- *Formato de Exibição*: Os dados dos professores são exibidos em uma tabela com os seguintes campos: 

| Campo | Descrição | 
|--------------------|------------------------------|
| Nome | Nome do aluno| 
| Data de nascimento | Data de nascimento do aluno | 
| CPF | CPF do aluno | 
| CEP | CEP do aluno | 
| Estado | Estado do aluno | 
| Cidade | Cidade do aluno | 
| Logradouro | Logradouro do aluno | 
| Bairro | Bairro do aluno | 
| Número | Número do endereço do aluno | 
| Matrícula | Matrícula do aluno | 
| Ações | Para editar ou excluir os dados do aluno | 

- *Exemplo de Exibição*: 

| Nome | Data de nascimento | CPF | CEP | Estado | Cidade | Logradouro | Bairro | Número | Matrícula | Ações |
|----------------|--------------------|---------------|----------------|--------------------|---------------|----------------|--------------------|---------------|----------------|--------------------|
| Emily Helena Alves | 09/01/1994 | 162.376.877-26 | 26215-150 | RJ | Nova Iguaçu | Rua Orlinda Wilman | Moquetá | 47 | 155387 | Editar ou excluir |




### 7. Cadastrar curso.
 *Descrição*: Permite o cadastro de um novo curso no sistema.
- *Página*: page_secretaria/curso/cad_curso.php
- *Formulário*: inclui campos para nome e descrição do curso.





### 8. Editar curso
- *Descrição*: Permite visualizar, editar e excluir os cursos cadastrados. 
- *Página*: page_secretaria/curso/editar_curso.php 
- *Formato de Exibição*: Os dados dos cursos são exibidos em uma tabela com os seguintes campos: 

| Campo | Descrição | 
|--------------------|------------------------------|
| Nome do curso | Nome do curso | 
| Descrição | Descrição do curso | 
| Ações | Para editar ou excluir os dados do curso | 


- *Exemplo de Exibição*: 

| Nome do curso | Descrição  | Ações|
|----------------|--------------------|---------------|
| 1° ano Ensino médio | 1° ano Ensino médio | Editar ou excluir |


### 9. Cadastrar turma.
 *Descrição*: Permite o cadastro de uma nova turma no sistema.
- *Página*: page_secretaria/turma/cadastro_turma.php
- *Formulário*: inclui campos para nome e para selecionar um curso já cadastrado para vincular essa turma.


### 10. Editar turma.
- *Descrição*: Permite  visualizar, editar e excluir as turmas cadastradas. 
- *Página*: page_secretaria/turma/listar_editar_turmas.php 
- *Formato de Exibição*: Os dados das turmas são exibidos em uma tabela com os seguintes campos: 

| Campo | Descrição | 
|--------------------|------------------------------|
| Nome do Curso | Nome do curso | 
| Nome da Turma | Nome da Turma | 
| Ações | Para editar ou excluir os dados da turma| 


- *Exemplo de Exibição*: 

| Nome do Curso | Nome da Turma | Ações|
|----------------|--------------------|---------------|
| 1° ano Ensino médio | 1° ano A 2024 | Editar ou excluir |


### 11. Alocar professor..
 *Descrição*: Permite alocar um professor em uma matéria de uma turma específica.
- *Página*: page_secretaria/alocar_professor/turma_professor_materia.php
- *Formulário*: Inclui campos para selecionar uma turma já cadastrada, outro campo para selecionar uma matéria já cadastrada na turma selecionada e por último um campo para selecionar um professor já cadastrado, não podendo selecionar mais de um professor para a mesma matéria de uma turma.



### 12. Editar relação professor.
- *Descrição*: Permite visualizar, editar e excluir a relação entre turma, matéria e professor. 
- *Página*: page_secretaria/turma/gerenciar_relacoes.php 
- *Formato de Exibição*: Os dados da relação são exibidos em uma tabela com os seguintes campos: 

| Campo | Descrição | 
|--------------------|------------------------------|
| Turma | Nome da turma | 
| Matéria | Nome da matéria | 
| Professor|  Nome do professor | 
| CPF do professor | CPF do professor | 
| Ações | Editar ou excluir  | 




- *Exemplo de Exibição*: 

| Turma  | Matéria | Professor | CPF do professor | Ações |
|----------------|--------------------|---------------|---------------|---------------|
| 1° ano A 2024 | Português | Enrico Sérgio Nicolas Cardoso | 986.659.417-38 | Editar ou excluir |




### 13. Matricular aluno.
 *Descrição*: Permite matricular um aluno em uma turma específica.
- *Página*: page_secretaria/matricular_aluno/matricular_aluno.php
- *Formulário*: Inclui campos para selecionar um aluno já cadastrado, outro campo para selecionar uma turma já cadastrada, não podendo matricular o aluno em mais de uma turma do mesmo curso.




### 14. Editar matrícula aluno.
- *Descrição*: Permite visualizar e excluir alunos de uma turma, além de poder transferir alunos de uma turma a outra do mesmo curso.
- *Página*: page_secretaria/matricular_aluno/gerenciar_alunos_turma.php 
- *Formato de Exibição*: Os dados da relação são exibidos em uma tabela com os seguintes campos: 

| Campo | Descrição | 
|--------------------|------------------------------|
| Matrícula | Número da matrícula do aluno  | 
| Nome do aluno | Nome do aluno | 
| CPF do aluno |  CPF do aluno | 
| Ação | Excluir  | 
| Transferência | Opção de escolher uma nova turma do mesmo curso | 




- *Exemplo de Exibição*: 

| Matrícula  | Nome do aluno | CPF do aluno | Ação | Transferência |
|----------------|--------------------|---------------|---------------|---------------|
| 155387 | Emily Helena Alves| 162.376.877-26 | Excluir | Opção de selecionar uma turma do mesmo curso e transferir|






Página do professor


### 15. Login do professor
- Descrição: Permite que o professor acesse o sistema do professor.
- Página: `login/login_professor/login_professor.html`
- Funções: Verifica as credenciais e, após a autenticação, redireciona o usuário à página do professor.
- Formato de Exibição: O login é feito por meio de um formulário com os campos:
  
  | Campo       | Descrição                  |
  |-------------|----------------------------|
  | Matrícula| Identificação do usuário |
  | Senha       | Senha pessoal do usuário   |

- *Fluxo*: 
   - **Usuários Autenticados**: Após o login, o sistema redireciona o professor para a área `page_professor/page_professor.php`
         - **Usuários Não Autenticados**:São redirecionados para a área de login do professor novamente.



### 16. Dar notas aos alunos.
- *Descrição*: Permite o professor selecionar uma turma e matéria que ele está cadastrado, onde aparecerá em seguida os alunos dessa turma e matéria para ele adicionar 4 notas.
- *Página*: page_professor/page_professor.php
- *Formato de Exibição*: Os dados da relação são exibidos em uma tabela que está dentro de um accordion com a matrícula e o nome do aluno com os seguintes campos: 

Matrícula do aluno - nome do aluno
| Campo | Descrição | 
|--------------------|------------------------------|
| Nota 1 | Nota 1 do aluno | 
| Nota 2 | Nota 2 do aluno | 
| Nota 3 | Nota 3 do aluno | 
| Nota 4 | Nota 4 do aluno  | 
| Média | Média das 4 notas dadas pelo professor | 
| Situação | Situação do aluno (Reprovado, Em recuperação ou Aprovado | 
| Ações| Atualizar notas | 




- *Exemplo de Exibição*: 

155387 - Emily Helena Alves

| Nota 1 | Nota 2 | Nota 3 | Nota 4| Média | Situação  | Ações |
|----------------|--------------------|---------------|---------------|---------------|---------------|---------------|
| 10 | 10 | 10 | 9 | 9.75 | Aprovado | Atualizar notas |



Página do aluno


### 17. Login do aluno
- Descrição: Permite que o aluno acesse o sistema do aluno.
- Página: `login/login_aluno/login_aluno.html`
- Funções: Verifica as credenciais e, após a autenticação, redireciona o usuário à página do aluno.
- Formato de Exibição: O login é feito por meio de um formulário com os campos:
  
  | Campo       | Descrição                  |
  |-------------|----------------------------|
  | Matrícula| Identificação do usuário |
  | Senha       | Senha pessoal do usuário   |

- *Fluxo*: 
   - **Usuários Autenticados**: Após o login, o sistema redireciona o aluno para a área `page_aluno/page_aluno.php`
         - **Usuários Não Autenticados**:São redirecionados para a área de login do aluno novamente.




### 18. Visualizar suas notas.
- *Descrição*: Permite o aluno selecionar uma turma em que ele está matriculado para ver todas as suas notas nas matérias dessa turma..
- *Página*: page_aluno/page_aluno.php
- *Formato de Exibição*: As notas são exibidas em uma tabela com os seguintes campos: 


| Campo | Descrição | 
|--------------------|------------------------------|
| Matéria  | As matérias da turma | 
| Professor  | Os professores da turma |
| Nota 1 | Nota 1 do aluno | 
| Nota 2 | Nota 2 do aluno | 
| Nota 3 | Nota 3 do aluno | 
| Nota 4 | Nota 4 do aluno  | 
| Média | Média das 4 notas dadas pelo professor | 
| Situação | Situação do aluno (Reprovado, Em recuperação ou Aprovado | 


- *Exemplo de Exibição*: 


| Matéria | Professor | Nota 1 | Nota 2 | Nota 3 | Nota 4 | Média | Situação |
|----------------|--------------------|---------------|---------------|---------------|---------------|---------------|---------------|
| Matemática | Heitor Diego Cavalcanti | 10 | 10 | 10 | 10| 10| Aprovado |

## Perfil linkedin do grupo
- https://www.linkedin.com/in/lucas-braga-600331219?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app.
- https://www.linkedin.com/in/leandro-oliveira-99459b10a/.
- https://www.linkedin.com/in/samuel-ferreira-77b314271?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app.
- https://www.linkedin.com/in/joaquimcns?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app.
- https://br.linkedin.com/in/paulo-moreno-792585246.
## Demonstração

Utilizamos o localhost para repositório.


## Uso/Exemplos

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área de login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="images/logo_completo.png"> <!--Coloca o logo no topo da guia da página-->
</head>
<body>

  
<header class="topo_fundo">
    <div class="topo">
        
            <img src="images/UniSGE.png" alt="Logo" class="logo">
                <nav class="navigation">
                    <a href="#">Home</a>
                    <a href="#">Sobre nós</a>
                    <a href="#">Desenvolvedores</a>
                </nav>
    </div>
</header>

        <section class="login1">
        
            <div class="block_login1">
                <h1>Secretaria</h1>
                <div class="img_secretaria">
                <img src="images/secretaria_logo.jpg" alt="Logo da secretaria" >
                </div>
                <br>
                <div class="btn_container">
                    <a href="login/login_secretaria/login_secretaria.html" class="btn_login_secretaria">Entrar</a>
                    <a href="cadastro_secretaria/cad_secretaria.php" class="btn_login_secretaria">Cadastrar</a>
                </div>
            </div>  
       
        </section>

    <section class="login2">
        <div class="block_login2">
            <h1>Professor</h1>
            <div class="img_professor">
            <img src="images/professor_logo.jpg" alt="Logo do professor" >
            </div>
            <br>
            <a href="login/login_professor/login_professor.html" class="btn_login">Entrar</a>
        </div>  
    </section>

<section class="login3">
        
    <div class="block_login3">
        <h1>Estudante</h1>
        <div class="img_estudante">
        <img src="images/estudante_logo.jpg" alt="Imagem de estudante" >
        </div>
        <br>
        <a href="login/login_aluno/login_aluno.html" class="btn_login">Entrar</a>
    </div>  
</section>
    
    
    
</body>
</html>

## Licença

MIT License

Copyright (c) 2024 

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
