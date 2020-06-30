jQuery(document).ready(function($) {
    //DatePicker
    jQuery(".datepicker").datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        weekStart: 0,
        todayHighlight: true,
        autoclose: true,
        forceParse: false
    });
    jQuery(".datepicker").mask("99/99/9999");

    // DatePicker
    jQuery(".colorpicker-component").colorpicker({
        format: 'rgb'
    });

    //Marcara para telefone (Incluíndo 9º dígito)
    jQuery("input.telefone")
    .mask("(99) 9999-9999?9")
    .focusout(function (event) {  
        var target, phone, element;  
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
        phone = target.value.replace(/\D/g, '');
        element = $(target);  
        element.unmask();  
        if(phone.length > 10) {  
            element.mask("(99) 99999-999?9");  
        } else {  
            element.mask("(99) 9999-9999?9");  
        }  
    });

    //Valores monetários
    jQuery(".monetario")
        .attr('maxlength', '15')
        .keypress(function(event) {
            return digitos(event, this);
        })
        .keydown(function(event) {
            formatarMoeda(this,20,event,2);
        });

    //CPF
    jQuery(".cpf").mask("999.999.999-99");

    //CNPJ
    jQuery(".cnpj").mask("99.999.999/9999-99");

    //CEP
    jQuery('.cep').mask('99999-999');

    //Horas
    jQuery('.horario').mask('99:99?:99');

    //Horas
    jQuery('.date-time').mask('99/99/999 99:99?:99');

    //SelectPicker
    jQuery('.select').selectpicker({
        container: "body",
        liveSearch: true,
        showTick: true
    });
});
function digitos(event){
    if (window.event) {
        key = event.keyCode;
    } else if ( event.which ) {
        key = event.which;
    }

    if(key != 8 || key != 13 || key < 48 || key > 57 )
        return ( ( ( key > 47 ) && ( key < 58 ) ) || ( key == 8 ) || ( key == 13 ) );
    return true;
}
function formatarMoeda(campo,tammax,teclapres,decimal) {
    var tecla = teclapres.keyCode;
    vr = limparCaracteres(campo.value,"0123456789");
    tam = vr.length;
    dec = decimal

    if (tam < tammax && tecla != 8)
        tam = vr.length + 1; 

    if (tecla == 8 )
        tam = tam - 1; 

    if ( tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105 ){
        if ( tam <= dec )
            campo.value = vr;
        if ( (tam > dec) && (tam <= 5) )
            campo.value = vr.substr( 0, tam - 2 ) + "," + vr.substr( tam - dec, tam );
        if ( (tam >= 6) && (tam <= 8) )
            campo.value = vr.substr( 0, tam - 5 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - dec, tam );
        if ( (tam >= 9) && (tam <= 11) )
            campo.value = vr.substr( 0, tam - 8 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - dec, tam ); 
        if ( (tam >= 12) && (tam <= 14) )
            campo.value = vr.substr( 0, tam - 11 ) + "." + vr.substr( tam - 11, 3 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - dec, tam ); 
        if ( (tam >= 15) && (tam <= 17) )
            campo.value = vr.substr( 0, tam - 14 ) + "." + vr.substr( tam - 14, 3 ) + "." + vr.substr( tam - 11, 3 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - 2, tam );

    }
}
function limparCaracteres(valor, validos) {
    var result = "";
    var aux;
    for (var i=0; i < valor.length; i++) {
        aux = validos.indexOf(valor.substring(i, i+1));
        if (aux>=0) {
            result += aux;
        }
    }
    return result;
}

function trim(str) {
    return str.replace(/^\s+|\s+$/g,"");
}

function ltrim(str) {
    return str.replace(/^\s+/,"");
}

function rtrim(str) {
    return str.replace(/\s+$/,"");
}
function ucfirst(str) {
	return str.substr(0,1).toUpperCase()+str.substr(1)
}

function deletarRegistro(tabela, prefixo, codigo){
	if(tabela != undefined && prefixo != undefined && codigo != undefined){
		swal({
			title: "",
			text: "Você deseja excluír o registro?",
			type: "warning",
			showCancelButton: true,
			cancelButtonText: "Não",
			confirmButtonText: "Sim!",
			closeOnConfirm: false
		}, function(){
			$.ajax({
				url: '../includes/excluirRegistro.php',
				type: 'POST',
				dataType: 'json',
				data: {
					tabela  : tabela,
					prefixo : prefixo,
					codigo  : codigo
				},
				success: function(result){
					if(result){
						sweetAlert("", "Registro excluído com sucesso!", "success");
						window.dataTable.ajax.reload();
					}else{
						sweetAlert("Oops...", "Ocorreu um erro ao excluir o registro!", "error");
					}
				},
				error: function(result){
					sweetAlert("Oops...", "Ocorreu um erro inesperado!", "error");
				}
			});
		});
	}else{
		return false;
	}
}

