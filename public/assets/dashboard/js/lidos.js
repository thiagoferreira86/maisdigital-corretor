'use strict';
// Class definition

var KTDatatableHtmlTableDemo = function() {
  // Private functions

  // demo initializer
  var demo = function() {

    var datatable = $('#kt_datatable').KTDatatable({
      data: {
        saveState: {cookie: false},
        pageSize: 5,
      },
      search: {
        input: $('#kt_datatable_search_query'),
        key: 'generalSearch',
      },
      layout: {
        class: 'datatable-bordered',
      },
      columns: [
        {
          field: 'Lead',
          type: 'text',
        },
        {
          field: 'Data',
          type: 'date',
          format: 'DD/MM/YYYY',
        },
      ],
      translate: {
                records: {
                    processing: 'Carregando...',
                    noRecords: 'Nenhum registro encontrado',
                },
                toolbar: {
                    pagination: {
                        items: {
                            default: {
                                first: 'Primero',
                                prev: 'Anterior',
                                next: 'Próximo',
                                last: 'Último',
                                more: 'Mais',
                                input: 'Nº da página',
                                select: 'Selecionar tamanho da página',
                            },
                            info: 'Exibindo {{start}} - {{end}} de {{total}} registros',
                        },
                    },
                },
            },
    });
    
    

  };

  return {
    // Public functions
    init: function() {
      // init dmeo
      demo();
    },
  };
}();

jQuery(document).ready(function() {
  KTDatatableHtmlTableDemo.init();
});