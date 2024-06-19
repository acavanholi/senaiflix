<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $data_atualizacao = date('Y-m-d H:i:s'); 

    // Prepara a SQL para atualizar os dados do cliente
    $sql = "UPDATE clientes SET nome = ?, cpf = ?, endereco = ?, bairro = ?, cidade = ?, estado = ?, cep = ?, email = ?, telefone = ?, data_atualizacao = ? WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssssssssi", $nome, $cpf, $endereco, $bairro, $cidade, $estado, $cep, $email, $telefone, $data_atualizacao, $id);
        
        if ($stmt->execute()) {
            header("Location: clientes_listar.php");
        } else {
            echo "Erro ao atualizar: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Dados inválidos. Acesso negado.";
}
?>
