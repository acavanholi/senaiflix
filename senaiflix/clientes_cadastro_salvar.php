<?php
include('config.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$data_cadastro = date('Y-m-d H:i:s');

$sql = "INSERT INTO clientes (nome, email, cpf, endereco, data_cadastro) VALUES (?, ?, ?, ?, ?)";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("sssss", $nome, $email, $cpf, $endereco, $data_cadastro);
    if ($stmt->execute()) {
        header("Location: clientes_listar.php");
    } else {
        echo "Erro ao salvar: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
