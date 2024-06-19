<?php
include('config.php');
include('header.php');

$sql = "SELECT id, titulo, descricao, ano_lancamento, genero, classificacao, data_cadastro, data_atualizacao, status FROM filmes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Filmes - SENAIFLIX</title>
    <link rel="stylesheet" href="css/style.css"></head>
</head>
<body>
<div class="lista-container">

    <h1>Filmes</h1>
    <a href="filmes_cadastro.php">Cadastrar Novo Filme</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Ano de Lançamento</th>
                <th>Gênero</th>
                <th>Classificação</th>
                <th>Cadastro</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['titulo']; ?>-</td>
                    <td><?php echo $row['descricao']; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($row['ano_lancamento'])); ?></td>
                    <td><?php echo $row['genero']; ?></td>
                    <td><?php echo $row['classificacao']; ?></td>
                    <td><?php echo date("d/m/Y H:i", strtotime($row['data_cadastro'])); ?></td>
                    <td>
                        <a href="filmes_editar.php?id=<?php echo $row['id']; ?>">Editar</a>
                        <a href="filmes_remover.php?id=<?php echo $row['id']; ?>">Remover</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
    <?php include('footer.php'); ?>
</body>
</html>
