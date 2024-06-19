<?php
include('config.php');
include('header.php');


$id_cliente = $_POST['id_cliente'];
$plano = $_POST['plano'];
$data_inicio = date('Y-m-d H:i:s'); 
$status = 1; 

$sql = "INSERT INTO assinaturas (id_cliente, plano, data_inicio, data_cadastro, status) VALUES (?, ?, ?, NOW(), ?)";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("issi", $id_cliente, $plano, $data_inicio, $status);
    
    if ($stmt->execute()) {
        echo "<h3><br>Assinatura cadastrada com sucesso!</h3>";
    } else {
        echo "<h3>Erro ao cadastrar assinatura: " . $stmt->error . "</h3>";
    }
    
    $stmt->close();
} else {
    echo "<h3>Erro na preparação da consulta: " . $conn->error . "</h3>";
}
include('footer.php');
$conn->close();
?>
