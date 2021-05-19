<div class="iq-card-body">
    <h2><?php echo $title; ?></h2>
    <a href="<?php echo base_url()?>user/create"><button type="button" style="float: right;" class="btn btn-success mb-3">crear usuario </button></a>
    <div class="table-responsive">
        <table id="tableuser" class="table table-striped table-bordered">
            <thead >
                <tr>
                    <th>numero de documento</th>
                    <th>nombre</th>
                    <th>apellido</th>
                    <th>correo</th>
                    <th>contraseña</th>
                    <th>rol</th>
                    <th>acciones</th>
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
    <script src='<?php echo base_url();?>resources/controllers/user.js' type='text/javascript' ></script>
</div>    