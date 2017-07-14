<?php $this->load->view('overall/header'); ?>
<body>
	<?php $this->load->view('overall/nav'); ?>
	<div class="container">
		<h4 align="center"> <?php echo $credito[0]->CREDITO;  ?> </h4>
		<br>
		<div class="">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<?=  form_open_multipart('creditos/editar/'.$credito[0]->ID.' ', 'class="form-horizontal"');  ?>
				<fieldset>
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Crédito</label>
						<div class="col-md-9">
						<input type="text" class="form-control" name="CREDITO" id="CREDITO" value="<?php echo $credito[0]->CREDITO;  ?>">
						</div>
					</div>   
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Saldo</label>
						<div class="col-md-9">
						<input type="number" class="form-control" name="SALDO" id="SALDO" value="<?php echo $credito[0]->SALDO;  ?>">
						</div>
					</div>    
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Fecha de vencimiento</label>
						<div class="col-md-9">
						<input type="date" class="form-control" name="FECHA_VEN" id="FECHA_VEN" value="<?php echo $credito[0]->FECHA_VEN;  ?>">
						</div>
					</div>   
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Total cuotas</label>
						<div class="col-md-9">
						<input type="number" class="form-control" name="TOTAL_CUOTAS" id="TOTAL_CUOTAS" value="<?php echo $credito[0]->TOTAL_CUOTAS;  ?>">
						</div>
					</div>   
					<div class="form-group">
						<label for="" class="col-md-3 control-label">Interés</label>
						<div class="col-md-9">
						<input type="number" class="form-control" name="INTERES" id="INTERES" value="<?php echo $credito[0]->INTERES;  ?>">
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

</body>
</html>   