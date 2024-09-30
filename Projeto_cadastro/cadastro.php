<?php
// cadastro.php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    $stmt = $conexao->prepare("INSERT INTO alunos (nome, idade, email, curso) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $nome, $idade, $email, $curso);

    if ($stmt->execute()) {
        header("Location: index.php?msg=Aluno cadastrado com sucesso!");
    } else {
        echo "Erro: " . $stmt->error;
    }
}
?>