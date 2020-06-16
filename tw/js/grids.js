var dataTable;
function gerarGrid(config){
  //Definição padrão da ordenação
  if(config['order'] == undefined) config['order'] = [0, 'asc'];
  //Definição da url padrão para consulta das informações
  if(config['dataUrl'] == undefined) config['dataUrl'] = "../transaction/transaction"+ucfirst(config['namePage'])+".php?dadosList";
  //Definição da url padrão para consulta das informações
  if(config['cadUrl'] == undefined) config['cadUrl'] = "cad"+ucfirst(config['namePage'])+".php";

  //Definição do seletor padrão da tabela
  if(config['tableSelector'] == undefined) config['tableSelector'] = "#table"+ucfirst(config['namePage']);

  //Definições padrões das colunas que serão exportadas
  config['columns'] = [];
  var columnsExport = [];

  $(config['tableSelector']+' th').each(function(index) {
    config['columns'].push(null);
    columnsExport.push(index);
  });

  $(config['tableSelector']+' th:last-child').removeClass('imprimir');

  config['columns'].pop();
  columnsExport.pop();
  config['columns'].push({orderable: false});
  
  if(config['columnsExport'] == undefined){
    config['columnsExport'] = columnsExport;
  }

  $(config['tableSelector']+' th').each(function(index) {
    if(jQuery.inArray(index, config['columnsExport']) >= 0)
      $(this).addClass('imprimir');
  });

  //Fim das Definições padrões das colunas que serão exportadas
  
  //Definição padrão do botão add
  if(config['buttons']['add'] == undefined) config['buttons']['add'] = [];
  if(config['buttons']['add']['icon'] == undefined) config['buttons']['add']['icon'] = "<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>";
  if(config['buttons']['add']['text'] == undefined) config['buttons']['add']['text'] = "Novo "+ucfirst(config['namePage']);
  //Definição da classe padão do botão add
  if(config['buttons']['add']['className'] == undefined) config['buttons']['add']['className'] = "btn btn-primary";
  //Definiçao da url padrão do botão add
  if(config['buttons']['add']['url'] == undefined) config['buttons']['add']['url'] = "cad"+ucfirst(config['namePage'])+".php";
  //Definiçao do tipo de evento padrão do botão add
  if(config['buttons']['add']['target'] == undefined) config['buttons']['add']['target'] = "self";
 
  //Definição do botão imprimir
  if(config['buttons']['print'] == undefined) config['buttons']['print'] = [];
  if(config['buttons']['print']['icon'] == undefined) config['buttons']['print']['icon'] = "<i class=\"fa fa-print\" aria-hidden=\"true\"></i>";
  if(config['buttons']['print']['text'] == undefined) config['buttons']['print']['text'] = "Imprimir";
  //Definição da classe padão do botão imprimir
  if(config['buttons']['print']['className'] == undefined) config['buttons']['print']['className'] = "btn btn-default";
  
  //Definição do botão exportar
  if(config['buttons']['export'] == undefined) config['buttons']['export'] = [];
  if(config['buttons']['export']['icon'] == undefined) config['buttons']['export']['icon'] = "<i class=\"fa fa-file-excel-o\" aria-hidden=\"true\"></i>";
  if(config['buttons']['export']['text'] == undefined) config['buttons']['export']['text'] = "Exportar";
  //Definição da classe padão do botão exportar
  if(config['buttons']['export']['className'] == undefined) config['buttons']['export']['className'] = "btn btn-default";

  var buttons = [];

  //Uso do botão novo
  if(config['buttons']['add']['use'] != false){
    buttons.push({
      text: config['buttons']['add']['icon']+' '+config['buttons']['add']['text'],
      action: function (){
        if(config['buttons']['add']['target'] == 'blank'){
          window.open(config['buttons']['add']['url'], "", "");
          window.dataTable.ajax.reload();
        }else{
          location.href = config['buttons']['add']['url'];
        }
      },
      className: config['buttons']['add']['className']
    });
  }

  //Uso do botão imprimir
  if(config['buttons']['print']['use'] != false){
    buttons.push({
      extend: "print",
      text: config['buttons']['print']['icon']+' '+config['buttons']['print']['text'],
      exportOptions: {
        columns: ':visible.imprimir',
        search: 'applied',
        order: 'applied'
      },
      className: config['buttons']['print']['className']
    });
  }

  //Uso do botão exportar
  if(config['buttons']['export']['use'] != false){
    buttons.push({
      extend: "excelHtml5",
      text: config['buttons']['export']['icon']+' '+config['buttons']['export']['text'],
      exportOptions: {
        columns: ':visible.imprimir',
        search: 'applied',
        order: 'applied'
      },
      className: config['buttons']['export']['className']
    });
  }

  buttons.push({
    extend: 'colvis',
    text: '<i class="fa fa-eye" aria-hidden="true"></i> Colunas',
    columns: config['columnsExport']
  });

  dataTable = $(config['tableSelector']).DataTable( {
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
    "pageLength": 10,
    "serverSide": true,
    "columns": config['columns'],
    "order": [config['order']],
    "language": {
      "url": "../libs/datatables/translate/portugues.json"
    },
    "ajax":{
      "url" : config['dataUrl'],
      "type": "post",
      error: function(){
        swal('Oops', 'Ocorreu um erro inesperado', 'error');
      }
    },
    "dom": "<'row'<'col-md-6'B><'col-md-3'l><'col-md-3'f>>"+
           "<'row'<'col-md-12't>>"+
           "<'row'<'col-md-6'i><'col-md-6'p>>",
    "buttons": buttons
  });
  window.dataTable = dataTable;
	
  $(config['tableSelector']+" tbody").on('click', 'tr td:not(:last-child)', function(){
    event.preventDefault();

    if ( $(this).parent().hasClass('selected') ) {
        $(this).parent().removeClass('selected');
    }
    else {
        $(config['tableSelector']+' tr.selected').removeClass('selected');
        $(this).parent().addClass('selected');
    }

    var id = $(this).parent().attr('id');
    if(id != undefined){
      var arrId = id.split('_');
      location.href = config['cadUrl']+'?oid='+arrId[1];
    }
  });
}

