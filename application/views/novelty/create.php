<h2><?php echo $title; ?></h2>

<div class="container-fluid">
    <form id="novedad"  >
        <div class="form-row">
            <div class="col-md-6 mb-3">
            <input type="hidden" value="<?php echo $this->session->userdata('usu_id') ?>" id="usu_id" >
                <label>fecha de novedad</label>
                <input type="date" value="<?php date_default_timezone_set('America/Bogota');$hoy = date("Y-m-d"); echo $hoy;?>"  readonly id="nove_fecha" class="form-control"  >
            </div>

            <div class="col-md-6 mb-3">
                <label>hora de inicio</label>
                <input type="datetime-local"  id="nove_hora_ini" class="form-control"  >
            </div>


            <div class="col-md-6 mb-3">
            <label>nombre agente</label>
                <div class="input-group">
                    <div class="col-xs-2">
                        <input type="text" id="colaborador" class="form-control"  placeholder="buscar"  >
                    </div>
                        <select class="form-control"  id="col_id_fk" >
                            <option >selecione...</option>
                            <?php foreach ($colaborador as $agent): ?>
                            <option value="<?php echo $agent['col_id']; ?>"><?php echo $agent['col_nom']; ?></option>
                            <?php endforeach; ?>
                        </select>
                </div> 
            </div>

            <div class="col-md-6 mb-3">
                <label>hora de fin</label>
                <input type="datetime-local"  id="nove_hora_fin" class="form-control"  >
            </div>

            <div class="col-md-6 mb-3">
            <label>campaña</label>
                <div class="input-group">
                    <div class="col-xs-2">
                        <input type="text" id="area" class="form-control" placeholder="buscar" >
                    </div>
                        <select class="form-control"  id="area_id_fk" >
                            <option >selecione...</option>
                            <?php foreach ($area as $campaign): ?>
                            <option value="<?php echo $campaign['area_id']; ?>"><?php echo $campaign['area_nom']; ?></option>
                            <?php endforeach; ?>
                        </select>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label >tiempo total</label>
                <input type="text" readonly id="nove_tiem_total" class="form-control" >
            </div>

            
            <div class="col-md-6 mb-3">
            <label >incidencia</label>
            <div class="input-group">
                <select class="form-control"  id="categoria" >
                    <option >categoria</option>
                    <option >selecione...</option>
                    <?php foreach ($categoria as $category): ?>
                    <option value="<?php echo $category['cate_id']; ?>"><?php echo $category['cate_nom']; ?></option>
                    <?php endforeach; ?>
                </select>
                <select class="form-control"  id="tip_inci_id_fk" >
                    <option >tipo incidencia</option>
                    <option >selecione...</option>
                </select>
            </div>
            </div>

            <div class="col-md-6 mb-3">
            
            </div>

       
        <div class="form-group"> 
           <button class="btn btn-primary" id="boton" onclick="create_novelty();" type="submit">agregar novedad</button>
        </div>
    </form>
</div>

<script src="<?php echo base_url();?>resources/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url();?>resources/js/jquery-ui.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>resources/js/jquery.dataTables.js"></script>
<script type='text/javascript'>
    var baseURL= "<?php echo base_url();?>";
</script>
<script src='<?php echo base_url();?>resources/controllers/novelty.js' type='text/javascript' ></script>

   