<?php
require_once "topo_admin.php";
require_once "bd/conexao.php";
?>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .form-floating label {
            color: #9e9e9e;
        }
        .form-floating input {
            background-color: #2c2c2c;
            border: none;
            color: #e0e0e0;
        }
        .form-floating input::placeholder {
            color: #9e9e9e;
        }
    </style>
</head>

<body class="text-center">
<div class="form-floating">
    <h1 class="h4 mb-3 fw-normal">Peças Cadastradas</h1>
    <div id="listagem">
        <?php
        $sql = "SELECT * FROM tbpecas ORDER BY id";
        echo "<table class='table table-striped'><thead><tr><th>ID</th><th>Nome</th><th>descricao</th><th>Ações</th></tr></thead><tbody>";
        $resultado = $conn->query($sql);
        foreach ($resultado as $registro) {
            echo "<tr><td>" . $registro["id"] . "</td><td>" . $registro["nome"] . "</td><td>" . $registro["descricao"] . "</td><td>
                  <a href='cadpecas.php?id=" . $registro["id"] . "&acao=editar'><i class='bi bi-pencil-square'></i></a>
                  <a href='cadpecas.php?id=" . $registro["id"] . "&acao=excluir'><i class='bi bi-trash-fill'></i></a>
                  </td></tr>";
        }
        echo "</tbody></table>";
        ?>
    </div>
    <button class="w-100 btn btn-success mt-3" onclick="window.location.href='cadpecas.php'">Cadastrar nova peça</button>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
