<div class="iq-card-body">    
    <p><h2><?php echo $title; ?></h2></p>
    <a href="<?php echo base_url()?>novelty/create"><button type="button" style="float: right;" class="btn btn-success mb-3">creaccion de novedad</button></a>
    <div class="table-responsive">
        <table id="tablecerradas" class="table table-striped table-bordered">
            <thead >
                <tr>
                    <th>Fecha novedad</th>
                    <th>Login id</th>
                    <th>Nombre de agente</th>
                    <th>campaña</th>
                    <th>Hora inicio</th>
                    <th>Hora fin</th>
                    <th>Tiempo total</th>
                    <th>Incidencia</th>
                    <th>Estado novedad</th>
                    <th >Acciones</th>
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
        var rol = "<?php echo $this->session->userdata('rol_id');?>";
    </script>
    <script src='<?php echo base_url();?>resources/controllers/novelty.js' type='text/javascript' ></script>
</div>  

  