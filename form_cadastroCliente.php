<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTP-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
</head>

<body>
    <h3> Cadastro de Cliente </h3>
    <form method="POST" action="cadastroCliente.php"> <!-- *método post manda informações mais robusta e esconda e o get deixa tudo publico* -->
        <p> Nome: <input type="text" name="nome" required> </p>
        <p> Telefone: <input type="text" name="telefone" required> </p>
        <p> Email: <input type="email" name="email" required> </p>
        <p> CPF: <input type="text" name="cpf" required> </p>
        <p> <button type="submit">Cadastrar</button>
    </form>

</body>

</html>