<?php
include('header.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Cliente - SENAIFLIX</title>
    <link rel="stylesheet" href="css/style.css"></head>
</head>
<body>
        
    <div class="form-container">
    <form action="clientes_cadastro_salvar.php" method="post">

            <div class="form-group">
            <h2>Cadastrar Cliente</h2>

                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" id="cpf" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" name="endereco" id="endereco" required>
            </div>
            <div class="form-group">
                <label for="bairro">Bairro:</label>
                <input type="text" name="bairro" id="bairro" required>
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" name="cidade" id="cidade" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" name="estado" id="estado" required>
            </div>
            <div class="form-group">
                <label for="cep">CEP:</label>
                <input type="text" name="cep" id="cep" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" id="telefone" required>
            </div>
            <div class="form-group">
                <button type="submit">Salvar</button>
            </div>
        </div>
    </form>
    <?php include('footer.php'); ?>
</body>
</html>
