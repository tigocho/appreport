<div class="iq-card-body">
    <h2><?php echo $title; ?></h2>
    <button type="button" onclick="modal_category_create();" style="float: right;" class="btn btn-success mb-3">registro de categoria</button>
    <div class="table-responsive">
        <table id="tablecategory" class="table table-striped table-bordered">
            <thead >
                <tr>
                    <th>Numero categoria</th>
                    <th>Nombre de categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    
    <div class="modal fade" id="category_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">registro de categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-row">
                    <div class="col-md-9 mb-3">
                        <label>nombre de categoria</label>
                        <input  type="text" style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control"  id="cate_nom">
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="create_category();"  class="btn btn-primary">agregar</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="category_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ediccion de categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit" >
                <div class="form-row">
                    <input type="hidden"  id="cate_id_e">
                    <div class="col-md-9 mb-3">
                        <label>nombre de categoria</label>
                        <input  type="text" style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control"  id="cate_nom_e"  >
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="edit_category();"  class="btn btn-primary">actualizar</button>
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
    <script src='<?php echo base_url(); ?>resources/controllers/category.js' type='text/javascript' ></script>
</div>
