<?php
session_start(); // Iniciar a sessão, garantindo que seja chamado apenas uma vez
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenCycle</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .navbar {
            background-color: #28a745; /* Verde */
        }
        .navbar-brand, .nav-link {
            color: #fff !important; /* Branco */
        }
        .nav-link:hover {
            color: #f1f1f1 !important; /* Cinza claro no hover */
        }
        .nav-item .btn {
            margin-left: 10px;
        }
        .btn-login {
            background-color: #155724; /* Verde escuro */
            color: #fff !important;
        }
        .btn-login:hover {
            background-color: #0b3d2e; /* Verde ainda mais escuro no hover */
            color: #fff !important;
        }
        .navbar-nav {
            margin-left: auto;
        }
    </style>
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">GreenCycle</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="user_page.php">Sobre nós</a>
                    </li>
                    <?php if (isset($_SESSION['idUsuario'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="projetos.php">Projetos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contatos.php">Contatos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-danger logout-btn" href="logout.php">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="cadusuario.php">Cadastre-se</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-login" href="login.php">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS, Popper.js, e jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
