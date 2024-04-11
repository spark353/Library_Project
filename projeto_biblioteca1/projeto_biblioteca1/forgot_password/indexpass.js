$(document).ready(function () {
    $('.reset-request-submit').on('click', function () {
        if (email.val() !== ""){
            email.css('border', '1px solid green');

            $.ajax({
                url: 'reset_password.php',
                method: 'post',
                dataType: 'json',
                data: {
                    email: email.val()
                }, success: function () {
                    if (!response.success())
                        $("#response").html(response.msg).css('color',"red");
                }
            })
        }else {
            email.css('border', '1px solid red');
        }
    });
});