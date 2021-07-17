<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/auth.css">
  <script src="js/cadastro.js"></script>
  <title>Cadastro</title>
</head>
<body>
  <div id="auth-conteiner">
    <span id="auth-title">Cadastro</span>
    <form id="auth-form" action="#" method="POST">
      <input id="auth-form-in-nome" type="text" placeholder="Nome de usuario">
      <input id="auth-form-in-email" type="text" placeholder="Email">
      <input id="auth-form-in-datanasc" type="date">
      <input id="auth-form-in-senha" type="text" placeholder="Senha">
      <input id="auth-form-in-submit" type="submit" value="Cadastrar">
    </form>
    <nav id="auth-links">
      <a href="login.php">Ja tem uma conta? Entre</a>
    </nav>
    <div id="auth-responsetext">

    </div>
  </div>
</body>
</html>