<?php
include('config.php');

$id = $_GET['id'];
$sql = "DELETE FROM assinaturas WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Assinatura removida com sucesso!";
} else {
    echo "Erro ao remover assinatura: " . $conn->error;
}

$conn->close();
header("Location: assinaturas_listar.php");
exit();
?>
