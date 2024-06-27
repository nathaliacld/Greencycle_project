<?php
  require_once "topo.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>GreenCycle - Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">

    <style>
      body {
        background-color: #000000; /* Fundo preto */
        color: #e0e0e0; /* Cor do texto */
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        flex-direction: column;
      }
      .form-signin {
        background-color: #1c1c1c; /* Fundo do formulário */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
      }
      .form-signin input[type="email"],
      .form-signin input[type="password"] {
        background-color: #2c2c2c;
        border: none;
        color: #e0e0e0;
      }
      .form-signin input[type="email"]:focus,
      .form-signin input[type="password"]:focus {
        background-color: #3c3c3c;
        border-color: #555;
        color: #e0e0e0;
      }
      .btn-primary {
        background-color: #155724;
        border: none;
      }
      .btn-primary:hover {
        background-color: #0b3d2e;
      }
    </style>
  </head>

  <body class="text-center">
    <main class="form-signin w-100 m-auto">
      <form action="validarlogin.php" method="POST">
        <img class="mb-4" src="assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Faça seu login</h1>

        <div class="form-floating">
          <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">E-mail</label>
        </div>
        <div class="form-floating">
          <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="Senha">
          <label for="floatingPassword">Senha</label>
        </div>

        <div class="checkbox mb-3">
          <label>
            <a href="cadusuario.php">Cadastre-se</a>
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Acesso</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
      </form>
    </main>
  </body>
</html>
