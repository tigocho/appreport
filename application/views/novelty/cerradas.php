<div class="iq-card"> 
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title"><?php echo $title; ?></h4>
        </div>
        <div class="iq-card-header-toolbar d-flex align-items-center">
            <a href="<?php echo base_url()?>novelty/create"><button type="button" style="float: right;" class="btn btn-success">Registro de novedad</button></a>
        </div>
    </div>

    <div class="iq-card-body"> 
        <div class="table-responsive">
            <table id="tablecerradas" class="table table-striped table-bordered">
                <thead >
                    <tr>
                        <th>Fecha novedad</th>
                        <th>Nombre de colaborador</th>
                        <th>seccion</th>
                        <th>Hora inicio</th>
                        <th>Hora fin</th>
                        <th>Tiempo total</th>
                        <th>Incidencia</th>
                        <th>Estado novedad</th>
                        <th>Observacion</th>
                        <th>descripcion</th>
                        <th >Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <script src="<?php echo base_url();?>resources/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url();?>resources/js/jquery-ui.min.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url();?>resources/js/jquery.dataTables.js"></script>

    <script type='text/javascript'>
        var baseURL= "<?php echo base_url();?>";
        var rol = "<?php echo $this->session->userdata('rol_id');?>";
    </script>
    <script src='<?php echo base_url();?>resources/controllers/novelty.js?v=<?php echo(rand()); ?>' type='text/javascript' ></script>
</div>  

  