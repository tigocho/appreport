<div class="iq-card">
  <div class="iq-card-header d-flex justify-content-between">
    <div class="iq-header-title">
      <h4 class="card-title"><?php echo $title; ?></h4>
    </div>
  </div>


  <div class="contenedor m-4">
    <div style="float:left">
      <!-- select de clinicas -->
      <label class="mr-3">Seleccionar clínica: </label>
      <select style="width:100%" data-url-consulta="<?php echo base_url('ivr/consultar_clinica'); ?>" class="form-control select2 evt-consultar-clinica" name="perfil_id" required>
        <option value="0" selected>Todas</option>
        <?php foreach ($clinicas as $clinica) { ?>
          <option value="<?= $clinica->cli_id ?>"><?= $clinica->cli_name ?></option>
        <?php } ?>
      </select>
    </div>
    <!-- boton agregar informacion ivr -->
    <div style="float:right; margin:24px 10px 20px 10px" class="d-flex align-items-center">
      <button type="button" style="float: right;" class="btn btn-primary evt-nuevo-registro">Crear registro</button>
    </div>
    <div style="float:right; margin: 10px 20px 10px" class="d-flex align-items-center m-4">
      <button type="button" style="float: right;" class="btn btn-success evt-cargar-datos">Cargar Archivo CSV</button>
    </div>
    </div>
    <div style="float:right; margin: 10px 20px 10px" class="d-flex align-items-center m-4">
      <button type="button" style="float: right;" class="btn btn-danger boton_eliminar_check disabled">Eliminar las filas seleccionadas</button>
    </div>
  </div>



  <!-- Tabla Principal IVR -->
  <div class="iq-card-body">
    <div class="table-responsive">
      <table id="tableIvr" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th></th>
            <th>Cédula Médico</th>
            <th>Especialidad</th>
            <th>Médico</th>
            <th>Lugar Facturación</th>
            <th>Lugar Atención</th>
            <th>Observación</th>
            <th>Validación</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
          <tr>
            <th></th>
            <th>Cédula Médico</th>
            <th>Especialidad</th>
            <th>Médico</th>
            <th>Lugar Facturación</th>
            <th>Lugar Atención</th>
            <th>Observación</th>
            <th>Validación</th>
          </tr>
          
        </tfoot>
      </table>
    </div>
  </div>


  <!-- Modal Editar Información IVR -->
  <div class="modal fade" id="ivr_edit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Editar Registro</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="edit" method="post" action="<?php echo base_url('ivr/editarInfoClinicas'); ?>">
            <div class="form-row">
              <input type="hidden" class="form-control" id="inf_cli_id" name="inf_cli_id">
              <div class="col-md-6 mb-3">
                <label>Cédula Médico</label>
                <input type="text"  class="form-control" id="inf_cli_cedula_medico" name="inf_cli_cedula_medico" disabled>
              </div>
              <div class="col-md-6 mb-3">
                <label>Nombre Médico</label>
                <input type="text" class="form-control" id="inf_cli_nomb_medico" name="inf_cli_nomb_medico" disabled>
              </div>
              <div class="col-md-6 mb-3">
                <label>Código Especialidad</label>
                <input type="text" class="form-control" id="inf_cli_cod_esp" name="inf_cli_cod_esp" disabled>
              </div>
              <div class="col-md-6 mb-3">
                <label>Nombre Especialidad</label>
                <input type="text" class="form-control" id="inf_cli_nomb_esp" name="inf_cli_nomb_esp" disabled>
              </div>
							<div class="col-md-12 mb-3">
                <label>Días:*</label><br>
                <input type="checkbox" class="evt-cambio-dia-edicion" id="dia1" name="dia[]" value="1"><label for="dia">Lunes</label>
                <input type="checkbox" class="evt-cambio-dia-edicion" id="dia2" name="dia[]" value="2"><label for="dia">Martes</label>
                <input type="checkbox" class="evt-cambio-dia-edicion" id="dia3" name="dia[]" value="3"><label for="dia">Miércoles</label>
                <input type="checkbox" class="evt-cambio-dia-edicion" id="dia4" name="dia[]" value="4"><label for="dia">Jueves</label>
                <input type="checkbox" class="evt-cambio-dia-edicion" id="dia5" name="dia[]" value="5"><label for="dia">Viernes</label>
                <input type="checkbox" class="evt-cambio-dia-edicion" id="dia6" name="dia[]" value="6"><label for="dia">Sábado</label>
                <input type="checkbox" class="evt-cambio-dia-edicion" id="dia7" name="dia[]" value="7"><label for="dia">Domingo</label>
                <input type="checkbox" class="evt-cambio-dia-edicion" id="dia0" name="dia[]" value="0"><label for="dia">Todos los días</label>
              </div>
							<div class="col-md-12 mb-3">
                <label>Día seleccionado:*</label><br>
                <select id="icd_dia" class="evt-seleccionar-dia" name="icd_dia">
                  <option value="-1" selected>Seleccione una opción</option>
                </select>
              </div>
              <div class="col-md-12 mb-3 evt-bloque-datos-atencion">
              </div>
              <div class="col-md-6 mb-3">
                <label>Validación: </label>
                <select id="inf_cli_validacion" class="inf_cli_validacion m-2" name="inf_cli_validacion">
                  <option value="SEDE">SEDE</option>
                  <option value="CUPS">CUPS</option>
                  <option value="DEFAULT">DEFAULT</option>
                </select>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-danger">Cancelar</button>
          <button type="button" class="btn btn-primary evt-editar-info">Actualizar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Crear Configuración IVR -->
  <div class="modal fade" id="ivr_create" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Crear Registro</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" id="create" name="create" action="<?php echo base_url('ivr/crearRegistro'); ?>">
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label>Clínica</label>
                <select class="form-control select" id="id_cli" name="id_cli" required>
                  <?php foreach ($clinicas as $clinica) { ?>
                    <option value="<?= $clinica->cli_id ?>"><?= $clinica->cli_name ?> (<?= $clinica->cli_id ?>)</option>
                  <?php } ?>
                </select>
                <!-- <input type="number" class="form-control" id="id_cli" value="" required> -->
              </div>
              <div class="col-md-6 mb-3">
                <label>Código Especialidad</label>
                <input type="number" max="999" onKeyUp="if(this.value>999){this.value='999';}else if(this.value<0){this.value='0';}" class="form-control evt-id-esp" id="id_esp" value="" required>
              </div>
              <div class="col-md-6 mb-3">
                <label>Nombre Especialidad</label>
                <input type="text" class="form-control" id="nomb_esp" value="" required>
              </div>
              <div class="col-md-6 mb-3">
                <label>Cédula Médico</label>
                <input type="number" class="form-control evt-cedula-medico" id="id_medico" value="" required>
              </div>
              <div class="col-md-12 mb-3">
                <label>Nombre Médico</label>
                <input type="text" class="form-control" id="nomb_medico" value="" required>
              </div>
              <div class="col-md-12 mb-3">
                <label>Días:</label><br>
                <input type="checkbox" class="evt-cambio-dia" id="dia1" name="dia[]" checked="true" value="1"><label for="dia">Lunes</label>
                <input type="checkbox" class="evt-cambio-dia" id="dia2" name="dia[]" checked="true" value="2"><label for="dia">Martes</label>
                <input type="checkbox" class="evt-cambio-dia" id="dia3" name="dia[]" checked="true" value="3"><label for="dia">Miércoles</label>
                <input type="checkbox" class="evt-cambio-dia" id="dia4" name="dia[]" checked="true" value="4"><label for="dia">Jueves</label>
                <input type="checkbox" class="evt-cambio-dia" id="dia5" name="dia[]" checked="true" value="5"><label for="dia">Viernes</label>
                <input type="checkbox" class="evt-cambio-dia" id="dia6" name="dia[]" checked="true" value="6"><label for="dia">Sábado</label>
                <input type="checkbox" class="evt-cambio-dia" id="dia7" name="dia[]" checked="true" value="7"><label for="dia">Domingo</label>
                <input type="checkbox" class="evt-cambio-dia" id="dia0" name="dia[]" value="0"><label for="dia">Todos los días</label>
              </div>
							<div class="col-md-12 mb-3">
                <label>Lugar Facturación (por defecto)</label>
                <textarea style="min-width: 100%; min-height:150px;" id="inf_cli_lugar_facturacion" name="inf_cli_lugar_facturacion" required></textarea>
              </div>
              <div class="col-md-12 mb-3">
                <label>Lugar Atención (por defecto)</label>
                <textarea style="min-width: 100%; min-height:150px;" id="inf_cli_lugar_atencion" name="inf_cli_lugar_atencion" required></textarea>
              </div>
              <div class="col-md-12 mb-3">
                <label>Observación (por defecto)</label><br>
                <textarea style="min-width: 100%; min-height:150px;" id="inf_cli_observacion" name="inf_cli_observacion" required></textarea>
              </div>
							<div class="col-md-6 mb-3">
                <label>Validación: </label>
                <select id="inf_cli_validacion" class="inf_cli_validacion m-2" name="inf_cli_validacion">
                  <option value="SEDE">SEDE</option>
                  <option value="CUPS">CUPS</option>
                  <option value="DEFAULT">DEFAULT</option>
                </select>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-danger">Cancelar</button>
          <button type="button" class="btn btn-primary evt-crear-registro">Guardar</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal Cargar datos IVR -->
  <div class="modal fade" id="cargar_datos" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cargar datos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="files.php" method="post" enctype="multipart/form-data" id="datosForm">
            <div class="custom-file mb-3">
              <input class="custom-file-input mb-3 evt-file-input" accept=".csv" lang="es" type="file" name="archivoRegistrosNuevos">
              <label class="custom-file-label">Seleccione un archivo</label>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" style="margin: auto; padding:0" class="btn btn-success col-8 form-control text-center evt-cargar-datos-archivo-subido">Cargar datos</button>
        </div>
      </div>
    </div>
  </div>

  <!-- modal verificación registros -->
  <div class="modal fade" id="verificar_cargar_datos" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow:scroll;width:100%">
    <div class="modal-dialog modal-lg" role="document" style="overflow:auto; max-width:2000px; width:90%">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title ml-4" style="margin-right:30px" id="exampleModalLabel">Verificación y confirmación de registros</h2>
          <button type="button" class="close evt-cerrar-modal-verificar-registros" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- tabla con registros subidos -->
          <div class="col-md-12" id="tabla-info-clinicas-ivr">
          </div>
        </div>
        <div class="modal-footer">
          <div class="col-md-12 text-center">
            <h4 id="filas-cod-especialidad" style="font-weight: bold; color:red"></h4>
            <h4 id="filas-sin-default" style="font-weight: bold; color:red"></h4>
            <h4 id="filas-existentes" style="font-weight: bold; color:red"></h4>
            <span id="mensaje-modificar-registros" style="font-weight: 600;"></span>
          </div>
          <div class="col-md-4 text-right">
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-danger m-2 evt-cerrar-modal-verificar-registros">Cancelar</button>
            <button type="button" class="btn btn-primary evt-confirmar-registros">Confirmar</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- modal eliminar registro -->
  <div class="modal fade" id="eliminar_registro" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow:scroll;width:100%">
    <div class="modal-dialog modal-lg" role="document" style="overflow:auto; max-width:2000px; width:90%">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" style="margin: 0 auto" id="exampleModalLabel">Eliminar registro</h2>
        </div>
        <div class="modal-body text-center">
          <div class="iq-card-body">
            <div class="table-responsive">
              <table id="tableIvr" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Clínica ID</th>
                    <th>Código Esp.</th>
                    <th>Cédula Médico</th>
                    <th>Especialidad</th>
                    <th>Médico</th>
                    <th>Lugar Facturación</th>
                    <th>Lugar Atención</th>
                    <th>Observación</th>
                    <th>Validación</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td id="cli_id_eliminar"></td>
                    <td id="cod_esp_eliminar"></td>
                    <td id="cedula_medico_eliminar"></td>
                    <td id="nomb_esp_eliminar"></td>
                    <td id="nomb_medico_eliminar"></td>
                    <td id="lugar_facturacion_eliminar"></td>
                    <td id="lugar_atencion_eliminar"></td>
                    <td id="observacion_eliminar"></td>
                    <td id="validacion_eliminar"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <h2>¿Desea eliminar este registro?</h2>
        </div>
        <div class="modal-footer">
          <div class="col-md-12 text-center">
            <h4 id="filas-existentes" style="font-weight: bold; color:red"></h4>
            <span id="mensaje-modificar-registros" style="font-weight: 600;"></span>
          </div>
          <div class="col-md-12 text-right">
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-secundary m-2">Cancelar</button>
            <button type="button" class="btn btn-danger evt-eliminar-registro">Eliminar</button>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


<script src="<?php echo base_url(); ?>resources/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url(); ?>resources/js/jquery-ui.min.js"></script>
<!-- select2 -->
<script src="<?php echo base_url(); ?>resources/js/select2.min.js"></script>

<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>resources/js/jquery.dataTables.js"></script>
<script type='text/javascript'>
  var baseURL = "<?php echo base_url(); ?>";
</script>

<!-- js controller -->
<script src='<?php echo base_url(); ?>resources/controllers/ivr.js?v=<?php echo rand(1, 500); ?>' type='text/javascript'></script>

</div>
