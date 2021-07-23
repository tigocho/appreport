// inicio de novedades abiertas
$(document).ready( function () {
    $('#tableabiertas').DataTable({
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

            "url": baseURL+"Novelty/getnoveltyab",
            "type":"POST",
            dataSrc: ""
        },
        'columns': [
            { data: "nove_fecha" },
            { data: null,render: function ( data, type, row ) { return '<b>'+row.col_login_num + '</b> - ' + row.col_nom;}},
            { data: "seccion_nom" },
            { data: "nove_hora_ini" },
            { data: "nove_hora_fin" },
            { data: "nove_tiem_total" },
            { data: null,render: function ( data, type, row ) { return '<b>'+row.cate_nom + '</b> - ' + row.tip_inci_nom;}},
            { data: "est_des"},
            { data: "tip_obser_nom"},
            { data: "nove_obser_descripcion"},
            { "ordertable": true,render: function ( data, type, row ) {
                if (rol != 2){
                return "<a href='"+baseURL+"Novelty/edit/"+row.nove_id+"'><button type='button' class='btn btn-primary mb-3'>Editar</button></a> "+
                "<button type='button' onclick='novelty_delete(\""+row.nove_id+"\");' class='btn btn-danger mb-3'>Eliminar</button>"
                }else{
                    return "<a href='"+baseURL+"Novelty/edit/"+row.nove_id+"'><button type='button' class='btn btn-primary mb-3'>Editar</button></a>"
                }
            }}
        ]
    });
} ); 
// fin de novedades abiertas

// inicio de novedades cerradas
$(document).ready( function () {
    $('#tablecerradas').DataTable({

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

            "url": baseURL+"Novelty/getnoveltyce",
            "type":"POST",
            dataSrc: ""
        },
        'columns': [
            { data: "nove_fecha" },
            { data: null,render: function ( data, type, row ) { return '<b>'+row.col_login_num + '</b> - ' + row.col_nom;}},
            { data: "seccion_nom" },
            { data: "nove_hora_ini" },
            { data: "nove_hora_fin" },
            { data: "nove_tiem_total" },
            { data: null,render: function ( data, type, row ) { return '<b>'+row.cate_nom + '</b> - ' + row.tip_inci_nom;}},
            { data: "est_des"},
            { data: "tip_obser_nom"},
            { data: "nove_obser_descripcion"},
            { "ordertable": true,render: function ( data, type, row ) { 
                if (rol != 2){
                return "<a href='"+baseURL+"Novelty/edit/"+row.nove_id+"'><button type='button' class='btn btn-primary mb-3'>Editar</button></a> "+
                "<button type='button' onclick='novelty_delete(\""+row.nove_id+"\");' class='btn btn-danger mb-3'>Eliminar</button>"
                }else{
                    return "<a href='"+baseURL+"Novelty/edit/"+row.nove_id+"'><button type='button' class='btn btn-primary mb-3'>Editar</button></a>"
                }
            }}
        ]

    });
} ); 
// fin de novedades cerradas

// inicio de insertar datos de agente
function create_novelty(){
    var var_nove_fecha = document.getElementById("nove_fecha").value;
    var var_nove_hora_ini = document.getElementById("nove_hora_ini").value;
    var var_nove_hora_fin = document.getElementById("nove_hora_fin").value;
    var var_nove_obser_descripcion = document.getElementById("nove_obser_descripcion").value;
    var var_col_id_fk = document.getElementById("col_id_fk").value;
    var var_seccion_id_fk = document.getElementById("seccion_id_fk").value;
    var var_nove_tiem_total = document.getElementById("nove_tiem_total").value;
    var var_tip_inci_id_fk = document.getElementById("tip_inci_id_fk").value;
    var var_cate_id_fk = document.getElementById("categoria").value;
    var var_usu_id_fk = document.getElementById("usu_id").value;
    var var_tip_obser_id_fk = document.getElementById("tip_obser_id_fk").value;
    console.log("rutapost",baseURL+'Novelty/createNovelty');
    if (var_nove_tiem_total == "0NaN:0NaN" || var_nove_tiem_total == ""){
        var_est_id_fk = 1;
    }else{
        var_est_id_fk = 2;
    }

    if (var_col_id_fk==0) {
        swal("Opps!","por favor seleccionar el colaborador","warning");
        return false;
    } 
    if (var_seccion_id_fk==0) {
        swal("Opps!","por favor seleccionar la seccion","warning");
        return false;
    } 
    if (var_tip_inci_id_fk==0) {
        swal("Opps!","por favor seleccionar el tipo de incidencia","warning");
        return false;
    } 
    if (var_nove_hora_ini=="") {
        swal("Opps!","por favor diligencie la hora de inicio","warning");
        return false;
    } 

    if (var_tip_obser_id_fk==0) {
        swal("Opps!","por favor seleccionar la observacion","warning");
        return false;
    }

    document.getElementById('boton').disabled=true;

    dataPostV = {
    nove_fecha : var_nove_fecha,
    nove_hora_ini : var_nove_hora_ini,
    nove_hora_fin : var_nove_hora_fin,
    nove_tiem_total : var_nove_tiem_total,
    nove_obser_descripcion : var_nove_obser_descripcion,
    cate_id_fk : var_cate_id_fk,
    tip_inci_id_fk : var_tip_inci_id_fk,
    seccion_id_fk  : var_seccion_id_fk,
    col_id_fk : var_col_id_fk,
    usu_id_fk : var_usu_id_fk,
    est_id_fk : var_est_id_fk,
    tip_obser_id_fk : var_tip_obser_id_fk,
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
            document.getElementById('boton').disabled=false;
            if( var_est_id_fk =="1"){
            location.href = baseURL+"Novelty/abiertas";
            }else{
            location.href = baseURL+"Novelty/cerradas";    
            }
        },error: function(error) {
            error;
            swal("Opps!","error al enviar la informacion","warning",6000);
            document.getElementById('boton').disabled=false;
        }
    });
 
}
// fin de insertar datos de agente

