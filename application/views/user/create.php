<div class="iq-card">

    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title"><?php echo $title; ?></h4>
        </div>
    </div>
    <div class="iq-card-body">
        <div class="container-fluid">
                <div class="form-row">
                <div class="col-md-6 mb-3">
                        <label for="validationDefault01">Numero de documento </label>
                        <input type="number" value="" id="usu_num_doc" class="form-control"  >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault01">Correo usuario</label>
                        <input type="email" value="" id="usu_correo" class="form-control"  >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault01">Primer nombre</label>
                        <input type="text" value="" id="usu_nom" class="form-control"  >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault01">Segundo nombre</label>
                        <input type="text" value="" id="usu_nom_two" class="form-control"  >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault01">Primer apellido</label>
                        <input type="text" value="" id="usu_ape" class="form-control"  >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault01">Segundo apellido</label>
                        <input type="text" value="" id="usu_ape_two" class="form-control"  >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault01">Contraseña usuario</label>
                        <input type="text" value="" id="usu_contra" required class="form-control"  >
                    </div>
                    <div class="col-md-6 mb-3">
                    <label for="validationDefault04">Rol usuario</label>
                        <select class="form-control" id="rol_id_fk" >
                            <option selected disabled value="">seleccione...</option>
                            <?php foreach ($rol as $role): ?>
                            <option value="<?php echo $role['rol_id']; ?>"><?php echo $role['rol_des']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div style="display:none" class="col-md-6 mb-3" id="jefenom" >
                    <label>jefe nombre</label>
                        <select class='form-control' id='jefe_id_fk'>
                            <option selected disabled>seleccione...</option>
                        </select>
                    </div>
                    <div style="display:none" class="col-md-6 mb-3" id="jefecorreo" >
                        <label>correo jefe</label>
                        <input type='text' id="correo" readonly class='form-control'>
                    </div>
                <div class="form-group"> 
                <button class="btn btn-primary" id="boton" onclick="create_user();" type="boton">Registrar usuario</button>
                </div>
        </div>
    </div>

    <script src="<?php echo base_url();?>resources/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url();?>resources/js/jquery-ui.min.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url();?>resources/js/jquery.dataTables.js"></script>
    <script type='text/javascript'>
        var baseURL= "<?php echo base_url();?>";
    </script>
    <script src='<?php echo base_url();?>resources/controllers/user.js?v=<?php echo(rand()); ?>' type='text/javascript' ></script>
</div>
    