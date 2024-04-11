<?php
global $con;
if (isset($_POST['register'])) {
    require '../add_students/connect.php';
    $nome = $n_professor = $ano_matricula = $telefone = $email = $senha = '';
    $nome = $_POST['nome'];
    $n_professor = $_POST['n_professor'];
    $ano_matricula = $_POST['ano_matricula'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $password = MD5($senha);


    $sql = "INSERT INTO professores(nome, n_professor, ano_matricula, telefone, email, senha) VALUES('$nome', '$n_professor', '$ano_matricula', '$telefone', '$email', '$password')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header("location:index_login_teacher.php");

    } else {

        echo "Error:" . $sql;
    }
}
?>

