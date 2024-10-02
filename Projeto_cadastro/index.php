<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
    <link rel="stylesheet" href="css\style.css"> <!-- Link para o CSS -->
    <?php 
        require_once 'db.php'; // Importa a classe de conexão com o banco de dados
        $database = new Database(); // Cria uma nova instância da classe Database
        $database->connect(); // Estabelece a conexão com o banco de dados
        $pdo = $database->getConnection(); // Obtém a conexão PDO
    ?>
</head>
<body>
    <div class="box">
        <h1>Cadastro de alunos</h1>
        <!-- Formulário de Cadastro -->
        <form action="cadastro.php" method="POST"> <!-- Envia os dados para cadastro.php -->
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br> <!-- Campo para o nome -->

            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" required><br> <!-- Campo para a idade -->

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br> <!-- Campo para o email -->

            <label for="curso">Curso:</label>
            <input type="text" id="curso" name="curso" required><br> <!-- Campo para o curso -->

            <input type="submit" value="Cadastrar"> <!-- Botão de envio -->
        </form>
    </div>

    <!-- Listagem de Alunos -->
    <h2>Alunos Cadastrados</h2>
    <table border="1"> <!-- Cria uma tabela para exibir os alunos -->
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Email</th>
            <th>Curso</th>
            <th>Ação</th>
        </tr>
        <?php
        // Prepara e executa a consulta para obter todos os alunos
        $stmt = $pdo->prepare("SELECT * FROM alunos");
        $stmt->execute();
        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtém os dados como um array associativo
        foreach ($alunos as $aluno) { // Itera sobre cada aluno
            echo "<tr>"; // Início da linha da tabela
            echo "<td>" . $aluno['id'] . "</td>"; // Exibe o ID
            echo "<td>" . $aluno['nome'] . "</td>"; // Exibe o nome
            echo "<td>" . $aluno['idade'] . "</td>"; // Exibe a idade
            echo "<td>" . $aluno['email'] . "</td>"; // Exibe o email
            echo "<td>" . $aluno['curso'] . "</td>"; // Exibe o curso
            echo "<td><a href='deletar.php?id=" . $aluno['id'] . "'>Excluir</a></td>"; // Link para excluir o aluno
            echo "</tr>"; // Fim da linha da tabela
        }
        ?>
    </table>
</body>
</html>