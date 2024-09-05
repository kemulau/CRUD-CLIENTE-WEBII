<?php

require 'Banco.php';
require 'Cliente.php';

$banco = new Banco();   
$conexao = $banco->getConexao();

$cliente = new Cliente($conexao);
$stmt = $cliente->read();


if ($stmt) {    
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>
<body>
    <h2>Lista de Clientes</h2>
    
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Ações</th>
        </tr>

        <?php if (!empty($clientes)): ?>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?php echo $cliente['id']; ?></td>
                    <td><?php echo $cliente['nome']; ?></td>
                    <td><?php echo $cliente['telefone']; ?></td>
                    <td><?php echo $cliente['email']; ?></td>
                    <td><?php echo $cliente['cpf']; ?></td>
                    <td>
                        <a href="form_atualizaCliente.php?id=<?php echo $cliente['id']; ?>">Editar</a>
                        <a href="deletaCliente.php?id=<?php echo $cliente['id']; ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Nenhum cliente encontrado.</td>
            </tr>
        <?php endif; ?>
    </table>

    <a href="form_cadastroCliente.php">Cadastrar Novo Cliente</a>
</body>
</html>
