<?php
$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'biblioteca alunos');

if (!$con) {
    die("Conexão falhada: " . mysqli_connect_error());
}
