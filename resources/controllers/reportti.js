// jquery que trae la infomacion de los reportes techologia


//funcion que muestra las novedades techologia creadas entre fecha inicio a fecha fin 
$( "#botonf" ).click(function() {
    var inicio = $("#dateini").val();
    var fin = $("#datefin").val();

    if (inicio =="" || fin =="" ) {
        swal("Opps!","Por favor diligencie el rango que desea buscar","warning");
        return false;
    }

    $("#tablereport").dataTable().fnDestroy();
    $('#tablereport').DataTable({
        
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            },
            {
                extend: 'print',
                text: 'Imprimir'
            },
            'excel'
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

                "url": baseURL+"Report/getnoveltyTi/"+inicio+"/"+fin,
                "type":"POST",
                dataSrc: ""
            },columnDefs: [
                { width: "70px", targets: 8 }
              ],

            'columns': [
                { data: "nove_fecha" },
                { data: null,render: function ( data, type, row ) { return '<b>'+row.col_login_num + '</b> - ' + row.col_nom;}},
                { data: "seccion_nom" },
                { data: "nove_hora_ini" },
                { data: "nove_hora_fin" },
                { data: null,render: function ( data, type, row ) { return convertirEntero(row.nove_tiem_total)}},
                { data: null,render: function ( data, type, row ) { return '<b>'+row.cate_nom + '</b> - ' + row.tip_inci_nom;}},
                { data: "est_des"},
                { data: "tip_obser_nom"},
                { data: "nove_obser_descripcion"},
            ],

    });

    function convertirEntero(duracion){
        duracion_completo = duracion.split(":");
        console.log(duracion_completo);
        var horas = duracion.split(":")[0];
        if(horas < 10)
            horas = horas.substr(1)
        var minutos = duracion.split(":")[1];
        return horas+"."+minutos;
    }
}); 



//funcion que permite limpiar el filtro de las fechas
$("#limpiar").click(function() {
    $("#dateini").val('');
    $("#datefin").val('');
});

