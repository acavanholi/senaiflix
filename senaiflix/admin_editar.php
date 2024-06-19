<?php
include('config.php');

$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuarios= $result->fetch_assoc();
    $stmt->close();
}
$conn->close();
?>

<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Administrador - SENAIFLIX</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <div class="form-container">
        <form method="post" action="admin_editar_salvar.php">

            <div class="form-group">
            <h2>Editar Administrador</h2>

                <label for="nome">Nome:</label>
                <input type="text" value="<?php echo htmlspecialchars($usuarios['nome']); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" value="<?php echo htmlspecialchars($usuarios['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="text">Usuário:</label>
                <input type="text" value="<?php echo htmlspecialchars($usuarios['usuario']); ?>" required>
            </div>

            <div class="form-group">
                <label for="text">Mudar Senha:</label>
                <input type="password" value="<?php echo htmlspecialchars($usuarios['usuario']); ?>" required>
            </div>


            <div class="form-group">
                <button type="submit">Salvar Alterações</button>
            </div>
        </div>
    </form>
    <?php include('footer.php'); ?>
</body>
</html>
