<?php
include('config.php');
include('header.php');


$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$ano_lancamento = $_POST['ano_lancamento'];
$genero = $_POST['genero'];
$classificacao = $_POST['classificacao'];
$data_cadastro = date('Y-m-d H:i:s');

$sql = "INSERT INTO filmes (titulo, descricao, ano_lancamento, genero, classificacao, data_cadastro) VALUES (?, ?, ?, ?, ?, ?)";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("ssssss", $titulo, $descricao, $ano_lancamento, $genero, $classificacao, $data_cadastro);
    if ($stmt->execute()) {
        echo "<p>Filme cadastrado com sucesso!</p>";
    } else {
        echo "<p>Erro ao cadastrar filme: " . $stmt->error . "</p>";
    }
    $stmt->close();
} else {
    echo "<p>Erro na preparação da consulta: " . $conn->error . "</p>";
}
$conn->close();

include('footer.php');
?>


