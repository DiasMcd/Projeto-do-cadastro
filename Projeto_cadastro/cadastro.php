<?php
// Importa a classe de conexão com o banco de dados
require_once 'db.php';
$database = new Database(); // Cria uma nova instância da classe Database
$database->connect(); // Estabelece a conexão com o banco de dados
$pdo = $database->getConnection(); // Obtém a conexão PDO

// Verifica se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    // Prepara e executa a instrução SQL para inserir os dados na tabela "alunos"
    $stmt = $pdo->prepare("INSERT INTO alunos (nome, idade, email, curso) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nome, $idade, $email, $curso]);

    // Redireciona para a página principal após a inserção
    header("Location: index.php");
    exit(); // Encerra o script para evitar execução adicional
}
?>