<!DOCTYPE html>
<html>
<head>
    <title>Registo estudante</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style_register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="header">
    <img src="books3.jpg" align="left">

</div>
<form action="register_code.php" method="post">
    <h2 align="center" class="title">Registar</h2>
    <div class="input-group">
        <i class="fa fa-user icon"></i>
        <input type="text" class="namebox" name="nome" placeholder="nome" style=" FontAwesome" pattern="[a-zA-Z]{1,80}"
               title="Por favor, coloque o seu nome" required>
    </div>
    <div class="input-group">
        <i class="fa fa-book icon"></i>
        <input type="text" class="bookbox" name="n_aluno" placeholder="nº de aluno" style=" FontAwesome"
               pattern=".{1,5}" title="Por favor, coloque o seu nº de aluno" required>
    </div>
    <div class="input-group">
        <i class="fa fa-calendar icon"></i>
        <input type="text" class="yearbox" name="ano_matricula" placeholder="ano de matricula" style="FontAwesome"
               pattern=".{4}" title="Por favor, coloque o ano de matrícula" required>
    </div>
    <div class="input-group">
        <i class="fa fa-phone icon"></i>
        <input type="text" class="phonebox" name="telefone" placeholder="Nº de telefone" pattern=".{9}"
               title="Por favor, coloque o seu número de telefone" required>
    </div>
    <div class="input-group">
        <i class="fa fa-envelope icon"></i>
        <input type="email" class="emailbox" name="email" placeholder="E-mail" pattern="/([\w\-]+\@[\w\-]+\.[\w\-]+)/"
               title="Por favor, coloque o seu e-mail" required>
    </div>
    <div class="input-group">
        <i class="fa fa-lock icon"></i>
        <input type="text" class="passbox" name="senha" placeholder="Senha" pattern=".{8, 16}"
               title="Por favor, coloque a senha de 8 a 16 carateres" required>

    </div>
    <div class="input-group">
        <button type="button" name="cancelar" class="btncancelar" onclick="window.location='index_login_students.php'" />Cancelar</button>&nbsp;&nbsp;&nbsp;
        <button type="submit" name="register" class="btnConf">Confirmar</button>
    </div>
</form>

</body>
</html>

