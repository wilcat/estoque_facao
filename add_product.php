<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'master') {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];

    $query = "INSERT INTO produtos (descricao, quantidade) VALUES ('$descricao', $quantidade)";
    $conn->query($query);
}

header('Location: dashboard.php');
exit();
?>
