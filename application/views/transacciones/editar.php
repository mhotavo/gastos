<?php $this->load->view('overall/header'); ?>
<body>
	<?php $this->load->view('overall/nav'); ?>
	<div class="container">
		<h2 align="center"><?=  $transaccion[0]->CONCEPTO ?></h2> 
		<br>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<?=  form_open_multipart('transacciones/editar/'.$transaccion[0]->ID_TRANSACCION.'', 'class="form-horizontal"');  ?>
				<fieldset>
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Concepto:</label>
						<div class="col-lg-10">
							<select name="ID_CONCEPTO" id="ID_CONCEPTO" class="form-control">
								<?php 
								foreach ($concepto as $key => $row) 
								{ 
									echo ' <option value="'. $row->ID_CONCEPTO.'">'. strtoupper($row->CONCEPTO).'</option>';
								}
								?>
							</select>
						</div>
					</div>		
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Valor: </label>
						<div class="col-lg-10">
							<input type="number" class="form-control" name="VALOR"  id="VALOR" value="<?=  $transaccion[0]->VALOR ?>">
						</div>
					</div> 
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Descripción: </label>
						<div class="col-lg-10">
							<textarea  type="text" class="form-control" name="DESCRIPCION" id="DESCRIPCION"  rows="5" required><?=  $transaccion[0]->DESCRIPCION ?></textarea>
						</div>
					</div> 
					<div class="form-group">
						<label for="" class="col-lg-2 control-label">Fecha</label>
						<div class="col-lg-10">
							<input type="date" class="form-control" name="FECHA"  id="FECHA" value="<?=  $transaccion[0]->FECHA ?>">
						</div>
					</div>			    	        


					<div class="form-group">
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
		$("#ID_CONCEPTO").val("<?php echo $transaccion[0]->ID_CONCEPTO;  ?>");
	</script>
</body>
</html>   