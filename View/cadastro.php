<?php
// session_start();
require_once '../vendor/autoload.php';
use Controller\UserController;
$userController = new UserController();
$registerUserMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['user_fullname'], $_POST['email'], $_POST['birth'], $_POST['cpf'], $_POST['password'])) {
        $user_fullname = $_POST['user_fullname'];
        $email = $_POST['email'];
        $birth = $_POST['birth'];
        $cpf = $_POST['cpf'];
        $password = $_POST['password'];

        $formatedDate  = date("dd-mm-aaaa", strtotime($birth));


        if ($userController->checkUserByCpf($cpf)) {
            $registerUserMessage = "Já existe um usuário cadastrado com esse cpf";
        } else {
            if ($userController->createUser($user_fullname, $email, $formatedDate, $cpf, $password)) {
                header('Location: login.php');
                exit();
            } else {
                $registerUserMessage = 'Erro ao registrar informações.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HandCare | Cadastro</title>
    <link rel="stylesheet" href="../template/cadastro.css">
</head>

<body>
    <img class="hc" src="../img/HandCare.png" alt="Imagem HandCare">
    <div class="formulario">
        <img src="../img/simbolo-handcare.png" alt="Símbolo HandCare">
        <form method="POST" class="forms">
            <label for="userName" class="userName">Nome</label>
            <input name="user_fullname" type="text" id="userName" placeholder="Seu nome" required>

            <label for="userEmail" class="userEmail">E-mail</label>
            <input name="email" type="email" id="userEmail" placeholder="Seu E-mail" required>

            <label for="userDate" class="userDate">Data de nascimento</label>
            <input name="birth" type="date" id="userDate" placeholder="Sua data de nascimento" required>

            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" placeholder="123.456.789-01" required>


            <label for="userPassword" class="userPassword">Senha</label>
            <input name="password" type="password" id="userPassword" placeholder="Sua Senha" required>

            <!-- <label for="userPassword2" class="userPassword2">Confirme sua senha</label>
            <input name="userPassword2" type="text" id="userPassword2" placeholder="Repita sua senha" required> -->

            <button class="entrar"><a href="../View/login.php">Já tem uma conta? Entre</a></button>
            <button><a href="https://accounts.google.com/">Entre com o Google</a></button>
            <button type="submit" class="cadastrar">Cadastrar</button>
        </form>
    </div>
    <script src="../template/cadastro.js"></script>
</body>

</html>