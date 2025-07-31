<?php
require_once "../vendor/autoload.php";
use Controller\AgendamentoController;
$agendamentoController = new AgendamentoController();
$erroAgendamento = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['nome_paciente'], $_POST['especialidade'], $_POST['data'],$_POST['horario'])){
        $nome_paciente = $_POST['nome_paciente'];
        $especialidade = $_POST['especialidade'];
        $data = $_POST['data'];
        $horario = $_POST['horario'];

        $dateFormated  = date("Y-m-d", strtotime($data));
        $formatedTime = date("H:i", strtotime($horario));

echo $nome_paciente, "<br>";
echo $especialidade, "<br>";
echo $data, "<br>";
echo $horario;

        if ($agendamentoController->criarAgendamento($nome_paciente, $especialidade, $data, $horario)) {
            echo $nome_paciente;
                header('Location: perfil.php');
                exit();
            } else {
                $erroAgendamento = 'Erro ao tentar fazer o agendamento';
            }
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Agendar Consulta</title>
<link rel="stylesheet" href="../template/style-agendar.css">
</head>
<body>

<div class="app-container">
    <div class="header">
        <div class="header-left">
             <a href="perfil.php"><img src="../img/foto.png" alt="Foto de perfil"> </a>
            <!-- colocar foto -->
            <div>
                <h2>Olá, Maria Júlia (AJUSTAR COM PHP)</h2>
                <p>Agendar Consulta</p>
            </div>
        </div>
        <img src="../img/logo.png" alt="Logo Brasil" class="logo-brasil"> 
        <!-- colocar logo -->
    </div>

    <div class="agendamento">
        <div class="agende">
            <div class="h2">
                <h2>Agende sua consulta:</h2>
            </div>
            <form method="POST" class="form" >
             <!-- input de nome do paciente, especialidade, data e horário -->
                 <label for="userName" class="userName">Digite seu nome:</label>
                 <input name="nome_paciente" type="text" id="userName" placeholder="Nome Completo">
     
                 <label for="userEspecialidade" class="userEspecialidade">Qual especialidade deseja marcar?</label>
                 <input name="especialidade" type="text" id="userEspecialidade" placeholder="Ex.: Clínico Geral">
     
                 <label for="userData" class="userData">Qual a data?</label>
                 <input name="data" type="date" id="userData" placeholder="Ex.: Clínico Geral">
     
                 <label for="userHorário" class="userHorário">Qual o horário?</label>
                 <input name="horario" type="time" id="userHorario" placeholder="Ex.: Clínico Geral">
     
     
                      <button type="submit" class="agendar">Agendar</button>
              
            
            </form>
        </div>

    </div>

   
</div>
<script src="../template/agendar.js"></script>
</body>
</html>