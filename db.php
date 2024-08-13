<?php
$servername = "localhost";
$username = "wilson"; // Nome de usuário do seu banco de dados
$password = "230885"; // Senha do seu banco de dados
$dbname = "estoque_produtos";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
