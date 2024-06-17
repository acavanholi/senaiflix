<?php
include('config.php');
include('header.php');

$id = $_GET['id'];
$sql = "SELECT * FROM assinaturas WHERE id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Assinatura - SENAIFLIX</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <h1>Editar Assinatura</h1>
        <form action="assinaturas_edita_salvar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <div class="form-group">
                <label for="id_cliente">Cliente:</label>
                <select name="id_cliente" id="id_cliente" required>
                    <?php
                    $clientes_sql = "SELECT id, nome FROM clientes";
                    $clientes_result = $conn->query($clientes_sql);
                    while($cliente = $clientes_result->fetch_assoc()):
                        $selected = ($row['id_cliente'] == $cliente['id']) ? 'selected' : '';
                    ?>
                        <option value="<?php echo $cliente['id']; ?>" <?php echo $selected; ?>><?php echo $cliente['nome']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="plano">Plano:</label>
                <input type="text" name="plano" id="plano" value="<?php echo $row['plano']; ?>" required>
            </div>

            <div class="form-group">
                <label for="data_inicio">Data Início:</label>
                <input type="date" name="data_inicio" id="data_inicio" value="<?php echo $row['data_inicio']; ?>" required>
            </div>

            <div class="form-group">
                <label for="data_fim">Data Fim:</label>
                <input type="date" name="data_fim" id="data_fim" value="<?php echo $row['data_fim']; ?>">
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status">
                    <option value="1" <?php echo ($row['status'] == 1) ? 'selected' : ''; ?>>Ativo</option>
                    <option value="0" <?php echo ($row['status'] == 0) ? 'selected' : ''; ?>>Inativo</option>
                </select>
            </div>

            <button type="submit">Salvar Alterações</button>
        </form>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
