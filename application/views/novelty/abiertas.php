<p><h2><?php echo $title; ?></h2></p>
<a href="<?php echo base_url()?>novelty/create"><button type="button" style="float: right;" class="btn btn-success mb-3">creaccion de novedad</button></a>
<div class="table-responsive">
    <table id="tableabiertas" class="table table-striped table-bordered">
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
                <th >acciones</th>
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
<script src='<?php echo base_url();?>resources/controllers/novelty.js' type='text/javascript' ></script>
 

   