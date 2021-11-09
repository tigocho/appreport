<div class="iq-card">
  <div class="iq-card-header d-flex justify-content-between">
    <div class="iq-header-title">
      <h4 class="card-title"><?php echo $title; ?></h4>
    </div>
  </div>
  <div class="contenedor py-3">
    <div class="col-md-5">
      <label class="mr-3">Seleccionar clínica: </label>
      <select data-url-consulta="<?php echo base_url('InterfazContable/consultar_interfaz_clinica'); ?>" class="form-control select2 evt-consultar-interfaz-clinica" name="perfil_id" required>
        <option value="" disabled selected>Seleccionar</option>
        <?php foreach ($clinicas as $clinica) { ?>
          <option value="<?= $clinica->cod_empr ?>"><?= $clinica->nom_empr ?></option>
        <?php } ?>
        <option value="21"><?= "CLINICA LOS ROSALES S.A." ?></option>
      </select>
    </div>
  </div>
  <!-- Tabla Principal de la interfaz contable -->
  <div class="iq-card-body">
    <div id="tabla-interfaz-contable-clinica">
    </div>
  </div>
</div>



<script src="<?php echo base_url(); ?>resources/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url(); ?>resources/js/jquery-ui.min.js"></script>      
<script src="<?php echo base_url(); ?>resources/js/select2.min.js"></script> 
<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>resources/js/jquery.dataTables.js"></script>
<script type='text/javascript'>
  var baseURL = "<?php echo base_url(); ?>";
</script>
<script src='<?php echo base_url(); ?>resources/controllers/interfaz_contable.js?v=<?php echo rand(1,500); ?>' type='text/javascript'></script>