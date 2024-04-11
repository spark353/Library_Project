<?php
require('../add_students/connect.php');


function InsertRecord()
{
    global $con;
    $Nome = $_POST['Nome'];
    $N_aluno = $_POST['N_aluno'];
    $N_documento = $_POST['N_documento'];
    $Ano_matricula = $_POST['Ano_matricula'];
    $N_telefone = $_POST['N_telefone'];
    $Email = $_POST['Email'];
    $Estado = $_POST['Estado'];

    $query = "INSERT INTO inserir_utilizadores(Nome, N_aluno, N_documento, Ano_matricula, N_telefone, Email, Estado) VALUES('$Nome','$N_aluno','$N_documento','$Ano_matricula','$N_telefone','$Email','$Estado')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo 'O registo foi guardado com sucesso';
    } else {
        echo 'Por favor verificar a base de dados';
    }
}

function display_record()
{

    global $con;
    $value = "";
    $value = '<table class="table table-bordered" id="employee_table">

    <tr>
        <td>Id</td>
        <td>Nome</td>
        <td>Nº aluno</td>
        <td>Nº documento</td>
        <td>Ano matricula</td>
        <td>Telefone</td>
        <td>Email</td>
        <td>Estado</td>
    </tr>';

    $query = "select * from inserir_utilizadores";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $pro_id_insc = $row['id_ins_utili'];

        $pro_nome = $row['Nome'];
        $pro_n_aluno = $row['N_aluno'];
        $pro_n_documento = $row['N_documento'];
        $pro_ano_matricula = $row['Ano_matricula'];
        $pro_n_telefone = $row['N_telefone'];
        $pro_email = $row['Email'];
        $pro_estado = $row['Estado'];

        $value .= '<tr>
        <td>' . $pro_id_insc . '</td>
        <td>' . $pro_nome . '</td>
        <td>' . $pro_n_aluno . '</td>
        <td>' . $pro_n_documento . '</td>
        <td>' . $pro_ano_matricula . '</td>
        <td>' . $pro_n_telefone . '</td>
        <td>' . $pro_email . '</td>
        <td>' . $pro_estado . '</td>
    </tr>';
    }
    $value .= '</table>';
    echo json_encode(['status' => 'success', 'html' => $value]);
}

function get_record()
{
    global $con;
    $UserID = $_POST['UserID'];
    $query = "select * from inserir_utilizadores where id_ins_utili='$UserID'";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $User_data = "";
        $User_data[0] = $row['id_ins_utili'];
        $User_data[1] = $row['Nome'];
        $User_data[2] = $row['N_aluno'];
        $User_data[3] = $row['N_documento'];
        $User_data[4] = $row['Ano_matricula'];
        $User_data[5] = $row['N_telefone'];
        $User_data[6] = $row['Email'];
        $User_data[7] = $row['Estado'];

    }
    echo json_encode($User_data);
}
