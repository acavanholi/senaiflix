<?php
include('config.php');
include('header.php');


$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$ano_lancamento = date('Y-m-d H:i:s');
$genero = $_POST['genero'];
$classificacao = $_POST['classificacao'];
$data_cadastro = date('Y-m-d H:i:s');

$sql = "INSERT INTO filmes (titulo, descricao, ano_lancamento, genero, classificacao, data_cadastro) VALUES (?, ?, ?, ?, ?, ?)";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("ssssss", $titulo, $descricao, $ano_lancamento, $genero, $classificacao, $data_cadastro);
    if ($stmt->execute()) {
        echo "<br><h3>Filme cadastrado com sucesso!</h3>";
    } else {
        echo "<br><h3>Erro ao cadastrar filme: " . $stmt->error . "</h3>";
    }
    $stmt->close();
} else {
    echo "<br><h3>Erro na preparação da consulta: " . $conn->error . "</h3>";
}
$conn->close();

include('footer.php');
?>


