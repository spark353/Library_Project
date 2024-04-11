<?php
global $con;
require ('connect3.php');
if (isset($_GET['token'])){
    $token = mysqli_real_escape_string($con, $_GET['token']);
    $sql = "select * from reset_senha where token='$token'";
    $run = mysqli_query($con, $sql);
    if (mysqli_num_rows($run)>0){
        $row = mysqli_fetch_array($run);
        $token = $row['token'];
        $email = $row['email'];
    }else{
        header("location:index_login_students");
    }
}
if (isset($_POST['submit'])){
    $pass = mysqli_real_escape_string($con, $_POST['pass']);
    $pass_repeat = mysqli_real_escape_string($con, $_POST['pass-repeat']);
    $options = ['cost'=>16];
    $hashed = password_hash($pass, PASSWORD_BCRYPT, $options);
    if ($pass!=$pass_repeat){
        $msg = "<div class='alert alert-danger'>Sorry, passwords didnt matched</div>";
    }elseif (strlen($pass)<8){
        $msg = "<div class='alert alert-danger'>Password must be 8 characters long</div>";
    }else{
        $sql = "UPDATE alunos SET senha='$hashed' WHERE email='$email'";
        mysqli_query($con, $sql);
        $sql = "delete from reset_senha where email='$email'";
        mysqli_query($con, $sql);
        $msg = "<div class='alert alert-success'>Password Updated</div>";

    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registo estudante</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style_create_password.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script></head>
</head>
<div>

<div class="card" style="width: 550px; height: 300px; transform: translateX(570px); margin-top: 220px">
    <div class="card-body">
        <h5 class="card-title" style="text-align: center">Recuperar Senha</h5>
        <p class="card-text" style="text-align: center">Para recuperar a senha necessita primeiro colocar o seu email onde
            será enviado um link que vai direcionar para uma página onde coloca a sua senha</p>
        <form>
            <div class="input-group">
                <i class="fa fa-envelope icon"></i>
                <input type="text"  name="pass"  placeholder="senha" title="Por favor, coloque a senha" style="padding-right: 300px" >
                <input type="text"  name="pass-repeat"  placeholder="Repita a senha" title="Por favor, coloque a senha de novo" style="padding-right: 300px; margin-top: 10px" >
            </div>
    </div>
    <?php if (isset($msg)){echo $msg;}?>
    <div class="input-group">&nbsp;&nbsp;&nbsp;
        <button type="submit" name="submit"  style="background: -webkit-linear-gradient(top,#1562E4, #1C4993); transform: translateX(200px);margin-bottom: 50px; padding: 10px; color: white; border-radius: 10px;10px;10px;10px">Recuperar Senha</button>

        <p id="response"></p>
    </div>
</div>
</div>
</form>
</body>
</html>
