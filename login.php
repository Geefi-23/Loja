<?php
  session_start();
  if (isset($_SESSION['usuario']))
    header('Location: index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/pages/auth.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
  rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="module" src="js/login.js"></script>
  <title>Login</title>
</head>
<body>
  <div id="auth-conteiner">
    <span id="auth-title">Login</span>
    <form id="auth-form" action="server/data-process/AutenticarUsuario.php" method="POST">
      <input id="email" type="text" placeholder="Email"
      autocomplete="off">
      <input id="senha" type="password" placeholder="Senha"
      autocomplete="off">
      <input id="submit" type="submit" value="Entrar">
    </form>
    <nav id="auth-links">
      <a href="javascript:reqPage('recuperar-senha')">Esqueci minha senha</a>
      <a href="cadastro.php">Cadastre-se</a>
    </nav>
    <div id="auth-responsetext"></div>
  </div>
</body>
</html>