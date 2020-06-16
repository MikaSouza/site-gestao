// if(idioma == "pt-BR") {
	jQuery.extend(jQuery.validator.messages, {
	    required: "Este campo &eacute; obrigatório.",
	    remote: "Por favor, corrija este campo.",
	    email: "Por favor, forne&ccedil;a um E-mail v&aacute;lido.",
	    url: "Por favor, forne&ccedil;a uma URL v&aacute;lida.",
	    date: "Por favor, forne&ccedil;a uma data v&aacute;lida.",
	    dateISO: "Por favor, forne&ccedil;a uma data v&aacute;lida (ISO).",
	    number: "Por favor, forne&ccedil;a um n&uacute;mero v&aacute;lido.",
	    digits: "Por favor, forne&ccedil;a somente d&iacute;gitos.",
	    creditcard: "Por favor, forne&ccedil;a um cart&atilde;o de cr&eacute;dito v&aacute;lido.",
	    equalTo: "Por favor, forne&ccedil;a o mesmo valor novamente.",
	    accept: "Por favor, forne&ccedil;a um valor com uma extens&atilde;o v&aacute;lida.",
	    maxlength: jQuery.validator.format("Por favor, forne&ccedil;a n&atilde;o mais que {0} caracteres."),
	    minlength: jQuery.validator.format("Por favor, forne&ccedil;a ao menos {0} caracteres."),
	    rangelength: jQuery.validator.format("Por favor, forne&ccedil;a um valor entre {0} e {1} caracteres de comprimento."),
	    range: jQuery.validator.format("Por favor, forne&ccedil;a um valor entre {0} e {1}."),
	    max: jQuery.validator.format("Por favor, forne&ccedil;a um valor menor ou igual a {0}."),
	    min: jQuery.validator.format("Por favor, forne&ccedil;a um valor maior ou igual a {0}.")
	});
// }else if(idioma == "en-GB") {
// 	jQuery.extend(jQuery.validator.messages, {
// 		required: "This field is required.",
// 	    remote: "Please fix this field.",
// 	    email: "Please enter a valid email address.",
// 	    url: "Please enter a valid URL.",
// 	    date: "Please enter a valid date.",
// 	    dateISO: "Please enter a valid date (ISO).",
// 	    number: "Please enter a valid number.",
// 	    digits: "Please enter only digits.",
// 	    creditcard: "Please enter a valid credit card number.",
// 	    equalTo: "Please enter the same value again.",
// 	    accept: "Please enter a value with a valid extension.",
// 	    maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
// 	    minlength: jQuery.validator.format("Please enter at least {0} characters."),
// 	    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
// 	    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
// 	    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
// 	    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
// 	});
// }