<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['idUsuario'])) {
    header("Location: login.php");
    exit();
}

require_once "bd/conexao.php";

// Consulta SQL para selecionar todos os comentários da tabela tbcomentarios
$sql = "SELECT * FROM tbcomentarios";

// Preparando e executando a consulta usando PDO
$stmt = $conn->prepare($sql);
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Listagem de Comentários">
    <meta name="author" content="Seu Nome">
    <title>Listagem de Comentários</title>
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
    </style>
</head>
<body>

<div class="container">
    <h1>Listagem de Comentários</h1>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Mensagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultados as $comentario): ?>
            <tr>
                <td><?php echo $comentario['idComentario']; ?></td>
                <td><?php echo $comentario['nome']; ?></td>
                <td><?php echo $comentario['email']; ?></td>
                <td><?php echo $comentario['mensagem']; ?></td>
                <td>
                    <a href="listar_comentarios.php?acao=editar&id=<?php echo $comentario['idComentario']; ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="listar_comentarios.php?acao=excluir&id=<?php echo $comentario['idComentario']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este comentário?');">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <a href="admin_page.php" class="btn btn-primary">Voltar para o Inicio</a>
</div>

<!-- Bootstrap JS, Popper.js, e jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
// Função para excluir comentário
if (isset($_GET['acao']) && $_GET['acao'] == 'excluir' && isset($_GET['id'])) {
    $idComentario = $_GET['id'];

    try {
        $sql = "DELETE FROM tbcomentarios WHERE idComentario = :idComentario";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idComentario', $idComentario, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script>alert('Comentário excluído com sucesso!'); window.location='listar_comentarios.php';</script>";
        } else {
            throw new Exception("Erro ao executar a query: " . $stmt->errorInfo()[2]);
        }
    } catch (Exception $e) {
        echo "Erro ao excluir o comentário: " . $e->getMessage();
    }
}

// Função para editar comentário
if (isset($_GET['acao']) && $_GET['acao'] == 'editar' && isset($_GET['id'])) {
    $idComentario = $_GET['id'];

    // Consulta para buscar o comentário
    $sql = "SELECT * FROM tbcomentarios WHERE idComentario = :idComentario";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idComentario', $idComentario, PDO::PARAM_INT);
    $stmt->execute();
    $comentario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($comentario) {
        // Exibir formulário para edição
        echo '
        <div class="container">
            <h2>Editar Comentário</h2>
            <form action="listar_comentarios.php?acao=atualizar&id=' . $idComentario . '" method="post">
                <div class="form-group">
                    <label for="nome">Seu Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="' . $comentario['nome'] . '" required>
                </div>
                <div class="form-group">
                    <label for="email">Seu Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="' . $comentario['email'] . '" required>
                </div>
                <div class="form-group">
                    <label for="mensagem">Mensagem:</label>
                    <textarea class="form-control" id="mensagem" name="mensagem" rows="4" required>' . $comentario['mensagem'] . '</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Atualizar Comentário</button>
            </form>
        </div>';
    } else {
        echo "Comentário não encontrado.";
    }
}

// Função para atualizar comentário
if (isset($_GET['acao']) && $_GET['acao'] == 'atualizar' && isset($_GET['id'])) {
    $idComentario = $_GET['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    try {
        $sql = "UPDATE tbcomentarios SET nome = :nome, email = :email, mensagem = :mensagem WHERE idComentario = :idComentario";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
        $stmt->bindParam(':idComentario', $idComentario, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script>alert('Comentário atualizado com sucesso!'); window.location='listar_comentarios.php';</script>";
        } else {
            throw new Exception("Erro ao executar a query: " . $stmt->errorInfo()[2]);
        }
    } catch (Exception $e) {
        echo "Erro ao atualizar o comentário: " . $e->getMessage();
    }
}
?>
