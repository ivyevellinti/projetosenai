<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HandCare | Cadastro</title>
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>
        <img class="hc" src="img/HandCare.png" alt="Imagem HandCare">
    <div class="formulario">
        <img src="../projetosenai/img/simbolo-handcare.png" alt="Símbolo HandCare">
        <form method="POST" class="forms">
            <label for="userName" class="userName">Nome</label>
            <input name="userName" type="text" id="userName" placeholder="Seu nome">

            <label for="userEmail" class="userEmail">E-mail</label>
            <input name="userEmail" type="email" id="userEmail" placeholder="Seu E-mail">

            <label for="userDate" class="userDate">Data de nascimento</label>
            <input name="userDate" type="date" id="userDate" placeholder="Sua data de nascimento">


            <label for="userPassword" class="userPassword">Senha</label>
            <input name="userPassword" type="text" id="userPassword" placeholder="Sua Senha">

            <label for="userPassword2" class="userPassword2">Confirme sua senha</label>
            <input name="userPassword2" type="text" id="userPassword2" placeholder="Repita sua senha">

            <button class="entrar">Já tem uma conta? Entre</button>
            <button>Entre com o Google</button>
            <button class="cadastrar">Cadastrar</button>
        </form>
    </div>
</body>
</html>