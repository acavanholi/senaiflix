<?php
include('config.php');
include('header.php');


// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $id = intval($_POST['id']);
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $ano_lancamento = $_POST['ano_lancamento'];
    $genero = $_POST['genero'];

    // Prepara a SQL para atualizar os dados do filme
    $sql = "UPDATE filmes SET titulo = ?, descricao = ?, ano_lancamento = ?, genero = ? WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssi", $titulo, $descricao, $ano_lancamento, $genero, $id);
        
        if ($stmt->execute()) {
            echo "<p>Filme atualizado com sucesso!</p>";
        } else {
            echo "<p>Erro ao atualizar filme: " . $stmt->error . "</p>";
        }
        
        $stmt->close();
    } else {
        echo "<p>Erro na preparação da consulta: " . $conn->error . "</p>";
    }

    $conn->close();
} else {
    echo "<p>Dados inválidos. Acesso negado.</p>";
}
include('footer.php');

?>
