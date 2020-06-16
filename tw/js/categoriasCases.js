$('form[name=formCategoriasCases]').validate({
    rules: {
        vSCATCCATEGORIA: {
            required: true
        },
        vFCAARQUIVO: {
            required: true
        }
    },
    messages: {
        vSCATCCATEGORIA: {
            required: 'Você esqueceu de preencher a Categoria.'
        },
        vFCAARQUIVO: {
            required: 'Você esqueceu de selecionar a imagem.'
        }
    },
    submitHandler: function (form) {
        form.submit();
    }
});

$(document).ready(function () {
    gerarGrid({
        namePage: 'categoriasCases',
        buttons: {
            add: {
                text: 'Novo Case',
                url: "cadCategoriasCases.php?" + $("#vSCATCTIPO").val()
            }
        },
        dataUrl: "../transaction/transactionCategoriasCases.php?dadosList&" + $("#vSCATCTIPO").val()
    });
});