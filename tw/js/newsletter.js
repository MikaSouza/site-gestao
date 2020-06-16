$('form[name=formNewsletters]').validate({
	rules: {
		vSNEWEMAIL: { required: true, email: true}
	},
	messages: {
		vSNEWEMAIL: { required: 'Você esqueceu de preencher o email.', email: 'O E-mail informado não é válido'}
	},
	submitHandler: function( form ){
		form.submit();
	}
});

$(document).ready(function(){
	gerarGrid({
		namePage: 'newsletters',
		buttons: {
			add: {
				text: 'Nova Newsletter'
			}
		}
	});
});