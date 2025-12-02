<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h1>Acesse sua conta</h1>

<?php if (isset($erro)) echo "<p style='color:red'>$erro</p>"; ?>

<form method="POST">
    <p>
        <label>E-mail</label>
        <input type="text" name="email">
    </p>
    <p>
        <label>Senha</label>
        <input type="password" name="senha">
    </p>
    <button type="submit">Entrar</button>
</form>

</body>
</html>