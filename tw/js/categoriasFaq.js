$('form[name=formCategoriasFaq]').validate({
	rules: {
		vSCFQCATEGORIA: { required: true }
	},
	messages: {
		vSCFQCATEGORIA: { required: 'Você esqueceu de preencher a Categoria.' }
	},
	submitHandler: function( form ){
		form.submit();
	}
});

$(document).ready(function(){
	gerarGrid({
		namePage: 'categoriasFaq',
		buttons: {
			add: {
				text: 'Nova Categoria'
			}
		}
	});
});