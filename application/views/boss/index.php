<div class="iq-card-body">
    <h2><?php echo $title; ?></h2>
    <button type="button" onclick="modal_boss_create();" style="float: right;" class="btn btn-success mb-3">Registro de jefe</button>
    <div class="table-responsive">
        <table id="tableboss" class="table table-striped table-bordered">
            <thead >
                <tr>
                    <th>Nombre de jefe</th>
                    <th>Apellido jefe</th>
                    <th>correo jefe</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    
    <div class="modal fade" id="boss_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro de jefe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Nombre de jefe</label>
                        <input  type="text" class="form-control"  id="jefe_nom">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Apellido de jefe</label>
                        <input  type="text" class="form-control"  id="jefe_ape">
                    </div>
                    <div class="col-md-9 mb-3">
                        <label>Correo de jefe</label>
                        <input  type="email" class="form-control"  id="jefe_correo">
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="create_boss();"  class="btn btn-primary">Agregar</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="boss_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edición de jefe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit" >
                <div class="form-row">
                    <input type="hidden"  id="jefe_id_e">
                    <div class="col-md-6 mb-3">
                        <label>Nombre de jefe</label>
                        <input  type="text" class="form-control"  id="jefe_nom_e">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Apellido de jefe</label>
                        <input  type="text" class="form-control"  id="jefe_ape_e">
                    </div>
                    <div class="col-md-9 mb-3">
                        <label>Correo de jefe</label>
                        <input  type="email" class="form-control"  id="jefe_correo_e">
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="edit_boss();"  class="btn btn-primary">Actualizar</button>
            </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url();?>resources/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url();?>resources/js/jquery-ui.min.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url();?>resources/js/jquery.dataTables.js"></script>
    <script type='text/javascript'>
        var baseURL= "<?php echo base_url();?>";
    </script>
    <script src='<?php echo base_url(); ?>resources/controllers/boss.js' type='text/javascript' ></script>
</div>
