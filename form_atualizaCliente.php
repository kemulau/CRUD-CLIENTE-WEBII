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

<form method="POST" action="atualizaCliente.php">
    <input type="hidden" name="id" value="<?php echo isset($clienteSelecionado['id']) ? $clienteSelecionado['id'] : ''; ?>">
    Nome: <input type="text" name="nome" value="<?php echo isset($clienteSelecionado['nome']) ? $clienteSelecionado['nome'] : ''; ?>" >
    Telefone: <input type="text" name="telefone" value="<?php echo isset($clienteSelecionado['telefone']) ? $clienteSelecionado['telefone'] : ''; ?>" >
    Email: <input type="text" name="email" value="<?php echo isset($clienteSelecionado['email']) ? $clienteSelecionado['email'] : ''; ?>">
    CPF: <input type="text" name="cpf" value="<?php echo isset($clienteSelecionado['cpf']) ? $clienteSelecionado['cpf'] : ''; ?>" >
    <button type="submit">Atualizar</button>
</form>