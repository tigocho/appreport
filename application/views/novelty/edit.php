<div class="iq-card-body">
    <h2><?php echo $title; ?></h2>
    <div class="container-fluid">
        <form id="novedad"  >
        <?php foreach ($novedad as $novelty): ?>
            <div class="form-row">
            <input type="hidden" value="<?php echo $novelty['nove_id']; ?>" id="nove_id" >
                <div class="col-md-6 mb-3">
                    <label>fecha de novedad</label>
                    <input type="date" value="<?php echo $novelty['nove_fecha']; ?>" id="nove_fecha" class="form-control"  >
                </div>

                <div class="col-md-6 mb-3">
                    <label>hora de inicio</label>
                    
                    <input type="datetime-local" value="<?php echo $newDate = date("Y-m-d\TH:i", strtotime($novelty['nove_hora_ini'])); ?>"  id="nove_hora_ini" class="form-control">
                </div>


                <div class="col-md-6 mb-3">
                    <label>nombre colaborador</label>
                    <div class="input-group">
                            <div class="col-xs-2">
                                <input type="text" id="colaborador" class="form-control"  placeholder="buscar"  >
                            </div>
                            <select class="form-control" id="col_id_fk" >
                                <option value="<?php echo $novelty['col_id_fk']; ?>"><?php echo $novelty['col_nom']; ?></option>
                                <?php foreach ($colaborador as $agent): ?>
                                <option value="<?php echo $agent['col_id']; ?>"><?php echo $agent['col_nom']; ?></option>
                                <?php endforeach; ?>
                            </select>
                    </div> 
                </div>

                <div class="col-md-6 mb-3">
                    <label>hora de fin</label>
                    <input type="datetime-local" value="<?php echo $newDate = date("Y-m-d\TH:i", strtotime($novelty['nove_hora_fin'])); ?>" id="nove_hora_fin" class="form-control"  >
                </div>

                <div class="col-md-6 mb-3">
                <label>seccion</label>
                <div class="input-group">
                        <div class="col-xs-2">
                            <input type="text" id="area" class="form-control" placeholder="buscar" >
                        </div>
                        <select class="form-control"  id="area_id_fk" >
                            <option value="<?php echo $novelty['area_id_fk']; ?>"><?php echo $novelty['session_nom']; ?></option>
                            <?php foreach ($area as $campaign): ?>
                            <option value="<?php echo $campaign['area_id']; ?>"><?php echo $campaign['session_nom']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label>tiempo total</label>
                    <input type="text" value="<?php echo $novelty['nove_tiem_total']; ?>" readonly id="nove_tiem_total" class="form-control" >
                </div>

                
                <div class="col-md-6 mb-3">
                <label>incidencia</label>
                    <div class="input-group">
                        <select class="form-control"  id="categoria" >
                        <option  value="<?php echo $novelty['cate_id_fk']; ?>"><?php echo $novelty['cate_nom']; ?></option>
                            <option >categoria</option>
                            <?php foreach ($categoria as $category): ?>
                            <option value="<?php echo $category['cate_id']; ?>"><?php echo $category['cate_nom']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select class="form-control"  id="tip_inci_id_fk" >
                            <option  value="<?php echo $novelty['tip_inci_id_fk']; ?>"><?php echo $novelty['tip_inci_nom']; ?></option>
                            <option >tipo incidencia</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                </div>
        
            <div class="form-group">
                <button class="btn btn-primary" id="boton" onclick="edit_novelty();" type="submit">editar novedad </button>
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
    <script src='<?php echo base_url(); ?>resources/controllers/novelty.js' type='text/javascript' ></script>
</div>