var rows_selected = [];

function gerarGridCheck(config){
  //Definição padrão da ordenação
  if(config['order'] == undefined) config['order'] = [0, 'asc'];
  //Definição da url padrão para consulta das informações
  if(config['dataUrl'] == undefined) config['dataUrl'] = "../transaction/transaction"+ucfirst(config['namePage'])+".php?dadosList";

  //Definição do seletor padrão da tabela
  if(config['tableSelector'] == undefined) config['tableSelector'] = "#table"+ucfirst(config['namePage']);

  //Definições padrões das colunas que serão exportadas
  config['columns'] = [];
  var columnsExport = [];

  $(config['tableSelector']+' th').each(function(index) {
    config['columns'].push(null);
    columnsExport.push(index);
  });


  config['columns'].pop();
  columnsExport.pop();
  columnsExport.shift();
  config['columns'].push({orderable: false});
  
  if(config['columnsExport'] == undefined){
    config['columnsExport'] = columnsExport;
  }

  $(config['tableSelector']+' th').each(function(index) {
    if(jQuery.inArray(index, config['columnsExport']) >= 0)
      $(this).addClass('imprimir');
  });

  $(config['tableSelector']+' th:last-child').removeClass('imprimir');
  $(config['tableSelector']+' th:first-child').removeClass('imprimir');

  //Fim das Definições padrões das colunas que serão exportadas
  
  //Definição padrão do botão add
  if(config['buttons']['add'] == undefined) config['buttons']['add'] = [];
  if(config['buttons']['add']['icon'] == undefined) config['buttons']['add']['icon'] = "<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>";
  if(config['buttons']['add']['text'] == undefined) config['buttons']['add']['text'] = "Novo "+ucfirst(config['namePage']);
  //Definição da classe padão do botão add
  if(config['buttons']['add']['className'] == undefined) config['buttons']['add']['className'] = "btn btn-primary";
  //Definiçao da url padrão do botão add
  if(config['buttons']['add']['url'] == undefined) config['buttons']['add']['url'] = "cad"+ucfirst(config['namePage'])+".php";
  //Definiçao do tipo de evento padrão do botão add
  if(config['buttons']['add']['target'] == undefined) config['buttons']['add']['target'] = "self";
 
  //Definição do botão imprimir
  if(config['buttons']['print'] == undefined) config['buttons']['print'] = [];
  if(config['buttons']['print']['icon'] == undefined) config['buttons']['print']['icon'] = "<i class=\"fa fa-print\" aria-hidden=\"true\"></i>";
  if(config['buttons']['print']['text'] == undefined) config['buttons']['print']['text'] = "Imprimir";
  //Definição da classe padão do botão imprimir
  if(config['buttons']['print']['className'] == undefined) config['buttons']['print']['className'] = "btn btn-default";
  
  //Definição do botão exportar
  if(config['buttons']['export'] == undefined) config['buttons']['export'] = [];
  if(config['buttons']['export']['icon'] == undefined) config['buttons']['export']['icon'] = "<i class=\"fa fa-file-excel-o\" aria-hidden=\"true\"></i>";
  if(config['buttons']['export']['text'] == undefined) config['buttons']['export']['text'] = "Exportar";
  //Definição da classe padão do botão exportar
  if(config['buttons']['export']['className'] == undefined) config['buttons']['export']['className'] = "btn btn-default";

  //Definição do botão etiquetas
  if(config['buttons']['tags'] == undefined) config['buttons']['tags'] = [];
  if(config['buttons']['tags']['icon'] == undefined) config['buttons']['tags']['icon'] = "<i class=\"fa fa-tags\" aria-hidden=\"true\"></i>";
  if(config['buttons']['tags']['text'] == undefined) config['buttons']['tags']['text'] = "Etiquetas";
  //Definição da classe padão do botão etiquetas
  if(config['buttons']['tags']['className'] == undefined) config['buttons']['tags']['className'] = "btn btn-default";

  //Definição do formulario dos checks padrão
  if(config['form'] == undefined) config['form'] = [];
  if(config['form']['target'] == undefined) config['form']['target'] = "self";
  if(config['form']['selector'] == undefined) config['form']['selector'] = "form"+ucfirst(config['namePage']);
  if(config['form']['action'] == undefined) config['form']['action'] = "";
  if(config['form']['method'] == undefined) config['form']['method'] = "POST";
  if(config['form']['nameField'] == undefined) config['form']['nameField'] = "id";

  var buttons = [];

  //Uso do botão novo
  if(config['buttons']['add']['use'] != false){
    buttons.push({
      text: config['buttons']['add']['icon']+' '+config['buttons']['add']['text'],
      action: function (){
        if(config['buttons']['add']['target'] == 'blank'){
          window.open(config['buttons']['add']['url'], "", "");
          window.dataTable.ajax.reload();
        }else{
          location.href = config['buttons']['add']['url'];
        }
      },
      className: config['buttons']['add']['className']
    });
  }

  //Uso do botão imprimir
  if(config['buttons']['print']['use'] != false){
    buttons.push({
      extend: "print",
      text: config['buttons']['print']['icon']+' '+config['buttons']['print']['text'],
      exportOptions: {
        columns: ':visible.imprimir',
        search: 'applied',
        order: 'applied'
      },
      className: config['buttons']['print']['className']
    });
  }

  //Uso do botão exportar
  if(config['buttons']['export']['use'] != false){
    buttons.push({
      extend: "excelHtml5",
      text: config['buttons']['export']['icon']+' '+config['buttons']['export']['text'],
      exportOptions: {
        columns: ':visible.imprimir',
        search: 'applied',
        order: 'applied'
      },
      className: config['buttons']['export']['className']
    });
  }


  buttons.push({
    extend: 'colvis',
    text: '<i class="fa fa-eye" aria-hidden="true"></i> Colunas',
    columns: config['columnsExport']
  });

  //Uso do botão etiquetas
  if(config['buttons']['tags']['use'] != false){
    buttons.push({
      text: config['buttons']['tags']['icon']+' '+config['buttons']['tags']['text'],
      action: function (){
        if(rows_selected.length < 1){
          sweetAlert("Oops...", "Selecione ao menos uma linha", "warning");
        }else{
          swal({
            title: "",
            text: "Você deseja imprimir "+rows_selected.length+" etiquetas?",
            type: "info",
            showCancelButton: true
          },
          function(){
            var $form = "<form id=\""+config['form']['selector']+"\" target=\""+config['form']['target']+"\" action=\""+config['form']['action']+"\" method=\""+config['form']['method']+"\"></form>";
            if($("form#"+config['form']['selector']).length > 0) $("form#"+config['form']['selector']).remove();
            $(config['tableSelector']).parent().parent().append($form);
            $.each(rows_selected, function(index, rowId){
               $("form#"+config['form']['selector']).append(
                   $('<input>')
                      .attr('type', 'hidden')
                      .attr('name', config['form']['nameField']+'[]')
                      .val(rowId)
               );
            });
            $("form#"+config['form']['selector']).submit();
          });
        }
        //append form to dom, insert array etiquetas nele, pergunta se ele quer mesmo imprimir x etiquetas, submit form in new tab, imprime as etiquetas
      },
      className: config['buttons']['tags']['className']
    });
  }

  dataTable = $(config['tableSelector']).DataTable( {
    lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
    pageLength: 10,
    serverSide: true,
    columns: config['columns'],
    order: [config['order']],
    language: {
      url: "../libs/datatables/translate/portugues.json"
    },
    columnDefs: [{
      targets: 0,
      searchable: false,
      orderable: false,
      width: '1%',
      className: 'dt-body-center',
      render: function (data, type, full, meta){
        return '<input type="checkbox">';
      }
    }],
    rowCallback: function(row, data, dataIndex){
      var rowId = data[0];
      if($.inArray(rowId, rows_selected) !== -1){
        $(row).find('input[type="checkbox"]').prop('checked', true);
        $(row).addClass('selected');
      }
    },
    select: {
      style:    'os',
      selector: 'td:first-child'
    },
    ajax:{
      url : config['dataUrl'],
      type: "post",
      error: function(){
        swal('Oops', 'Ocorreu um erro inesperado', 'error');
      }
    },
    "dom": "<'row'<'col-md-6'B><'col-md-3'l><'col-md-3'f>>"+
           "<'row'<'col-md-12't>>"+
           "<'row'<'col-md-6'i><'col-md-6'p>>",
    "buttons": buttons
  });
  window.dataTable = dataTable;

  // Handle click checkbox
   $(config['tableSelector']+' tbody').on('click', 'input[type="checkbox"]', function(e){
      var $row = $(this).closest('tr');

      // Get row ID
      var rowId = $row.find('td:nth-child(2)').text();

      // Determina se o ID já se encontra no array
      var index = $.inArray(rowId, rows_selected);

      // se o checkbox está marcado e o ID is não está na lista de id's selecionados
      if(this.checked && index === -1){
         rows_selected.push(rowId);

      // ou, se checkbox nao está marcado e ID  está na lista de id's selecionados
      } else if (!this.checked && index !== -1){
         rows_selected.splice(index, 1);
      }

      if(this.checked){
         $row.addClass('selected');
      } else {
         $row.removeClass('selected');
      }

      // Atualiza o estado do "Selecionar todos"
      updateDataTableSelectAllCtrl(dataTable);

      // Previne o envento click de propagação para os elementos pais
      e.stopPropagation();
   });

   // Marcar os checkboxes quando clicar nas tr's
   $(config['tableSelector']).on('click', 'tbody td, thead th:first-child', function(e){
      $(this).parent().find('input[type="checkbox"]').trigger('click');
   });

   // Handle click "Selecionar todos"
   $('thead input[name="select_all"]', dataTable.table().container()).on('click', function(e){
      if(this.checked){
         $(config['tableSelector']+' tbody input[type="checkbox"]:not(:checked)').trigger('click');
      } else {
         $(config['tableSelector']+' tbody input[type="checkbox"]:checked').trigger('click');
      }

      // Previne o envento click de propagação para os elementos pais
      e.stopPropagation();
   });

   // Evento draw do DataTables
   dataTable.on('draw', function(){
      // Atualiza o estado do "Selecionar todos"
      updateDataTableSelectAllCtrl(dataTable);
   });
}

//
// Atualiza o estado do "Selecionar todos" na tabela
//
function updateDataTableSelectAllCtrl(table){
   var $table             = dataTable.table().node();
   var $chkbox_all        = $('tbody input[type="checkbox"]', $table);
   var $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);
   var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);

   // se nenhum checkbox está marcado
   if($chkbox_checked.length === 0){
      chkbox_select_all.checked = false;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = false;
      }

   // se todos os checkboxes estão marcados
   } else if ($chkbox_checked.length === $chkbox_all.length){
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = false;
      }

   // se alguns checkboxes estão marcados
   } else {
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = true;
      }
   }
}