<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'master') {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Considere usar password_hash para maior segurança
    $role = $_POST['role'];

    $query = "INSERT INTO usuarios (username, password, role) VALUES ('$username', '$password', '$role')";
    $conn->query($query);

    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
    <title>Adicionar Usuário - Controle de Estoque</title>
</head>
<body>
    <h2>Adicionar Novo Usuário</h2>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Nome de Usuário" required><br>
        <input type="password" name="password" placeholder="Senha" required><br>
        <select name="role" required>
            <option value="viewer">Visualizador</option>
            <option value="master">Master</option>
        </select><br>
        <input type="submit" value="Adicionar Usuário">
    </form>
    <a href="dashboard.php">Voltar ao Dashboard</a>
</body>
</html>
