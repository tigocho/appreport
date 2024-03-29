<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title"><?php echo $title; ?></h4>
        </div>
        <div class="iq-card-header-toolbar d-flex align-items-center">
            <button type="button" onclick="modal_collaborator_create();" style="float: right;" class="btn btn-success">Registro de colaborador</button>
        </div>
    </div>
    <div class="iq-card-body">
        <div class="table-responsive">
            <table id="tablecollaborator" class="table table-striped table-bordered">
                <thead >
                    <tr>
                        <th>Numero login colaborador</th>
                        <th>Nombre de colaborador</th>
                        <th>Cargo</th>
                        <th>Area</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="collaborator_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro de colaborador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="form-row">
                    
                        <div class="col-md-6 mb-3">
                            <label>Numero login colaborador</label>
                            <input  type="text" class="form-control"  id="col_login_num"  >
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Nombre de colaborador</label>
                            <input type="text" class="form-control"  id="col_nom"  >
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Cargo</label>
                            <input  type="text" class="form-control"  id="col_cargo"  >
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
                    <button type="button" onclick="create_collaborator();"  class="btn btn-primary">Agregar</button>
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="collaborator_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edición de colaborador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit" >
                    <div class="form-row">
                        <input type="hidden"  id="col_id_e">
                        <div class="col-md-6 mb-3">
                            <label>Numero login colaborador</label>
                            <input  type="text" class="form-control"  id="col_login_num_e"  >
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Nombre de colaborador</label>
                            <input type="text" class="form-control"   id="col_nom_e"  >
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Cargo</label>
                            <input type="text" class="form-control"  id="col_cargo_e"  >
                        </div>
                    
                        <div class="col-md-6 mb-3">
                            <label>Area</label>
                            <select class="form-control"  id="area_id_fk_e" >
                                <option value="" >seleccione...</option>
                                <?php foreach ($area as $areas): ?>
                                <option value="<?php echo $areas['area_id']; ?>"><?php echo $areas['area_nom']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="edit_collaborator();"  class="btn btn-primary">Actualizar</button>
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
    <script src='<?php echo base_url(); ?>resources/controllers/collaborator.js?v=<?php echo(rand()); ?>' type='text/javascript' ></script>
</div>


