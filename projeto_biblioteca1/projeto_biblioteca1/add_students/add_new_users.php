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
    <script src="index.js"></script>

</head>
<body>


<h2>Portal da Biblioteca Santiago Maior</h2>

<div class="row">
    <div class="col">
        <div class="card mt -5" style="margin-right: 20px; margin-left: 20px; margin-top: 20px; ">
            <div class="card-header" style="background: #BC0000">
                <nav class="navbar-brand">
                    <a class="nav-brand" href="../add_books/add_book.php" style="color: black;">Livros</a>
                </nav>
                <nav class="navbar-brand">
                    <a class="nav-brand" href="add_new_users.php" style="color: black">Alunos</a>
                </nav>
                <nav class="navbar-brand">
                    <a class="nav-brand" href="../pending_subscription/pending_sub.php" style="color:black;">Inscrições
                        pendentes</a>
                </nav>
                <button type="button" data-toggle="modal" data-target="#Add_users"
                        style="background: -webkit-linear-gradient(top, #40D413, #13A918); float: right; color: white; margin-right: 30px; margin-bottom: 20px; transform: translateY(10px); padding-right:20px; padding-left: 20px ">
                    Inserir novo aluno
                </button>

            </div>
            <div class="card-body">
                <form class="form-inline mr-auto" style="float: right; margin-bottom: 20px">
                    <input class="form-control" type="text" placeholder="Pesquisar..." aria-label="Search" id="search">
                    <button class="btn btn-outline btn-md my-0 ml-sm-0" type="submit" id="submit"
                            style="background: #E64716; color: white">Procurar
                    </button>
                    <div id="result"></div>
                </form>
                <p id="delete-message" class="text-dark"></p>
                <div id="table">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="Add_users">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="model-header">
                <h3 class="text-dark">Inserir novo utilizador</h3>
            </div>
            <div class="modal-body">
                <p id="message" class="text-dark"></p>
                <form>
                    <input type="text" class="form-control my-2" placeholder="Nome" id="Nome" pattern="[a-zA-Z]{1,80}"
                           title="Por favor, coloque nome" required>
                    <input type="text" class="form-control my-2" placeholder="Nº de aluno" id="N_aluno" pattern=".{1,5}"
                           title="Por favor, coloque o nº de aluno" required>
                    <input type="text" class="form-control my-2" placeholder="Nº de documento" id="N_documento"
                           pattern=".{9}"
                           title="Por favor, coloque o número do documento" required>
                    <input type="text" class="form-control my-2" placeholder="Ano de matrícula" id="Ano_matricula"
                           pattern=".{4}" title="Por favor, coloque o ano de matrícula" required>
                    <input type="text" class="form-control my-2" placeholder="Nº de telefone" id="N_telefone"
                           pattern=".{9}"
                           title="Por favor, coloque número de telefone" required>
                    <input type="email" class="form-control my-2" placeholder="E-mail" id="Email"
                           pattern="/([\w\-]+\@[\w\-]+\.[\w\-]+)/"
                           title="Por favor, coloque  e-mail" required>

                    <select class="form-control my2" data-placeholder="Escolha a opção" id="Estado" required>
                        <option value="Aceite">Aceite</option>
                        <option value="Pendente">Pendente</option>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="add_btn"
                        style="background: -webkit-linear-gradient(top, #1562E4, #1C4993); border-radius: 10px;10px;10px;10px; color: white">
                    Adicionar
                </button>
                <button type="button" data-dismiss="modal" id="btn_close"
                        style="background: -webkit-linear-gradient(top, #1562E4, #1C4993); border-radius: 10px;10px;10px;10px; color: white">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="update">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="model-header">
                <h3 class="text-dark">Update Form</h3>
            </div>
            <div class="modal-body">
                <p id="up-message" class="text-dark"></p>
                <form>
                    <input type="text" class="form-control my-2" placeholder="Nome" id="Up_Nome">
                    <input type="text" class="form-control my-2" placeholder="Nº de aluno" id="Up_N_aluno">
                    <input type="text" class="form-control my-2" placeholder="Nº do documento" id="Up_N_documento">
                    <input type="text" class="form-control my-2" placeholder="Ano de matricula" id="Up_Ano_matricula">
                    <input type="text" class="form-control my-2" placeholder="Nº de telefone" id="Up_N_telefone">
                    <input type="text" class="form-control my-2" placeholder="Email" id="Up_Email">
                    <input type="hidden" class="form-control my-2" placeholder="User Email" id="Up_User_ID">
                    <select class="form-control my2" data-placeholder="Escolha a opção" id="Up_Estado" required>
                        <option value="Aceite">Aceite</option>
                        <option value="Pendente">Pendente</option>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn_update">Atualizar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="model-header">
                <h3 class="text-dark">Apagar registo</h3>
            </div>
            <div class="modal-body">
                <p>Deseja apagar o registo?</p>
                <button type="button" class="btn btn-success" id="btn_delete_record">Apagar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Fechar</button>
            </div>
        </div>
    </div>
</div>
</form>
</body>
</html>