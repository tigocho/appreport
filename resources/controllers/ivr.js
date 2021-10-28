$(document).ready( function () {
  $('#tableIvr').DataTable({
      "language": {
          "sProcessing": "Procesando...",
          "sLengthMenu": "Mostrar _MENU_ registros",
          "sZeroRecords": "No se encontraron resultados",
          "sEmptyTable": "Ningun dato disponible en esta tabla",
          "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
          "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
          "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix": "",
          "sSearch": "Buscar:",
          "sUrl": "",
          "sInfoThousands": ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
              "sFirst": "Primero",
              "sLast": "Ultimo",
              "sNext": "Siguiente",
              "sPrevious": "Anterior"
          },
      },
      "ajax":{

          "url": baseURL+"Ivr/getInfoClinicas",
          "type":"POST",
          dataSrc: ""
      },
      'columns': [
          { data: "inf_cli_nomb_esp" },
          { data: "inf_cli_nomb_medico" },
          { data: "inf_cli_lugar_facturacion" },
          { data: "inf_cli_lugar_atencion" },
          { data: "inf_cli_observacion" },
          { data: "inf_cli_validacion" },
          { "ordertable": true,render: function ( data, type, row ) { 
              return "<button type='button' onclick='modal_collaborator_edit(\""+row.col_id+"\",\""+row.col_login_num+"\",\""+row.col_nom+"\",\""+row.col_cargo+"\",\""+row.id_area_fk+"\");'  class='btn btn-primary mb-3'>Editar</button> "+
              "<button type='button' onclick='collaborator_delete(\""+row.col_id+"\");' class='btn btn-danger mb-3'>Eliminar</button>"
          }}
      ]
  });
});