<?php
include('config.php');

$id = $_POST['id'];
$id_cliente = $_POST['id_cliente'];
$plano = $_POST['plano'];
$data_inicio = $_POST['data_inicio'];
$data_fim = $_POST['data_fim'];
$status = $_POST['status'];
$data_atualizacao =$_POST['data_atualizacao'];



$sql = "UPDATE assinaturas SET 
            id_cliente = ?, 
            plano = ?, 
            data_inicio = ?, 
            data_fim = ?, 
            status = ?, 
            data_atualizacao = NOW() 
        WHERE id = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("isssii", $id_cliente, $plano, $data_inicio, $data_fim, $status, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Assinatura atualizada com sucesso.";
    } else {
        echo "Nenhuma alteração foi feita ou erro na atualização.";
    }
    $stmt->close();
} else {
    echo "Erro na preparação da consulta: " . $conn->error;
}

$conn->close();

header("Location: assinaturas_listar.php");
exit();
?>
