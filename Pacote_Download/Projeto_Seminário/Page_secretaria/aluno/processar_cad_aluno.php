<!-- PROCESSA OS DADOS DE CADASTRO DO ALUNO -->

<?php 

session_start(); 



    if(isset($_POST['submit'])) // Se houver uma váriavel submit ele vai salvar os dados
  
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
 // addslashes é usada para escapar caracteres especiais em uma string
 $aluno_nome_completo = addslashes($_POST['aluno_nome_completo']);
 $aluno_data_nascimento = addslashes($_POST['aluno_data_nascimento']);
 $aluno_cpf = addslashes($_POST['aluno_cpf']);
 $aluno_cep = addslashes($_POST['aluno_cep']);
 $aluno_estado = addslashes($_POST['aluno_estado']);
 $aluno_cidade = addslashes($_POST['aluno_cidade']);
 $aluno_logradouro = addslashes($_POST['aluno_logradouro']);
 $aluno_bairro = addslashes($_POST['aluno_bairro']);
 $aluno_numero = addslashes($_POST['aluno_numero']);
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
   // print_r('CEP: ' . $_POST['aluno_cep']);
  // print_r("<br>");
  // print_r('Estado: ' . $_POST['aluno_estado']);
  // print_r("<br>");
  // print_r('Cidade: ' . $_POST['aluno_cidade']);
  // print_r("<br>");
  // print_r('Endereço: ' . $_POST['aluno_logradouro']);
  // print_r("<br>");
  // print_r('Bairro: ' . $_POST['aluno_bairro']);
  // print_r("<br>");
  // print_r('Número: ' . $_POST['aluno_numero']);
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
// $conexao é do arquivo config.php
$query = "INSERT INTO aluno (aluno_nome_completo, aluno_data_nascimento, aluno_cpf, aluno_cep, aluno_estado, aluno_cidade, aluno_logradouro, aluno_bairro, aluno_numero, aluno_matricula, aluno_senha_acesso, id_instituicao) VALUES ('$aluno_nome_completo', '$aluno_data_nascimento', '$aluno_cpf', '$aluno_cep', '$aluno_estado', '$aluno_cidade', '$aluno_logradouro', '$aluno_bairro', '$aluno_numero', '$aluno_matricula', '$aluno_senha_hash', '$id_instituicao')";


//  // Verificar se o aluno foi inserido corretamente
if (mysqli_query($conexao, $query)) {
    
    echo "<script>alert('Aluno(a) cadastrado com sucesso! Matrícula: $aluno_matricula, Senha: $aluno_senha'); window.location='cad_aluno.php'</script>";

} else {
    echo "<script>alert('Erro ao cadastrar o(a) aluno(a): " . mysqli_error($conexao). " '); window.location='cad_aluno.php'</script>";

}

}

}

?>
