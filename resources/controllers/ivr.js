$(document).ready(function () {
	$(".select2").select2();

	$("#tableIvr").DataTable({
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
						"<button type='button' onclick='modal_ivr_editar(\"" +
						row.inf_cli_id +
						'","' +
						row.inf_cli_cod_esp +
						'","' +
						row.inf_cli_cedula_medico +
						'","' +
						row.inf_cli_nomb_esp +
						'","' +
						row.inf_cli_nomb_medico +
						'","' +
						row.inf_cli_lugar_facturacion +
						'","' +
						row.inf_cli_lugar_atencion +
						'","' +
						row.inf_cli_observacion +
						'","' +
						row.inf_cli_validacion +
						"\");'  class='btn btn-primary mb-3'>Editar</button> " +
						"<button type='button' onclick='collaborator_delete(\"" +
						row.col_id +
						"\");' class='btn btn-danger mb-3'>Eliminar</button>"
					);
				},
			},
		],
	});
});

function modal_ivr_editar(
	inf_cli_id,
	inf_cli_cod_esp,
	inf_cli_cedula_medico,
	inf_cli_nomb_esp,
	inf_cli_nomb_medico,
	inf_cli_lugar_facturacion,
	inf_cli_lugar_atencion,
	inf_cli_observacion,
	inf_cli_validacion
) {
	$("#ivr_edit").modal("show");
	$("#inf_cli_id").val(inf_cli_id);
	$("#inf_cli_cod_esp").val(inf_cli_cod_esp);
	$("#inf_cli_cedula_medico").val(inf_cli_cedula_medico);
	$("#inf_cli_nomb_esp").val(inf_cli_nomb_esp);
	$("#inf_cli_nomb_medico").val(inf_cli_nomb_medico);
	$("#inf_cli_lugar_facturacion").val(inf_cli_lugar_facturacion);
	$("#inf_cli_lugar_atencion").val(inf_cli_lugar_atencion);
	$("#inf_cli_observacion").val(inf_cli_observacion);
	$("#inf_cli_validacion").val(inf_cli_validacion);
}

function editar_info() {
	//captura de datos actualizados
	var inf_cli_id = document.getElementById("inf_cli_id").value;
	var inf_cli_cod_esp = document.getElementById("inf_cli_cod_esp").value;
	var inf_cli_cedula_medico = document.getElementById(
		"inf_cli_cedula_medico"
	).value;
	var inf_cli_nomb_esp = document.getElementById("inf_cli_nomb_esp").value;
	var inf_cli_nomb_medico = document.getElementById(
		"inf_cli_nomb_medico"
	).value;
	var inf_cli_lugar_facturacion = document.getElementById(
		"inf_cli_lugar_facturacion"
	).value;
	var inf_cli_lugar_atencion = document.getElementById(
		"inf_cli_lugar_atencion"
	).value;
	var inf_cli_observacion = document.getElementById(
		"inf_cli_observacion"
	).value;
	var inf_cli_validacion = document.getElementById("inf_cli_validacion").value;

	//datos actualizados
	dataPost = {
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
			error;
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
