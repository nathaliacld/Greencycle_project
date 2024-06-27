<?php
require_once "topo.php";
require_once "bd/conexao.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GreenCycle, Tecnologia Sustentável</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
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
        .form-signin {
            width: 100%;
            max-width: 700px;
            padding: 20px;
            background: #1e1e1e;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
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
<body>
<main class="form-signin">
    <form action="cadpecas.php" method="post">
        <h1 class="h4 mb-3 fw-normal text-center">Cadastre as peças aqui!</h1>
        <?php
        $acao = isset($_GET['acao']) ? $_GET['acao'] : (isset($_POST['acao']) ? $_POST['acao'] : 'novo');
        $id = isset($_GET['id']) ? $_GET['id'] : (isset($_POST['id']) ? $_POST['id'] : 0);
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $email = isset($_POST['descricao']) ? $_POST['descricao'] : '';

        if ($acao == 'editar') {
            $sql = "SELECT * FROM tbpecas WHERE id=$id";
            $resultado = $conn->query($sql);
            foreach ($resultado as $registro) {
                $nome = $registro['nome'];
                $email = $registro['descricao'];
            }
        } elseif ($acao == 'excluir') {
            echo "<script>window.alert('Excluído')</script>";
            $sql = "DELETE FROM tbpecas WHERE id=$id";
            $conn->exec($sql);
            $id = 0;
            $nome = '';
            $email = '';
            $acao = 'novo';
        } elseif ($acao == 'atualizar') {
            echo "<script>window.alert('Cadastro atualizado')</script>";
            $sql = "UPDATE tbpecas SET nome='$nome', descricao='$email' WHERE id=$id";
            $conn->exec($sql);
            $id = 0;
            $nome = '';
            $email = '';
            $acao = 'novo';
        } elseif ($acao == 'novo' && $id == 0 && $nome != '') {
            echo "<script>window.alert('Salvo com sucesso')</script>";
            $sql = "INSERT INTO tbpecas (nome, descricao) VALUES('$nome', '$email')";
            $conn->exec($sql);
            $id = 0;
            $nome = '';
            $email = '';
        }
        ?>
        <input type="hidden" name="acao" value="<?php echo $acao; ?>">
        <div class="form-floating mb-3">
            <input type="text" name="id" class="form-control" id="floatingId" placeholder="ID" value="<?php echo $id; ?>" readonly>
            <label for="floatingId">ID</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="nome" class="form-control" id="floatingNome" placeholder="Nome" value="<?php echo $nome; ?>" required>
            <label for="floatingNome">Nome</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="descricao" class="form-control" id="floatingDescricao" placeholder="Descrição" value="<?php echo $email; ?>" required>
            <label for="floatingDescricao">Descrição</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit"><?php echo strtoupper($acao); ?></button>
        <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
    </form>
</main>
</body>
</html>
