<?php
  require_once "topo.php";
  require_once "bd/conexao.php";
?>
<br><br>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="GreenCycle Tecnologia Sustentável">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>GreenCycle Tecnologia Sustentável</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: #e0e0e0;
        }
        .carousel-inner img {
            height: 70vh;
            object-fit: cover;
        }
        .hero-section {
            background: url('https://i.ibb.co/zQwT7RV/Design-sem-nome.png') no-repeat center center;
            background-size: cover;
            height: 60vh;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .content-section {
            padding: 60px 0;
        }
        .content-section h2 {
            font-size: 2.5rem;
            margin-bottom: 30px;
        }
        .footer {
            background-color: #28a745; /* Alterado para verde */
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        .btn-custom {
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
</head>

<body>

    <!-- Hero Section -->
    <div class="hero-section">
        <h1>Bem-vindo à GreenCycle</h1>
    </div>

    <!-- Carrossel -->
    <div class="container mt-5">
        <div id="meuCarrossel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://i.ibb.co/6mYrLLC/Design-sem-nome-2.jpg" class="d-block w-100" alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img src="https://i.ibb.co/YZQ3p24/Design-sem-nome.jpg" class="d-block w-100" alt="Banner 2">
                </div>
                <div class="carousel-item">
                    <img src="https://i.ibb.co/qpF6GBN/Design-sem-nome-1.jpg" class="d-block w-100" alt="Banner 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#meuCarrossel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#meuCarrossel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Próximo</span>
            </a>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container content-section">
        <div class="text-center">
            <h2>Sobre Nós</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 GreenCycle Tecnologia Sustentável. Todos os direitos reservados.</p>
    </div>

    <!-- Bootstrap JS, Popper.js, e jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
