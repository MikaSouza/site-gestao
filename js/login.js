$("document").ready(function () {
    $("#login-form").validate({
        rules: {
            vSSenha: {
                required: true,
            },
            vSUsuario: {
                required: true,
                email: true,
            },
        },
        messages: {
            vSSenha: {
                required: "O campo senha é obrigatório.",
            },
            vSUsuario: {
                required: "O campo e-mail é obrigatório.",
                email: "Informe um e-mail válido.",
            },
        },
        submitHandler: submitForm,
    });

    function submitForm() {
        var data = $("#login-form").serialize();

        $.ajax({
            type: "POST",
            url: "scripts/verifica-login.php",
            data: data,
            dataType: "json",
            beforeSend: function () {
                $("#error").fadeOut();
                // Swal.showLoading();
                Swal.fire({
                    position: "center",
                    type: "warning",
                    title: "",
                    text: "Enviando...",
                    showConfirmButton: false,
                });
                // $("#btn-login")
                //     .html(
                //         '<i class="fas fa-exchange-alt"></i> &nbsp; Enviando ...'
                //     )
                //     .prop("disabled");
            },
            success: function (response) {
                if (response.success) {
                    $("#btn-login")
                        .html(
                            '<i class="fas fa-spinner fa-pulse"></i> &nbsp; Autenticando ...'
                        )
                        .prop("disabled");
                    setTimeout(
                        'window.location.href = "dados-municipio.php";',
                        4000
                    );
                } else {
                    $("#error").fadeIn(1000, function () {
                        Swal.fire(
                            "Opss..",
                            "Login ou Senha inválidos!",
                            "warning"
                        );
                        $("#error").html(
                            '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>' +
                                response.message +
                                "</strong></div>"
                        );
                        $("#btn-login").html("Entrar");
                    });
                }
            },
            complete: function () {
                // Swal.hideLoading();
            },
        });
        return false;
    }
});
