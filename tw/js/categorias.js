$('form[name=formCategorias]').validate({
	rules: {
		vSCATCATEGORIA: { required: true },
		vFCAARQUIVO:    { required: true }
	},
	messages: {
		vSCATCATEGORIA: { required: 'Você esqueceu de preencher a Categoria.' },
		vFCAARQUIVO: { required: 'Você esqueceu de selecionar a imagem.' }
	},
	submitHandler: function( form ){
		form.submit();
	}
}); 

$(document).ready(function(){
	gerarGrid({
		namePage: 'categorias',
		buttons: {
			add: {
				text: 'Nova Categoria',
				url: "cadCategorias.php?"+$("#vSCATTIPO").val()
			}
		},
		dataUrl: "../transaction/transactionCategorias.php?dadosList&"+$("#vSCATTIPO").val()
	});
});