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
        }
       

    });
});  

$.post(baseURL+"Collaborator/getcollaborator",
    function(data){
        var a = JSON.parse(data);
        $.each(a,function(i,colaborador)
        {
            $("#tablecollaborator").append(
                "<tr>"+
                    "<td>"+colaborador.col_login_num+"</td>"+
                    "<td>"+colaborador.col_nom+"</td>"+
                    "<td>"+colaborador.col_cargo+"</td>"+
                    "<td><button type='button' onclick='modal_collaborator_edit(\""+colaborador.col_id+"\",\""+colaborador.col_login_num+"\",\""+colaborador.col_nom+"\",\""+colaborador.col_cargo+"\");'  class='btn btn-primary mb-3'>editar</button> "+
                    "<button type='button' onclick='collaborator_delete(\""+colaborador.col_id+"\");' class='btn btn-danger mb-3'>eliminar</button></td>"+
                "</tr>"
            );
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
    console.log("rutapost",baseURL+'Collaborator/createCollaborator');

    dataPostV = {
    
        col_login_num : var_col_login_num,
        col_nom : var_col_nom,
        col_cargo : var_col_cargo,
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

}

 // fin de insertar datos de colaborador

 function modal_collaborator_edit(var_col_id, var_col_login_num, var_col_nom,var_col_cargo){
    $('#collaborator_edit').modal('show');
    $('#col_id_e').val(var_col_id);
	$('#col_login_num_e').val(var_col_login_num);
	$('#col_nom_e').val(var_col_nom);
    $('#col_cargo_e').val(var_col_cargo);
    
    }


function edit_collaborator(){
    var var_col_id = document.getElementById("col_id_e").value;
    var var_col_login_num = document.getElementById("col_login_num_e").value;
    var var_col_nom = document.getElementById("col_nom_e").value;
    var var_col_cargo = document.getElementById("col_cargo_e").value;
    console.log("rutapost",baseURL+'Collaborator/editCollaborator');

    dataPostV = {
        col_id : var_col_id,
        col_login_num : var_col_login_num,
        col_nom : var_col_nom,
        col_cargo : var_col_cargo,
        
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




   

