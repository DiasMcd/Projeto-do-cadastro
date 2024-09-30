<?php
// db.php
$host = 'localhost';
$usuario = 'novo-usuario'; // Altere para seu usuário do MySQL
$senha = '';     // Altere para sua senha do MySQL
$banco = 'escola';


$conexao = new mysqli($host, $usuario, $senha, $banco, 3307);

// Testa a conexão
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}
?>




















































