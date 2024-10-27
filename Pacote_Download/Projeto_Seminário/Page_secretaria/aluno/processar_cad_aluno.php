<?php 

session_start(); 



    if(isset($_POST['submit'])) // Se houver uma váriavel submit ele vai salvar os dados
    // primeiro tem que verificar um por um:
    {

    
      //Incluindo a conexão com o arquivo config.php que faz conexão com o banco de dados
      include_once('../../config.php');



// Verificar se o id_instituicao está na sessão
if (!isset($_SESSION['id_instituicao'])) {
    echo "Erro: ID da instituição não encontrado. Faça login novamente.";
    exit();
}     

 // Função para gerar uma senha aleatória
 function gerarSenha($tamanho = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*'; // Caracteres permitidos
    return substr(str_shuffle(str_repeat($chars, ceil($tamanho / strlen($chars)))), 1, $tamanho); // Gera senha aleatória
}

 //Transformando os input em variáveis
 $aluno_nome_completo = $_POST['aluno_nome_completo'];
 $aluno_data_nascimento = $_POST['aluno_data_nascimento'];
 $aluno_cpf = $_POST['aluno_cpf'];
 $aluno_estado = $_POST['aluno_estado'];
 $aluno_cidade = $_POST['aluno_cidade'];
 $aluno_endereco = $_POST['aluno_endereco'];
 $aluno_matricula = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT); // Gera matrícula aleatória
 $aluno_senha = gerarSenha();
 $aluno_senha_hash = password_hash($aluno_senha, PASSWORD_DEFAULT); // Hash da senha

// Capturar o id_instituicao da sessão
$id_instituicao = $_SESSION['id_instituicao'];


 // Verificar se o CPF já existe no banco de dados
 $verifica_cpf = "SELECT * FROM aluno WHERE aluno_cpf = '$aluno_cpf'";
 $resultado = mysqli_query($conexao, $verifica_cpf);

  // //TESTE PARA VER SE ESTÁ FUNCIONANDO
  // print_r('Nome: '.$_POST['aluno_nome_completo']);
  // print_r("<br>");
  // print_r('Data de nascimento: '.$_POST['aluno_data_nascimento']);
  // print_r("<br>");
  // print_r('CPF: ' . $_POST['aluno_cpf']);
  // print_r("<br>");
  // print_r('Estado: ' . $_POST['aluno_estado']);
  // print_r("<br>");
  // print_r('Cidade: ' . $_POST['aluno_cidade']);
  // print_r("<br>");
  // print_r('Endereço: ' . $_POST['aluno_endereco']);
  // print_r("<br>");
  // print_r('Matrícula: ' . $aluno_matricula);
 
  // print_r("<br>");
  // print_r('Senha: ' . $aluno_senha);
  // print_r("<br>");
  // print_r('Senha hash: ' . $aluno_senha_hash);
  // print_r("<br>");



if (mysqli_num_rows($resultado) > 0) {
    echo "<script>
            alert('Erro: CPF já cadastrado!');
            window.location='cad_aluno.php';
          </script>";
} else {
// $conexao é do arquivo config.php, depois fical igual ao insert into do banco de dados, primeiro o comando, depois a tabela, depois as colunas, depois os valores.
$query = "INSERT INTO aluno (aluno_nome_completo, aluno_data_nascimento, aluno_cpf, aluno_estado, aluno_cidade, aluno_endereco, aluno_matricula, aluno_senha_acesso, id_instituicao) VALUES ('$aluno_nome_completo', '$aluno_data_nascimento', '$aluno_cpf', '$aluno_estado', '$aluno_cidade', '$aluno_endereco', '$aluno_matricula', '$aluno_senha_hash', '$id_instituicao')";


//  // Verificar se o aluno foi inserido corretamente
if (mysqli_query($conexao, $query)) {
    // echo "<script>alert('Usuário não encontrado.');</script>"; // Mensagem de erro
    echo "<script>alert('Aluno(a) cadastrado com sucesso! Matrícula: $aluno_matricula, Senha: $aluno_senha'); window.location='cad_aluno.php'</script>";
//     // Redirecionar para uma página, se necessário
//     // header("Location: listar_alunos.php");
} else {
    echo "<script>alert('Erro ao cadastrar o(a) aluno(a): " . mysqli_error($conexao). " '); window.location='cad_aluno.php'</script>";

}

}

}

?>
