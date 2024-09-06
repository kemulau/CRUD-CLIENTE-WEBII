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

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style_list.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Lista de Clientes</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($clientes)): ?>
                    <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?php echo $cliente['id']; ?></td>
                            <td><?php echo $cliente['nome']; ?></td>
                            <td><?php echo $cliente['telefone']; ?></td>
                            <td><?php echo $cliente['email']; ?></td>
                            <td><?php echo $cliente['cpf']; ?></td>
                            <td>
                                <a href="form_atualizaCliente.php?id=<?php echo $cliente['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="deletaCliente.php?id=<?php echo $cliente['id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Nenhum cliente encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="text-center">
            <a href="form_cadastroCliente.php" class="btn btn-success">Cadastrar Novo Cliente</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
