$(document).ready( function () {
    $('#tablearea').DataTable({
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

            "url": baseURL+"Area/getArea",
            "type":"POST",
            dataSrc: ""
        },
        'columns': [
            { data: "area_id" },
            { data: "area_nom" },
            { "ordertable": true,render: function ( data, type, row ) { 
                return "<td><button type='button' onclick='modal_area_edit(\""+row.area_id+"\",\""+row.area_nom+"\");'  class='btn btn-primary mb-3'>Editar</button> "+"<button type='button' onclick='area_delete(\""+row.area_id+"\");' class='btn btn-danger mb-3'>Eliminar</button>"
            }}
            
        ]

    });
} );

function modal_area_create()
    {
    $('#area_create').modal('show')
    }


function create_area(){

    var var_area_nom = document.getElementById("area_nom").value;
    console.log("rutapost",baseURL+'Area/createArea');
    if (var_area_nom=="") {
        swal("Opps!","Por favor diligencie el area","warning");
    } else {
    
        dataPostV = {
            area_nom  : var_area_nom,
            tip_est_id_fk  : "1", 
        }

        console.info(dataPostV);

        $.ajax({
            type: "POST",
            url: baseURL+'Area/createArea',
            dataType: 'json',
            data: dataPostV,
            success: function(resp) {
                console.log("resp:",resp["mensaje"]);
                swal("exitoso!", resp["mensaje"], "success",6000,);
                $('#area_create').modal('hide');
                location.reload();
            },error: function(error) {
                    error;
                swal("Opps!","Error al enviar la informacion","warning",6000);
            }
        });
    }   

}

function modal_area_edit(var_area_id,var_area_nom)
    {
        $('#area_edit').modal('show');
        $('#area_id_e').val(var_area_id);
        $('#area_nom_e').val(var_area_nom);

    }
    

function edit_area(){
    var var_area_id = document.getElementById("area_id_e").value;
    var var_area_nom = document.getElementById("area_nom_e").value;
    console.log("rutapost",baseURL+'Area/editArea');

    dataPostV = {
        area_id : var_area_id,
        area_nom  : var_area_nom,
    }

    console.info(dataPostV);

    $.ajax({
        type: "POST",
        url: baseURL+'Area/editArea',
        dataType: 'json',
        data: dataPostV,
        success: function(resp) {
           console.log("resp:",resp["mensaje"]);
           swal("exitoso!", resp["mensaje"], "success",6000,);
            $('#agent_edit').modal('hide');
            location.reload();
        },error: function(error) {
            error;
            swal("Opps!","Error al enviar la informacion","warning",6000);
        }
    });    

}

function area_delete(var_area_id){
swal({
    title: '¿Está seguro de eliminar el area?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'cancelar',
    confirmButtonText: 'Sí,seguro'
    },function(resp) {
        if (resp) {

            var var_tip_est_id_fk = "2";
            dataPostV = {
            area_id : var_area_id,
            tip_est_id_fk : var_tip_est_id_fk,
        }
        console.info(dataPostV);
        $.ajax({
            type: "POST",
            url: baseURL+'Area/deleteArea',
            dataType: 'json',
            data: dataPostV,
            success: function(resp) {
                console.log("resp:",resp["mensaje"]);
                swal("exitoso!", resp["mensaje"], "success",6000);
                location.reload();
            },error: function(error) {
                error;
                swal("Opps!","Error al enviar la informacion","warning",6000);
            }
        });    
        
    }
    
    });
}
