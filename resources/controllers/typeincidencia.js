$(document).ready( function () {
    $('#tabletypeincident').DataTable({
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

            "url": baseURL+"Typeincident/gettypeincident",
            "type":"POST",
            dataSrc: ""
        },
        'columns': [
            { data: "tip_inci_id" },
            { data: "tip_inci_nom" },
            { "ordertable": true,render: function ( data, type, row ) { 
                return "<td><button type='button' onclick='modal_typeincident_edit(\""+row.tip_inci_id+"\",\""+row.tip_inci_nom+"\",\""+row.cate_id_fk+"\");'  class='btn btn-primary mb-3'>editar</button> "+
                "<button type='button' onclick='typeincident_delete(\""+row.tip_inci_id+"\");' class='btn btn-danger mb-3'>eliminar</button></td>"
            }}
        ]
    });
} );

// inicio modal para insertar datos de tipo de incidencia
function modal_typeincident_create()
{
 $('#typeincident_create').modal('show')
} 
// fin modal para insertar datos de tipo incidencia
    
    
// inicio de insertar datos de incidencia
function create_typeincident(){

    var var_tip_inci_nom = document.getElementById("tip_inci_nom").value;
    var var_cate_id_fk = document.getElementById("cate_id_fk").value;
    console.log("rutapost",baseURL+'Typeincident/createTypeincident');

    if (var_tip_inci_nom=="") {
        swal("Opps!","por favor diligencie el tipo de incidencia","warning");
    } else {
        
    if(var_cate_id_fk==0){
        swal("Opps!","por favor selecionar la categoria a la que pertenece el tipo de incidencia","warning");    
    }else{  
        
        dataPostV = {
        tip_inci_nom : var_tip_inci_nom,
        tip_est_id_fk : 1,
        cate_id_fk : var_cate_id_fk,  
        }

        console.info(dataPostV);

        $.ajax({
            type: "POST",
            url: baseURL+'Typeincident/createTypeincident',
            dataType: 'json',
            data: dataPostV,
            success: function(resp) {
                console.log("resp:",resp["mensaje"]);
                swal("exitoso!", resp["mensaje"], "success",6000);
                $('#agent_create').modal('hide');
                location.reload();
            },error: function(error) {
                error;
                swal("error!","error al enviar la informacion","warning",6000);
            }
        }); 
    }}  

}

// fin de insertar datos de tipo de incidencia

function modal_typeincident_edit(var_tip_inci_id,var_tip_inci_nom,var_cate_id_fk){
    $('#typeincident_edit').modal('show');
    $('#tip_inci_id_e').val(var_tip_inci_id);
    $('#tip_inci_nom_e').val(var_tip_inci_nom);
    $('#cate_id_fk_e').val(var_cate_id_fk);
}

function edit_typeincident(){
    var var_tip_inci_id = document.getElementById("tip_inci_id_e").value;
    var var_tip_inci_nom = document.getElementById("tip_inci_nom_e").value;
    var var_cate_id_fk = document.getElementById("cate_id_fk_e").value;
    console.log("rutapost",baseURL+'Typeincident/editTypeincident');

    dataPostV = {
        tip_inci_id : var_tip_inci_id,
        tip_inci_nom : var_tip_inci_nom,
        cate_id_fk : var_cate_id_fk,
    }

    console.info(dataPostV);

    $.ajax({
        type: "POST",
        url: baseURL+'Typeincident/editTypeincident',
        dataType: 'json',
        data: dataPostV,
        success: function(resp) {
            console.log("resp:",resp["mensaje"]);
            swal("exitoso!", resp["mensaje"], "success",600);
            $('#agent_edit').modal('hide');
            location.reload();
        },error: function(error) {
            error;
            swal("error!","error al enviar la informacion","warning",6000);
        }
    });    

}


function typeincident_delete(var_tip_inci_id){
    swal({
        title: '¿esta seguro de eliminar el tipo de incidencia?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'cancelar',
        confirmButtonText: 'si,seguro'
        },function(resp) {
        if (resp) {

            
            dataPostV = {
            tip_inci_id : var_tip_inci_id,
            tip_est_id_fk : 2,
        }
        console.info(dataPostV);
        $.ajax({
            type: "POST",
            url: baseURL+'Typeincident/deleteTypeincident',
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




    
    
    
    