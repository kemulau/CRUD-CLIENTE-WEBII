<?php

require 'Banco.php';
require 'Cliente.php';

$banco = new Banco(); 
$conexao = $banco->getConexao();
$cliente = new Cliente($conexao);

if (isset($_GET["id"])) {
    $cliente->setId($_GET["id"]);
    $stmt = $cliente->consultar();
    $clienteSelecionado = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    echo "ID não informado.";
    exit; 
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cliente</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style_atualiza.css">
</head>
<body>
    <div class="container form-container">
        <h3 class="text-center">Atualizar Cliente</h3>
        <form method="POST" action="atualizaCliente.php">
            <input type="hidden" name="id" value="<?php echo $clienteSelecionado['id']; ?>">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $clienteSelecionado['nome']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" name="telefone" id="telefone" value="<?php echo $clienteSelecionado['telefone']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $clienteSelecionado['email']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf" value="<?php echo $clienteSelecionado['cpf']; ?>" required>
            </div>

            <button type="submit" class="btn btn-custom">Atualizar Cliente</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
