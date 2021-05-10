<h2><?php echo $title; ?></h2>
<!-- <div class="col-md-6 mb-3">
    <label>filtro</label>
    <div class="input-group">
        <b><label>De </label></b><input type="date" id="" class="form-control"> <b><label> hasta </label></b> <input type="date" id="" class="form-control">
    </div>
</div> -->
<div class="table-responsive">
    <table id="tablereport" class="table table-striped table-bordered">
        <thead >
            <tr>
                <th>Fecha novedad</th>
                <th>Login id</th>
                <th>Nombre de agente</th>
                <th>campaña</th>
                <th>Hora inicio</th>
                <th>Hora fin</th>
                <th>Tiempo total</th>
                <th>incidencia</th>
                <th>estado novedad</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<script src="<?php echo base_url();?>resources/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url();?>resources/js/jquery-ui.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>resources/js/jquery.dataTables.js"></script>
<script type='text/javascript'>
    var baseURL= "<?php echo base_url();?>";
</script>
<script src='<?php echo base_url();?>resources/controllers/report.js' type='text/javascript' ></script>


   