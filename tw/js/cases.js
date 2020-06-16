$('form[name=formCases]').validate({
    rules: {
        vSCASTITULO: {
            required: true
        },
        vSCASURLAMIG: {
            required: true
        },
        vICATCCODIGO: {
            required: true
        }
    },
    messages: {
        vSCASTITULO: {
            required: 'Você esqueceu de preencher o Título do Case.'
        },
        vSCASURLAMIG: {
            required: 'Você esqueceu de preencher a URL Amigavel.'
        },
        vICATCCODIGO: {
            required: 'Você esqueceu de escolher a Categoria do Case.'
        }
    },
    submitHandler: function (form) {
        form.submit();
    }
});

var imgAtual = 1;
var totalImages = 0;

$(document).ready(function () {
    gerarGrid({
        namePage: 'cases',
        buttons: {
            add: {
                text: 'Novo Registro'
            }
        }
    });

    $("#parse").on('click', function (event) {
        event.preventDefault();
        if (isValidURL($("#vSCASURL").val())) {
            swal({
                    title: "",
                    text: "Deseja obter informações sobre a URL informada?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                },
                function () {
                    $.ajax({
                        url: '../includes/parsePage.php',
                        type: 'GET',
                        data: {
                            url: $("#vSCASURL").val()
                        },
                        dataType: 'json',
                        success: function (result) {
                            $("#vSCASTITULO").val(result.titulo);
                            gerarUrlAmigavel();
                            if (result.descricao != null) tinyMCE.activeEditor.setContent(result.descricao);
                            $(".responseImage > .form-group > .imagens").html(result.imagens);
                            $(".responseImage > .form-group > .imagens > img#1").show();
                            totalImages = result.imagens.length;
                            if (totalImages > 0) {
                                $(".imagemSelecionada").hide();
                                $(".groupImages").show('fast');
                                atualizarNroImagens(1);
                                setImagem($(".responseImage > .form-group > .imagens > img#1").attr('src'));
                            } else {
                                showUploadUnico('Não foram encontradas imagens, faça upload!');
                            }
                            swal('Verificação concluída');
                        },
                        error: function (result) {
                            swal('Oops', 'Ocorreu um erro inesperado', 'error');
                            console.log(result);
                        }
                    });
                });
        } else {
            swal('Oops', 'Preencha uma URL válida!', 'warning');
            $("#vSCASURL").focus();
        }
    });

    $("#next").on('click', function (event) {
        if (imgAtual < totalImages) {
            $(".responseImage > .form-group > .imagens > img#" + imgAtual).hide();
            imgAtual += 1;
            $(".responseImage > .form-group > .imagens > img#" + imgAtual).show();
            atualizarNroImagens(imgAtual);
            setImagem($(".responseImage > .form-group > .imagens > img#" + imgAtual).attr('src'));
        }
    });

    $("#prev").on('click', function (event) {
        if (imgAtual > 1) {
            $(".responseImage > .form-group > .imagens > img#" + imgAtual).hide();
            imgAtual -= 1;
            $(".responseImage > .form-group > .imagens > img#" + imgAtual).show();
            atualizarNroImagens(imgAtual);
            setImagem($(".responseImage > .form-group > .imagens > img#" + imgAtual).attr('src'));
        }
    });

    $("#vSCASTITULO").on('blur change', gerarUrlAmigavel);
});

function atualizarNroImagens(atual) {
    $("span.descImages").text('Imagem ' + atual + ' de ' + totalImages);
}

function setImagem(imagem) {
    $("input[name=vSCASIMAGEM]").val(imagem);
}

function isValidURL(vSCASURL) {
    var RegExp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;

    if (RegExp.test(vSCASURL)) {
        return true;
    } else {
        return false;
    }
}

function showUploadUnico(label) {
    $(".uploadUnico label").text(label);
    $(".uploadUnico").show('fast');
}

// function changeTipoNoticia(tipoNoticia) {
//     if (tipoNoticia === 'E') {
//         $("#vSCASURL").parent().parent().show();
//         $("#vSCASURL").addClass('obrigatorio');
//         $(".uploadUnico").hide();
//     } else {
//         $("#vSCASURL").parent().parent().hide();
//         $("#vSCASURL").removeClass('obrigatorio');
//     }
// }

function gerarUrlAmigavel() {
    if ($("#vSCASURLAMIG").val() == '') {
        var url = $("#vSCASTITULO").val().toLowerCase().slice(0, 100);
        url = url.replace(/\^|~|\?|,|\*|\.|\-/g, '')
        url = url.replace(/ /g, '-');
        url = url.replace(/\//g, '-');
        $("#vSCASURLAMIG").val(url);
    }
}