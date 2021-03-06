function mascara(tipo, campo, teclaPress) {
  if (window.event) {
    var tecla = teclaPress.keyCode;
  } else {
    tecla = teclaPress.which;
  }
  var s = new String(campo.value);
  // Remove todos os caracteres Ã  seguir: ( ) / - . e espaÃ§o, para tratar a string denovo.
  s = s.replace(/(\.|\(|\)|\/|\-| )+/g, '');
  tam = s.length + 1;
  if (tecla != 9 && tecla != 8) {
    switch (tipo) {
      case 'CPF':
        if (tam > 3 && tam < 7)
          campo.value = s.substr(0, 3) + '.' + s.substr(3, tam);
        if (tam >= 7 && tam < 10)
          campo.value = s.substr(0, 3) + '.' + s.substr(3, 3) + '.' + s.substr(6, tam - 6);
        if (tam >= 10 && tam < 12)
          campo.value = s.substr(0, 3) + '.' + s.substr(3, 3) + '.' + s.substr(6, 3) + '-' + s.substr(9, tam - 9);
        break;

      case 'CNPJ':
        if (tam > 2 && tam < 6)
          campo.value = s.substr(0, 2) + '.' + s.substr(2, tam);
        if (tam >= 6 && tam < 9)
          campo.value = s.substr(0, 2) + '.' + s.substr(2, 3) + '.' + s.substr(5, tam - 5);
        if (tam >= 9 && tam < 13)
          campo.value = s.substr(0, 2) + '.' + s.substr(2, 3) + '.' + s.substr(5, 3) + '/' + s.substr(8, tam - 8);
        if (tam >= 13 && tam < 15)
          campo.value = s.substr(0, 2) + '.' + s.substr(2, 3) + '.' + s.substr(5, 3) + '/' + s.substr(8, 4) + '-' + s.substr(12, tam - 12);
        break;

      case 'TEL':
        if (tam > 2 && tam < 4)
          campo.value = '(' + s.substr(0, 2) + ') ' + s.substr(2, tam);
        if (tam >= 7 && tam < 11)
          campo.value = '(' + s.substr(0, 2) + ') ' + s.substr(2, 4) + '-' + s.substr(6, tam - 6);
        break;

      case 'CELULAR':
        if (tam > 2 && tam < 4)
          campo.value = '(' + s.substr(0, 2) + ') ' + s.substr(2, tam);
        if (tam >= 7 && tam < 11)
          campo.value = '(' + s.substr(0, 2) + ') ' + s.substr(2, 4) + '-' + s.substr(6, tam - 6);
        break;

      case 'DATA':
        if (tam > 2 && tam < 4)
          campo.value = s.substr(0, 2) + '/' + s.substr(2, tam);
        if (tam > 4 && tam < 11)
          campo.value = s.substr(0, 2) + '/' + s.substr(2, 2) + '/' + s.substr(4, tam - 4);
        break;

      case 'CEP':
        if (tam > 5 && tam < 7)
          campo.value = s.substr(0, 5) + '-' + s.substr(5, tam);
        break;

      case 'HORA':
        if (tam > 2 && tam < 4)
          campo.value = s.substr(0, 2) + ':' + s.substr(2, tam);
        break;
      case 'SEGUNDOS':
        if (tam > 2 && tam < 4)
          campo.value = s.substr(0, 2) + ':' + s.substr(2, tam);
        if (tam > 5 && tam < 7)
          campo.value = s.substr(0, 2) + ':' + s.substr(3, 2) + ':' + s.substr(6, 2);
        break;

      case 'MINUTOS':
        if (tam > 2 && tam < 4)
          campo.value = s.substr(0, 2) + ':' + s.substr(2, tam);
        break;
    }
  }
}

function onlynumber(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode(key);
  //var regex = /^[0-9.,]+$/;
  var regex = /^[0-9.]+$/;
  if (!regex.test(key)) {
    theEvent.returnValue = false;
    if (theEvent.preventDefault) theEvent.preventDefault();
  }
}

function digitos(event) {
  if (window.event) {
    key = event.keyCode;
  } else if (event.which) {
    key = event.which;
  }

  if (key != 8 || key != 13 || key < 48 || key > 57)
    return (((key > 47) && (key < 58)) || (key == 8) || (key == 13));
  return true;
}