<?php
class Database {
    private $host = 'localhost'; // Endereço do servidor de banco de dados
    private $db = 'escola'; // Nome do banco de dados
    private $user = 'root'; // Usuário para conexão
    private $pass = ''; // Senha do usuário
    private $port = 3307; // Porta para conexão com o MySQL
    private $pdo; // A variável que armazenará a conexão PDO

    // Método para estabelecer a conexão com o banco de dados
    public function connect() {
        try {
            // Cria a string de conexão DSN
            $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->db";
            // Cria uma nova instância PDO
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            // Define o modo de erro para exceções
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Exibe uma mensagem de erro se a conexão falhar
            echo "Erro na conexão: " . $e->getMessage();
        }
    }

    // Método para obter a conexão PDO
    public function getConnection() {
        return $this->pdo; // Retorna a instância PDO
    }
}
?>


















































