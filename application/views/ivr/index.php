<div class="iq-card">
  <div class="iq-card-header d-flex justify-content-between">
    <div class="iq-header-title">
      <h4 class="card-title"><?php echo $title; ?></h4>
    </div>
    <select data-url-consulta="<?php echo base_url('ivr/consultar_clinica'); ?>" class="form-control select2 evt-consultar-clinica" name="perfil_id" required>
      <option value="" disabled selected>Seleccionar</option>
      <?php foreach ($perfiles as $perfil) { ?>
        <option value="<?= $perfil->id ?>"><?= $perfil->nombre ?></option>
      <?php } ?>
    </select>
    <div class="iq-card-header-toolbar d-flex align-items-center">
      <button type="button" style="float: right;" class="btn btn-success">Agregar</button>
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
              <input type="hidden"  id="inf_cli_id">
              <input type="hidden"  id="inf_cli_cod_esp">
              <input type="hidden"  id="inf_cli_cedula_medico">
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
        
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="<?php echo base_url(); ?>resources/js/jquery-3.4.1.min.js"></script>
  <script src="<?php echo base_url(); ?>resources/js/jquery-ui.min.js"></script>
  <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>resources/js/jquery.dataTables.js"></script>
  <script type='text/javascript'>
    var baseURL = "<?php echo base_url(); ?>";
  </script>
  <script src='<?php echo base_url(); ?>resources/controllers/ivr.js?v=<?php echo (rand()); ?>' type='text/javascript'></script>
</div>