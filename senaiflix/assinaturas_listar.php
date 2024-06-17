<?php
include('config.php');
include('header.php');

$sql = "SELECT assinaturas.id, clientes.nome, assinaturas.plano, assinaturas.data_inicio, assinaturas.data_cadastro, assinaturas.data_atualizacao, assinaturas.data_fim, assinaturas.status 
        FROM assinaturas 
        JOIN clientes ON assinaturas.id_cliente = clientes.id";

$result = $conn->query($sql);

if (!$result) {
    echo "Erro ao executar a consulta: " . $conn->error;
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Assinaturas - SENAIFLIZ</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Assinaturas</h1>
    <a href="assinaturas_cadastro.php">Cadastrar Nova Assinatura</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Data de Cadastro</th>
                <th>Plano</th>
                <th>Data de Início</th>
                <th>Data Fim</th>
                <th>Última Atualização</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo date("d/m/Y H:i", strtotime($row['data_cadastro'])); ?></td>
                    <td><?php echo $row['plano']; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($row['data_inicio'])); ?></td>
                    <td>
                        <?php if ($row['status'] == 1): ?>
                            <span style="color: gray;">N/A</span>
                        <?php else: ?>
                            <?php echo date("d/m/Y", strtotime($row['data_fim'])); ?>
                        <?php endif; ?>
                    </td>
                    <td><?php echo date("d/m/Y H:i", strtotime($row['data_atualizacao'])); ?></td>
                    <td><?php echo $row['status'] == 1 ? 'Ativo' : 'Inativo'; ?></td>
                    <td>
                        <a href="assinaturas_edita.php?id=<?php echo $row['id']; ?>">Editar</a>
                        <a href="assinaturas_remover.php?id=<?php echo $row['id']; ?>">Remover</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php include('footer.php'); ?>
</body>
</html>
