<?php
include('config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT id, nome, senha FROM usuarios WHERE usuario = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $usuario);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                if (password_verify($senha, $row['senha'])) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['nome'] = $row['nome'];
                    
                    header("Location: index.php");
                    exit();
                } else {
                    echo "<p>Senha incorreta.</p>";
                }
            } else {
                echo "<p>Usuário não encontrado.</p>";
            }
        } else {
            echo "<p>Erro na execução da consulta: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p>Erro na preparação da consulta: " . $conn->error . "</p>";
    }
    $conn->close();
} else {
    header("Location: login.php");
    exit();
}
?>
