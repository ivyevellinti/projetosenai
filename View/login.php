<?php 
require_once 'vendor/autoload.php';

use Controller\UserController;

$userController = new UserController();
$loginMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf = $_POST['cpf'];
    $password = $_POST['password'];

    if ($userController->login($cpf, $password)) {
        header('Location: View/home.php');
        exit();
    } else {
        $loginMessage = "CPF ou senha incorretos.";
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HandCare | Login</title>
    <link rel="stylesheet" href="../template/lg.css">
</head>
<body>
        <img class="hc" src="../img/HandCare.png" alt="Imagem HandCare">
    <div class="formulario">
        <img src="../img/HandCareHorizontal.png" alt="Símbolo HandCare">
        <form method="POST" class="forms">
            <label for="userCPF" class="userCPF">CPF</label>
            <input name="cpf" type="text" id="userCPF" placeholder="Seu CPF">
            <label for="userPassword" class="userPassword">Senha</label>
            <input name="password" type="text" id="userPassword" placeholder="Sua Senha">
            <button class="cad-se"><a href="../View/cadastro.php"></a>Cadastre-se</button>
            <button>Esqueceu a senha?</button>
            <button><a href="https://accounts.google.com/">Entre com o Google</a></button>
            <button class="entrar">Entrar</button>
        </form>
    </div>
    <script src="../template/login.js"></script>
</body>
</html>