$(document).ready( function () {
    $('#tablecategory').DataTable({

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

$.post(baseURL+"Category/getCategory",
function(data){
    var c = JSON.parse(data);
    $.each(c,function(i,categoria)
    {
        $("#tablecategory").append(
            "<tr>"+
                "<td>"+categoria.cate_id+"</td>"+
                "<td>"+categoria.cate_nom+"</td>"+
                "<td><button type='button' onclick='modal_category_edit(\""+categoria.cate_id+"\",\""+categoria.cate_nom+"\");'  class='btn btn-primary mb-3'>editar</button> "+
                "<button type='button' onclick='category_delete(\""+categoria.cate_id+"\");' class='btn btn-danger mb-3'>eliminar</button></td>"+
            "</tr>"
        );
    });
});


function modal_category_create(){
    $('#category_create').modal('show')
    }


function create_category(){

    var var_cate_nom = document.getElementById("cate_nom").value;
    console.log("rutapost",baseURL+'Category/createCategory');
    if (var_cate_nom=="") {
        swal("Opps!","por favor diligencie una categoria","warning");
    } else{

        dataPostV = {
        
            cate_nom : var_cate_nom,
            tip_est_id_fk : 1,
            
        }

        console.info(dataPostV);

        $.ajax({
            type: "POST",
            url: baseURL+'Category/createCategory',
            dataType: 'json',
            data: dataPostV,
            success: function(resp) {
                console.log("resp:",resp["mensaje"]);
                swal("exitoso!", resp["mensaje"], "success",6000);
                $('#category_create').modal('hide');
                location.reload();
            },error: function(error) {
                error;
                swal("error!","error al enviar la informacion","warning",6000);
            }
        }); 
    }   
}



function modal_category_edit(var_cate_id,var_cate_nom){
    $('#category_edit').modal('show');
    $('#cate_id_e').val(var_cate_id);
    $('#cate_nom_e').val(var_cate_nom);
}

function edit_category(){
    var var_cate_id = document.getElementById("cate_id_e").value;
    var var_cate_nom = document.getElementById("cate_nom_e").value;
    console.log("rutapost",baseURL+'Category/editCategory');

    dataPostV = {
        cate_id: var_cate_id,
        cate_nom : var_cate_nom,
        tip_est_id_fk : 1,
        
    }

    console.info(dataPostV);

    $.ajax({
        type: "POST",
        url: baseURL+'Category/editCategory',
        dataType: 'json',
        data: dataPostV,
        success: function(resp) {
            console.log("resp:",resp["mensaje"]);
            swal("exitoso!", resp["mensaje"], "success",6000);
            $('#category_edit').modal('hide');
            location.reload();
        },error: function(error) {
            error;
            swal("error!","error al enviar la informacion","warning",6000);
        }
    });    
}

function category_delete(var_cate_id){
    swal({
        title: '¿esta seguro de eliminar la categoria?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'cancelar',
        confirmButtonText: 'si,seguro'
        },function(resp) {
        if (resp) {

            dataPostV = {
            cate_id : var_cate_id,
            tip_est_id_fk : 2,
        }
        console.info(dataPostV);
        $.ajax({
            type: "POST",
            url: baseURL+'Category/deleteCategory',
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




    