<?php
// deletar.php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conexao->prepare("DELETE FROM alunos WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php?msg=Aluno excluído com sucesso!");
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
}
?>