<div class="table-responsive" style="max-height: 500px;overflow:auto;overflow:auto">
<form id="registrosConfirmados" method="post" action="<?=base_url('ivr/crearRegistrosCargados') ?>">

  <table style="height: 50%; overflow-y: auto;" id="example" class="table table-striped m-1" cellspacing="0">
    <thead>
      <tr>
        <th class="text-left">Id clínica</th>
        <th class="text-left">Código Especialidad</th>
        <th class="text-left">Cédula Médico</th>
        <th class="text-left">Especialidad</th>
        <th class="text-left">Médico</th>
        <th class="text-left">Lugar Facturación</th>
        <th class="text-left">Lugar Atención</th>
        <th class="text-left">Observación</th>
        <th class="text-left">Validación</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($registros as $value => $registro) { ?>
          <tr>
            <td class="text-left"><?php echo "<input type='number' id='idClinica-".$value."' name='idClinica[]' value=".$registro[0]." required>" ?></td>
            <td class="text-left"><?php echo "<input type='number'id='CodigoEspecialidad-".$value."' name='CodigoEspecialidad[]' value=".$registro[1]." required>" ?></td>
            <td class="text-left"><?php echo "<input type='number' id='CedulaMedico-".$value."' name='CedulaMedico[]' value=".$registro[2]." required>" ?></td>
            <td class="text-left"><?php echo "<input type='text' id='Especialidad-".$value."' name='Especialidad[]' value='".$registro[3]."' required>" ?></td>
            <td class="text-left"><?php echo "<input type='text' id='Medico-".$value."' name='Medico[]' value='".$registro[4]."' required>" ?></td>
            <td class="text-left"><?php echo "<textarea  style='min-width: 100%; min-height:80px;' id='LugarFacturacion-".$value."' name='LugarFacturacion[]' required>$registro[5]</textarea>" ?></td>
            <td class="text-left"><?php echo "<textarea  style='min-width: 100%; min-height:80px;' id='LugarAtencion-".$value."' name='LugarAtencion[]' required>$registro[6]</textarea>" ?></td>
            <td class="text-left"><?php echo "<textarea  style='min-width: 100%; min-height:80px;' id='Observacion-".$value."' name='Observacion[]' required>$registro[7]</textarea>" ?></td>
            <td class="text-left"><?php echo "<input type='text' id='Validacion-".$value."' name='Validacion[]' value='".$registro[8]."' required>" ?></td>
          </tr>
        <?php } ?>
    </tbody>
  </table>
</form>
</div>
<!-- form valid -->
<script src="<?php echo base_url(); ?>resources/js/jquery-validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>resources/js/mensajes-jquery-validate.js"></script>