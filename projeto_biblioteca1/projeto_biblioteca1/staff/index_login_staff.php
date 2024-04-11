<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registo estudante</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<img src="../books3.jpg" align="left">

</div>
<form method="post" action="login_code_staff.php">
    <h2 align="center" class="title">Bem vindo ao portal da biblioteca</h2>
    <h2 align="center" class="subtitle">Iniciar a Sessão</h2>
    <div class="input-group">
        <i class="fa fa-envelope icon"></i>
        <input type="email" class="emailbox" name="email"  id="email" placeholder="E-mail" title="Por favor, coloque o seu e-mail" required>
    </div>
    <div class="input-group">
        <i class="fa fa-lock icon"></i>
        <input type="text" class="passbox" name="senha" id="senha" placeholder="Senha" title="Por favor, coloque a sua senha" required>
    </div>
    <input type="checkbox" >Memorizar a senha</input>
    <div class="input-group">&nbsp;&nbsp;&nbsp;
        <button type="submit" name="login" class="btnlogin">Entrar</button>
    </div>
    <p align="center" ><a href="index_register_staff.php"> Registar</a></p>
    <p align="center"><a href="../forgot_password/reset_password.php"> Esqueceu-se da senha</a></p>
</form>
</body>
</html>

