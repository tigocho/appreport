<div class="iq-card">

    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title"><?php echo $title; ?></h4>
        </div>
        <div class="iq-card-header-toolbar d-flex align-items-center">
            <button type="button" onclick="modal_area_create();" style="float: right;" class="btn btn-success">Registro de area</button>
        </div>
    </div>
    
    <div class="iq-card-body">
        <div class="table-responsive">
            <table id="tablearea" class="table table-striped table-bordered">
                <thead >
                    <tr>
                        <th>Id</th>
                        <th>Area</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>


        <div class="modal fade" id="area_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro de nueva area</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Area</label>
                            <input type="text" class="form-control" id="area_nom">
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="create_area();"  class="btn btn-primary">Agregar</button>
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="area_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edición de area</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <input type="hidden" id="area_id_e">
                            <label>Area</label>
                            <input type="text" class="form-control" id="area_nom_e">
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="edit_area();"  class="btn btn-primary">Actualizar</button>
                </div>
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
    <script src='<?php echo base_url(); ?>resources/controllers/area.js?v=<?php echo(rand()); ?>' type='text/javascript' ></script>
</div>
        
    