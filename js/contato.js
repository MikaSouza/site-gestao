$(function () {
	$("#formContato").validate({
		rules: {
			vSCONNOME: {
				required: true
			},
			vSCONTELEFONE: {
				required: true
			},
			vSCONEMAIL: {
				required: true,
				email: true
			},
			vSCONMENSAGEM: {
				required: true
			}
		},
		messages: {
			vSCONNOME: {
				required: 'Insira seu Nome!'
			},
			vSCONTELEFONE: {
				required: 'Insira seu Nome!'
			},
			vSCONEMAIL: {
				required: 'Insira seu E-mail!',
				email: 'O formato de email está incorreto. Exemplo correto: seuemail@seuemail.com'
			},
			vSCONMENSAGEM: {
				required: 'Escrava sua Mensagem!'
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

function enviarContato() {

	$("#formContato [name=g-recaptcha-response]").val(grecaptcha.getResponse());

	let dados = $("#formContato").serialize();

	$.ajax({
		type: "POST",
		url: "enviarContato.php",
		data: dados,
		dataType: 'json',
		success: function (data) {
			if (data[0])
				swal("", "A mensagem foi enviada com sucesso!", "success");
			else
				swal("", "Não foi possível enviar sua mensagem!", "error");

			document.getElementById('formContato').reset();
		},
		error: function (data) {
			swal("", "Não foi possível enviar sua mensagem!", "error");
		},
		complete: function () {
			grecaptcha.reset();
		}
	});
}