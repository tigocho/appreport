<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title"><?php echo $title; ?></h4>
        </div>
        <div class="iq-card-header-toolbar d-flex align-items-center">
        <a href="<?php echo base_url()?>user/create"><button type="button" style="float: right;" class="btn btn-success">Crear usuario </button></a>
        </div>
    </div>
    <div class="iq-card-body">
        <div class="table-responsive">
            <table id="tableuser" class="table table-striped table-bordered">
                <thead >
                    <tr>
                        <th>Numero de documento</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Jefe</th>
                        <th>Acciones</th>
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
    </script>
    <script src='<?php echo base_url();?>resources/controllers/user.js' type='text/javascript' ></script>
</div>    