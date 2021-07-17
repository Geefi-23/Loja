<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/auth.css">
  <title>Autenticação</title>
</head>
<body>
  <div id="auth-conteiner">
    <span id="auth-title">Login</span>
    <form id="auth-form" action="" method="POST">
      <input id="auth-form-in-email" type="text" placeholder="Email">
      <input id="auth-form-in-senha" type="text" placeholder="Senha">
      <input id="auth-form-in-submit" type="submit" value="Entrar">
    </form>
    <nav id="auth-links">
      <a href="javascript:reqPage('recuperar-senha')">Esqueci minha senha</a>
      <a href="cadastro.php">Cadastre-se</a>
    </nav>
  </div>
</body>
</html>