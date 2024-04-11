<?php
global $con;
if (isset($_POST['register'])) {
    require 'add_students/connect.php';
    $nome = $n_aluno = $ano_matricula = $telefone = $email = $senha = '';
    $nome = $_POST['nome'];
    $n_aluno = $_POST['n_aluno'];
    $ano_matricula = $_POST['ano_matricula'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $password = MD5($senha);


    $sql = "INSERT INTO alunos(nome, n_aluno, ano_matricula, telefone, email, senha) VALUES('$nome', '$n_aluno', '$ano_matricula', '$telefone', '$email', '$password')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header("location:index_login_students.php");

    } else {

        echo "Error:" . $sql;
    }
}
?>
