<?php
global $con;
require '../add_students/connect.php';

if (isset($_POST['login'])) {
    $email = $senha = $password = '';
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $password = MD5($senha);

    $sql = "SELECT * FROM professores WHERE email='$email' AND senha='$password'";
    $query_run = mysqli_query($con, $sql);
    if (mysqli_num_rows($query_run)>0){
        while ($row = mysqli_fetch_assoc($query_run)){
            $id = $row["id_professores"];
            $email = $row['email'];
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['Email'] = $email;
        }
        header("Location: ../add_books/book_link.php");
    }
    else{
        echo "Erro no login:";
    }

}

?>

