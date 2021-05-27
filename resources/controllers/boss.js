$(document).ready( function () {
    $('#tableboss').DataTable({
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

            "url": baseURL+"Boss/getBoss",
            "type":"POST",
            dataSrc: ""
        },
        'columns': [
            { data: "jefe_nom" },
            { data: "jefe_ape" },
            { data: "jefe_correo" },
            { "ordertable": true,render: function ( data, type, row ) { 
                return "<button type='button' onclick='modal_boss_edit(\""+row.jefe_id+"\",\""+row.jefe_nom+"\",\""+row.jefe_ape+"\",\""+row.jefe_correo+"\");'  class='btn btn-primary mb-3'>editar</button> "+"<button type='button' onclick='boss_delete(\""+row.jefe_id+"\");' class='btn btn-danger mb-3'>eliminar</button>"
            }}
            
        ]

    });
} );

function modal_boss_create()
    {
    $('#boss_create').modal('show')
    }


function create_boss(){

    var var_jefe_nom = document.getElementById("jefe_nom").value;
    var var_jefe_ape = document.getElementById("jefe_ape").value;
    var var_jefe_correo = document.getElementById("jefe_correo").value;
    console.log("rutapost",baseURL+'Boss/createBoss');

    dataPostV = {
        jefe_nom : var_jefe_nom,
        jefe_ape : var_jefe_ape,
        jefe_correo : var_jefe_correo,
        tip_est_id_fk : 1,
    }

    console.info(dataPostV);

    $.ajax({
        type: "POST",
        url: baseURL+'Boss/createBoss',
        dataType: 'json',
        data: dataPostV,
        success: function(resp) {
            console.log("resp:",resp["mensaje"]);
            swal("exitoso!", resp["mensaje"], "success",6000);
            $('#boss_create').modal('hide');
            location.reload();
        },error: function(error) {
            error;
            swal("error!","error al enviar la informacion","warning",6000);
        }
    }); 

}

function modal_boss_edit(var_jefe_id,var_jefe_nom,var_jefe_ape,var_jefe_correo)
    {
        $('#boss_edit').modal('show')
        $('#jefe_id_e').val(var_jefe_id);
        $('#jefe_nom_e').val(var_jefe_nom);
        $('#jefe_ape_e').val(var_jefe_ape);
        $('#jefe_correo_e').val(var_jefe_correo);

    }
    

function edit_boss(){
    var var_jefe_id = document.getElementById("jefe_id_e").value;
    var var_jefe_nom = document.getElementById("jefe_nom_e").value;
    var var_jefe_ape = document.getElementById("jefe_ape_e").value;
    var var_jefe_correo = document.getElementById("jefe_correo_e").value;
    console.log("rutapost",baseURL+'Boss/createBoss');

    dataPostV = {
        jefe_id : var_jefe_id,
        jefe_nom : var_jefe_nom,
        jefe_ape : var_jefe_ape,
        jefe_correo : var_jefe_correo,
        tip_est_id_fk : 1,
    }

    console.info(dataPostV);

    $.ajax({
        type: "POST",
        url: baseURL+'Boss/editBoss',
        dataType: 'json',
        data: dataPostV,
        success: function(resp) {
            console.log("resp:",resp["mensaje"]);
            swal("exitoso!", resp["mensaje"], "success",6000);
            $('#boss_edit').modal('hide');
            location.reload();
        },error: function(error) {
            error;
            swal("error!","error al enviar la informacion","warning",6000);
        }
    }); 
  
}

function boss_delete(var_jefe_id){
    swal({
        title: '¿esta seguro de eliminar el jefe?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'cancelar',
        confirmButtonText: 'si,seguro'
        },function(resp) {
            if (resp) {
    
                var var_tip_est_id_fk = "2";
                dataPostV = {
                jefe_id : var_jefe_id,
                tip_est_id_fk : var_tip_est_id_fk,
            }
            console.info(dataPostV);
            $.ajax({
                type: "POST",
                url: baseURL+'Boss/deleteBoss',
                dataType: 'json',
                data: dataPostV,
                success: function(resp) {
                    console.log("resp:",resp["mensaje"]);
                    swal("exitoso!", resp["mensaje"], "success",6000);
                    location.reload();
                },error: function(error) {
                    error;
                    swal("error!","error al enviar la informacion","warning",6000);
                }
            });    
            
        }
        
    });
}
    



