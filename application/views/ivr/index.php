<div class="iq-card">
  <div class="iq-card-header d-flex justify-content-between">
    <div class="iq-header-title">
      <h4 class="card-title"><?php echo $title; ?></h4>
    </div>
    <div class="iq-card-header-toolbar d-flex align-items-center">
      <button type="button" style="float: right;" class="btn btn-success">New</button>
    </div>
  </div>
  <div class="iq-card-body">
    <div class="table-responsive">
      <table id="tableIvr" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Nonmbre Especialidad</th>
            <th>Nombre Médico</th>
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


    <script src="<?php echo base_url(); ?>resources/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>resources/js/jquery-ui.min.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>resources/js/jquery.dataTables.js"></script>
    <script type='text/javascript'>
      var baseURL = "<?php echo base_url(); ?>";
    </script>
    <script src='<?php echo base_url(); ?>resources/controllers/ivr.js?v=<?php echo (rand()); ?>' type='text/javascript'></script>
  </div>