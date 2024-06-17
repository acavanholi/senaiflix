<?php
include('config.php');

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$data_atualizacao = date('Y-m-d H:i:s');

$sql = "UPDATE clientes SET nome = ?, email = ?, cpf = ?, endereco = ?, data_atualizacao = ? WHERE id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("sssssi", $nome, $email, $cpf, $endereco, $data_atualizacao, $id);
    if ($stmt->execute()) {
        header("Location: clientes_listar.php");
    } else {
        echo "Erro ao atualizar: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
