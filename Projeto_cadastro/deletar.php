<?php
// Importa a classe de conexão com o banco de dados
require_once 'db.php';
$database = new Database(); // Cria uma nova instância da classe Database
$database->connect(); // Estabelece a conexão com o banco de dados
$pdo = $database->getConnection(); // Obtém a conexão PDO

// Verifica se o parâmetro 'id' está presente na URL
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Captura o ID do aluno a ser deletado

    // Prepara e executa a instrução SQL para deletar o aluno com o ID especificado
    $stmt = $pdo->prepare("DELETE FROM alunos WHERE id = ?");
    $stmt->execute([$id]); // Executa a consulta, passando o ID como parâmetro

    // Redireciona para a página principal após a exclusão
    header("Location: index.php");
    exit(); // Encerra o script para evitar execução adicional
}
?>