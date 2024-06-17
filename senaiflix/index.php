<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>SENAIFLIX</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<a href="logout.php">Logout</a>

    <h1>SENAIFLIX</h1>
    <h2>Painel Administrativo</h2>
    <div class="nav-container">
        <ul class="menu">
            <li class="menu-item"><a href="clientes_listar.php">Clientes</a></li>
            <li class="menu-item"><a href="filmes_listar.php">Filmes</a></li>
            <li class="menu-item"><a href="assinaturas_listar.php">Assinaturas</a></li>
            <li class="menu-item"><a href="registrar.php">Registrar Administrador</a></li>
        </ul>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
