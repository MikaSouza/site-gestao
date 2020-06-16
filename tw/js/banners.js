$('form[name=formBanners]').validate({
	rules: {
		vSBANTITULO: { required: true},
		vSBANLINK: 	 { url: true},
		vFBANIMAGEM: { required: true, accept: 'image/*' }
	},
	messages: {
		vSBANTITULO: { required: 'Você esqueceu de preencher o titulo.'},
		vSBANLINK: 	 { url: 'Você deve informar uma URL válida!'},
		vFBANIMAGEM: { required: 'Você esqueceu de selecionar a imagem.', accept: 'Você pode enviar apenas arquivos de imagem!' }
	},
	submitHandler: function( form ){
		form.submit();
	}
});

$(document).ready(function(){
	gerarGrid({
		namePage: 'banners',
		buttons: {
			add: {
				text: 'Novo Banner'
			}
		}
	});
});