<?php
include 'db.php'; // Incluindo o arquivo db.php

$db = new Database();
$db->connect(); // Estabelecendo a conexão

$conexao = $db->getConnection(); // Obtendo a conexão

if ($conexao) {
    // Exemplo de consulta
    $stmt = $conexao->query("SELECT * FROM alunos");
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Exiba os resultados
    foreach ($result as $aluno) {
        echo "Nome: " . $aluno['nome'] . "<br>";
    }
} else {
    echo "Falha na conexão!";
}
?>