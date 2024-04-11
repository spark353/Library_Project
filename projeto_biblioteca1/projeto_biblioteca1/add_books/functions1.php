<?php
require('../add_students/connect.php');


function InsertRecord()
{
    global $con;
    $Alunos = $_POST['id_alunos'];
    $Imagem = $_FILES['Imagem']['name'];
    $Imagem_tmp = $_FILES['Imagem']['tmp_image'];
    $Titulo = $_POST['Titulo'];
    $Autor = $_POST['Autor'];
    $Assunto = $_POST['Assunto'];
    $Publicacao = $_POST['Publicacao'];
    $Paginas = $_POST['Paginas'];
    $Isbn = $_POST['Isbn'];
    $Estado = $_POST['Estado'];
    $Exemplares = $_POST['Exemplares'];
    move_uploaded_file($Imagem_tmp,"CameraRoll/$Imagem");

    $query = "INSERT INTO livros(id_alunos,Imagem,Titulo, Autor, Assunto, Publicacao, Paginas, Isbn, Estado, Exemplares) VALUES('$Alunos','$Imagem','$Titulo','$Autor','$Assunto','$Publicacao','$Paginas','$Isbn','$Estado','$Exemplares')";
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
        <td>Imagem</td>
        <td>Titulo</td>
        <td>Autor</td>
        <td>Assunto</td>
        <td>Publicação</td>
        <td>Páginas</td>
        <td>ISBN</td>
        <td>Estado</td>
        <td>Exemplares</td>
        <td>Editar</td>
        <td>Remover</td>
    </tr>';
    $query = "select * from livros";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $value .= '<tr>
        <td>' . $row['id_livros'] . '</td>
        <td>' . $row['Imagem'] . '</td>
        <td>' . $row['Titulo'] . '</td>
        <td>' . $row['Autor'] . '</td>
        <td>' . $row['Assunto'] . '</td>
        <td>' . $row['Publicacao'] . '</td>
        <td>' . $row['Paginas'] . '</td>
        <td>' . $row['Isbn'] . '</td>
        <td>' . $row['Estado'] . '</td>
        <td>' . $row['Exemplares'] . '</td>
        <td><button class="btn btn-success" id="btn_edit" data-id=' . $row['id_livros'] . '><span class="fa fa-edit"></span></button></td>
        <td><button class="btn btn-danger" id="btn_delete" data-id1=' . $row['id_livros'] . '><span class="fa fa-trash"></span></button></td>
    </tr>';
    }
    $value .= '</table>';
    echo json_encode(['status' => 'success', 'html' => $value]);
}

function get_record()
{
    global $con;
    $UserID = $_POST['UserID'];
    $query = "select * from livros where id_livros='$UserID'";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $User_data = "";
        $User_data[0] = $row['id_livros'];
        $User_data[1] = $row['Imagem'];
        $User_data[2] = $row['Titulo'];
        $User_data[3] = $row['Autor'];
        $User_data[4] = $row['Assunto'];
        $User_data[5] = $row['Publicacao'];
        $User_data[6] = $row['Paginas'];
        $User_data[7] = $row['Isbn'];
        $User_data[8] = $row['Estado'];
        $User_data[9] = $row['Exemplares'];


    }
    echo json_encode($User_data);
}

function update_value()
{
    global $con;
    $Update_ID = $_POST['U_id_livros'];
    $Update_Imagem = $_POST['U_Imagem'];
    $Update_Titulo = $_POST['U_Titulo'];
    $Update_Autor = $_POST['U_Autor'];
    $Update_Assunto = $_POST['U_Assunto'];
    $Update_Publicacao = $_POST['U_Publicacao'];
    $Update_Paginas = $_POST['U_Paginas'];
    $Update_Isbn = $_POST['U_Isbn'];
    $Update_Estado = $_POST['U_Estado'];
    $Update_Exemplares = $_POST['U_Exemplares'];


    $query = "UPDATE livros set Imagem='$Update_Imagem',Titulo='$Update_Titulo', Autor='$Update_Autor',Assunto='$Update_Assunto',Publicacao='$Update_Publicacao',Paginas='$Update_Paginas',Isbn='$Update_Isbn',Estado='$Update_Estado',Exemplares='$Update_Exemplares' WHERE id_livros ='$Update_ID'";
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
    $query = "delete from livros where id_livros='$Del_ID' ";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo 'O registo foi apagado';
    } else {
        echo 'Por favor, verifique a base de dados';
    }

}

?>


