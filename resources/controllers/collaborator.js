// JSQuery que imprime la datatable con la informacion del colaborador en la vista
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
            { data: "area_nom" },
            { "ordertable": true,render: function ( data, type, row ) { 
                return "<button type='button' onclick='modal_collaborator_edit(\""+row.col_id+"\",\""+row.col_login_num+"\",\""+row.col_nom+"\",\""+row.col_cargo+"\",\""+row.id_area_fk+"\");'  class='btn btn-primary mb-3'>Editar</button> "+
                "<button type='button' onclick='collaborator_delete(\""+row.col_id+"\");' class='btn btn-danger mb-3'>Eliminar</button>"
            }}
        ]
    });
});  

    // funcion javascript que abre la modal(ventana) que contiene el formulario del colaborador
    function modal_collaborator_create()
    {
        $('#collaborator_create').modal('show')
    }


    function create_collaborator()
    {
        var var_col_login_num = document.getElementById("col_login_num").value;
        var var_col_nom = document.getElementById("col_nom").value;
        var var_col_cargo = document.getElementById("col_cargo").value;
        var var_area_id_fk = document.getElementById("area_id_fk").value;
        console.log("rutapost",baseURL+'Collaborator/createCollaborator');
        if(var_col_login_num == ""){
            var_col_login_num="NO APLICA";
        }
        if (var_col_nom=="") {
            swal("Opps!","Por favor diligencie el nombre del colaborador","warning");  
            return false;
        } 
        if (var_col_cargo=="") {
            swal("Opps!","Por favor diligencie el cargo del colaborador","warning"); 
            return false;
        }
        if (var_area_id_fk=="0") {
            swal("Opps!","Por favor diligencie el el area a la que pertenece el colaborador","warning"); 
            return false;
        } 
        
        
        dataPostV = {
        
            col_login_num : var_col_login_num,
            col_nom : var_col_nom,
            col_cargo : var_col_cargo,
            id_area_fk : var_area_id_fk,
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
                swal("Opps!","Error al enviar la informacion","warning",6000);
            }
        });    

    }

 // fin de insertar datos de colaborador

    function modal_collaborator_edit(var_col_id, var_col_login_num, var_col_nom,var_col_cargo,var_area_id_fk)
    {
    $('#collaborator_edit').modal('show');
    $('#col_id_e').val(var_col_id);
	$('#col_login_num_e').val(var_col_login_num);
	$('#col_nom_e').val(var_col_nom);
    $('#col_cargo_e').val(var_col_cargo);
    $('#area_id_fk_e').val(var_area_id_fk);
    }


    function edit_collaborator()
    {
        var var_col_id = document.getElementById("col_id_e").value;
        var var_col_login_num = document.getElementById("col_login_num_e").value;
        var var_col_nom = document.getElementById("col_nom_e").value;
        var var_col_cargo = document.getElementById("col_cargo_e").value;
        var var_area_id_fk = document.getElementById("area_id_fk_e").value;
        console.log("rutapost",baseURL+'Collaborator/editCollaborator');
        dataPostV = {
            col_id : var_col_id,
            col_login_num : var_col_login_num,
            col_nom : var_col_nom,
            col_cargo : var_col_cargo,
            id_area_fk : var_area_id_fk,
            
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
                swal("Opps!","Error al enviar la informacion","warning",6000);
            }
        });    

    }

function collaborator_delete(var_col_id){
    swal({
        title: '¿Está seguro de eliminar el colaborador?',
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
                    swal("Opps!","Error al enviar la informacion","warning",6000);
                }
            });    
           
        }
        
      });

}




   

