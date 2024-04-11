<?php
require('connect.php');


function InsertRecord()
{
    global $con;
    $Nome = $_POST['INome'];
    $N_aluno = $_POST['IN_aluno'];
    $N_documento = $_POST['IN_documento'];
    $Ano_matricula = $_POST['IAno_matricula'];
    $N_telefone = $_POST['IN_telefone'];
    $Email = $_POST['IEmail'];
    $Estado = $_POST['IEstado'];

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
        <td>Editar</td>
        <td>Remover</td>
    </tr>';
    $query = "select * from inserir_utilizadores";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $value .= '<tr>
        <td>' . $row['id_ins_utili'] . '</td>
        <td>' . $row['Nome'] . '</td>
        <td>' . $row['N_aluno'] . '</td>
        <td>' . $row['N_documento'] . '</td>
        <td>' . $row['Ano_matricula'] . '</td>
        <td>' . $row['N_telefone'] . '</td>
        <td>' . $row['Email'] . '</td>
        <td>' . $row['Estado'] . '</td>
        <td><button class="btn btn-success" id="btn_edit" data-id=' . $row['id_ins_utili'] . '><span class="fa fa-edit"></span></button></td>
        <td><button class="btn btn-danger" id="btn_delete" data-id1=' . $row['id_ins_utili'] . '><span class="fa fa-trash"></span></button></td>
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

function update_value()
{
    global $con;
    $Update_ID = $_POST['U_id_ins_utili'];
    $Update_Nome = $_POST['U_Nome'];
    $Update_n_aluno = $_POST['U_N_aluno'];
    $Update_n_documento = $_POST['U_N_documento'];
    $Update_ano_matricula = $_POST['U_Ano_matricula'];
    $Update_n_telefone = $_POST['U_N_telefone'];
    $Update_Email = $_POST['U_Email'];
    $Update_Estado = $_POST['U_Estado'];

    $query = "UPDATE inserir_utilizadores set Nome='$Update_Nome', N_aluno='$Update_n_aluno',N_documento='$Update_n_documento',Ano_matricula='$Update_ano_matricula',N_telefone='$Update_n_telefone',Email='$Update_Email',Estado='$Update_Estado' WHERE id_ins_utili ='$Update_ID'";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo 'O registo foi atualizado';
    } else {
        echo 'Por favor, verifique a base de dados';
    }
}

function delete_record()
{

    global $con;
    $Del_ID = $_POST['Del_ID'];
    $query = "delete from inserir_utilizadores where id_ins_utili='$Del_ID' ";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo 'O registo foi apagado';
    } else {
        echo 'Por favor, verifique a base de dados';
    }

}

?>


