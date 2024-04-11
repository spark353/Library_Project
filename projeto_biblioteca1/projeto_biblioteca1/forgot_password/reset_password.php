
<?php
global $con;

    if (isset($_POST['submit'])) {
        require('connect3.php');

        $email = mysqli_real_escape_string($con, $_POST['email']);

        $sql = "SELECT * From alunos Where email='$email'";
        $run = mysqli_query($con, $sql);
        if (mysqli_num_rows($run) > 0) {
            $row = mysqli_fetch_array($run);
            $db_email = $row['email'];
            $db_id = $row['id_senha'];
            $token = uniqid(md5(time()));
            $sql = "INSERT INTO reset_senha(id_senha, email, token)VALUES (NULL, '$email','$token')";
            if (mysqli_query($con, $sql)){
                $to = $db_email;
                $subject = "Password reset link";
                $message = "Click <a href='https://YOUR_WEBSITE.com/create-new-password.php?token=$token'>here</a> to
                reset your password.";
                $headers = "MIME-Version: 1.0"."\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
                $headers .= 'From: <demo@demo.com>'."\r\n";
                mail($to,$subject, $message, $headers);

                $msg = "<div class='alert alert-sucess'>Password reset link has been sent to the email.</div>";
            }
        }else{
            $msg = "<div class='alert alert-danger'>User not found.</div>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registo estudante</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style_reset_pass.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script></head>


<body>

<div class="card" style="width: 550px; height: 300px; transform: translateX(570px); margin-top: 220px">
    <div class="card-body">
        <h5 class="card-title" style="text-align: center">Recuperar Senha</h5>
        <p class="card-text" style="text-align: center">Para recuperar a senha necessita primeiro colocar o seu email onde
            será enviado um link que vai direcionar para uma página onde coloca a sua senha</p>
        <form>

    <div class="input-group">
        <i class="fa fa-envelope icon"></i>
        <input type="email"  name="email"  placeholder="E-mail" title="Por favor, coloque o seu e-mail" style="padding-right: 300px" >
    </div>
    </div>
    <?php if (isset($msg)){echo $msg;}?>
    <div class="input-group">&nbsp;&nbsp;&nbsp;
        <button type="submit" name="submit"  style="background: -webkit-linear-gradient(top,#1562E4, #1C4993); transform: translateX(200px);margin-bottom: 50px; padding: 10px; color: white; border-radius: 10px;10px;10px;10px">Recuperar Senha</button>

        <p id="response"></p>
    </div>
</div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

</form>
</body>
</html>

