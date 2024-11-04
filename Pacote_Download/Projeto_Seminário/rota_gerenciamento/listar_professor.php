function listarProfessores() {
    $pdo = getConnection();
    
    $stmt = $pdo->query("SELECT * FROM professor");
    $professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($professores);
}
