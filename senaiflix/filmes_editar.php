<?php
include('config.php');
include('header.php');


// Verifica se o ID do filme foi passado na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para obter os dados do filme
    $sql = "SELECT * FROM filmes WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $filme = $result->fetch_assoc();
        $stmt->close();
    } else {
        echo "<p>Erro na preparação da consulta: " . $conn->error . "</p>";
    }
} else {
    echo "<p>ID do filme não fornecido.</p>";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Filme - Senaiflix</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Editar Filme</h2>

    <div class="form-container">
        <form action="filmes_editar_salvar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $filme['id']; ?>">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($filme['titulo']); ?>" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <br>
                <textarea id="descricao" name="descricao" required><?php echo htmlspecialchars($filme['descricao']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="ano_lancamento">Ano de Lançamento:</label>
                <input type="date" id="ano_lancamento" name="ano_lancamento" value="<?php echo htmlspecialchars($filme['ano_lancamento']); ?>" required>
            </div>
            <div class="form-group">
                <label for="genero">Gênero:</label>
                <input type="text" id="genero" name="genero" value="<?php echo htmlspecialchars($filme['genero']); ?>" required>
            </div>
            <div class="form-group">
                <label for="classificacao">Classificação:</label>
                <input type="text" id="classificacao" name="classificacao" value="<?php echo htmlspecialchars($filme['classificacao']); ?>" required>
            </div>
            <button type="submit">Salvar Alterações</button>
        </form>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
