$( "#botonf" ).click(function() {
    var inicio = $("#dateini").val();
    var fin = $("#datefin").val();

    if (inicio =="" || fin =="" ) {
        swal("Opps!","Por favor diligencie el rango que desea buscar","warning");
    }else{

    $("#tablereport").dataTable().fnDestroy();
    $('#tablereport').DataTable({
        
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            },
            'excel','print'
        ],
        paging: false,

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

                "url": baseURL+"Report/getnovelty/"+inicio+"/"+fin,
                "type":"POST",
                dataSrc: ""
            },columnDefs: [
                { width: "70px", targets: 8 }
              ],

            'columns': [
                { data: "nove_fecha" },
                { data: "col_login_num" },
                { data: "col_nom" },
                { data: "session_nom" },
                { data: "nove_hora_ini" },
                { data: "nove_hora_fin" },
                { data: "nove_tiem_total" },
                { data: null,render: function ( data, type, row ) { return '<b>'+row.cate_nom + '</b> - ' + row.tip_inci_nom;}},
                { data: "est_des"}
            ]

    });}
}); 


$( "#Limpiar" ).click(function() {
    location.reload();
});

