$('form[name=formUsuarios]').validate({
	rules: {
		vSUSUUSUARIO: { required: true },
		vSUSUSENHA: { required: true },
		vSUSUCONFIRMARSENHA: { required: true, equalTo: '#vSUSUSENHA' }
	},
	messages: {
		vSUSUUSUARIO: { required: 'Você esqueceu de preencher o Usuário.' },
		vSUSUSENHA: { required: 'Você esqueceu de preencher a Senha.'},
		vSUSUCONFIRMARSENHA: { required: 'Você esqueceu de confirmar a Senha.', equalTo: 'As senhas não conferem!' }
	},
	submitHandler: function( form ){
		form.submit();
	}
});

$(document).ready(function(){
	gerarGrid({
		namePage: 'usuarios',
		buttons: {
			add: {
				text: 'Novo Usuário'
			}
		}
	});
});