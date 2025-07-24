'use strict';
// Class definition

var KTDatatableHtmlTableDemo1 = function() {
  // Private functions

  // demo initializer
  var demo1 = function() {

    var datatable = $('#kt_datatable1').KTDatatable({
      data: {
        saveState: {cookie: false},
        pageSize: 5,
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
          field: 'Url',
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
                                select: 'Seleccionar tamanho da página',
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
      demo1();
    },
  };
}();

jQuery(document).ready(function() {
  KTDatatableHtmlTableDemo1.init();
});