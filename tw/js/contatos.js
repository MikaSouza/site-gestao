$('form[name=formContatos]').validate({
	rules: {
		vSCONNOME: { required: true },
		vSCONEMAIL: { required: true, email: true},
		vSCONASSUNTO: { required: true },
		vSCONTELEFONE: { required: true },
		vSCONMENSAGEM: { required: true }
	},
	messages: {
		vSCONNOME: { required: 'Você esqueceu de preencher o nome.' },
		vSCONEMAIL: { required: 'Você esqueceu de preencher o email.', email: 'O E-mail informado não é válido'},
		vSCONASSUNTO: { required: 'Você esqueceu de preencher o assunto.' },
		vSCONTELEFONE: { required: 'Você esqueceu de preencher o telefone.' },
		vSCONMENSAGEM: { required: 'Você esqueceu de preencher a mensagem.' }
	},
	submitHandler: function( form ){
		form.submit();
	}
});

$(document).ready(function(){
	gerarGrid({
		namePage: 'contatos',
		buttons: {
			add: {
				text: 'Novo Contato'
			}
		},
		order: [0, 'desc']
	});
});