<div class="iq-card"> 

    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title"><?php echo $title; ?></h4>
        </div>
    </div>

    <div class="iq-card-body"> 
            <div class="row" style="padding: 15px 20px 0px 20px;">
                <div class="col-sm-6">
                    <h5 class="card-title">Buscar en un rango de fechas:</h5>
                </div>
            </div>  
            <div class="row" style="padding: 15px 20px 0px 20px;">
                <div class="col-sm-6">
                    <h5 class="card-title">Fecha Inicial:</h5>
                    <input type="date" id="dateini" class="form-control">
                </div>
                <div class="col-sm-6">
                    <h5 class="card-title">Fecha Final:</h5>
                    <input type="date" id="datefin" class="form-control">
                </div>
                <div style="padding: 15px 20px 0px 20px;" class="form-group"> 
                    <button class="btn btn-success" id="botonf"  type="boton">Buscar</button>
                    <button class="btn btn-primary" id="limpiar"  type="boton">Limpiar filtro</button>
                </div>
            </div>

        <br>
        <div class="table-responsive">
            <table id="tablereport" class="table table-striped table-bordered">
                <thead >
                <tr>
                    <th>Fecha novedad</th>
                    <th>Nombre del colaborador</th>
                    <th>seccion</th>
                    <th>Hora inicio</th>
                    <th>Hora fin</th>
                    <th>Tiempo total</th>
                    <th>Incidencia</th>
                    <th>Estado novedad</th>
                    <th>Observacion</th>
                    <th>descripcion</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script src="<?php echo base_url();?>resources/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url();?>resources/js/jquery-ui.min.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url();?>resources/js/jquery.dataTables.js"></script>
    <script type='text/javascript'>
        var baseURL= "<?php echo base_url();?>";
    </script>
    <script src='<?php echo base_url();?>resources/controllers/reportgr.js?v=<?php echo(rand()); ?>' type='text/javascript' ></script>
</div>

    