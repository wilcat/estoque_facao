<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'email' => $email, 'id' => $id]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Usuário</h1>
        <form method="POST" action="edit.php?id=<?php echo $user['id']; ?>">
            <input type="text" name="name" value="<?php echo $user['name']; ?>" required>
            <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
            <button type="submit" name="update">Atualizar Usuário</button>
        </form>
    </div>
</body>
</html>
