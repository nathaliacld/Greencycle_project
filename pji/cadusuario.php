<?php
require_once "topo.php";
require_once "bd/conexao.php";

$acao = "";
$id = 0;
$nome = "";
$email = "";
$senha = "";

if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
} elseif (isset($_POST['acao'])) {
    $acao = $_POST['acao'];
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
} else {
    $acao = "novo";
}

// acesso ao BD
if ($acao == "editar") {
    $sql = "SELECT * FROM tbusuarios WHERE id=" . $id;
    $resultado = $conn->query($sql);
    foreach ($resultado as $registro) {
        $nome = $registro['nome'];
        $email = $registro['email'];
        $senha = $registro['senha'];
    }
} elseif ($acao == "excluir") {
    $sql = "DELETE FROM tbusuarios WHERE id=" . $id;
    $conn->exec($sql);
    echo "<script>alert('Excluído com sucesso'); window.location.href='listarusuario.php';</script>";
    exit();
} elseif ($acao == "atualizar") {
    $sql = "UPDATE tbusuarios SET nome='" . $nome . "', email='" . $email . "', senha='" . $senha . "' WHERE id=" . $id;
    $conn->exec($sql);
    echo "<script>alert('Editado com sucesso'); window.location.href='listarusuario.php';</script>";
    exit();
} elseif ($acao == "novo" && $id == 0 && $nome != "") {
    $sql = "INSERT INTO tbusuarios (nome, email, senha) VALUES('" . $nome . "', '" . $email . "', '" . $senha . "')";
    $conn->exec($sql);
    echo "<script>alert('Salvo com sucesso'); window.location.href='cadusuario.php';</script>";
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Cadastro de usuários</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
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

<body class="text-center">
    <main class="w-100 m-auto" style="min-height: 400px;">
        <form action="cadusuario.php" method="post">
            <div class="container justify-content-center">
                <div class="left">
                    <h1 class="h4 mb-3 fw-normal text-center">Cadastre-se</h1>
                    <div class="form-floating">
                        <?php
                        if ($id > 0 && $nome != "")
                            $acao = "atualizar";
                        ?>
                        <input type="hidden" name="acao" value="<?php echo $acao; ?>">
                        <input type="text" name="id" class="form-control" id="floatingInput" placeholder="ID" readonly value="<?php echo $id; ?>">
                        <label for="floatingInput">Id</label>
                    </div>

                    <div class="form-floating">
                        <input type="text" name="nome" class="form-control" id="floatingInput" placeholder="nome" value="<?php echo $nome; ?>" required>
                        <label for="floatingInput">Nome</label>
                    </div>

                    <div class="form-floating">
                        <input type="text" name="email" class="form-control" id="floatingInput" placeholder="email" value="<?php echo $email; ?>" required>
                        <label for="floatingInput">Email</label>
                    </div>

                    <div class="form-floating">
                        <input type="text" name="senha" class="form-control" id="floatingInput" placeholder="Senha" value="<?php echo $senha; ?>" required>
                        <label for="floatingInput">Senha</label>
                    </div>

                    <div class="form-floating"></div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit"><?php echo strtoupper($acao); ?></button><br><br>

                    <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
                </div>
            </div>
        </form>
    </main>
</body>

</html>
