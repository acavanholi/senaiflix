<?php
include('config.php');
include('header.php');

$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Clientes - SENAIFLIX</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="lista-container">
    <h1>Clientes</h1>

    <a href="clientes_cadastro.php">Cadastrar Novo Cliente</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['cpf']; ?></td>
                    <td><?php echo $row['endereco']; ?></td>
                    <td>
                        <a href="clientes_editar.php?id=<?php echo $row['id']; ?>">Editar</a>
                        <a href="clientes_remover.php?id=<?php echo $row['id']; ?>">Remover</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>