$(document).ready(function () {
	$(".select2").select2();
	var listaid=new Array;
	var cli_id = 0;
	$("#tableIvr tfoot th").each(function () {
		var title = $(this).text();
		if (title != "" || title != "Acciones") {
			$(this).html(
				'<input style="width: 100%;" type="text" placeholder="' + title + '" />'
			);
		}
	});

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
			url: baseURL + "Ivr/getInfoClinicas/" + cli_id,
			type: "POST",
			dataSrc: "",
		},
		columns: [
			{
                render: function ( data, type, row ) {
                    return '<input type="checkbox" class="editor-active check_eliminar">';
                },
                className: "dt-body-center"
            },
			{ data: "inf_cli_cedula_medico" },
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
						"<button type='button' style='margin: auto' class='col-12 btn btn-primary mb-3 evt-editar-ivr'>Editar</button> " +
						"<button type='button' style='margin: auto' class='col-12 btn btn-danger mb-3 evt-modal-eliminar-registro'>Eliminar</button>"
					);
				},
			},
		],
		initComplete: function () {
			// Apply the search
			this.api()
				.columns()
				.every(function () {
					$("input", this.footer()).on("keyup clear", function () {
						table.search(this.value).draw();//filtro por columnas
					});
				});
		},
	});

	//abre el modal de confirmacion de eliminacion de un registro
	$("body").on("click", ".evt-modal-eliminar-registro", function (e) {
		var data = table.row($(this).parents("tr")).data();

		$("#cli_id_eliminar").text(data.inf_cli_id);
		$("#cod_esp_eliminar").text(data.inf_cli_cod_esp);
		$("#cedula_medico_eliminar").text(data.inf_cli_cedula_medico);
		$("#nomb_esp_eliminar").text(data.inf_cli_nomb_esp);
		$("#nomb_medico_eliminar").text(data.inf_cli_nomb_medico);
		$("#lugar_facturacion_eliminar").text(data.inf_cli_lugar_facturacion);
		$("#lugar_atencion_eliminar").text(data.inf_cli_lugar_atencion);
		$("#observacion_eliminar").text(data.inf_cli_observacion);
		$("#validacion_eliminar").text(data.inf_cli_validacion);
		$("#eliminar_registro").modal("show");
	});

	//elimina un registro
	$("body").on("click", ".evt-eliminar-registro", function (e) {
		boton = $(this);
		boton.addClass("disabled");
		boton.text("Eliminando...");

		let dataPost = {
			cli_id: $("#cli_id_eliminar").text(),
			cod_esp: $("#cod_esp_eliminar").text(),
			cedula_medico: $("#cedula_medico_eliminar").text(),
			nombre_especialidad: $("#nomb_esp_eliminar").text(),
			nombre_medico: $("#nomb_medico_eliminar").text(),
			lugar_facturacion: $("#lugar_facturacion_eliminar").text(),
			lugar_atencion: $("#lugar_atencion_eliminar").text(),
			obseracion: $("#observacion_eliminar").text(),
			validacion: $("#validacion_eliminar").text(),
		};

		$.ajax({
			type: "POST",
			url: baseURL + "Ivr/eliminarRegistro",
			dataType: "json",
			data: dataPost,
			success: function (resp) {
				swal("??Eliminado!", resp, "success", 6000);
				$("#eliminar_registro").modal("hide");
				boton.removeClass("disabled");
				boton.text("Eliminar");
				table.ajax.reload();
			},
			error: function (error) {
				swal("??Error!", "No se pudo eliminar el registro", "error", 6000);
				boton.removeClass("disabled");
				boton.text("Eliminar");
			},
		});
	});

	//elimina los registros selecionados
	 $("body").on("click", ".check_eliminar", function () {
		var data = table.row($(this).parents("tr")).data();
		var info_id = data.inf_cli_id+'/'+data.inf_cli_cod_esp+'/'+data.inf_cli_cedula_medico;
		if ($(this).is(':checked')) {
			listaid.push(info_id);
		}else{
			posicion = $.inArray(info_id,listaid);
			listaid.splice(posicion, 1);
		}
		if (listaid.length == 0 || listaid == null) {
			$('.boton_eliminar_check').addClass("disabled");
		}else{
			$('.boton_eliminar_check').removeClass("disabled");
		}
	 });	  
	 //envia la informacion al controlador que borra varios registros
	$(".boton_eliminar_check").on("click",function(){
		boton = $(this);
		swal({
			title: "??Desea eliminar los registros selecionados?",
			text: "Esta acci??n no se puede deshacer.",
			showCancelButton: true,
			showConfirmButton: true,
			confirmButtonColor: "#d84a45",
			confirmButtonText: 'SI',
			cancelButtonText: 'NO',
		  }, function(resp) {
			if(resp){
				boton.addClass("disabled");
				boton.text("Eliminando...");
				var formData = new FormData();				
				formData.append('data',listaid);
				JSON.stringify(listaid);
				$.ajax({
					type: "POST",
					url: baseURL + "Ivr/eliminarRegistrosMultiples",
					dataType: "json",
					data: formData,
					processData: false,
					contentType: false,
				}).done(function(resp) {
						if (resp.status_code == 200) {
							swal("??Eliminado!",resp.mensaje, "success", 6000);
						}else{
							swal("??Advertencia!",resp.mensaje, "warning", 6000);
						}
						boton.text("Eliminar las filas seleccionadas");
						boton.addClass("disabled");
						table.ajax.reload();
				}).fail(function(xhr, status, error) {
					swal("??Error!", error+" No se pudo eliminar los registros", "error", 6000);
						boton.removeClass("disabled");
						boton.text("Eliminar las filas seleccionadas");
				})
			}
		});
	});

	//filtrado por cl??nica select2
	$("body").on("change", ".evt-consultar-clinica", function (e) {
		cli_id = $(this).val();
		table.ajax.url(baseURL + "Ivr/getInfoClinicas/" + cli_id).load();
	});

	//abre modal para editar un registro
	$("body").on("click", ".evt-editar-ivr", function (e) {
		var data = table.row($(this).parents("tr")).data();
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
	});

	//actualiza un registro con la informaci??n ingresada
	$("body").on("click", ".evt-editar-info", function (e) {
		var formulario = $("#edit");
		var url = formulario.attr("action");
		boton = $(this);
		boton.addClass("disabled");
		boton.text("Actualizando...");

		//datos actualizados
		let dataPost = {
			inf_cli_id: $("#inf_cli_id").val(),
			inf_cli_cod_esp: $("#inf_cli_cod_esp").val(),
			inf_cli_cedula_medico: $("#inf_cli_cedula_medico").val(),
			inf_cli_nomb_esp: $("#inf_cli_nomb_esp").val(),
			inf_cli_nomb_medico: $("#inf_cli_nomb_medico").val(),
			inf_cli_lugar_facturacion: $("#inf_cli_lugar_facturacion").val(),
			inf_cli_lugar_atencion: $("#inf_cli_lugar_atencion").val(),
			inf_cli_observacion: $("#inf_cli_observacion").val(),
			inf_cli_validacion: $("#inf_cli_validacion").val(),
		};

		//verifica si hay inputs vacios
		datosVacios = [];
		$.each(dataPost, function (ind, elem) {
			if (elem != "") {
				datosVacios = datosVacios;
			} else {
				datosVacios.push(elem);
			}
		});

		if (datosVacios.length > 0) {
			swal(
				"??Campos Vacios!",
				"El formulario no puede tener campos vacios, todos los campos son requeridos.",
				"warning"
			);
			boton.removeClass("disabled");
			boton.text("Actualizar");
		} else {
			$.ajax({
				type: "POST",
				url: url,
				dataType: "json",
				data: dataPost,
				success: function (resp) {
					swal("??Actualizado!", resp, "success", 6000);
					$("#ivr_edit").modal("hide");
					boton.removeClass("disabled");
					boton.text("Actualizar");
					table.ajax.reload();
				},
				error: function (error) {
					swal("Opps!", "Error al actualizar la informaci??n", "warning", 6000);
					boton.removeClass("disabled");
					boton.text("Actualizar");
				},
			});
		}
	});

	//captura el nombre del archivo subido
	$("body").on("change", ".evt-file-input", function (e) {
		var fileName = e.target.files[0].name;
		var nextSibling = e.target.nextElementSibling;
		nextSibling.innerText = fileName;
	});

	$("body").on("change", ".evt-id-esp", function (e) {
		$(this).val() == 0 ? $("#nomb_esp").val("DEFAULT") : 0;
	});

	$("body").on("change", ".evt-cedula-medico", function (e) {
		$(this).val() == 0 ? $("#nomb_medico").val("DEFAULT") : 0;
	});

	//Abre modal para crear un nuevo registro
	$("body").on("click", ".evt-nuevo-registro", function (e) {
		$("#ivr_create").modal("show");
	});

	//Guardar un nuevo registro
	$("body").on("click", ".evt-crear-registro", function (e) {
		var formulario = $("#create");
		var url = formulario.attr("action");
		boton = $(this);
		boton.addClass("disabled");
		boton.text("Guardando...");

		//datos ingresados
		let dataPost = {
			id_cli: $("#id_cli").val(),
			id_esp: $("#id_esp").val(),
			id_medico: $("#id_medico").val(),
			nomb_esp: $("#nomb_esp").val(),
			nomb_medico: $("#nomb_medico").val(),
			lugar_facturacion: $("#lugar_facturacion").val(),
			lugar_atencion: $("#lugar_atencion").val(),
			observacion: $("#observacion").val(),
			validacion: $("#validacion").val(),
		};

		//verifica si hay inputs vacios
		datosVacios = [];
		$.each(dataPost, function (ind, elem) {
			if (elem != "") {
				datosVacios = datosVacios;
			} else {
				datosVacios.push(elem);
			}
		});

		if (datosVacios.length > 0) {
			swal(
				"??Campos Vacios!",
				"El formulario no puede tener campos vacios, todos los campos son requeridos.",
				"warning"
			);
			boton.removeClass("disabled");
			boton.text("Confirmar");
		} else {
			$.ajax({
				url: url,
				dataType: "json",
				data: dataPost,
				type: "post",
			})
				.done(function (resp) {
					if (resp.status_code == 200) {
						swal("??Registro creado!", resp.mensaje, "success");
						boton.removeClass("disabled");
						boton.text("Guardar");
						$("#ivr_create").modal("hide");
						table.ajax.reload();
						formulario[0].reset();
					} else {
						swal(resp.tituloError, resp.mensaje, "error");
						boton.removeClass("disabled");
						boton.text("Guardar");
					}
				})
				.fail(function (resp) {
					swal(
						"??Error!",
						"Sucedi?? un error, por favor intenta m??s tarde o contacta al administrador",
						"error"
					);
					boton.removeClass("disabled");
					boton.text("Confirmar");
				});
		}
	});

	//Abre el modal para cargar un archivo csv
	$("body").on("click", ".evt-cargar-datos", function (e) {
		$("#cargar_datos").modal("show");
	});

	//evento para confirmar registros cargados
	$("body").on("click", ".evt-confirmar-registros", function (e) {
		boton = $(this);
		boton.addClass("disabled");
		boton.text("Guardando...");

		var formulario = $("#registrosConfirmados");
		var url = formulario.attr("action");
		var numeroDeCampos = formulario.serializeArray().length;

		//valida si el formulario tiene campos vacios
		if (formulario.valid()) {
			var listaRegistros = [];
			
			//se genera la lista de objetos
			for (var i = 0; i < numeroDeCampos; i += 10) {
				var registroTemp = {
					fila: formulario.serializeArray()[i].value,
					idClinica: formulario.serializeArray()[i + 1].value,
					idEspecialidad: formulario.serializeArray()[i + 2].value,
					cedulaMedico: formulario.serializeArray()[i + 3].value,
					nombreEspecialidad: formulario
						.serializeArray()
						[i + 4].value,
					nombreMedico: formulario.serializeArray()[i + 5].value,
					lugarFacturacion: formulario
						.serializeArray()
						[i + 6].value,
					lugarAtencion: formulario.serializeArray()[i + 7].value,
					observacion: formulario.serializeArray()[i + 8].value,
					validacion: formulario.serializeArray()[i + 9].value,
				};

				listaRegistros.push(registroTemp);
			}

			$.ajax({
				url: url,
				dataType: "json",
				data: { data: JSON.stringify(listaRegistros) },
				type: "post",
			})
				.done(function (resp) {
					if (resp.status_code == 200) {
						swal("Registros guardados!", resp.mensaje, "success");
						boton.removeClass("disabled");
						boton.text("Confirmar");
						$("#verificar_cargar_datos").modal("hide");
						table.ajax.reload();
					} else {
						//registros sin default
						if (resp.sinDefault != "") {
							$("#verificar_cargar_datos #filas-sin-default").text(
								"los siguientes registros no tienen default, fila/as: " +
									resp.sinDefault
							);
							$("#verificar_cargar_datos #mensaje-modificar-registros").text(
								"Por favor cree los registros default para esas filas y vuelva a cargar el archivo."
							);
						}
						//registros existentes
						if (resp.existentes != "") {
							$("#verificar_cargar_datos #filas-existentes").text(
								"Algunos registros ya existen o est??n duplicados en los datos cargados, fila/as: " +
									resp.existentes
							);
							$("#verificar_cargar_datos #mensaje-modificar-registros").text(
								"Por favor modifique o elimine los registros de las filas existentes en su archivo local y carguelo a la plataforma nuevamente."
							);
						}
						//registros con codigo especialidad no validos
						if (resp.codEspNoValido != "") {
							$("#verificar_cargar_datos #filas-cod-especialidad").text(
								"Algunos registros tiene m??s de 3 caracteres en la columna de 'C??digo Especialidad'. fila/as: " +
									resp.codEspNoValido
							);
							$("#verificar_cargar_datos #mensaje-modificar-registros").text(
								"Por favor modifique o elimine los registros de las filas existentes en su archivo local y carguelo a la plataforma nuevamente."
							);
						}
						swal("??Registros no v??lidos!", resp.mensaje, "error");

						boton.removeClass("disabled");
						boton.text("Confirmar");
					}
				})
				.fail(function (resp) {
					swal(
						"??Error!",
						"Sucedi?? un error, por favor intenta m??s tarde o contacta al administrador",
						"error"
					);
					boton.removeClass("disabled");
					boton.text("Confirmar");
					$("#verificar_cargar_datos").modal("show");
				});
		} else {
			swal(
				"??Datos no v??lidos!",
				"El formulario contiene campos vacios o la columna c??digo especialidad tiene un campo con m??s de 3 d??gitos.",
				"error"
			);
			boton.removeClass("disabled");
			boton.text("Confirmar");
		}
	});

	//limpia mensajes del modal de verificacion de registros cargados.
	$("body").on("click", ".evt-cerrar-modal-verificar-registros", function (e) {
		$("#verificar_cargar_datos #filas-sin-default").text("");
		$("#verificar_cargar_datos #filas-existentes").text("");
		$("#verificar_cargar_datos #mensaje-modificar-registros").text("");
	});

	//carga los datos subidos en archivo cvs
	$("body").on("click", ".evt-cargar-datos-archivo-subido", function (e) {
		var Form = new FormData($("#datosForm")[0]);
		url = baseURL + "Ivr/cargarDatosSubidos";
		$.ajax({
			url: url,
			type: "post",
			data: Form,
			dataType: "json",
			processData: false,
			contentType: false,
		})
			.done(function (resp) {
				$("#tabla-info-clinicas-ivr").html(resp.html);
				$("#cargar_datos").modal("hide");
				$("#verificar_cargar_datos").modal("show");
			})
			.fail(function (err) {
				swal(
					"Error de archivo",
					"El archivo cargado no es un archivo .csv",
					"error"
				);
			});
	});
});
