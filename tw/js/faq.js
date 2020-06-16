$('form[name=formFaq]').validate({
	rules: {
		vSFAQPERGUNTA: { required: true },
		vSFAQRESPOSTA:    { required: true },
		vICFQCODIGO:    { required: true }
	},
	messages: {
		vSFAQPERGUNTA: { required: 'Você esqueceu de preencher a Pergunta.' },
		vSFAQRESPOSTA: { required: 'Você esqueceu de selecionar a Resposta.' },
		vICFQCODIGO: { required: 'Você esqueceu de selecionar a Categoria do Faq.' }
	},
	submitHandler: function( form ){
		form.submit();
	}
});

$(document).ready(function(){
	gerarGrid({
		namePage: 'faq',
		buttons: {
			add: {
				text: 'Novo Faq'
			}
		}
	});
});