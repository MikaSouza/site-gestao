$('form[name=formConfig]').validate({
	rules: {
		vSCFGHOST: { required: true },
		vSCFGEMAILENVIO: { required: true, email: true },
		vSCFGSENHAEMAIL: { required: true },
		vSCFGCEPENVIO: { required: true },
		vSCFGPORT: { required: true },
		vSCFGCRIPTOGRAFIA: { required: true },
		vSCFGEMAILRECEBIMENTO: { required: true, email: true }
	},
	messages: {
		vSCFGHOST: { required: 'Você esqueceu de preencher o E-mail host.' },
		vSCFGEMAILENVIO: { required: 'Você esqueceu de preencher o E-mail de envio.', email: 'O formato de E-mail está incorreto.' },
		vSCFGSENHAEMAIL: { required: 'Você esqueceu de preencher a senha do E-mail.' },
		vSCFGCEPENVIO: { required: 'Você esqueceu de preencher o CEP de envio.' },
		vSCFGPORT: { required: 'Você esqueceu de preencher o a porta.' },
		vSCFGCRIPTOGRAFIA: { required: 'Você esqueceu de preencher o tipo de criptografia.' },
		vSCFGEMAILRECEBIMENTO: { required: 'Você esqueceu de preencher o E-mail de recebimento.', email: 'O formato de E-mail está incorreto.' }
	},
	errorPlacement: function(error, element) {
		element.prop('placeholder', error.text());
		element.prop('title', error.text());
	},
	submitHandler: function( form ){
		form.submit();
	}
});