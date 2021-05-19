$(document).ready( function () {
    $('#tablecollaborator').DataTable({
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

            "url": baseURL+"Collaborator/getcollaborator",
            "type":"POST",
            dataSrc: ""
        },
        'columns': [
            { data: "col_login_num" },
            { data: "col_nom" },
            { data: "col_cargo" },
            { data: "col_area" },
            { "ordertable": true,render: function ( data, type, row ) { 
                return "<td><button type='button' onclick='modal_collaborator_edit(\""+row.col_id+"\",\""+row.col_login_num+"\",\""+row.col_nom+"\",\""+row.col_cargo+"\",\""+row.col_area+"\");'  class='btn btn-primary mb-3'>editar</button> "+
                "<button type='button' onclick='collaborator_delete(\""+row.col_id+"\");' class='btn btn-danger mb-3'>eliminar</button></td>"
            }}
        ]
    });
});  


// inicio modal para insertar datos de colaborador
function modal_collaborator_create(){
$('#collaborator_create').modal('show')
}

// fin modal para insertar datos de colaborador


// inicio de insertar datos de colaborador
function create_collaborator(){

    var var_col_login_num = document.getElementById("col_login_num").value;
    var var_col_nom = document.getElementById("col_nom").value;
    var var_col_cargo = document.getElementById("col_cargo").value;
    var var_col_area = document.getElementById("col_area").value;
    console.log("rutapost",baseURL+'Collaborator/createCollaborator');
    if(var_col_login_num == ""){
        var_col_login_num="NO APLICA";
    }
    if (var_col_nom=="") {
        swal("Opps!","por favor diligencie el nombre del colaborador","warning");  
    } else {
    if (var_col_cargo=="") {
        swal("Opps!","por favor diligencie el cargo del colaborador","warning"); 
    } else {
    if (var_col_area=="") {
        swal("Opps!","por favor diligencie el area a la que pertenece el colaborador","warning"); 
    } else {
    
            dataPostV = {
            
                col_login_num : var_col_login_num,
                col_nom : var_col_nom,
                col_cargo : var_col_cargo,
                col_area : var_col_area,
                tip_est_id_fk : 1, 
            }

            console.info(dataPostV);

            $.ajax({
                type: "POST",
                url: baseURL+'Collaborator/createCollaborator',
                dataType: 'json',
                data: dataPostV,
                success: function(resp) {
                    console.log("resp:",resp["mensaje"]);
                    swal("exitoso!", resp["mensaje"], "success",6000);
                    $('#collaborator_create').modal('hide');
                    location.reload();
                },error: function(error) {
                    error;
                    swal("error!","error al enviar la informacion","warning",6000);
                }
            });    
        }}}

}

 // fin de insertar datos de colaborador

 function modal_collaborator_edit(var_col_id, var_col_login_num, var_col_nom,var_col_cargo,var_col_area){
    $('#collaborator_edit').modal('show');
    $('#col_id_e').val(var_col_id);
	$('#col_login_num_e').val(var_col_login_num);
	$('#col_nom_e').val(var_col_nom);
    $('#col_cargo_e').val(var_col_cargo);
    $('#col_area_e').val(var_col_area);
    
    }


function edit_collaborator(){
    var var_col_id = document.getElementById("col_id_e").value;
    var var_col_login_num = document.getElementById("col_login_num_e").value;
    var var_col_nom = document.getElementById("col_nom_e").value;
    var var_col_cargo = document.getElementById("col_cargo_e").value;
    var var_col_area = document.getElementById("col_area_e").value;
    console.log("rutapost",baseURL+'Collaborator/editCollaborator');
    dataPostV = {
        col_id : var_col_id,
        col_login_num : var_col_login_num,
        col_nom : var_col_nom,
        col_cargo : var_col_cargo,
        col_area : var_col_area,
        
    }

    console.info(dataPostV);

    $.ajax({
        type: "POST",
        url: baseURL+'Collaborator/editCollaborator',
        dataType: 'json',
        data: dataPostV,
        success: function(resp) {
            console.log("resp:",resp["mensaje"]);
            swal("exitoso!", resp["mensaje"], "success",6000);
            $('#collaborator_edit').modal('hide');
            location.reload();
        },error: function(error) {
            error;
            swal("error!","error al enviar la informacion","warning",6000);
        }
    });    

}

function collaborator_delete(var_col_id){
    swal({
        title: '¿esta seguro de eliminar el colaborador?',
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
                col_id : var_col_id,
                tip_est_id_fk : var_tip_est_id_fk,
            }
            console.info(dataPostV);
            $.ajax({
                type: "POST",
                url: baseURL+'Collaborator/deleteCollaborator',
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




   

