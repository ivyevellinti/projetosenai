<?php
require_once '../vendor/autoload.php';

//IMPORTANDO O USERCONTROLLER
use Controller\UserController;

$userController = new UserController();

$registerUserMessage = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['user_fullname'], $_POST['email'], $_POST['birth'], $_POST['cpf'], $_POST['password'])){
        $user_fullname = $_POST['user_fullname'];
        $email = $_POST['email'];
        $birth = $_POST['birth'];
        $cpf = $_POST['cpf'];
        $password = $_POST['password'];

        //USO DO CONTROLLER PARA VERIFICAÇÃO DE E-MAIL E CADASTRO DE 
        
        //JÁ EXISTE UM EMAIL CADASTRADO? 
        if($userController->checkUserByCpf($email)) {
            $registerUserMessage = "Já existe um usuário cadastrado com esse cpf";
        } else {
            if($userController->createUser($user_fullname, $email, $birth, $cpf, $password)) {
                header('Location: ../View/login.php');
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
            <input name="user_fullname" type="text" id="userName" placeholder="Seu nome">

            <label for="userEmail" class="userEmail">E-mail</label>
            <input name="email" type="email" id="userEmail" placeholder="Seu E-mail">

            <label for="userDate" class="userDate">Data de nascimento</label>
            <input name="birth" type="date" id="userDate" placeholder="Sua data de nascimento">


            <label for="userPassword" class="userPassword">Senha</label>
            <input name="password" type="text" id="userPassword" placeholder="Sua Senha">

            <label for="userPassword2" class="userPassword2">Confirme sua senha</label>
            <input name="userPassword2" type="text" id="userPassword2" placeholder="Repita sua senha">

            <button class="entrar"><a href="../View/login.php">Já tem uma conta? Entre</a></button>
            <button><a href="https://accounts.google.com/">Entre com o Google</a></button>
            <button class="cadastrar">Cadastrar</button>
        </form>
    </div>
    <script src="../template/cadastro.js"></script>
</body>
</html>