    $(document).ready( function () {
        $('#tableseccion').DataTable({
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

                "url": baseURL+"Seccion/getseccion",
                "type":"POST",
                dataSrc: ""
            },
            'columns': [
                { data: "seccion_id" },
                { data: "seccion_nom" },
                { data: "area_nom" },
                { "ordertable": true,render: function ( data, type, row ) { 
                    return "<button type='button' onclick='modal_seccion_edit(\""+row.seccion_id+"\",\""+row.seccion_nom+"\",\""+row.area_id_fk+"\");'  class='btn btn-primary mb-3'>editar</button> "+
                    "<button type='button' onclick='seccion_delete(\""+row.seccion_id+"\");' class='btn btn-danger mb-3'>eliminar</button></td>"
                }}
            ]
        });
    });  

    // inicio modal para insertar datos de seccion
    function modal_seccion_create(){
        $('#seccion_create').modal('show')
    }
    
    // fin modal para insertar datos de seccion
    

    
    // inicio de insertar datos de seccion
    function create_seccion(){
        var var_seccion_nom = document.getElementById("seccion_nom").value;
        var var_area_id_fk = document.getElementById("area_id_fk").value;
        console.log("rutapost",baseURL+'Seccion/createSeccion');
        if (var_seccion_nom=="") {
            swal("Opps!","por favor diligencie el nombre seccion","warning"); 
        }else{
            
        if (var_area_id_fk=="0") {
            swal("Opps!","por favor diligencie el el area a la que pertenece la seccion","warning"); 
        }else{
                dataPostV = {
                    seccion_nom : var_seccion_nom,
                    area_id_fk : var_area_id_fk,
                    tip_est_id_fk : 1, 
                }

                console.info(dataPostV);

                $.ajax({
                    type: "POST",
                    url: baseURL+'Seccion/createSeccion',
                    dataType: 'json',
                    data: dataPostV,
                    success: function(resp) {
                        console.log("resp:",resp["mensaje"]);
                        swal("exitoso!", resp["mensaje"], "success",6000);
                        $('#seccion_create').modal('hide');
                        location.reload();
                    },error: function(error) {
                        error;
                        swal("error!","error al enviar la informacion","warning",6000);
                    }
                });    
            }}
    }
    // fin de insertar datos de seccion

    function modal_seccion_edit(var_seccion_id,var_seccion_nom,var_area_id_fk){
        $('#seccion_edit').modal('show');
        $('#seccion_id_e').val(var_seccion_id);
        $('#seccion_nom_e').val(var_seccion_nom);
        $('#area_id_fk_e').val(var_area_id_fk);
    }
    
    function edit_seccion(){
        var var_seccion_id = document.getElementById("seccion_id_e").value;
        var var_seccion_nom = document.getElementById("seccion_nom_e").value;
        var var_area_id_fk = document.getElementById("area_id_fk_e").value;
        console.log("rutapost",baseURL+'Seccion/editSeccion');
        
                dataPostV = {
                    seccion_id : var_seccion_id,
                    seccion_nom : var_seccion_nom,
                    area_id_fk : var_area_id_fk,
                    tip_est_id_fk : 1, 
                }

                console.info(dataPostV);

                $.ajax({
                    type: "POST",
                    url: baseURL+'Seccion/editSeccion',
                    dataType: 'json',
                    data: dataPostV,
                    success: function(resp) {
                        console.log("resp:",resp["mensaje"]);
                        swal("exitoso!", resp["mensaje"], "success",6000);
                        $('#seccion_edit').modal('hide');
                        location.reload();
                    },error: function(error) {
                        error;
                        swal("error!","error al enviar la informacion","warning",6000);
                    }
                });    

    }



    function seccion_delete(var_seccion_id){
        swal({
            title: '¿esta seguro de eliminar la seccion?',
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
                    seccion_id : var_seccion_id,
                    tip_est_id_fk : var_tip_est_id_fk,
                }
                console.info(dataPostV);
                $.ajax({
                    type: "POST",
                    url: baseURL+'Seccion/deleteSeccion',
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
    
    