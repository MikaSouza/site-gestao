$('form[name=formBancoImagens]').validate({
	rules: {
		vSBAITITULO: { required: true},
		vFBAIIMAGEM: { required: true, accept: 'image/*' }
	},
	messages: {
		vSBAITITULO: { required: 'Você esqueceu de preencher o titulo.'},
		vFBAIIMAGEM: { required: 'Você esqueceu de selecionar a imagem.', accept: 'Você pode enviar apenas arquivos de imagem!' }
	},
	submitHandler: function( form ){
		form.submit();
	}
});

$(document).ready(function(){
	gerarGrid({
		namePage: 'bancoImagens',
		buttons: {
			add: {
				text: 'Nova Imagem'
			}
		}
	});
});