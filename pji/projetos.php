


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
            position: relative; /* Para posicionamento relativo dos botões */
            padding-bottom: 50px; /* Para garantir espaço no final da página para os botões fixos */
        }

        .hero-section {
            background-size: cover;
            background-image: url('https://i.ibb.co/52GSpdM/Design-sem-nome-4.jpg'); /* Imagem de fundo */
            height: 40vh; /* Aumentando um pouco a altura */
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }

        .hero-section:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Overlay escuro para destacar o texto */
        }

        .hero-section h1 {
            font-size: 4rem; /* Tamanho maior para o título */
            margin: 0;
            z-index: 1; /* Para garantir que o texto esteja acima do overlay */
        }

        .content-section {
            padding: 60px 0;
            border-bottom: 1px solid #555; /* Linha divisória entre as sections */
        }

        .content-section:last-child {
            border-bottom: none; /* Remove a linha divisória da última section */
        }

        .content-section h2 {
            font-size: 2.5rem;
            margin-bottom: 30px;
            color: #28a745; /* Cor verde para os títulos das seções */
        }

        .content-section p {
            margin-bottom: 30px;
        }

        .content-section .content-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 30px;
            border-radius: 10px; /* Borda arredondada nas imagens */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Sombra suave nas imagens */
        }

        .footer {
            background-color: #28a745; /* Alterado para verde */
            color: #fff;
            padding: 20px 0;
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .btn-custom {
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000; /* Para ficar acima dos outros elementos */
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
        <h1>Projetos do <span style="color: #28a745;">GreenCycle</span></h1>
    </div>

    <!-- Content Section 1 -->
    <div class="container content-section center">
        <div class="text-center">
            <h2>Teste de projeto 1</h2>
        </div>
        <img src="https://i.ibb.co/MZLQ0Kz/teste1.jpg" alt="Sobre Nós" class="content-image">
        <div class="text-center">
            <p>Descrição do primeiro projeto...</p>
        </div>
    </div>

    <!-- Content Section 2 -->
    <div class="container content-section">
        <div class="text-center">
            <h2>Teste de projeto 2</h2>
        </div>
        <img src="https://i.ibb.co/k8z9zXP/teste2.jpg" alt="Missão" class="content-image">
        <div class="text-center">
            <p>Descrição do segundo projeto...</p>
        </div>
    </div>

    <!-- Content Section 3 -->
    <div class="container content-section">
        <div class="text-center">
            <h2>Teste de projeto 3</h2>
        </div>
        <img src="https://i.ibb.co/jzwbwSZ/teste3.jpg" alt="Valores" class="content-image">
        <div class="text-center">
            <p>Descrição do terceiro projeto...</p>
        </div>
    </div>

    <!-- Botão no início da página -->
    <a href="user_page.php" class="btn btn-custom">Voltar para User Page</a>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 GreenCycle Tecnologia Sustentável. Todos os direitos reservados.</p>
    </div>

    <!-- Botão no final da página -->
    <a href="user_page.php" class="btn btn-custom">Voltar para User Page</a>

    <!-- Bootstrap JS, Popper.js, e jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
