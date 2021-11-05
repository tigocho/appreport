<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title"><?php echo $title; ?></h4>
        </div>
    </div>

        <div class="iq-card-body">
            <div class="container-fluid">
                <div class="form-row">
                    <input type="hidden" value="<?php echo $novelty->nove_id;?>" id="nove_id" >
                    <div class="col-md-6 mb-3">
                        <label>Fecha de novedad</label>
                        <input type="date" value="<?php echo $novelty->nove_fecha; ?>" id="nove_fecha" class="form-control"  >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Hora de inicio</label>
                        
                        <input type="datetime-local" value="<?php echo $newDate = date("Y-m-d\TH:i", strtotime($novelty->nove_hora_ini)); ?>"  id="nove_hora_ini" class="form-control">
                    </div>


                    <div class="col-md-6 mb-3">
                        <label>Nombre colaborador</label>
                        <div class="input-group">
                                <div class="col-xs-2">
                                    <input type="text" style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();" id="colaborador" class="form-control"  placeholder="buscar"  >
                                </div>
                                <select class="form-control" id="col_id_fk" >
                                    <option value="">seleccione...</option>
                                    <?php foreach ($colaborador as $agent): ?>
                                    <option value="<?php echo $agent['col_id'];?>" <?php if($novelty->col_id_fk == $agent['col_id']) echo "selected";?> ><?php echo $agent['col_nom']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                        </div> 
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Hora de fin</label>
                        <input type="datetime-local" value="<?php echo $newDate = date("Y-m-d\TH:i", strtotime($novelty->nove_hora_fin)); ?>" id="nove_hora_fin" class="form-control"  >
                    </div>

                    <div class="col-md-6 mb-3">
                    <label>Seccion</label>
                    <div class="input-group">
                            <div class="col-xs-2">
                                <input type="text" style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();" id="seccion" class="form-control" placeholder="buscar" >
                            </div>
                            <select class="form-control"  id="seccion_id_fk" >
                                <option value="">seleccione...</option>
                                <?php foreach ($seccion as $campaign): ?>
                                <option value="<?php echo $campaign['seccion_id'];?>" <?php if($novelty->seccion_id_fk == $campaign['seccion_id']) echo "selected";?> ><?php echo $campaign['seccion_nom'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Tiempo total</label>
                        <input type="text" value="<?php echo $novelty->nove_tiem_total; ?>" readonly id="nove_tiem_total" class="form-control" >
                    </div>

                    
                    <div class="col-md-6 mb-3">
                    <label>Incidencia</label>
                        <div class="input-group">
                            <select class="form-control"  id="categoria" >
                                <option >Categoria</option>
                                <option>seleccione...</option>
                                <?php foreach ($categoria as $category): ?>
                                <option value="<?php echo $category['cate_id']; ?>" <?php if( $novelty->cate_id_fk == $category['cate_id'])echo "selected";?> ><?php echo $category['cate_nom']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <select class="form-control"  id="tip_inci_id_fk" >
                                <option >Tipo incidencia</option>
                                <option>seleccione...</option>
                                <?php foreach ($incidencias as $incident): ?>
                                <option value="<?php echo $incident->tip_inci_id; ?>" <?php if($novelty->tip_inci_id_fk == $incident->tip_inci_id) echo "selected";?>><?php echo $incident->tip_inci_nom;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                            <label>Observacion</label>
                            <select class="form-control"  id="tip_obser_id_fk" >
                            <option  value="">seleccione...</option>
                                <?php foreach ($observacion as $obser): ?>
                                <option value="<?php echo $obser['tip_obser_id']; ?>" <?php if($novelty->tip_obser_id_fk == $obser['tip_obser_id'])echo "selected";?>><?php echo $obser['tip_obser_nom'];?></option>
                                <?php endforeach; ?>
                            </select>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label>Descripcion</label>
                        <textarea id="nove_obser_descripcion" class="form-control" style="resize: none;"  id=""><?php echo $novelty->nove_obser_descripcion; ?></textarea>
                    </div>
                    
                </div>
                <div class="form-group form-row"> 
                    <div class="col-md-12">
                        <button class="btn btn-primary" id="boton" onclick="edit_novelty();" type="submit">Editar novedad </button>
                    </div>
                </div>
            </div>  
        </div>

    <script src="<?php echo base_url();?>resources/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url();?>resources/js/jquery-ui.min.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url();?>resources/js/jquery.dataTables.js"></script>

    <script type="text/javascript" >
        var baseURL= "<?php echo base_url();?>";
    </script>

    <script src='<?php echo base_url(); ?>resources/controllers/novelty.js?v=<?php echo(rand()); ?>' type='text/javascript' ></script>
</div>

