<?php
  session_start();
  if (isset($_SESSION['usuario']))
    header('Location: index.php')
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/auth.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
  rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="js/cadastro.js"></script>
  <title>Cadastro</title>
</head>
<body>
  <div id="auth-conteiner">
    <span id="auth-title">Cadastro</span>
    <form id="auth-form" action="#" method="POST">
      <input id="auth-form__in-nome" type="text" placeholder="Nome de usuario"
      autocomplete="off">
      <input id="auth-form__in-email" type="text" placeholder="Email"
      autocomplete="off">
      <input id="auth-form__in-datanasc" type="date"
      autocomplete="off">
      <input id="auth-form__in-senha" type="password" placeholder="Senha"
      autocomplete="off">
      <input id="auth-form__in-submit" type="submit" value="Cadastrar"
      autocomplete="off" disabled>
    </form>
    <nav id="auth-links">
      <a href="login.php">Ja tem uma conta? Entre</a>
    </nav>
    <div id="auth-responsetext"></div>
  </div>
</body>
</html>