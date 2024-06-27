<?php
// Conexão com o banco de dados
require_once "bd/conexao.php";

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = $_POST['nome'];
    $mensagem = $_POST['mensagem'];

    try {
        // Prepara a query SQL para inserção
        $sql = "INSERT INTO tbcomentarios (nome, mensagem) VALUES (:nome, :mensagem)";

        // Prepara a declaração SQL usando prepared statements para evitar SQL injection
        $stmt = $conn->prepare($sql);

        // Bind dos parâmetros
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);

        // Executa a query
        if ($stmt->execute()) {
            echo "<script>alert('Comentário salvo com sucesso!'); window.location='contato.php';</script>";
        } else {
            throw new Exception("Erro ao executar a query: " . $stmt->errorInfo()[2]);
        }
    } catch (Exception $e) {
        echo "Erro ao salvar o comentário: " . $e->getMessage();
    }
}
?>
