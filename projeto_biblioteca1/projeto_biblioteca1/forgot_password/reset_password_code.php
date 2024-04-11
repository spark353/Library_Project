<?php
global $con;
if (isset($_POST["reset-request-submit"])){

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    //$url = "www.projeto_biblioteca/reset_password/create-new-password.php?selector=". $selector ."&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    require 'connect.php';

    $email = $_POST['email'];

    $sql = "DELETE FROM reset_senha WHERE ResetSenhaEmail=?";
    $result = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($result, $sql)){
        echo "There was an error!";
        exit();
    }else{
        mysqli_stmt_bind_param($result, "s", $email);
        mysqli_stmt_execute($result);
    }

    $sql = "INSERT INTO reset_senha(ResetSenhaEmail, ResetSenhaSeletor, ResetSenhaToken, ResetSenhaExpira) VALUES(?,?,?,?);";
    $result = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($result, $sql)){
        echo "There was an error!";
        exit();
    }else{
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($result, "ssss", $email, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($result);
    }

    mysqli_close($result);
    mysqli_close($con);

    $to = $email;

    $subject = 'Redefinir a senha para o portal da biblioteca';

    $message = '<p>Nós recebemos a redefininção da senha pedida. O link é para redefinir a sua senha
    fazendo o pedindo, podes ignorar o email</p>';
    $message .= '<br>Esta é sua senha para redefinir no link: </br>';
    //$message .= '<a href="'. $url .'">' . $url .'</a></p>';

    $headers = "From:XXXX<//put email>\r\n";
    $headers .= "Reply-To: //put email  \r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    header("Location: ../reset_password.php?reset=success");

}else {
    header("Location: ../index_login_students.php");
}
