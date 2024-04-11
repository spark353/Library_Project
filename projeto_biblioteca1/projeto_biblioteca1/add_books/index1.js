$(document).ready(function () {
    Search_record();
    Insert_record();
    view_record();
    get_record();
    update_record();
    delete_record();
})

function Search_record() {

    $('#search').keyup(function () {
        search_table($(this).val());
    });

    function search_table(value) {
        $('#employee_table tr').each(function () {
            var found = 'false';
            $(this).each(function () {
                if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                    found = 'true';
                }
            });
            if (found === 'true') {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

}

function Insert_record() {
    $(document).on('click', '#add_btn', function () {
        var In_Imagem = $('#Imagem').val();
        var In_Titulo = $('#Titulo').val();
        var In_Autor = $('#Autor').val();
        var In_Assunto = $('#Assunto').val();
        var In_Publicacao = $('#Publicacao').val();
        var In_Paginas = $('#Paginas').val();
        var In_Isbn = $('#Isbn').val();
        var In_Estado = $('#Estado').val();
        var In_Exemplares = $('#Exemplares').val();


        if (In_Imagem === "" || In_Titulo === "" || In_Autor === "" || In_Assunto === "" || In_Publicacao === "" || In_Paginas === "" || In_Isbn === "" || In_Estado === "" || In_Exemplares === "") {

            $('#message').html('Por favor, preencha os espaços vazios');
        } else {
            $.ajax(
                {
                    url: 'insert1.php',
                    method: 'post',
                    data: {
                        Imagem: In_Imagem,
                        Titulo: In_Titulo,
                        Autor: In_Autor,
                        Assunto: In_Assunto,
                        Publicacao: In_Publicacao,
                        Paginas: In_Paginas,
                        Isbn: In_Isbn,
                        Estado: In_Estado,
                        Exemplares: In_Exemplares
                    },
                    success: function (data) {
                        $('#message').html(data);
                        $('#Add_books').modal('show');
                        // $('form').trigger('reset');
                        // view_record();
                    }


                })
        }
    })

    $(document).on('click', '#btn_close', function () {
        $('form').trigger('reset');
        $('#message').html('');
    })
}

function view_record() {
    $.ajax(
        {
            url: 'view1.php',
            method: 'post',
            success: function (data) {
                data = $.parseJSON(data);
                if (data.status === 'success') {
                    $('#table').html(data.html);
                }
            }
        })
}

function get_record() {
    $(document).on('click', '#btn_edit', function () {
        var ID = $(this).attr('data-id');
        $.ajax({
            url: 'get_data1.php',
            method: 'post',
            data: {UserID: ID},
            dataType: 'JSON',
            success: function (data) {
                $('#Up_User_ID').val(data[0]);
                $('#Up_Imagem').val(data[1])
                $('#Up_Titulo').val(data[2]);
                $('#Up_Autor').val(data[3]);
                $('#Up_Assunto').val(data[4]);
                $('#Up_Publicacao').val(data[5]);
                $('#Up_Paginas').val(data[6]);
                $('#Up_Isbn').val(data[7]);
                $('#Up_Estado').val(data[8]);
                $('#Up_Exemplares').val(data[9]);
                $('#update').modal('show');
            }
        })

    })


}

function update_record() {
    $(document).on('click', '#btn_update', function () {

        var UpdateID = $('#Up_User_ID').val();
        var UpdateImagem = $('#Up_Imagem').val();
        var UpdateTitulo = $('#Up_Titulo').val();
        var UpdateAutor = $('#Up_Autor').val();
        var UpdateAssunto = $('#Up_Assunto').val();
        var UpdatePublicacao = $('#Up_Publicacao').val();
        var UpdatePaginas = $('#Up_Paginas').val();
        var UpdateIsbn = $('#Up_Isbn').val();
        var UpdateEstado = $('#Up_Estado').val();
        var UpdateExemplares = $('#Up_Exemplares').val();

        if (UpdateImagem === "" ||UpdateTitulo === "" || UpdateAutor === "" || UpdateAssunto === "" || UpdatePublicacao === "" || UpdatePaginas === "" || UpdateIsbn === "" || UpdateEstado === "" || UpdateExemplares === "") {
            $('#up-message').html('Por favor preencha os campos vazios');
            $('#update').modal('show');
        } else {
            $.ajax({
                url: 'update1.php',
                method: 'post',
                data: {
                    U_id_livros: UpdateID,
                    U_Imagem: UpdateImagem,
                    U_Titulo: UpdateTitulo,
                    U_Autor: UpdateAutor,
                    U_Assunto: UpdateAssunto,
                    U_Publicacao: UpdatePublicacao,
                    U_Paginas: UpdatePaginas,
                    U_Isbn: UpdateIsbn,
                    U_Estado: UpdateEstado,
                    U_Exemplares: UpdateExemplares
                },
                success: function (data) {
                    $('#up-message').html(data);
                    $('#update').modal('show');
                    view_record()
                }
            })
        }
    })

}

function delete_record() {

    $(document).on('click', '#btn_delete', function () {

        var Delete_ID = $(this).attr('data-id1');
        $('#delete').modal('show');
        $(document).on('click', '#btn_delete_record', function () {
            $.ajax({
                url: 'delete1.php',
                method: 'post',
                data: {Del_ID: Delete_ID},
                success: function (data) {
                    $('#delete-message').html(data);
                }
            })

        })
    })
}

