<?php
require 'db.php'; // Arquivo que contém a função de conexão com o banco de dados

// Define o tipo de resposta como JSON
header('Content-Type: application/json');

// Obtém o método HTTP e a URI da requisição
$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Rotas da API
if ($method == 'GET' && $uri == '/api/professores') {
    listarProfessores(); // Chama a função para listar todos os professores
} elseif ($method == 'POST' && $uri == '/api/professores') {
    cadastrarProfessor(); // Chama a função para cadastrar um novo professor
} elseif ($method == 'PUT' && preg_match('/\/api\/professores\/(\d+)/', $uri, $matches)) {
    atualizarProfessor($matches[1]); // Chama a função para atualizar o professor pelo ID
} elseif ($method == 'DELETE' && preg_match('/\/api\/professores\/(\d+)/', $uri, $matches)) {
    deletarProfessor($matches[1]); // Chama a função para deletar o professor pelo ID
} else {
    // Caso nenhuma rota seja encontrada
    http_response_code(404);
    echo json_encode(["message" => "Rota não encontrada"]);
}
