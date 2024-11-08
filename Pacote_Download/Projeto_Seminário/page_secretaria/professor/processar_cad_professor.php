<!-- PROCESSA O CADASTRO DO PROFESSOR -->

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
 $professor_nome_completo = addslashes($_POST['professor_nome_completo']);
 $professor_data_nascimento = addslashes($_POST['professor_data_nascimento']);
 $professor_cpf = addslashes($_POST['professor_cpf']);
 $professor_cep = addslashes($_POST['professor_cep']);
 $professor_estado = addslashes($_POST['professor_estado']);
 $professor_cidade = addslashes($_POST['professor_cidade']);
 $professor_logradouro = addslashes($_POST['professor_logradouro']);
 $professor_bairro = addslashes($_POST['professor_bairro']);
 $professor_numero = addslashes($_POST['professor_numero']);
 $professor_matricula = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT); // Gera matrícula aleatória
 $professor_senha = gerarSenha();
 $professor_senha_hash = password_hash($professor_senha, PASSWORD_DEFAULT); // Hash da senha

// Capturar o id_instituicao da sessão
$id_instituicao = $_SESSION['id_instituicao'];


 // Verificar se o CPF já existe no banco de dados
 $verifica_cpf = "SELECT * FROM professor WHERE professor_cpf = '$professor_cpf'";
 $resultado = mysqli_query($conexao, $verifica_cpf);

  //TESTE PARA VER SE ESTÁ FUNCIONANDO
//   print_r('Nome: '.$_POST['professor_nome_completo']);
//   print_r("<br>");
//   print_r('Data de nascimento: '.$_POST['professor_data_nascimento']);
//   print_r("<br>");
//   print_r('CPF: ' . $_POST['professor_cpf']);
//   print_r("<br>");
//   print_r('CEP: ' . $_POST['professor_cep']);
//   print_r("<br>");
//   print_r('Estado: ' . $_POST['professor_estado']);
//   print_r("<br>");
//   print_r('Cidade: ' . $_POST['professor_cidade']);
//   print_r("<br>");
//   print_r('Endereço: ' . $_POST['professor_logradouro']);
//   print_r("<br>");
//   print_r('Bairro: ' . $_POST['professor_bairro']);
//   print_r("<br>");
//   print_r('Número: ' . $_POST['professor_numero']);
//   print_r("<br>");
//   print_r('Matrícula: ' . $professor_matricula);
 
//   print_r("<br>");
//   print_r('Senha: ' . $professor_senha);
//   print_r("<br>");
//   print_r('Senha hash: ' . $professor_senha_hash);
//   print_r("<br>");



if (mysqli_num_rows($resultado) > 0) {
    echo "<script>
            alert('Erro: CPF já cadastrado!');
            window.location='cad_professor.php';
          </script>";
} else {
// $conexao é do arquivo config.php
$query = "INSERT INTO professor (professor_nome_completo, professor_data_nascimento, professor_cpf, professor_cep, professor_estado, professor_cidade, professor_logradouro, professor_bairro, professor_numero, professor_matricula, professor_senha_acesso, id_instituicao) VALUES ('$professor_nome_completo', '$professor_data_nascimento', '$professor_cpf', '$professor_cep', '$professor_estado', '$professor_cidade', '$professor_logradouro', '$professor_bairro', '$professor_numero', '$professor_matricula', '$professor_senha_hash', '$id_instituicao')";


//  // Verificar se o professor foi inserido corretamente
if (mysqli_query($conexao, $query)) {
    // echo "<script>alert('Usuário não encontrado.');</script>"; // Mensagem de erro
    echo "<script>alert('Professor(a) cadastrado com sucesso! Matrícula: $professor_matricula, Senha: $professor_senha'); window.location='cad_professor.php'</script>";

} else {
    echo "<script>alert('Erro ao cadastrar o(a) professor(a): " . mysqli_error($conexao). " '); window.location='cad_professor.php'</script>";

}

}

}

?>
