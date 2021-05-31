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
        },
        "ajax":{

            "url": baseURL+"User/getuser",
            "type":"POST",
            dataSrc: ""
        },

        'columns': [
            { data: "usu_num_doc" },
            { data: null,render: function ( data, type, row ) { return row.usu_nom + ' ' + row.usu_nom_two;}},
            { data: null,render: function ( data, type, row ) { return row.usu_ape + ' ' + row.usu_ape_two;}},
            { data: "usu_correo" },
            { data: "usu_contra" },
            { data: "rol_des" },
            { data: null,render: function ( data, type, row ) { return row.jefe_nom + ' ' + row.jefe_ape;}},
            { "ordertable": true,render: function ( data, type, row ) { 
                return "<a href='"+baseURL+"User/edit/"+row.usu_id+"'><button type='button' class='btn btn-primary mb-3'>Editar</button></a> "+
                "<button type='button' onclick='user_delete(\""+row.usu_id+"\");' class='btn btn-danger mb-3'>Eliminar</button>"
            }}
        ]
    });
} );


$("#usu_contra").on("keyup",function(){
   contra = $(this).val();
    if( contra.length > 8 ){
        swal("Opps!","La contraseña no puede exceder de los 8 carateres","warning");
        document.getElementById('boton').disabled=true;
    }else{
        document.getElementById('boton').disabled=false;
    }

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
    var var_jefe_id_fk= document.getElementById("jefe_id_fk").value;
    console.log("rutapost",baseURL+'User/createUser');
    
    if (var_usu_num_doc=="") {
        swal("Opps!","Por favor diligencie el numero de documento","warning");
    } else {
    if (var_usu_nom=="") {
        swal("Opps!","Por favor diligencie primer nombre","warning");
    } else {
    if (var_usu_ape=="") {
        swal("Opps!","Por favor diligencie el primer apellido","warning");
    } else {
    if (var_usu_correo=="") {
        swal("Opps!","Por favor diligencie el correo","warning");
    } else {
    if (var_usu_contra=="") {
        swal("Opps!","Por favor diligencie la contraseña","warning");
    } else {
    if (var_rol_id_fk==0) {
        swal("Opps!","Por favor diligencie el rol del usuario","warning");
    } else {
    
        dataPostV = {
        usu_num_doc : var_usu_num_doc,
        usu_nom :  var_usu_nom,
        usu_ape : var_usu_ape,
        usu_nom_two :  var_usu_nom_two,
        usu_ape_two : var_usu_ape_two,
        usu_correo : var_usu_correo,
        usu_contra : var_usu_contra,
        rol_id_fk : var_rol_id_fk,
        jefe_id_fk : var_jefe_id_fk,
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
                swal("Opps!","Error al enviar la informacion","warning",6000);
            }
        });

    }}}}}}
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
        var var_rol_id_fk= document.getElementById("rol_id_fk_e").value;
        var var_jefe_id_fk= document.getElementById("jefe_id_fk_e").value;
        console.log("rutapost",baseURL+'User/editUser');
        
        if(var_rol_id_fk == 1 || var_rol_id_fk == 3 ){

            var_jefe_id_fk = 0;
        }
        
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
            jefe_id_fk : var_jefe_id_fk,
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
                    swal("Opps!","Error al enviar la informacion","warning",6000);
                }
            });
        
        }

        function user_delete(var_usu_id){
            swal({
                title: '¿Está seguro de eliminar el usuario?',
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
                            swal("Opps!","Error al enviar la informacion","warning",6000);
                        }
                    });    
                   
                }
                
              });
        
        }

        $('#rol_id_fk').change(function() { 
            rol_id = $(this).val();
            $("#jefe_id_fk").html(
                "<option selected disabled>selecione...</option>"
            );
            $('#jefenom').css('display','none');
            $('#jefecorreo').css('display','none');
            if (rol_id == 2 || rol_id == 4 ) {
                $('#jefenom').css('display','block');
                $('#jefecorreo').css('display','block');
                  
                $.post(baseURL+"User/getboss",
                function(data){
                    var n = JSON.parse(data);
                    $.each(n,function(i,boss)
                    {
                        $("#jefe_id_fk").append(
                            "<option value="+boss.jefe_id+">"+boss.jefe_nom+" "+boss.jefe_ape+"</option>"
                        );

    
                    });

                });
            }

        });

        $("#jefe_id_fk").on("change",function(){
            var var_jefe_id = $(this).val();
            $.post(baseURL+"User/getbossC",
            {
                jefe_id : var_jefe_id,
            },
            function(data){
                var n = JSON.parse(data);
                $.each(n,function(i,boss)
                {
                    $('#correo').val(boss.jefe_correo);
                });

            });

        });

        $("#rol_id_fk_e").on("change",function(){
            rol_id = $(this).val();
            if (rol_id == 1 || rol_id == 3 ) {   
                $('#je_nom_edit').css('display','none');
                $('#je_co_edit').css('display','none');              
            }else{
                $('#je_nom_edit').css('display','block');
                $('#je_co_edit').css('display','block');
            }

        });

        $("#jefe_id_fk_e").on("change",function(){
            var var_jefe_id_e = $(this).val();
            $.post(baseURL+"User/getbossC",
            {
                jefe_id : var_jefe_id_e,
            },
            function(data){
                var n = JSON.parse(data);
                $.each(n,function(i,boss)
                {
                    $('#correo').val(boss.jefe_correo);
                });

            });

        });




       

      
           



               

       


            
    