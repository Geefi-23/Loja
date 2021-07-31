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
  <link rel="stylesheet" href="styles/pages/auth.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
  rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="module" src="js/cadastro.js"></script>
  <title>Cadastro</title>
</head>
<body>
  <div id="auth-conteiner">
    <span id="auth-title">Cadastro</span>
    <form id="auth-form" action="server/data-process/SalvarUsuario.php" method="POST">
      <input name="nome" id="nome" class="form-input" type="text" 
      placeholder="Nome de usuario" autocomplete="off">
      <input name="email" id="email" class="form-input" type="text" 
      placeholder="Email" autocomplete="off">
      <input name="datanasc" id="datanasc" class="form-input" type="date"
      autocomplete="off">
      <input name="senha" id="senha" class="form-input" type="password" 
      placeholder="Senha" autocomplete="off">
      <input id="submit" type="submit" value="Cadastrar"
      autocomplete="off" disabled>
    </form>
    <nav id="auth-links">
      <a href="login.php">Ja tem uma conta? Entre</a>
    </nav>
    <div id="auth-responsetext"></div>
  </div>
</body>
</html>