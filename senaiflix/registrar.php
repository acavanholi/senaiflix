<?php
include('config.php');
include('header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografa a senha
    $email = $_POST['email'];
    
    $sql = "INSERT INTO usuarios (nome, usuario, senha, email, data_cadastro, status) VALUES (?, ?, ?, ?, NOW(), 1)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssss", $nome, $usuario, $senha, $email);
        if ($stmt->execute()) {
            echo "<br><h3>Administrador cadastrado com sucesso!</h3>";
        } else {
            echo "<p>Erro ao cadastrar administrador: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p>Erro na preparação da consulta: " . $conn->error . "</p>";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registrar Administrador</title>
    <link rel="stylesheet" href="css/style.css"> 
</head>

<body>


    <div class="form-container">
        <form method="post" action="">
            <div class="form-group">
            <h2>Registrar Administrador</h2>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="usuario">Usuário:</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="submit">Registrar</button>
        </form>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
