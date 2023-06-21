<?php if($info_medico_dia->dia != 8) { ?>
	<div class="row">	
		<div class="col-md-6">
			<label>Inicio horario <b>1er</b> bloque*</label>
			<input type="time" class="form-control evt-bloque-horarios" id="icd_horario_inicio_manana" value="<?= $info_medico_dia->icd_horario_inicio_manana ?>">
		</div>
		<div class="col-md-6">
			<label>Fin horario <b>1er</b> bloque*</label>
			<input type="time" class="form-control evt-bloque-horarios" id="icd_horario_fin_manana" value="<?= $info_medico_dia->icd_horario_fin_manana ?>">
		</div>
	</div>
	<div>
		<label>Lugar Facturación*</label>
		<textarea style="min-width: 100%; min-height:150px;" id="inf_cli_lugar_facturacion" name="inf_cli_lugar_facturacion" required><?= $info_medico_dia->icd_cli_lugar_facturacion  ?></textarea>
	</div>
	<div>
		<label>Lugar Atención*</label>
		<textarea style="min-width: 100%; min-height:150px;" id="inf_cli_lugar_atencion" name="inf_cli_lugar_atencion" required><?= $info_medico_dia->icd_cli_lugar_atencion ?></textarea>
	</div>
	<div>
		<label>Observación*</label><br>
		<textarea style="min-width: 100%; min-height:150px;" id="inf_cli_observacion" name="inf_cli_observacion" required><?= $info_medico_dia->icd_cli_observacion ?></textarea>
	</div>
<?php } else { ?>
	<div>
		<label>Lugar Facturación (por defecto)*</label>
		<textarea style="min-width: 100%; min-height:150px;" id="inf_cli_lugar_facturacion" name="inf_cli_lugar_facturacion" required><?= $info_medico_dia->inf_cli_lugar_facturacion  ?></textarea>
	</div>
	<div>
		<label>Lugar Atención (por defecto)*</label>
		<textarea style="min-width: 100%; min-height:150px;" id="inf_cli_lugar_atencion" name="inf_cli_lugar_atencion" required><?= $info_medico_dia->inf_cli_lugar_atencion ?></textarea>
	</div>
	<div>
		<label>Observación (por defecto)*</label><br>
		<textarea style="min-width: 100%; min-height:150px;" id="inf_cli_observacion" name="inf_cli_observacion" required><?= $info_medico_dia->inf_cli_observacion ?></textarea>
	</div>
<?php } ?>
