<?php
include('config.php');
include('header.php');

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Administradores - SENAIFLIX</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="lista-container">
    <h1>Administradores</h1>

    <a href="registrar.php">Registrar Novo Administrador</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Usuário</th>
                <th>Email</th> 
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['usuario']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="admin_editar.php?id=<?php echo $row['id']; ?>">Editar</a>
                        <a href="admin_remover.php?id=<?php echo $row['id']; ?>">Remover</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>