<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está autenticado
if (!isset($_SESSION['idUsuario'])) {
    // Se não estiver autenticado, redireciona para a página de login
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página de Contato">
    <meta name="author" content="Seu Nome">
    <title>Contato</title>
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
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .btn-contact {
            margin-top: 20px;
            margin-right: 10px; /* Espaçamento entre os botões */
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Entre em Contato Conosco</h1>
    <p>Envie-nos uma mensagem ou nos chame pelo WhatsApp!</p>

    <form action="salvar_comentario.php" method="post">
        <div class="form-group">
            <label for="nome">Seu Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="email">Seu Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="mensagem">Mensagem:</label>
            <textarea class="form-control" id="mensagem" name="mensagem" rows="4" required></textarea>
        </div>
        <!-- Campo oculto para o idUsuario -->
        <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">
        <button type="submit" class="btn btn-primary btn-contact">Enviar Comentário</button>
    </form>

    <a href="https://api.whatsapp.com/send?phone=5517988361092" class="btn btn-success btn-contact"
       target="_blank">Abrir WhatsApp</a>
    <a href="user_page.php" class="btn btn-secondary btn-contact">Voltar para o inicio</a>
</div>

<!-- Bootstrap JS, Popper.js, e jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
