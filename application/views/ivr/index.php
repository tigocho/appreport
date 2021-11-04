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
        <option value="" disabled selected>Clínica</option>
        <?php foreach ($perfiles as $perfil) { ?>
          <option value="<?= $perfil->id ?>"><?= $perfil->nombre ?></option>
        <?php } ?>
      </select>
    </div>
    <!-- boton agregar informacion ivr -->
    <div style="float:right; margin:24px 10px 20px 10px" class="d-flex align-items-center">
      <button type="button" style="float: right;" class="btn btn-success">Nuevo registro</button>
    </div>
    <div style="float:right; margin: 10px 20px 10px" class="d-flex align-items-center m-4">
      <button type="button" style="float: right;" onclick="modal_cargar_datos()" class="btn btn-primary">Cargar Excel</button>
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


    <!-- Modal Editar Información IVR -->
    <div class="modal fade" id="ivr_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" style="margin: 0 auto" id="exampleModalLabel">Edición de información</h2>
          </div>
          <div class="modal-body">
            <form id="edit">
              <div class="form-row">
                <input type="hidden" id="inf_cli_id">
                <input type="hidden" id="inf_cli_cod_esp">
                <input type="hidden" id="inf_cli_cedula_medico">
                <div class="col-md-6 mb-3">
                  <label>Nombre Especialidad</label>
                  <input type="text" class="form-control" id="inf_cli_nomb_esp">
                </div>
                <div class="col-md-6 mb-3">
                  <label>Nombre Médico</label>
                  <input type="text" class="form-control" id="inf_cli_nomb_medico">
                </div>
                <div class="col-md-12 mb-3">
                  <label>Lugar Facturación</label>
                  <input type="text" class="form-control" id="inf_cli_lugar_facturacion">
                </div>
                <div class="col-md-12 mb-3">
                  <label>Lugar Atención</label>
                  <input type="text" class="form-control" id="inf_cli_lugar_atencion">
                </div>
                <div class="col-md-12 mb-3">
                  <label>Observación</label><br>
                  <textarea style="min-width: 100%; min-height:150px;" id="inf_cli_observacion"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                  <label>Validación</label>
                  <input type="text" class="form-control" id="inf_cli_validacion">
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-danger">Cancelar</button>
            <button type="button" onclick="editar_info();" class="btn btn-primary">Actualizar</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Cargar datos IVR -->
  <div class="modal fade" id="cargar_datos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" style="margin: 0 auto" id="exampleModalLabel">Cargar datos</h2>
        </div>
        <div class="modal-body">
          <form action="files.php" method="post" enctype="multipart/form-data" id="datosForm">
            <input class="form-control mb-3" type="file" name="archivoRegistrosNuevos">
            <button type="button" onclick="cargar_datos_archivo_subido()" class="btn btn-primary form-control">Cargar datos</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="verificar_cargar_datos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow:scroll;width:100%">
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
<script src='<?php echo base_url(); ?>resources/controllers/ivr.js?v=<?php echo rand(1, 500); ?>' type='text/javascript'></script>

</div>