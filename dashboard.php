<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

$user = $_SESSION['user'];

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
    <title>Dashboard - Controle de Estoque</title>
</head>
<body>
    <h2>Bem-vindo, <?php echo $user['username']; ?>!</h2>
    <a href="logout.php">Sair</a>
	
	<h3>Produtos</h3>
    <?php if ($user['role'] === 'master') : ?>
        <form method="post" action="add_product.php">
            <input type="text" name="descricao" placeholder="Descrição do Produto" required>
            <input type="number" name="quantidade" placeholder="Quantidade" required>
            <input type="submit" value="Adicionar Produto">
        </form>
    <?php endif; ?>
	
	<?php if ($user['role'] === 'master') : ?>
    <h1>asdasd</h1>
	<?php endif; ?>
    <p href="add_user.php">Adicionar Usuário</p><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Quantidade</th>
            <?php if ($user['role'] === 'master') : ?>
                <th>Ações</th>
            <?php endif; ?>
        </tr>
        <?php
        $query = "SELECT * FROM produtos";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) :
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['descricao']; ?></td>
            <td><?php echo $row['quantidade']; ?></td>
            <?php if ($user['role'] === 'master') : ?>
                <td>
                    <a href="delete_product.php?id=<?php echo $row['id']; ?>">Excluir</a>
                </td>
            <?php endif; ?>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>