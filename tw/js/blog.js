$('form[name=formBlog]').validate({
    rules: {
        vSBLOTITULO: {
            required: true
        },
        vSBLOTIPO: {
            required: true
        }
    },
    messages: {
        vSBLOTITULO: {
            required: 'Você esqueceu de preencher a Notícia.'
        },
        vSBLOTIPO: {
            required: 'Você esqueceu de selecionar a imagem.'
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
        namePage: 'blog',
        buttons: {
            add: {
                text: 'Novo Registro'
            }
        }
    });

    $("#vSBLOTIPO").on('change', function () {
        changeTipoNoticia($(this).val());
    });

    $("#parse").on('click', function (event) {
        event.preventDefault();
        if (isValidURL($("#vSBLOURL").val())) {
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
                            url: $("#vSBLOURL").val()
                        },
                        dataType: 'json',
                        success: function (result) {
                            $("#vSBLOTITULO").val(result.titulo);
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
            $("#vSBLOURL").focus();
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

    $("#vSBLOTITULO").on('blur change', gerarUrlAmigavel);
});

function atualizarNroImagens(atual) {
    $("span.descImages").text('Imagem ' + atual + ' de ' + totalImages);
}

function setImagem(imagem) {
    $("input[name=vSBLOIMAGEM]").val(imagem);
}

function isValidURL(vSBLOURL) {
    var RegExp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;

    if (RegExp.test(vSBLOURL)) {
        return true;
    } else {
        return false;
    }
}

function showUploadUnico(label) {
    $(".uploadUnico label").text(label);
    $(".uploadUnico").show('fast');
}

function changeTipoNoticia(tipoNoticia) {
    if (tipoNoticia === 'E') {
        $("#vSBLOURL").parent().parent().show();
        $("#vSBLOURL").addClass('obrigatorio');
        $(".uploadUnico").hide();
    } else {
        $("#vSBLOURL").parent().parent().hide();
        $("#vSBLOURL").removeClass('obrigatorio');
    }
}

function gerarUrlAmigavel() {
    if ($("#vSBLOURLAMIG").val() == '') {
        var url = $("#vSBLOTITULO").val().toLowerCase().slice(0, 100);
        url = url.replace(/\^|~|\?|,|\*|\.|\-/g, '')
        url = url.replace(/ /g, '-');
        url = url.replace(/\//g, '-');
        $("#vSBLOURLAMIG").val(url);
    }
}