<?php
include('header.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Filme - SENAIFLIX</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <form action="filmes_cadastro_salvar.php" method="post">
        <h2>Cadastrar Filme</h2>

        <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <br>
                <textarea id="descricao" name="descricao" required></textarea>
            </div>
            <div class="form-group">
                <label for="ano_lancamento">Ano de Lançamento:</label>
                <input type="number" id="ano_lancamento" name="ano_lancamento" " required>
            </div>
            <div class="form-group">
                <label for="genero">Gênero:</label>
                <input type="text" id="genero" name="genero" required>
            </div>
            <div class="form-group">
                <label for="classificacao">Classificação:</label>
                <input type="text" id="classificacao" name="classificacao" required>
            </div>
            <button type="submit">Salvar</button>
        </form>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
