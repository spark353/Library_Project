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

        var In_nome = $('#Nome').val();
        var In_n_aluno = $('#N_aluno').val();
        var In_n_documento = $('#N_documento').val();
        var In_ano_matricula = $('#Ano_matricula').val();
        var In_n_telefone = $('#N_telefone').val();
        var In_email = $('#Email').val();
        var In_Estado = $('#Estado').val();

        if (In_nome === "" || In_n_aluno === "" || In_n_documento === "" || In_ano_matricula === "" || In_n_telefone === "" || In_email === "" || In_Estado === "") {

            $('#message').html('Por favor, preencha os espaços vazios');
        } else {
            $.ajax(
                {
                    url: 'insert.php',
                    method: 'post',
                    data: {
                        INome: In_nome,
                        IN_aluno: In_n_aluno,
                        IN_documento: In_n_documento,
                        IAno_matricula: In_ano_matricula,
                        IN_telefone: In_n_telefone,
                        IEmail: In_email,
                        IEstado: In_Estado
                    },
                    success: function (data) {
                        $('#message').html(data);
                        $('#Add_users').modal('show');
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
            url: 'view.php',
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
            url: 'get_data.php',
            method: 'post',
            data: {UserID: ID},
            dataType: 'JSON',
            success: function (data) {
                $('#Up_User_ID').val(data[0]);
                $('#Up_Nome').val(data[1]);
                $('#Up_N_aluno').val(data[2]);
                $('#Up_N_documento').val(data[3]);
                $('#Up_Ano_matricula').val(data[4]);
                $('#Up_N_telefone').val(data[5]);
                $('#Up_Email').val(data[6]);
                $('#Up_Estado').val(data[7]);
                $('#update').modal('show');
            }
        })

    })


}

function update_record() {
    $(document).on('click', '#btn_update', function () {

        var UpdateID = $('#Up_User_ID').val();
        var UpdateNome = $('#Up_Nome').val();
        var Update_N_aluno = $('#Up_N_aluno').val();
        var Update_N_documento = $('#Up_N_documento').val();
        var Update_Ano_matricula = $('#Up_Ano_matricula').val();
        var Update_N_telefone = $('#Up_N_telefone').val();
        var UpdateEmail = $('#Up_Email').val();
        var UpdateEstado = $('#Up_Estado').val();
        if (UpdateNome === "" || Update_N_aluno === "" || Update_N_documento === "" || Update_Ano_matricula === "" || Update_N_telefone === "" || UpdateEmail === "" || UpdateEstado === "") {
            $('#up-message').html('Por favor preencha os campos vazios');
            $('#update').modal('show');
        } else {
            $.ajax({
                url: 'update.php',
                method: 'post',
                data: {
                    U_id_ins_utili: UpdateID,
                    U_Nome: UpdateNome,
                    U_N_aluno: Update_N_aluno,
                    U_N_documento: Update_N_documento,
                    U_Ano_matricula: Update_Ano_matricula,
                    U_N_telefone: Update_N_telefone,
                    U_Email: UpdateEmail,
                    U_Estado: UpdateEstado
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
                url: 'delete.php',
                method: 'post',
                data: {Del_ID: Delete_ID},
                success: function (data) {
                    $('#delete-message').html(data);
                }
            })

        })
    })

}