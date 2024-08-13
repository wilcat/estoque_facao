<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'master') {
    header('Location: index.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM produtos WHERE id=$id";
    $conn->query($query);
}

header('Location: dashboard.php');
exit();
?>
