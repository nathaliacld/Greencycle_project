<?php
  require_once "topo_admin.php";
  require_once "bd/conexao.php";
?>
<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está autenticado como administrador
if(isset($_SESSION['idUsuario']) && isset($_SESSION['tipoUsuario']) && $_SESSION['tipoUsuario'] === 'admin') {
    $nomeUsuario = $_SESSION['nomeUsuario']; // Obtém o nome do usuário da sessão
} else {
    // Se não estiver autenticado como administrador, redireciona para a página de login
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página de Administrador">
    <meta name="author" content="Seu Nome">
    <title>Página de Administrador</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #495057;
            padding: 50px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            text-align: center; /* Centraliza o conteúdo dentro do container */
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 50px; /* Espaço acima do container */
        }
        .logout-btn {
            margin-top: 20px; /* Espaço acima do botão de logout */
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Bem-vindo, <?php echo $nomeUsuario; ?>!</h1>
    <p>Você está na página de administrador.
        Aqui você pode adicionar, editar ou excluir informações privilegiadas.</p>
</div>

<div class="container text-center">
    <a href="logout.php" class="btn btn-danger logout-btn">Logout</a>
</div>

<!-- Bootstrap JS, Popper.js, e jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
