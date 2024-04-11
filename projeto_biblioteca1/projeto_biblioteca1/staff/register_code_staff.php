<?php
global $con;
if (isset($_POST['register'])) {
    require '../add_students/connect.php';
    $nome = $n_funcionario = $ano_matricula = $telefone = $email = $senha = '';
    $nome = $_POST['nome'];
    $n_funcionario = $_POST['n_funcionario'];
    $ano_matricula = $_POST['ano_matricula'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $password = MD5($senha);


    $sql = "INSERT INTO funcionarios(nome, n_funcionario, ano_matricula, telefone, email, senha) VALUES('$nome', '$n_funcionario', '$ano_matricula', '$telefone', '$email', '$password')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header("location:index_login_staff.php");

    } else {

        echo "Error:" . $sql;
    }
}
?>
