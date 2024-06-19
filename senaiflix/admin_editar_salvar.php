<?php
include('config.php');

$id = $_POST['id'];
$email = $_POST['email'];
$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$status = $_POST['status'];
$senha = $_POST['senha'];

if (!empty($senha)) {
    $senha_hash = password_hash($senha, PASSWORD_BCRYPT);
    $sql = "UPDATE usuarios SET nome = ?, email = ?, usuario = ?, senha = ?, status = ? WHERE id = ?";
} else {
    $sql = "UPDATE usuarios SET nome = ?, email = ?, usuario = ?, status = ? WHERE id = ?";
}

if ($stmt = $conn->prepare($sql)) {
    if (!empty($senha)) {
        $stmt->bind_param("ssssii", $nome, $email, $usuario, $senha_hash, $status, $id);
    } else {
        $stmt->bind_param("sssii", $nome, $email, $usuario, $status, $id);
    }
    
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Alteração realizada com sucesso.";
    } else {
        echo "Nenhuma alteração foi feita ou erro na atualização.";
    }
    $stmt->close();
} else {
    echo "Erro na preparação da consulta: " . $conn->error;
}

$conn->close();

header("Location: admin_listar.php");
exit();
?>
