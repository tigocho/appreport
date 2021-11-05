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
      <button type="button" style="float: right;" onclick="modal_cargar_datos()" class="btn btn-success">Cargar Excel</button>
    </div>
  </div>



  <!-- Tabla Principal IVR -->
  <div class="iq-card-body">
    <div class="table-responsive">
      <table id="tableIvr" class="table table-striped table-bordered">
        <thead>
          <tr>
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
      </table>
    </div>
  </div>


  <!-- Modal Editar Información IVR -->
  <div class="modal fade" id="ivr_edit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" style="margin: 0 auto" id="exampleModalLabel">Edición de información</h2>
        </div>
        <div class="modal-body">
          <form id="edit" method="post" action="<?php echo base_url('ivr/editarInfoClinicas'); ?>">
            <div class="form-row">
              <input type="hidden" id="inf_cli_id" name="inf_cli_id">
              <input type="hidden" id="inf_cli_cod_esp" name="inf_cli_cod_esp">
              <input type="hidden" id="inf_cli_cedula_medico" name="inf_cli_cedula_medico">
              <div class="col-md-6 mb-3">
                <label>Nombre Especialidad</label>
                <input type="text" class="form-control" id="inf_cli_nomb_esp" name="inf_cli_nomb_esp" required>
              </div>
              <div class="col-md-6 mb-3">
                <label>Nombre Médico</label>
                <input type="text" class="form-control" id="inf_cli_nomb_medico" name="inf_cli_nomb_medico" required>
              </div>
              <div class="col-md-12 mb-3">
                <label>Lugar Facturación</label>
                <input type="text" class="form-control" id="inf_cli_lugar_facturacion" name="inf_cli_lugar_facturacion" required>
              </div>
              <div class="col-md-12 mb-3">
                <label>Lugar Atención</label>
                <input type="text" class="form-control" id="inf_cli_lugar_atencion" name="inf_cli_lugar_atencion" required>
              </div>
              <div class="col-md-12 mb-3">
                <label>Observación</label><br>
                <textarea style="min-width: 100%; min-height:150px;" id="inf_cli_observacion" name="inf_cli_observacion" required></textarea>
              </div>
              <div class="col-md-6 mb-3">
                <label>Validación</label>
                <input type="text" class="form-control" id="inf_cli_validacion" name="inf_cli_validacion" required>
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
          <h2 class="modal-title" style="margin: 0 auto" id="exampleModalLabel">Crear Registro</h2>
        </div>
        <div class="modal-body">
          <form method="post" id="create" name="create" action="<?php echo base_url('ivr/crearRegistro'); ?>">
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label>ID Clínica</label>
                <input type="number" class="form-control" id="id_cli" value="" required>
              </div>
              <div class="col-md-6 mb-3">
                <label>ID Especialidad</label>
                <input type="number" class="form-control" id="id_esp" value="" required>
              </div>
              <div class="col-md-6 mb-3">
                <label>ID Médico</label>
                <input type="number" class="form-control" id="id_medico" value="" required>
              </div>
              <div class="col-md-6 mb-3">
                <label>Nombre Especialidad</label>
                <input type="text" class="form-control" id="nomb_esp" value="" required>
              </div>
              <div class="col-md-12 mb-3">
                <label>Nombre Médico</label>
                <input type="text" class="form-control" id="nomb_medico" value="" required>
              </div>
              <div class="col-md-12 mb-3">
                <label>Lugar Facturación</label>
                <input type="text" class="form-control" id="lugar_facturacion" value="" required>
              </div>
              <div class="col-md-12 mb-3">
                <label>Lugar Atención</label>
                <input type="text" class="form-control" id="lugar_atencion" value="" required>
              </div>
              <div class="col-md-12 mb-3">
                <label>Observación</label><br>
                <textarea style="min-width: 100%; min-height:150px;" id="observacion" value="" required></textarea>
              </div>
              <div class="col-md-6 mb-3">
                <label>Validación</label>
                <input type="text" class="form-control" id="validacion" value="" required>
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
              <input class="custom-file-input mb-3 evt-file-input" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" lang="es" type="file" name="archivoRegistrosNuevos">
              <label class="custom-file-label">Seleccione un archivo</label>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" onclick="cargar_datos_archivo_subido()" class="btn btn-primary form-control">Cargar datos</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="verificar_cargar_datos" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow:scroll;width:100%">
    <div class="modal-dialog modal-lg" role="document" style="overflow:auto; max-width:2000px; width:90%">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" style="margin: 0 auto" id="exampleModalLabel">Verificación y confirmación de registros</h2>
        </div>
        <div class="modal-body">
          <!-- tabla con registros subidos -->
          <div class="col-md-12" id="tabla-info-clinicas-ivr">
          </div>
        </div>
        <div class="modal-footer">
          <div class="col-md-12 text-center">
            <h4 id="filas-existentes" style="font-weight: bold; color:red"></h4>
            <span id="mensaje-modificar-registros" style="font-weight: 600;"></span>
          </div>
          <div class="col-md-4 text-right">
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-danger m-2">Cancelar</button>
            <button type="button" class="btn btn-primary evt-confirmar-registros">Confirmar</button>
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