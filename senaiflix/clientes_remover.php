<?php
include('config.php');

$id = $_GET['id'];
$sql = "DELETE FROM clientes WHERE id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: clientes_listar.php");
    } else {
        echo "Erro ao remover: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
