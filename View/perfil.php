<?php
session_start();
require_once "../vendor/autoload.php";

use Controller\UserController;
use Controller\AgendamentoController;

$userController = new UserController();
$agendamentoController = new AgendamentoController();


$userInfo = null;
$suaConsulta = null;

$id = isset($_SESSION['id']) ? $_SESSION['id'] : ':id';
$user_fullname = isset($_SESSION['user_fullname']) ? $_SESSION['user_fullname'] : ':user_fullname';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : ':email';
$formatedDate = isset($_SESSION['formatedDate']) ? $_SESSION['formatedDate'] : ':formatedDate';
$cpf = isset($_SESSION['cpf']) ? $_SESSION['cpf'] : ':cpf';

$userInfo = $userController->dadosUsuario($id);


$id_agnd = isset($_SESSION['id']) ? $_SESSION['id'] : ':id';
$nome_paciente = isset($_SESSION['nome_paciente ']) ? $_SESSION['nome_paciente '] : ':nome_paciente ';
$especialidade = isset($_SESSION['especialidade']) ? $_SESSION['especialidade'] : ':especialidade';
$dateFormated = isset($_SESSION['dateFormated']) ? $_SESSION['dateFormated'] : ':dateFormated';
$horario = isset($_SESSION['horario']) ? $_SESSION['horario'] : ':horario';

$suaConsulta = $agendamentoController->dadosAgendamento($id);


?>

<!DOCTYPE html>
<html lang="PT-BR">
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

    <div class="agendamento_data">
    <h3 style="margin-left: 2.0rem; color: #001c60">Minhas Consultas</h3>
    
    <?php if($suaConsulta): ?>

        <div class="agendamento-iten">
            <strong>Paciente: </strong>
            <span> <?php echo htmlspecialchars($suaConsulta['nome_paciente']) ?> </span>
        </div>

         <div class="agendamento-iten">
            <strong>Especialidade: </strong>
            <span> <?php echo htmlspecialchars($suaConsulta['especialidade']) ?> </span>
        </div>

         <div class="agendamento-iten">
            <strong>Data da Colsulta: </strong>
            <span> <?php echo htmlspecialchars($suaConsulta['dateFormated']) ?> </span>
        </div>

         <div class="agendamento-iten">
            <strong>Horário: </strong>
            <span> <?php echo htmlspecialchars($suaConsulta['horario']) ?> </span>
        </div>

    </div>
    <?php endif; ?>
     

</div>


    
</body>
</html>