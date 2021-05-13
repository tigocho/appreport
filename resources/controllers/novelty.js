
id=2;
$.post(baseURL+"Novelty/getnovelty/"+id,
    function(data){
        var n = JSON.parse(data);
        $.each(n,function(i,novedad)
        {
            $("#tablenovelty").append(
                "<tr>"+
                    "<td>"+novedad.nove_fecha+"</td>"+
                    "<td>"+novedad.col_login_num+"</td>"+
                    "<td>"+novedad.col_nom+"</td>"+
                    "<td>"+novedad.session_nom+"</td>"+
                    "<td>"+novedad.nove_hora_ini+"</td>"+
                    "<td>"+novedad.nove_hora_fin+"</td>"+
                    "<td>"+novedad.nove_tiem_total+"</td>"+
                    "<td><b>"+novedad.cate_nom+"</b>"+" - "+novedad.tip_inci_nom+"</td>"+
                    "<td>"+novedad.est_des+"</td>"+
                    "<td><a href='"+baseURL+"Novelty/edit/"+novedad.nove_id+"'><button type='button' class='btn btn-primary mb-3'>editar</button></a> "+
                    "<button type='button' onclick='novelty_delete(\""+novedad.nove_id+"\");' class='btn btn-danger mb-3'>eliminar</button></td>"+
                "</tr>"
            );
        });
});

  
$(document).ready( function () {
    $('#tablenovelty').DataTable({

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


// inicio de insertar datos de agente
function create_novelty(){
    var var_nove_fecha = document.getElementById("nove_fecha").value;
    var var_nove_hora_ini = document.getElementById("nove_hora_ini").value;
    var var_nove_hora_fin = document.getElementById("nove_hora_fin").value;
    var var_col_id_fk = document.getElementById("col_id_fk").value;
    var var_area_id_fk = document.getElementById("area_id_fk").value;
    var var_nove_tiem_total = document.getElementById("nove_tiem_total").value;
    var var_tip_inci_id_fk = document.getElementById("tip_inci_id_fk").value;
    var var_cate_id_fk = document.getElementById("categoria").value;
    var var_usu_id_fk = document.getElementById("usu_id").value;
    console.log("rutapost",baseURL+'Novelty/createNovelty');
    if (var_nove_tiem_total == "NaN horas, NaN minutos"){
        var_est_id_fk = 1;
    }else{
        var_est_id_fk = 2;
    }

    if (var_col_id_fk==0) {
        swal("Opps!","por favor selecionar el colaborador","warning");
    } else {
    if (var_area_id_fk==0) {
        swal("Opps!","por favor selecionar la session","warning");
    } else {
    if (var_tip_inci_id_fk==0) {
        swal("Opps!","por favor selecionar el tipo de incidencia","warning");
    } else {
    if (var_nove_hora_ini=="") {
        swal("Opps!","por favor diligencie la hora de inicio","warning");
    } else {

        dataPostV = {
        nove_fecha : var_nove_fecha,
        nove_hora_ini : var_nove_hora_ini,
        nove_hora_fin : var_nove_hora_fin,
        nove_tiem_total : var_nove_tiem_total,
        cate_id_fk : var_cate_id_fk,
        tip_inci_id_fk : var_tip_inci_id_fk,
        area_id_fk  : var_area_id_fk,
        col_id_fk : var_col_id_fk,
        usu_id_fk : var_usu_id_fk,
        est_id_fk : var_est_id_fk,
        tip_est_id_fk : 1,  
        }
        console.info(dataPostV);

        $.ajax({
            type: "POST",
            url: baseURL+'Novelty/createNovelty',
            dataType: 'json',
            data: dataPostV,
            success: function(resp) {
                console.log("resp:",resp["mensaje"]);
                swal("exitoso!", resp["mensaje"], "success",6000);
                location.href =baseURL+"Novelty/index";
            },error: function(error) {
                error;
                swal("error!","error al enviar la informacion","warning",6000);
            }
        });
    }}}}
}
// fin de insertar datos de agente

// filtro para los select
$('#categoria').change(function() {
    $("#tip_inci_id_fk").html(
        "<option >tipo incidencia</option>"+
        "<option >selecione...</option>"
    );
    var_cate_id = $(this).val();
    $.post(baseURL+"Novelty/gettypeincident",
    {
        cate_id : var_cate_id,
    },
    function(data){
        var n = JSON.parse(data);
        $.each(n,function(i,tip_incidencia)
        {
            $("#tip_inci_id_fk").append(
                "<option value="+tip_incidencia.tip_inci_id+">"+tip_incidencia.tip_inci_nom+"</option>",
            );
        });

    });

});

$("#colaborador").on("keyup",function(){
    $('#col_id_fk option').each(function(){
        if($(this).text().indexOf($("#colaborador").val()) == -1){
                $(this).prop("selected", false);
                $(this).fadeOut();
            }else{
                $(this).prop("selected", false);
            $(this).fadeIn();
            }
    });
    });

    $("#area").on("keyup",function(){
    $('#area_id_fk option').each(function(){
        if($(this).text().indexOf($("#area").val()) == -1){
                $(this).prop("selected", false);
                $(this).fadeOut();
            }else{
                $(this).prop("selected", false);
            $(this).fadeIn();
            }
    });
    });



//  fin filtro para los select




    




if (document.querySelector('#nove_hora_ini')) {
    const calcularini = document.querySelector('#nove_hora_ini');
    calcularini.addEventListener('change', restarHoras);
    const calcularfin = document.querySelector('#nove_hora_fin');
    calcularfin.addEventListener('change', restarHoras);
}

// logica de restar tiempo
function restarHoras() {

    var inicioh = new Date(inicio = document.getElementById("nove_hora_ini").value);
    var finh = new Date(fin = document.getElementById("nove_hora_fin").value);
    var diffMs = (finh - inicioh); // milliseconds 
    var diffHrs = Math.floor(diffMs  / 3600000); // hours
    var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000); // minutes

    if (diffHrs <= 0 && diffMins <= 0 ) {
        document.getElementById('boton').disabled=true;
        swal("error!","por favor ingrese una hora de inicio mayor a la hora fin","warning");
    }else{
        document.getElementById('boton').disabled=false;
    }
    document.getElementById("nove_tiem_total").value = diffHrs + " horas, " + diffMins + " minutos";
}
// logica de restar tiempo


function edit_novelty(){
var var_nove_id= document.getElementById("nove_id").value;
var var_nove_fecha = document.getElementById("nove_fecha").value;
var var_nove_hora_ini = document.getElementById("nove_hora_ini").value;
var var_nove_hora_fin = document.getElementById("nove_hora_fin").value;
var var_col_id_fk = document.getElementById("col_id_fk").value;
var var_area_id_fk = document.getElementById("area_id_fk").value;
var var_nove_tiem_total = document.getElementById("nove_tiem_total").value;
var var_cate_id_fk = document.getElementById("categoria").value;
var var_tip_inci_id_fk = document.getElementById("tip_inci_id_fk").value;
console.log("rutapost",baseURL+'Novelty/editNovelty');

    if (var_nove_tiem_total == "NaN horas, NaN minutos"){
        var_est_id_fk = 1;
    }else{
        var_est_id_fk = 2;
    }

    dataPostV = {
        nove_id : var_nove_id,
        nove_fecha : var_nove_fecha,
        nove_hora_ini : var_nove_hora_ini,
        nove_hora_fin : var_nove_hora_fin,
        nove_tiem_total : var_nove_tiem_total,
        cate_id_fk : var_cate_id_fk,
        tip_inci_id_fk : var_tip_inci_id_fk,
        area_id_fk  : var_area_id_fk,
        col_id_fk : var_col_id_fk,
        est_id_fk  : var_est_id_fk,
        
    }
    console.info(dataPostV);
    $.ajax({
        type: "POST",
        url: baseURL+'Novelty/editNovelty',
        dataType: 'json',
        data: dataPostV,
        success: function(resp) {
            console.log("resp:",resp["mensaje"]);

            swal("exitoso!", resp["mensaje"], "success",6000);
            location.href = baseURL+"Novelty/index";

        },error: function(error) {
            error;
            swal("error!","error al enviar la informacion","warning",6000);
        }
    });

}

function novelty_delete(var_nove_id){
    swal({
        title: '¿esta seguro de eliminar el novedad?',
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
                nove_id : var_nove_id,
                tip_est_id_fk : var_tip_est_id_fk,
            }
            console.info(dataPostV);
            $.ajax({
                type: "POST",
                url: baseURL+'Novelty/deleteNovelty',
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



   





    
     


