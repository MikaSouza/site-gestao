$(function () {
    $("#formEbook").validate({
        rules: {
            nome: {
                required: true
            },
            cidade: {
                required: true
            },
            estado: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            celular: {
                required: true
            },
            termos: {
                required: true
            }
        },
        messages: {
            nome: {
                required: 'Insira seu Nome!'
            },
            cidade: {
                required: 'Insira sua Cidade!'
            },
            estado: {
                required: 'Insira seu Estado!'
            },
            email: {
                required: 'Insira seu E-mail!',
                email: 'O formato de email está incorreto. Exemplo correto: seuemail@seuemail.com'
            },
            celular: {
                required: 'Insira seu Celular!'
            },
            termos: {
                required: 'Selecione a Caixinha!'
            }

        },
        errorPlacement: function (error, element) {
            element.prop('placeholder', error.text());
            element.prop('title', error.text());
            element.children('option').first().text(error.text());
            return false;
        },
        submitHandler: function (form) {
            grecaptcha.execute();
        }
    });

});

function enviarEbook() {

    $("#formEbook [name=g-recaptcha-response]").val(grecaptcha.getResponse());

    let dados = $("#formEbook").serialize();

    $.ajax({
        type: "POST",
        url: "enviarEbook.php",
        data: dados,
        dataType: 'json',
        beforeSend: function () {
            swal("Aguarde!", "Sua mensagem está sendo enviada...", "warning");
        },

        success: function (data) {

            if (data[0])
                swal("", "A mensagem foi enviada com sucesso!", "success");
            else
                swal("", "Não foi possível enviar sua mensagem!", "error");

            document.getElementById('formEbook').reset();
        },
        error: function (data) {
            swal("", "Não foi possível enviar sua mensagem!", "error");
        },
        complete: function () {
            grecaptcha.reset();
        }
    });
}