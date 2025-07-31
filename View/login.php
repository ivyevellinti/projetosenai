<?php 
session_start();
require_once '../vendor/autoload.php';
use Controller\UserController;
$userController = new UserController();
$loginMessage = '';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf = $_POST['cpf'];
    $password = $_POST['password'];

    if ($userController->login($cpf, $password)) {
        header('Location: agendar.php');
        exit();
    } else {
        $loginMessage = "CPF ou senha incorretos. Tente novamente";
        echo "<script>alert('$loginMessage');</script>";
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
            <input name="password" type="password" id="userPassword" placeholder="Sua Senha">

            <button type="submit" class="entrar">Entrar</button>

            <button class="cad-se"><a href="../View/cadastro.php">Cadastre-se</a></button>


            <button><a href="https://accounts.google.com/">Entre com o Google</a></button>
            
           
        </form>
    </div>
    <script src="../template/login.js"></script>
</body>
</html>