// logica de el tipo de incidencia

$('#categoria').change(function() {
    console.log($(this));
    $("#tip_inci_id_fk").html(
        "<option value='0' >tipo incidencia</option>"+
        "<option value='0' >selecione...</option>"
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

// filtro para los select

$("#colaborador").on("keyup",function(){

    console.log(colaborador);
    $('#col_id_fk option').each(function(){

        var busqueda  = $("#colaborador").val();
        var busqueda = quitaacentos(busqueda);
        var palabra = $(this).text();
        var palabra = quitaacentos(palabra);
        if(palabra.indexOf(busqueda) == -1){
                $(this).prop("selected", false);
                $(this).fadeOut();
            }else{
                $(this).prop("selected", false);
            $(this).fadeIn();
        }
    });
});


function quitaacentos(s) {
    var r=s.toLowerCase();
                r = r.replace(new RegExp(/[àáâãäå]/g),"a");
                r = r.replace(new RegExp(/[èéêë]/g),"e");
                r = r.replace(new RegExp(/[ìíîï]/g),"i");
                r = r.replace(new RegExp(/ñ/g),"n");                
                r = r.replace(new RegExp(/[òóôõö]/g),"o");
                r = r.replace(new RegExp(/[ùúûü]/g),"u");

                console.log(r);
                
     return r;
    }



$("#seccion").on("keyup",function(){
    $('#seccion_id_fk option').each(function(){
        if($(this).text().indexOf($("#seccion").val()) == -1){
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
    var currentDate = new Date(ini = document.getElementById("nove_hora_ini").value);
    var date = currentDate.getDate();
    var month = currentDate.getMonth(); 
    var year = currentDate.getFullYear();
    var hora_ini = year + "-" +(month + 1) + "-" + date;
    var fechaDate = new Date();
    var datef = fechaDate.getDate();
    var monthf = fechaDate.getMonth(); 
    var yearf = fechaDate.getFullYear();
    var fecha_f = yearf + "-" +(monthf + 1) + "-" + datef;
    if(hora_ini > fecha_f){
        document.getElementById('boton').disabled=true;
        swal("Opps!","por favor ingrese una fecha de inicio menor a la fecha de hoy","warning");
    }else{
        document.getElementById('boton').disabled=false;
    }


    var inicioh = new Date(inicio = document.getElementById("nove_hora_ini").value);
    var finh = new Date(fin = document.getElementById("nove_hora_fin").value);
    var diffMs = (finh - inicioh); // milliseconds 
    var diffHrs = Math.floor(diffMs  / 3600000); // hours
    var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000); // minutes
    if (diffHrs <= 0 && diffMins <= 0 ) {
        document.getElementById('boton').disabled=true;
        swal("Opps!","por favor ingrese una hora de inicio mayor a la hora fin","warning");
    }else{
        document.getElementById('boton').disabled=false;
    }
    if(diffHrs > 9 || diffMins > 9 ){
        document.getElementById("nove_tiem_total").value =  diffHrs + ":" + diffMins;
    }else{
        document.getElementById("nove_tiem_total").value =  "0"+diffHrs + ":0" + diffMins;
    }
    
}
// logica de restar tiempo

function edit_novelty(){
var var_nove_id= document.getElementById("nove_id").value;
var var_nove_fecha = document.getElementById("nove_fecha").value;
var var_nove_hora_ini = document.getElementById("nove_hora_ini").value;
var var_nove_hora_fin = document.getElementById("nove_hora_fin").value;
var var_nove_obser_descripcion = document.getElementById("nove_obser_descripcion").value;
var var_col_id_fk = document.getElementById("col_id_fk").value;
var var_seccion_id_fk = document.getElementById("seccion_id_fk").value;
var var_nove_tiem_total = document.getElementById("nove_tiem_total").value;
var var_cate_id_fk = document.getElementById("categoria").value;
var var_tip_inci_id_fk = document.getElementById("tip_inci_id_fk").value;
var var_tip_obser_id_fk = document.getElementById("tip_obser_id_fk").value;
console.log("rutapost",baseURL+'Novelty/editNovelty');

    if (var_nove_tiem_total === "00:00:00" || var_nove_tiem_total === "0NaN:0NaN"){
        var_est_id_fk = 1;
    }else{
        var_est_id_fk = 2;
    }
    document.getElementById('boton').disabled=true;

    dataPostV = {
        nove_id : var_nove_id,
        nove_fecha : var_nove_fecha,
        nove_hora_ini : var_nove_hora_ini,
        nove_hora_fin : var_nove_hora_fin,
        nove_tiem_total : var_nove_tiem_total,
        nove_obser_descripcion : var_nove_obser_descripcion,
        cate_id_fk : var_cate_id_fk,
        tip_inci_id_fk : var_tip_inci_id_fk,
        seccion_id_fk  : var_seccion_id_fk,
        col_id_fk : var_col_id_fk,
        tip_obser_id_fk : var_tip_obser_id_fk,
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
            document.getElementById('boton').disabled=false;
            if( var_est_id_fk =="1"){
                location.href = baseURL+"Novelty/abiertas";
            }else{
                location.href = baseURL+"Novelty/cerradas";    
            }
        },error: function(error) {
            error;
            swal("Opps!","error al enviar la informacion","warning",6000);
            document.getElementById('boton').disabled=false;
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
        confirmButtonText: 'Sí,seguro'
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
                    swal("Opps!","error al enviar la informacion","warning",6000);
                }
            });    
            
        }
        
        });

}



   





    
     


