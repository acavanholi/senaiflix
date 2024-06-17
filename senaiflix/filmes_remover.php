<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM filmes WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Filme removido com sucesso!";
        } else {
            echo "Erro ao remover filme: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Erro ao preparar a consulta: " . $conn->error;
    }
} else {
    echo "ID do filme não fornecido.";
}

$conn->close();
header("Location: filmes_listar.php");
exit();
?>
