<div class="iq-card-body">
    <h2><?php echo $title; ?></h2>
    <div class="container-fluid">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                <input type="hidden" value="<?php echo $this->session->userdata('usu_id') ?>" id="usu_id" >
                    <label>Fecha de novedad</label>
                    <input type="date" value="<?php echo date("Y-m-d");?>"  readonly id="nove_fecha" class="form-control"  >
                </div>

                <div class="col-md-6 mb-3">
                    <label>Hora de inicio</label>
                    <input type="datetime-local" value="<?php echo date("Y-m-d\TH:i");?>"  id="nove_hora_ini" class="form-control"  >
                </div>


                <div class="col-md-6 mb-3">
                <label>Nombre colaborador</label>
                    <div class="input-group">
                        <div class="col-xs-2">
                            <input type="text" id="colaborador" style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control"  placeholder="buscar">
                        </div>
                            <select class="form-control"  id="col_id_fk" >
                                <option value="0" >selecione...</option>
                                <?php foreach ($colaborador as $agent): ?>
                                <option value="<?php echo $agent['col_id']; ?>"><?php echo $agent['col_nom']; ?></option>
                                <?php endforeach; ?>
                            </select>
                    </div> 
                </div>

                <div class="col-md-6 mb-3">
                    <label>Hora de fin</label>
                    <input type="datetime-local"  id="nove_hora_fin" class="form-control"  >
                </div>

                <div class="col-md-6 mb-3">
                <label>Seccion</label>
                    <div class="input-group">
                        <div class="col-xs-2">
                            <input type="text" style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();" id="seccion" class="form-control" placeholder="buscar" >
                        </div>
                            <select class="form-control"  id="seccion_id_fk" >
                                <option value="0" >selecione...</option>
                                <?php foreach ($seccion as $campaign): ?>
                                <option value="<?php echo $campaign['seccion_id']; ?>"><?php echo $campaign['seccion_nom']; ?></option>
                                <?php endforeach; ?>
                            </select>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label >Tiempo total</label>
                    <input type="text" readonly id="nove_tiem_total" class="form-control" >
                </div>

                
                <div class="col-md-6 mb-3">
                <label >Incidencia</label>
                <div class="input-group">
                    <select class="form-control"  id="categoria" >
                        <option >categoria</option>
                        <option >selecione...</option>
                        <?php foreach ($categoria as $category): ?>
                        <option value="<?php echo $category['cate_id']; ?>"><?php echo $category['cate_nom']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select class="form-control"  id="tip_inci_id_fk" >
                        <option value="0" >tipo incidencia</option>
                        <option value="0">selecione...</option>
                    </select>
                </div>
                </div>

                <div class="col-md-6 mb-3">
                </div>
            <div class="form-group"> 
            <button class="btn btn-primary" id="boton" onclick="create_novelty();" type="boton">Registrar novedad</button>
            </div>
    </div>

    <script src="<?php echo base_url();?>resources/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url();?>resources/js/jquery-ui.min.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url();?>resources/js/jquery.dataTables.js"></script>
    <script type='text/javascript'>
        var baseURL= "<?php echo base_url();?>";
    </script>
    <script src='<?php echo base_url();?>resources/controllers/novelty.js' type='text/javascript' ></script>
</div>