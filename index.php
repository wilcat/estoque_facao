<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user'] = $user;
        header('Location: dashboard.php');
        exit();
    } else {
        $error = "Usuário ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
    <title>Login - Controle de Estoque</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Usuário" required><br>
        <input type="password" name="password" placeholder="Senha" required><br>
        <input type="submit" value="Entrar">
    </form>
    <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
</body>
</html>
