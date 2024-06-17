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
        echo "<p>Assinatura cadastrada com sucesso!</p>";
        echo '<p><a href="assinaturas_listar.php">VOLTAR PARA ASSINATURAS</a></p>'; // Link para a lista de assinaturas
    } else {
        echo "<p>Erro ao cadastrar assinatura: " . $stmt->error . "</p>";
    }
    
    $stmt->close();
} else {
    echo "<p>Erro na preparação da consulta: " . $conn->error . "</p>";
}
include('footer.php');
$conn->close();
?>
