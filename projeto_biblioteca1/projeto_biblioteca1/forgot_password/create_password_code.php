<?php
global $con;
if (isset($_POST["reset-password-submit"])){

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $senha = $_POST["pass"];
    $passRepeat = $_POST["pass-repeat"];

    if (empty($senha) || empty($passRepeat)){
        header("Location: ../create-new-password.php?novasenha=vazio");
        exit();
    }else if ($senha != $passRepeat){
        header("Location: ../create-new-password.php?novasenha=senhanaomesma");
    }

    $currentDate = date("U");

    require 'connect.php';

    $sql = "SELECT * FROM reset_senha WHERE ResetSenhaSeletor=? AND ResetSenhaExpira >= ?";
    $result = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($result, $sql)){
        echo "There was an error!";
        exit();
    }else {
        mysqli_stmt_bind_param($result, "s", $selector);
        mysqli_stmt_execute($result);

        $result = mysqli_stmt_get_result($result);
        if (!$row = mysqli_fetch_assoc($result)) {
            echo "Necessita enviar o pedido de redefeninção.";
            exit();
        } else {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["ResetSenhaToken"]);

            if ($tokenCheck === false) {
                echo "Necessita enviar o pedido de redefeninção.";
                exit();
            } else if ($tokenCheck === true) {
                $tokenEmail = $row['ResetSenhaEmail'];

                $sql = "SELECT *FROM reset_senha WHERE email=?;";
                $result = mysqli_stmt_init($con);
                if (!mysqli_stmt_prepare($result, $sql)) {
                    echo "There was an error!";
                    exit();
                } else {
                    mysqli_stmt_bind_param($result, "s", $tokenEmail);
                    mysqli_stmt_execute($result);
                    if (!$row = mysqli_fetch_assoc($result)) {
                        echo "Tem algum erro!";
                        exit();
                    } else {

                        $sql = "UPDATE alunos SET senha=? WHERE email=?";
                        $result = mysqli_stmt_init($con);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo "There was an error!";
                            exit();
                        } else {
                            $newPassHash = password_hash($senha, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($result, "ss", $tokenEmail,$newPassHash);
                            mysqli_stmt_execute($result);

                            $sql = "DELETE FROM reset_senha WHERE ResetSenhaEmail=?";
                            $result = mysqli_stmt_init($con);
                            if (!mysqli_stmt_prepare($result, $sql)){
                             echo "There was an error!";
                             exit();
                            }else{
                                mysqli_stmt_bind_param($result, "s", $tokenEmail);
                                mysqli_stmt_execute($result);
                                header("Location: ../index-register-login.php?novasenha=atualizacaosenha");
    }
                        }
                    }
                }
            }
        }
    }
}else{
    header("Location: ../index_login_students.php");
}