<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>GreenCycle - Login</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
</head>
<body>

<?php
require_once "bd/conexao.php";
require_once "topo.php";
session_start(); // Iniciar sessão

// Pegar e validar os campos de usuário e senha do login.php
if(isset($_POST['email']) && isset($_POST['senha'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    // Buscar o usuário na tabela
    $sql = "SELECT * FROM tbusuarios WHERE email='".$email."' AND senha='".$senha."'";
    $resultado = $conn->query($sql);
    foreach($resultado as $registro) {
        // Se tiver registros, veja o status
        // Status que pode já acessar o sistema é o 1
        if($registro['idStatus'] == 1){
            echo "<p>Login deu certo</p>";

            // Criar sessão do usuário, para verificar se está logando quando entrar em outras páginas
            $_SESSION['idUsuario'] = $registro['id'];
            $_SESSION['nomeUsuario'] = $registro['nome'];
            $_SESSION['tipoUsuario'] = $registro['tipo_usuario']; // Supondo que exista um campo 'tipo_usuario' na tabela

            // Redirecionar o usuário com base no tipo de usuário
            if($registro['tipo_usuario'] == 'admin'){
                header("Location: admin_page.php");
                exit();
            } else if($registro['tipo_usuario'] == 'usuario'){
                header("Location: user_page.php");
                exit();
            }
        } else {
            echo "<h3>Você precisa verificar seu login, status = ".$registro['idStatus']."</h3>";
        }
    }
    echo "<h3>Usuário ou senha inválidos</h3>";
} else {
    echo "<script>window.alert('Preencha o e-mail e a senha.')</script>";
}
?>

</body>
</html>
