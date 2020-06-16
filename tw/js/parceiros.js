$('form[name=formParceiros]').validate({
	rules: {
		vSCLICLIENTE  : { required: true},
		vFPARIMAGEM : { required: true, accept: 'image/*' }
	},
	messages: {
		vSCLICLIENTE  : { required: 'Você esqueceu de preencher a descrição'},
		vFPARIMAGEM : { required: 'Você esqueceu de selecionar a imagem.', accept: 'Você pode enviar apenas arquivos de imagem!' }
	},
	submitHandler: function( form ){
		form.submit();
	}
});

$(document).ready(function(){
	gerarGrid({
		namePage: 'parceiros',
		buttons: {
			add: {
				text: 'Novo Parceiro'
			}
		}
	});
});