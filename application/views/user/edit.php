<div class="iq-card-body">
    <h2><?php echo $title; ?></h2>
    <div class="container-fluid">
        <form id="user">
        <?php foreach ($usuario as $user): ?>
            <div class="form-row">
            <div class="col-md-6 mb-3">
            <input type="hidden" value="<?php echo $user['usu_id']; ?>" id="usu_id" >
                    <label for="validationDefault01">Numero de documento </label>
                    <input type="text" value="<?php echo $user['usu_num_doc']; ?>" id="usu_num_doc" class="form-control"  >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationDefault01">Correo usuario</label>
                    <input type="text" value="<?php echo $user['usu_correo']; ?>" id="usu_correo" class="form-control"  >
                </div>

                <div class="col-md-6 mb-3">
                    <label for="validationDefault01">Primer nombre</label>
                    <input type="text" value="<?php echo $user['usu_nom']; ?>" id="usu_nom" class="form-control"  >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationDefault01">Segundo nombre</label>
                    <input type="text" value="<?php echo $user['usu_nom_two']; ?>" id="usu_nom_two" class="form-control"  >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationDefault01">Primer apellido</label>
                    <input type="text" value="<?php echo $user['usu_ape']; ?>" id="usu_ape" class="form-control"  >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationDefault01">Segundo apellido</label>
                    <input type="text" value="<?php echo $user['usu_ape_two']; ?>" id="usu_ape_two" class="form-control"  >
                </div>
            
                <div class="col-md-6 mb-3">
                    <label for="validationDefault01">Contraseña usuario</label>
                    <input type="text" value="<?php echo $user['usu_contra']; ?>" id="usu_contra" class="form-control"  >
                </div>
                <div class="col-md-6 mb-3">
                <label for="validationDefault04">Rol usuario</label>
                    <select class="form-control" id="rol_id_fk" >
                        <option selected disabled value="<?php echo $user['rol_id_fk']; ?>"><?php echo $user['rol_des']; ?></option>
                        <?php foreach ($rol as $role): ?>
                        <option value="<?php echo $role['rol_id']; ?>"><?php echo $role['rol_des']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

            <div class="form-group"> 
            <button class="btn btn-primary" id="boton"  onclick="edit_user();" type="submit">Editar usuario</button>
            </div>
            <?php endforeach; ?>
        </form>
    </div>
    <script src="<?php echo base_url();?>resources/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url();?>resources/js/jquery-ui.min.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url();?>resources/js/jquery.dataTables.js"></script>
    <script type='text/javascript'>
        var baseURL= "<?php echo base_url();?>";
    </script>
    <script src='<?php echo base_url();?>resources/controllers/user.js' type='text/javascript' ></script>
</div>