tinymce.init({
  selector: '.tinymce',
  height: 300,
  theme: 'modern',
  language: 'pt_BR',
  plugins: [
  'advlist autolink lists link image charmap print preview hr anchor pagebreak',
  'searchreplace wordcount visualblocks visualchars code fullscreen',
  'insertdatetime media nonbreaking save table contextmenu directionality',
  'emoticons template paste textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons',
  image_advtab: true,
  templates: [
  { title: 'Test template 1', content: 'Test 1' },
  { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
  '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
  '//www.tinymce.com/css/codepen.min.css'
  ]
});

window.addEventListener('DOMContentLoaded', function () {
    var image = $("#imagemCrop")[0];
    var imageSrc = $("#imagemCrop").attr('src');
    var cropper;
    var button;
    var x, y, w, h;

    $('#modalCrop').on('shown.bs.modal', function (event) {
      image = $("#imagemCrop")[0];
      imageSrc = $("#imagemCrop").attr('src');
      button = $(event.relatedTarget);
      cropper = new Cropper(image, {
                              autoCropArea: 1,
                              aspectRatio: $("input[type=hidden][name=aspectRatioCrop]").val(),
                              viewMode: 1,
                              modal: true,
                              guides: true,
                              crop: function(e) {
                                  x = e.detail.x;
                                  y = e.detail.y;
                                  w = e.detail.width;
                                  h = e.detail.height;
                              }
      });
    });
    $('#modalCrop').on('hidden.bs.modal', function () {
        cropper.destroy();
    });

    $("#cropImageBtn").on('click', function(event) {
        event.preventDefault();
        $.ajax({
            url: '../includes/cortarImagem.php',
            type: 'POST',
            cache: false,
            data: {
                x      : x,
                y      : y,
                w      : w,
                h      : h,
                imagem : imageSrc
            },
            success: function(result){
                swal({
                    title: "",
                    text: "A imagem foi recortada com sucesso!",
                    type: "success"
                }, function(){
                    $('#modalCrop').modal('hide');
                    if(button.parent().parent().find('td.thumbGrid').length > 0){
                      if(button.parent().parent().find('td.thumbGrid > img').length < 1) button.parent().parent().find('td.thumbGrid').html('<img src="" border="0" width="100%;">');
                      button.parent().parent().find('td.thumbGrid > img').attr('src', result);
                    }
                    if($(".thumb > img").length < 1) $(".thumb").html('<label>Miniatura</label><img src="" border="0" width="100%;">');
                    $(".thumb > img").attr('src', result);
                });
            },
            error: function(){
                sweetAlert("Oops...", "Ocorreu um erro inesperado!", "error");
            }
        });
    });
});

function removerImagem(imagem, codigo, tabela, prefixo, fieldImagem){
    swal({
        title: "",
        text: "Você deseja remover a imagem?",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Não",
        confirmButtonText: "Sim!",
        closeOnConfirm: false
    }, function(){
        $.ajax({
            url: '../includes/removerImagens.php',
            type: 'POST',
            dataType: 'json',
            data: {
                arquivo     : imagem,
                codigo      : codigo,
                tabela      : tabela,
                prefixo     : prefixo,
                fieldImagem : fieldImagem
            },
            success: function(result){
                var textAlert = (result) ? 'Imagem removida com sucesso!' : 'Houve um erro ao remover a imagem';
                var typeAlert = (result) ? 'success' : 'error';
                swal({
                    title: "",
                    text: textAlert,
                    type: typeAlert
                }, function(){
                    location.reload();
                });
            },
            error: function(erro){
                sweetAlert("Oops...", erro.responseText, "error");
            }
        });
    });
}

function removerImagemGrid(imagem, codigo, tabela, prefixo, botao, fieldImagem){
    swal({
        title: "",
        text: "Você deseja remover a imagem?",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Não",
        confirmButtonText: "Sim!",
        closeOnConfirm: false
    }, function(){
        $.ajax({
            url: '../includes/removerImagens.php',
            type: 'POST',
            dataType: 'json',
            data: {
                arquivo     : imagem,
                codigo      : codigo,
                tabela      : tabela,
                prefixo     : prefixo,
                fieldImagem : fieldImagem
            },
            success: function(result){
                var textAlert = (result) ? 'Imagem removida com sucesso!' : 'Houve um erro ao remover a imagem';
                var typeAlert = (result) ? 'success' : 'error';
                swal({
                    title: "",
                    text: textAlert,
                    type: typeAlert
                }, function(){
                    if(result) $(botao).parent().parent().remove();
                });
            },
            error: function(erro){
                sweetAlert("Oops...", erro.responseText, "error");
            }
        });
    });
}


//Validação de documento (CPF e CNPJ dinamicamente)
jQuery.validator.addMethod("documento", function(value, element) {

  // remove pontuações
  value = value.replace('.','');
  value = value.replace('.','');
  value = value.replace('-','');
  value = value.replace('/','');

  if (value.length <= 11) {
    if(jQuery.validator.methods.cpf.call(this, value, element)){
      return true;
    } else {
      this.settings.messages.documento.documento = "Informe um CPF válido.";
    }

  }
  else if (value.length <= 14) {
    if(jQuery.validator.methods.cnpj.call(this, value, element)){
      return true;
    } else {
      this.settings.messages.documento.documento = "Informe um CNPJ válido.";
    }

  }

  return false;

}, "Informe um documento válido.");

// validação do CPF
jQuery.validator.addMethod("cpf", function(value, element) {
   value = jQuery.trim(value);
    
    value = value.replace('.','');
    value = value.replace('.','');
    cpf = value.replace('-','');
    while(cpf.length < 11) cpf = "0"+ cpf;
    var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
    var a = [];
    var b =0;
    var c = 11;
    for (i=0; i<11; i++){
        a[i] = cpf.charAt(i);
        if (i < 9) b += (a[i] * --c);
    }
        if ((x = b % 11) < 2) { a[9] = 0; } else { a[9] = 11-x; }          
    b = 0;
    c = 11;
    for (y=0; y<10; y++) b += (a[y] * c--);
    if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }
    
    var retorno = true;
    if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;
    
    return this.optional(element) || retorno;

}, "Informe um CPF válido."); 


// validação do CNPJ
jQuery.validator.addMethod("cnpj", function(cnpj, element) {
   cnpj = jQuery.trim(cnpj);// retira espaços em branco
   // DEIXA APENAS OS NÚMEROS
   cnpj = cnpj.replace('/','');
   cnpj = cnpj.replace('.','');
   cnpj = cnpj.replace('.','');
   cnpj = cnpj.replace('-','');
 
   var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
   digitos_iguais = 1;
 
   if (cnpj.length < 14 && cnpj.length < 15){
      return false;
   }
   for (i = 0; i < cnpj.length - 1; i++){
      if (cnpj.charAt(i) != cnpj.charAt(i + 1)){
         digitos_iguais = 0;
         break;
      }
   }
 
   if (!digitos_iguais){
      tamanho = cnpj.length - 2;
      numeros = cnpj.substring(0,tamanho);
      digitos = cnpj.substring(tamanho);
      soma = 0;
      pos = tamanho - 7;
 
      for (i = tamanho; i >= 1; i--){
         soma += numeros.charAt(tamanho - i) * pos--;
         if (pos < 2){
            pos = 9;
         }
      }
      resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
      if (resultado != digitos.charAt(0)){
         return false;
      }
      tamanho = tamanho + 1;
      numeros = cnpj.substring(0,tamanho);
      soma = 0;
      pos = tamanho - 7;
      for (i = tamanho; i >= 1; i--){
         soma += numeros.charAt(tamanho - i) * pos--;
         if (pos < 2){
            pos = 9;
         }
      }
      resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
      if (resultado != digitos.charAt(1)){
         return false;
      }
      return true;
   }else{
      return false;
   }
}, "Informe um CNPJ válido."); // Mensagem padrão 

function definirImagemPrincipal(tabela, prefixo, fieldImagem, codigo, imagem, botao){
  event.preventDefault();
  if(tabela != undefined && prefixo != undefined && codigo != undefined && imagem != undefined && botao != undefined){
    swal({
      title: "",
      text: "Você deseja definir esta imagem como principal?",
      type: "info",
      showCancelButton: true,
      cancelButtonText: "Não",
      confirmButtonText: "Sim!",
      closeOnConfirm: false
    }, function(){
      $.ajax({
        url: '../includes/definirImagemPrincipal.php',
        type: 'POST',
        dataType: 'json',
        data: {
          tabela      : tabela,
          prefixo     : prefixo,
          codigo      : codigo,
          imagem      : imagem,
          fieldImagem : fieldImagem
        },
        success: function(result){
          if(result){
            sweetAlert("", "Imagem principal definida com sucesso!", "success");
            $(".btnImgPrincipal").prop('disabled', false);
            $(botao).prop('disabled', true);
          }else{
            sweetAlert("Oops...", "Ocorreu um erro ao definir a imagem como principal!", "error");
          }
        },
        error: function(result){
          sweetAlert("Oops...", "Ocorreu um erro inesperado!", "error");
        }
      });
    });
  }else{
    return false;
  }
}
$("button[type!=submit]").on('click', function(event) {
  event.preventDefault();
});

function limparValoresFloat(valor){
  valor = valor.replace("R$ ", "");
  valor = valor.replace(".", "");
  valor = valor.replace(",", ".");
  valor = parseFloat(valor);
  return valor;
}

function formatar_moeda(valor, simbolo){
  if(simbolo == undefined) simbolo = true;
  valor = parseFloat(valor);
  valor = valor.toFixed(2);
  valor = valor.toString();
  valor = valor.replace(".", ",");
  console.log('estouuuuuuuuuuuuuuuuu');
  if(simbolo)
    return 'R$ '+valor;
  else
    return valor;
}

function filterNumber(string){
    var numsStr = string.replace(/[^0-9]/g,'');
    return parseInt(numsStr);
}

Array.prototype.max = function() {
  return Math.max.apply(null, this);
};

Array.prototype.min = function() {
  return Math.min.apply(null, this);
};