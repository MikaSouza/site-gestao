$(function () {
	$("#formFormulario").validate({
		rules: {
			vSFORNOMEDOENTE: {
				required: true
			},
			vSFORNUMHABMUNICIPIO: {
				required: true
			},
			vMFORVALORCANUAL: {
				required: true
			},
			vSFORNUMSERVIDORES: {
				required: true
			}
		},
		messages: {
			vSFORNOMEDOENTE: {
				required: 'Você esqueceu de preencher!'
			},
			vSFORNUMHABMUNICIPIO: {
				required: 'Você esqueceu de preencher!'
			},
			vMFORVALORCANUAL: {
				required: 'Você esqueceu de preencher!'
			},
			vSFORNUMSERVIDORES: {
				required: 'Você esqueceu de preencher!'
			}

		},
		errorPlacement: function (error, element) {
            console.log(error.text());
            element.addClass("is-invalid");
            element.prop('placeholder', error.text());
            element.prop('title', error.text());
            element.children('option').first().text(error.text());

            return false;
        },
        submitHandler: function (form) {
            grecaptcha.execute();
        }
	});

	document.getElementById("vFFORANEXOLEGIS").onchange = function () {
        let file = this.files[0];
        let documentfile = file.type;
        let match = ["application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
            "application/vnd.oasis.opendocument.text"
        ];

        if (!((documentfile == match[0]) || (documentfile == match[1]) || (documentfile == match[2]) || (documentfile == match[3]))) {
            alert('Você pode enviar apenas arquivos do tipo .doc, .docx, .odt e .pdf!');
            file.value = '';
            return false;
        }
        document.getElementById("lblAnexo").innerHTML = file.name;
    };

});

function enviarFormulario() {

	$("#formFormulario [name=g-recaptcha-response]").val(grecaptcha.getResponse());

	const file_data = $("#vFFORANEXOLEGIS").prop("files")[0];
    const form_data = new FormData($("#formFormulario")[0]);

	$.ajax({
        url: "enviarFormulario.php",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (data) {
            if (data[0])
                swal("", "A mensagem foi enviada com sucesso!!", "success");
            else
                swal("", "Não foi possível enviar sua mensagem!!", "error");

            document.getElementById('formFormulario').reset();
            document.getElementById("lblAnexo").innerHTML = '';
        },
        error: function (data) {
            swal("", "Não foi possível enviar sua mensagem!", "error");
        },
        complete: function () {
            grecaptcha.reset();
        }
    });
}