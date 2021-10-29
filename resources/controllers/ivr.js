$(document).ready(function () {
  $('.select2').select2(); 

	var table = $("#tableIvr").DataTable({
		language: {
			sProcessing: "Procesando...",
			sLengthMenu: "Mostrar _MENU_ registros",
			sZeroRecords: "No se encontraron resultados",
			sEmptyTable: "Ningun dato disponible en esta tabla",
			sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
			sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
			sInfoPostFix: "",
			sSearch: "Buscar:",
			sUrl: "",
			sInfoThousands: ",",
			sLoadingRecords: "Cargando...",
			oPaginate: {
				sFirst: "Primero",
				sLast: "Ultimo",
				sNext: "Siguiente",
				sPrevious: "Anterior",
			},
		},
		ajax: {
			url: baseURL + "Ivr/getInfoClinicas",
			type: "POST",
			dataSrc: "",
		},
		columns: [
			{ data: "inf_cli_nomb_esp" },
			{ data: "inf_cli_nomb_medico" },
			{ data: "inf_cli_lugar_facturacion" },
			{ data: "inf_cli_lugar_atencion" },
			{ data: "inf_cli_observacion" },
			{ data: "inf_cli_validacion" },
			{
				ordertable: true,
				render: function (data, type, row) {
					return (
						"<button type='button' class='btn btn-primary mb-3 evt-editar-ivr'>Editar</button> " +
						"<button type='button' onclick='ivr_info_delete(\"" +
						row +
						"\");' class='btn btn-danger mb-3'>Eliminar</button>"
					);
				},
			},
		],
	});

  $("body").on("click", ".evt-editar-ivr", function(e){
		var data = table.row($(this).parents('tr')).data();
		$("#inf_cli_id").val(data.inf_cli_id);
		$("#inf_cli_cod_esp").val(data.inf_cli_cod_esp);
		$("#inf_cli_cedula_medico").val(data.inf_cli_cedula_medico);
		$("#inf_cli_nomb_esp").val(data.inf_cli_nomb_esp);
		$("#inf_cli_nomb_medico").val(data.inf_cli_nomb_medico);
		$("#inf_cli_lugar_facturacion").val(data.inf_cli_lugar_facturacion);
		$("#inf_cli_lugar_atencion").val(data.inf_cli_lugar_atencion);
		$("#inf_cli_observacion").val(data.inf_cli_observacion);
		$("#inf_cli_validacion").val(data.inf_cli_validacion);
		$("#ivr_edit").modal("show");
	})
});

function editar_info() {
  //captura de datos actualizados
	var inf_cli_id = $("#inf_cli_id").val();
	var inf_cli_cod_esp = $("#inf_cli_cod_esp").val();
	var inf_cli_cedula_medico = $("#inf_cli_cedula_medico").val();
	var inf_cli_nomb_esp = $("#inf_cli_nomb_esp").val();
	var inf_cli_nomb_medico = $("#inf_cli_nomb_medico").val();
	var inf_cli_lugar_facturacion = $("#inf_cli_lugar_facturacion").val();
	var inf_cli_lugar_atencion = $("#inf_cli_lugar_atencion").val();
	var inf_cli_observacion = $("#inf_cli_observacion").val();
	var inf_cli_validacion = $("#inf_cli_validacion").val();

  //datos actualizados
	let dataPost = {
		inf_cli_id: inf_cli_id,
		inf_cli_cod_esp: inf_cli_cod_esp,
		inf_cli_cedula_medico: inf_cli_cedula_medico,
		inf_cli_nomb_esp: inf_cli_nomb_esp,
		inf_cli_nomb_medico: inf_cli_nomb_medico,
		inf_cli_lugar_facturacion: inf_cli_lugar_facturacion,
		inf_cli_lugar_atencion: inf_cli_lugar_atencion,
		inf_cli_observacion: inf_cli_observacion,
		inf_cli_validacion: inf_cli_validacion,
	};

	$.ajax({
		type: "POST",
		url: baseURL + "Ivr/editarInfoClinicas",
		dataType: "json",
		data: dataPost,
		success: function (resp) {
			swal("exitoso!", resp, "success", 6000);
			$("#ivr_edit").modal("hide");
			setTimeout(function () {
				location.reload();
			}, 2000);
		},
		error: function (error) {
			swal("Opps!", "Error al actualizar la información", "warning", 6000);
		},
	});
}

function modal_cargar_datos() {
	$("#cargar_datos").modal("show");
}

function cargar_datos_archivo_subido() {
	var Form = new FormData($("#datosForm")[0]);
	url = baseURL + "Ivr/cargarDatosSubidos"
	$.ajax({
		url: url,
		type: "post",
		data: Form,
		processData: false,
		contentType: false,
		success: function (data) {

			console.log(url)
			alert("Registros Agregados!");
		},
	});
}
