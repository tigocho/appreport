<div class="row">
  <div class="col-md-6 card border-secondary mb-3">
    <div class="card-header"><h6 class="text-dark">Cantidad de registros pendientes</h6></div>
    <div class="card-body text-secondary">
      <h2 class="card-text col-md-12 text-center" style="color:#000;"><?= $cantidad_registros_pendientes ?></h2>
    </div>
  </div>
  <!-- Tarjeta para mostrar cantidades por cada documento -->
  <div class="col-md-6 card border-secondary mb-3" >
    <div class="card-header"><h6 class="text-dark">Registros pendientes</h6></div>
    <div class="card-body text-secondary">
      <?php foreach($datos_interfaz_clinica as $dato_clinica)  { ?>
        <div class="row">
          <p class="card-text col-md-10" style="color:#000;"><?= $dato_clinica->NRO_DOCU ?></p>
          <p class="card-text col-md-2" style="color:#000;"><?= $dato_clinica->cantidad ?></p>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
<div class="row">  
  <div class="col-md-6 card border-secondary mb-3">
    <div class="card-header"><h6 class="text-dark">Crédito / Débito</h6></div>
    <div class="card-body text-secondary">
      <?php foreach($debito_credito as $dato_clinica)  { ?>
        <div class="row">
          <p class="card-text col-md-8" style="color:#000;"><?= $dato_clinica->nat_tran ?></p>
          <p class="card-text col-md-4 text-left" style="color:#000;">$<?= number_format($dato_clinica->val_tran, 2) ?></p>
        </div>
      <?php } ?>
        <div class="row">
          <p class="card-text col-md-8" style="color:#000;">Diferencia</p>
          <p class="card-text col-md-4 text-left" <?php if(is_numeric($diferencia)&& $diferencia > 0) echo "style='color:red'"; else echo "style='color:#000;'"; ?>><?php if(is_numeric($diferencia)) echo "$".number_format($diferencia,2); else echo $diferencia; ?></p>
        </div>
    </div>
  </div>
</div>
<div class="row">  
  <div class="col-md-6 card border-secondary mb-3">
    <div class="card-header"><h6 class="text-dark">Meses de los registros pendientes</h6></div>
    <div class="card-body text-secondary">
      <?php foreach($meses_registros as $dato_clinica)  { ?>
        <div class="row">
          <p class="card-text col-md-6" style="color:#000;"><?= date("Y-m-d", strtotime($dato_clinica->fec_proc)) ?></p>
          <p class="card-text col-md-6 text-left" style="color:#000;"><?= $dato_clinica->cantidad_mes ?> registros pendientes</p>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 text-right">
    <a href="javascript:void(0);" class="btn btn-success evt-enviar-registros-pendientes <?php if(is_numeric($diferencia)&& $diferencia > 0) echo   "disabled"; ?>">Enviar registros</a>
  </div>
</div>