<?php
include('header.php');
include('config.php'); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Assinatura - SENAIFLIX</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <form action="assinaturas_cadastro_salvar.php" method="post">

            <div class="form-group">
            <h2>Cadastrar Assinatura</h2>

                <label for="id_cliente">Cliente:</label>
                <select name="id_cliente" id="id_cliente" required>
                    <?php
                    $clientes_sql = "SELECT id, nome FROM clientes";
                    $clientes_result = $conn->query($clientes_sql);

                    if ($clientes_result->num_rows > 0) {
                        while ($cliente = $clientes_result->fetch_assoc()):
                    ?>
                            <option value="<?php echo $cliente['id']; ?>"><?php echo htmlspecialchars($cliente['nome']); ?></option>
                    <?php
                        endwhile;
                    } else {
                        echo "<option value=''>Nenhum cliente encontrado</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="plano">Plano:</label>
                <input type="text" id="plano" name="plano" required>
            </div>
            <div class="form-group">
                <label for="data_inicio">Data Início:</label>
                <input type="date" id="data_inicio" name="data_inicio" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
            <div class="form-group">
                <label for="data_fim">Data Fim:</label>
                <input type="date" id="data_fim" name="data_fim" >
            </div>

            <button type="submit">Salvar</button>
        </form>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
