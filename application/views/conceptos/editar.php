<?php $this->load->view('overall/header'); ?>
<body>
	<?php $this->load->view('overall/nav'); ?>
	<div class="container">
		<h2 align="center"> <?php echo $concepto[0]->CONCEPTO;  ?> </h2>
		<br>
		<div class="">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<?=  form_open_multipart('conceptos/editar/'.$concepto[0]->ID_CONCEPTO.' ', 'class="form-horizontal"');  ?>
				<fieldset>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Nombre</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="NOMBRE" id="NOMBRE" value="<?php echo $concepto[0]->CONCEPTO;  ?>">
						</div>
					</div>   
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Tipo</label>
						<div class="col-md-9">
							<select  class="form-control" name="TIPO" id="TIPO">
								<option value="G">Gasto</option>
								<option value="I">Ingreso</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Día Vencimiento</label>
						<div class="col-md-9">
							<input type="number" maxlength="2" class="form-control" name="FECHA_VEN" id="FECHA_VEN" value="<?php echo $concepto[0]->FECHA_VEN;  ?>">
						</div>
					</div>       
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Mensual</label>
						<div class="col-md-9">
							<div class="radio">
								<label><input type="radio" name="MENSUAL" value="S" <?php echo ($concepto[0]->MENSUAL=='S' ? 'checked': null ) ?> >SI</label>
								<label><input type="radio" name="MENSUAL" value="N" <?php echo ($concepto[0]->MENSUAL=='N' ? 'checked': null ) ?>>NO</label>
							</div>
						</div>
					</div>   
					<div class="form-group" align="center">
						<div class="col-lg-10 col-lg-offset-2">
							<button type="submit" class="btn btn-success">Guardar</button>
						</div>
					</div>
				</fieldset>
				<?=   form_close(); ?>
			</div>
			<div class="col-md-2"></div>
		</div>  
	</div>
	<?php $this->load->view('overall/footer'); ?>

	<script>
		$("#TIPO").val("<?php echo $concepto[0]->TIPO;  ?>");
	</script>


</body>
</html>   