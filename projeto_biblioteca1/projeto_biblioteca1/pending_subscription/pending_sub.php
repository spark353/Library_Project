<?php
global $con;
include('functions2.php');
include('../add_students/connect.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registo estudante</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    <link rel="stylesheet" type="text/css" href="../style_add_students.css">-->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>

</head>
<body>

<h2>Portal da Biblioteca Santiago Maior</h2>

<div class="row">
    <div class="col">
        <div class="card mt -5" style="margin-right: 20px; margin-left: 20px; margin-top: 20px; ">
            <div class="card-header" style="background: #BC0000">
                <nav class="navbar-brand">
                    <a class="nav-brand" href="../add_books/add_book.php" style="color: black">Livros</a>
                </nav>
                <nav class="navbar-brand">
                    <a class="nav-brand" href="../add_students/add_new_users.php" style="color: black">Alunos</a>
                </nav>
                <nav class="navbar-brand">
                    <a class="nav-brand" href="pending_sub.php" style="color:black;">Inscrições pendentes</a>
                </nav>

            </div>
            <div class="card-body">
                <form class="form-inline " style="float: right; margin-bottom: 20px">
                    <input class="form-control" type="text" placeholder="Pesquisar..." aria-label="Search" id="search">
                    <button class="btn btn-outline btn-md my-0 ml-sm-0" type="submit" id="submit"
                            style="background: #E64716; color: white">Procurar
                    </button>
                    <div id="result"></div>

                </form>
                <?php

                $value = "";
                $value = "<table class='table table-bordered'>
                        <tr>
                            <td>Nome</td>
                            <td>Nº aluno</td>
                            <td>Nº documento</td>
                            <td>Ano matricula</td>
                            <td>Telefone</td>
                            <td>Email</td>
                            <td>Estado</td>
                        </tr>
                        ";
                $get_pro = "select * from inserir_utilizadores where estado='Pendente'";

                $run_pro = mysqli_query($con, $get_pro);

                while ($row_pro = mysqli_fetch_array($run_pro)) {
                    $pro_id_insc = $row_pro['id_ins_utili'];

                    $pro_nome = $row_pro['Nome'];
                    $pro_n_aluno = $row_pro['N_aluno'];
                    $pro_n_documento = $row_pro['N_documento'];
                    $pro_ano_matricula = $row_pro['Ano_matricula'];
                    $pro_n_telefone = $row_pro['N_telefone'];
                    $pro_email = $row_pro['Email'];
                    $pro_estado = $row_pro['Estado'];

                    $value .= '<tr>
                                      <td>' . $pro_nome . '</td>
                                      <td>' . $pro_n_aluno . '</td>
                                      <td>' . $pro_n_documento . '</td>
                                      <td>' . $pro_ano_matricula . '</td>
                                      <td>' . $pro_n_telefone . '</td>
                                      <td>' . $pro_email . '</td>
                                      <td>' . $pro_estado . '</td>
                                </tr> ';


                }
                $value .= '</table>';
                echo $value;


                ?>
                <div>
                </div>
            </div>
        </div>


    </div>
</div>
</div>
</div>

</form>
</body>
</html>
<s
