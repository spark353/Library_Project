<?php
global $con;
include ('functions1.php');
include ('../add_students/connect.php');
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</head>
<body>
<h2 style="margin-top: 35px; margin-left: 20px">Portal da Biblioteca Santiago Maior</h2>


<div class="card-body">
    <span><img src="../logout.png" onclick="location.href='../index_login_students.php'" style="width: 35px; height: 27px; float: right;  transform: translate(-40px, -90px); cursor: pointer" </span>
    <h6 style="float: right; transform: translate(-50px, -88px)">Sair</h6>
    <form class="form-inline mr-auto" style="float: right; transform: translateY(-45px)">
        <input class="form-control" type="text" placeholder="Pesquisar..." aria-label="Search" id="search">
        <button class="btn btn-outline btn-md my-0 ml-sm-0" type="submit" id="submit" style="background: #E64716; color: white">Procurar</button>
        <>
        <div id="result"></div>
    </form>

    <div class="card mt -5" style="margin-right: 20px; margin-left: 20px; margin-top: 20px">
        <div class="card-header" style="background: #BC0000">
            <h4 style="color: white; font-size: 21px;">Lista de livros</h4>
        </div>

        <div id="content_area">
            <div id="list_books">
                <?php
                $get_pro = "select * from livros";

                $run_pro = mysqli_query($con, $get_pro);

                while ($row_pro = mysqli_fetch_array($run_pro)){
                    $pro_id_livros = $row_pro['id_livros'];

                    $pro_id_alunos = $row_pro['id_alunos'];
                    $pro_titulo = $row_pro['Titulo'];
                    $pro_autor = $row_pro['Autor'];
                    $pro_assunto = $row_pro['Assunto'];
                    $pro_publicacao = $row_pro['Publicacao'];
                    $pro_paginas = $row_pro['Paginas'];
                    $pro_isbn = $row_pro['Isbn'];
                    $pro_estado = $row_pro['Estado'];
                    $pro_exemplares = $row_pro['Exemplares'];

                    echo "<div id='single_product' style='margin-top: 15px'>
                                      <p style='font-size: 18px; margin-left: 20px'>Titulo: $pro_titulo</p>
                                      <p style='font-size: 18px; margin-left: 20px'>Autor: $pro_autor</p>
                                      <p style='font-size: 18px; margin-left: 20px'>Assunto: $pro_assunto</p>
                                      <p style='font-size: 18px; margin-left: 20px'>Publicação: $pro_publicacao</p>
                                      <p style='font-size: 18px; margin-left: 20px'>Páginas: $pro_paginas</p>
                                      <p style='font-size: 18px; margin-left: 20px'>ISBN: $pro_isbn</p>
                                      <p style='font-size: 18px; margin-left: 20px'>Estado: $pro_estado</p>
                                      <p style='font-size: 18px; margin-left: 20px'>Exemplares: $pro_exemplares</p>
                                      <br><br>
                         ";
                }
                ?>
            </div>
        </div>

    </div>
</div>
</div>
</div>
</div>
</div>


</form>
</body>

