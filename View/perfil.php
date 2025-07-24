<?php
session_start();
require_once("../vendor/autoload.php");
use Controller\UserController;

$userController = new UserController();
$userInfo = null;

if(!$userController->isLoggedIn()){
    header('Location: login.php');
    exit();
}

$user_id = [$_SESSION['id']];
$user_fullname = [$_SESSION['user_fullname']];
$user_email = [$_SESSION['email']];
$user_birth = [$_SESSION['formatedDate']];
$user_cpf = [$_SESSION['cpf']];
$user_password = [$_SESSION['password']];

$userInfo = $userController->dadosUsuario($user_id, $user_fullname, $email, $formatedDate, $cpf);
// echo $userInfo;

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../template/perfil.css">
</head>
<body>
    <div class="app-container">
    <div class="header">
        <div class="header-left">
            <img src="../img/foto.png" alt="Foto de perfil">
            <?php
            if($userInfo): ?>
            <div>
                <h2>Olá, <?php echo htmlspecialchars($userInfo['user_fullname']) ?> </h2>
                <p>Página de perfil</p>
            </div>
             <?php endif; ?>
        </div>
        <img src="../img/logo.png" alt="Logo Brasil" class="logo-brasil">
    </div>

    <div class="profile-data">
        <h3>Meus Dados</h3>
        <?php if($userInfo): ?>
        <div class="info-item">
            <strong>CPF</strong>
            <span><?php echo htmlspecialchars($userInfo['cpf']) ?></span>
        </div>
        <div class="info-item">
            <strong>Nome completo</strong>
            <span> <?php echo htmlspecialchars($userInfo['user_fullname']) ?> </span>
        </div>
        <div class="info-item">
            <strong>E-mail</strong>
            <span><?php echo htmlspecialchars($userInfo['email']) ?></span>
        </div>
        <div class="info-item">
            <strong>Data de Nascimento</strong>
            <span><?php echo htmlspecialchars($userInfo['formatedDate']) ?></span>
        </div>
         <?php endif; ?>
     
    </div>
</div>
    
</body>
</html>