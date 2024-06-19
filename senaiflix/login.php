<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Senaiflix</title>
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
<div class="login-container">
    <h1>SENAIFLIX</h1>
    <div class="form-container">
        <form action="login_process.php" method="post">
            
            <h2>Login</h2>
 
            <label for="usuario">Usuário:</label>
                <input type="text" name="usuario" id="usuario" required>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" required>
                <button type="submit">Entrar</button>

            </div>
        </form>
    </div>
</div>

    <?php include('footer.php'); ?>
</body>
</html>
