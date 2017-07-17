<?php $this->load->view('overall/header'); ?>
<body>
	<?php     $this->load->view('overall/nav'); ?>
	<div id="container">
		<h2 align="center"><i class="fa fa- text-danger" aria-hidden="true"></i></h2>
		<div class="col-xs-12  col-sm-6 col-sm-offset-3 ">
			<div class="row">
				
				<table class="table table-striped table-hover ">
					<thead>
						<tr>
							<th colspan="4" class="text-center info">TRANSPORTES <i class="fa fa-bus" aria-hidden="true"></i></th>
						</tr>
						<tr>           
							<th width="25%">DIAS MES</th>
							<th>COSTO MES</th>
							<th width="25%">DIAS RESTANTES</th>
							<th>COSTO A HOY</th>
						</tr>

					</thead>
					<tbody>
						<tr>
							<td class="success bold"><?= $BUSES['DIAS_TOTAL'] ?></td>
							<td class="success"> $ <?= number_format($BUSES['TOTAL_MES'], 0, '.', '.')  ?></td>
							<td class="warning bold"><?= $BUSES['DIAS_RESTANTES']  ?></td>
							<td class="warning"> $ <?= number_format($BUSES['TOTAL_A_HOY'], 0, '.', '.')  ?></td>
						</tr>
					</tbody>
					<tfoot>

					</tfoot>
				</table>

			</div>
		</div>
	</div>

	<?php $this->load->view('overall/footer'); ?> 


</body>

</html>