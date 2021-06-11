<div class="iq-card-body">
    <h2><?php echo $title; ?></h2>
    <button type="button" onclick="modal_seccion_create();" style="float: right;" class="btn btn-success mb-3">Registro de seccion</button>
    <div class="table-responsive">
        <table id="tableseccion" class="table table-striped table-bordered">
            <thead >
                <tr>
                    <th>Id</th>
                    <th>Seccion</th>
                    <th>Area</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="seccion_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro de seccion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Nombre de seccion</label>
                        <input type="text" class="form-control"  id="seccion_nom">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Area</label>
                        <select class="form-control"  id="area_id_fk" >
                            <option value="0">seleccione...</option>
                            <?php foreach ($area as $areas): ?>
                            <option value="<?php echo $areas['area_id']; ?>"><?php echo $areas['area_nom']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="create_seccion();"  class="btn btn-primary">agregar</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="seccion_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edición de seccion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit" >
                <div class="form-row">
                    <input type="hidden"  id="seccion_id_e">
                    <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Nombre de seccion</label>
                        <input type="text" class="form-control"  id="seccion_nom_e">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Area</label>
                        <select class="form-control"  id="area_id_fk_e" >
                            <option value="0">seleccione...</option>
                            <?php foreach ($area as $areas): ?>
                            <option value="<?php echo $areas['area_id']; ?>"><?php echo $areas['area_nom']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="edit_seccion();"  class="btn btn-primary">Actualizar</button>
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
    <script src='<?php echo base_url(); ?>resources/controllers/seccion.js' type='text/javascript' ></script>
</div>


