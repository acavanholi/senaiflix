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
            echo "<br><h3>Filme atualizado com sucesso!</h3>";
        } else {
            echo "<br><h3>Erro ao atualizar filme: " . $stmt->error . "</h3";
        }
        
        $stmt->close();
    } else {
        echo "<br><h3>Erro na preparação da consulta: " . $conn->error . "</h3>";
    }

    $conn->close();
} else {
    echo "<br><h3>Dados inválidos. Acesso negado.</h3>";
}
include('footer.php');

?>
