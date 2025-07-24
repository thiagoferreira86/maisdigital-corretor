
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Verificação em 2 Etapas</title>
</head>
<body>
    <h2>Verificação em 2 Etapas</h2>
    <p>Enviamos um código de 6 dígitos para seu e-mail. Insira abaixo para continuar:</p>
    <form action="/validar-codigo" method="POST">
        <input type="text" name="codigo_2fa" maxlength="6" required placeholder="Digite o código">
        <button type="submit">Verificar</button>
    </form>
</body>
</html>
