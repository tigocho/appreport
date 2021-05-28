<div class="iq-card-body"> 
    <h2><?php echo $title; ?></h2>
    <button type="button" onclick="modal_typeincident_create();"  style="float: right;" class="btn btn-success mb-3">Registro de tipo incidencia</button>
    <div class="table-responsive">
        <table id="tabletypeincident" class="table table-striped table-bordered">
            <thead >
                <tr>
                    <th >Numero tipo incidencia</th>
                    <th >Nombre tipo incidencia</th>
                    <th >Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="typeincident_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro de tipo de incidencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Tipo incidencia</label>
                        <input type="text" class="form-control"  id="tip_inci_nom"  >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Categoria</label>
                        <select class="form-control"  id="cate_id_fk" >
                            <option value="0" >selecione...</option>
                            <?php foreach ($categoria as $category): ?>
                            <option value="<?php echo $category['cate_id']; ?>"><?php echo $category['cate_nom']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="create_typeincident();"  class="btn btn-primary">Agregar</button>
            </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="typeincident_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edicion tipo de incidencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <input type="hidden" id="tip_inci_id_e">
                        <label>Tipo incidencia</label>
                        <input type="text" class="form-control"  id="tip_inci_nom_e"  >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Categoria</label>
                        <select class="form-control"  id="cate_id_fk_e" >
                            <option value="0" >selecione...</option>
                            <?php foreach ($categoria as $category): ?>
                            <option value="<?php echo $category['cate_id']; ?>"><?php echo $category['cate_nom']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="edit_typeincident();"  class="btn btn-primary">Actualizar</button>
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

    <script src='<?php echo base_url(); ?>resources/controllers/typeincidencia.js' type='text/javascript' ></script>
</div>
    
