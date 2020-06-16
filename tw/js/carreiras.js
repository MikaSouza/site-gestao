$('form[name=formCarreira]').validate({
	rules: {
		vSCARNOME: { required: true },
		vSCAREMAIL: { required: true, email: true},
		vSCARVAGA: { required: true },
		vFCARANEXO: { required: true }
	},
	messages: {
		vSCARNOME: { required: 'Você esqueceu de preencher o nome.' },
		vSCAREMAIL: { required: 'Você esqueceu de preencher o email.', email: 'O E-mail informado não é válido'},
		vSCARVAGA: { required: 'Você esqueceu de preencher a vaga.' },
		vFCARANEXO: { required: 'Você esqueceu de selecionar o anexo.' }
	},
	submitHandler: function( form ){
		form.submit();
	}
});

$(document).ready(function(){
	gerarGrid({
		namePage: 'carreiras',
		buttons: {
			add: {
				text: 'Novo Carreiras'
			}
		},
		order: [0, 'desc']
	});
});