<?php
$servername = "localhost";  // Endereço do servidor
$username = "root";         // Nome de usuário do MySQL
$password = "";             // Senha do MySQL (se houver)
$dbname = "pizzaria";       // Nome do banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checando a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
