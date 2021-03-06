// jquery que trae la infomacion de los reportes call center


//funcion que muestra las novedades call center creadas entre fecha inicio a fecha fin 
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

                "url": baseURL+"Report/getnoveltycc/"+inicio+"/"+fin,
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
                { data: null,render: function ( data, type, row ) { tiempo_separado = row.nove_tiem_total.split(":"); if (tiempo_separado[2] != null && tiempo_separado[2]!= '') { return row.nove_tiem_total; } else { return row.nove_tiem_total+":00";}}},
                { data: null,render: function ( data, type, row ) { return '<b>'+row.cate_nom + '</b> - ' + row.tip_inci_nom;}},
                { data: "est_des"},
                { data: "tip_obser_nom"},
                { data: "nove_obser_descripcion"},
            ]

    });

}); 


//funcion que permite limpiar el filtro de las fechas
$("#limpiar").click(function() {
    $("#dateini").val('');
    $("#datefin").val('');
});


$("#csv").click(function() {
    var formData = new FormData(document.getElementById("formuploadajax"));
    console.log("hola");
    $.ajax({
        type: "post",
        url: baseURL+'Report/guardar_archivo',
        dataType: "json",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(resp) {
            swal("exitoso!", resp["mensaje"], "success",6000);
        },error: function(error) {
            error;
            swal("Opps!","error al enviar la informacion","warning",6000);
        }
    });  
});   

