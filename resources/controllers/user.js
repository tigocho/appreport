
$(document).ready( function () {
    $('#tableuser').DataTable({

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
} );


$.post(baseURL+"User/getuser",
    function(data){
        var u = JSON.parse(data);
        $.each(u,function(i,usuario)
        {
            $("#tableuser").append(
                "<tr>"+
                    "<td>"+usuario.usu_num_doc+"</td>"+
                    "<td>"+usuario.usu_nom+" "+usuario.usu_nom_two+"</td>"+
                    "<td>"+usuario.usu_ape+" "+usuario.usu_ape_two+"</td>"+
                    "<td>"+usuario.usu_correo+"</td>"+
                    "<td>"+usuario.usu_contra+"</td>"+
                    "<td>"+usuario.rol_des+"</td>"+
                    "<td><a href='"+baseURL+"User/edit/"+usuario.usu_id+"'><button type='button' class='btn btn-primary mb-3'>editar</button></a> "+
                    "<button type='button' onclick='user_delete(\""+usuario.usu_id+"\");' class='btn btn-danger mb-3'>eliminar</button></td>"+
                "</tr>"
            );
        });
    });



function create_user(){

    var var_usu_num_doc = document.getElementById("usu_num_doc").value;
    var var_usu_nom = document.getElementById("usu_nom").value;
    var var_usu_ape = document.getElementById("usu_ape").value;
    var var_usu_nom_two = document.getElementById("usu_nom_two").value;
    var var_usu_ape_two = document.getElementById("usu_ape_two").value;
    var var_usu_correo = document.getElementById("usu_correo").value;
    var var_usu_contra = document.getElementById("usu_contra").value;
    var var_rol_id_fk= document.getElementById("rol_id_fk").value;
    console.log("rutapost",baseURL+'User/createUser');
    
    
    
     dataPostV = {
        usu_num_doc : var_usu_num_doc,
        usu_nom :  var_usu_nom,
        usu_ape : var_usu_ape,
        usu_nom_two :  var_usu_nom_two,
        usu_ape_two : var_usu_ape_two,
        usu_correo : var_usu_correo,
        usu_contra : var_usu_contra,
        rol_id_fk : var_rol_id_fk,
        tip_est_id_fk : 1,
         
         
     }
        console.info(dataPostV);
    
        $.ajax({
            type: "POST",
            url: baseURL+'user/createUser',
            dataType: 'json',
            data: dataPostV,
            success: function(resp) {
                console.log("resp:",resp["mensaje"]);
                swal("exitoso!", resp["mensaje"], "success",6000);
                location.href =baseURL+"User/index";
            },error: function(error) {
                error;
                swal("error!","error al enviar la informacion","warning",6000);
            }
        });
    
    }


    function edit_user(){
        var var_usu_id = document.getElementById("usu_id").value;
        var var_usu_num_doc = document.getElementById("usu_num_doc").value;
        var var_usu_nom = document.getElementById("usu_nom").value;
        var var_usu_ape = document.getElementById("usu_ape").value;
        var var_usu_nom_two = document.getElementById("usu_nom_two").value;
        var var_usu_ape_two = document.getElementById("usu_ape_two").value;
        var var_usu_correo = document.getElementById("usu_correo").value;
        var var_usu_contra = document.getElementById("usu_contra").value;
        var var_rol_id_fk= document.getElementById("rol_id_fk").value;
        console.log("rutapost",baseURL+'User/editUser');
        
        
        
         dataPostV = {
            usu_id : var_usu_id,
            usu_num_doc : var_usu_num_doc,
            usu_nom :  var_usu_nom,
            usu_ape : var_usu_ape,
            usu_nom_two :  var_usu_nom_two,
            usu_ape_two : var_usu_ape_two,
            usu_correo : var_usu_correo,
            usu_contra : var_usu_contra,
            rol_id_fk : var_rol_id_fk,
            tip_est_id_fk : 1,
             
         }
            console.info(dataPostV);
        
            $.ajax({
                type: "POST",
                url: baseURL+'User/editUser',
                dataType: 'json',
                data: dataPostV,
                success: function(resp) {
                    console.log("resp:",resp["mensaje"]);
                    swal("exitoso!", resp["mensaje"], "success",6000);
                    location.href =baseURL+"User/index";
                },error: function(error) {
                    error;
                    swal("error!","error al enviar la informacion","warning",6000);
                }
            });
        
        }

        function user_delete(var_usu_id){
            swal({
                title: '¿esta seguro de eliminar el usuario?',
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
                        usu_id : var_usu_id,
                        tip_est_id_fk : var_tip_est_id_fk,
                    }
                    console.info(dataPostV);
                    $.ajax({
                        type: "POST",
                        url: baseURL+'User/deleteUser',
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
    