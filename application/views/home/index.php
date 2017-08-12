<?php $this->load->view('overall/header'); ?>
<body>
  <?php     $this->load->view('overall/nav'); ?>
  <div id="container">
    <h2 align="center"><i class="fa fa- text-danger" aria-hidden="true"></i></h2>

    <div class="col-xs-12  col-sm-6 col-sm-offset-3 ">
      <div class="row">
       <div class="form-inline">
         <div class="form-group col-xs-6 col-sm-3">
          <label class="sr-only" for="FECHA_INICIAL">Fecha Inicial:</label>
          <input type="date" class="form-control" id="FECHA_INICIAL"  value="<?php echo  ($this->uri->segment(3)!='') ? $this->uri->segment(3) :  $this->session->userdata('inicio') ?>">
        </div>
        <div class="form-group col-xs-6 col-sm-3">
          <label class="sr-only" for="FECHA_FINAL">Fecha Final: </label>
          <input type="date" class="form-control" id="FECHA_FINAL" value="<?php echo  ($this->uri->segment(4)!='') ? $this->uri->segment(4) :  $this->session->userdata('fin') ?>">
        </div>
        <button name="buscar" id="buscar" class="btn btn-default col-xs-12 col-sm-2">Buscar</button>
      </div>
    </div>
    <div class="row">
      <br>
    </div>

    <div class="row">
      <table class="table table-striped table-hover " style="padding-top: 3px">
        <thead>
          <tr>
            <th colspan="3" class="text-center success">INGRESOS DEL MES</th>
          </tr>
          <tr>           
           <th width="20%" class="hidden">CONCEPTO</th>
           <th width="20%">FECHA</th>
           <th width="30%">DESCRIPCIÓN</th>
           <th width="10%">VALOR</th>
         </tr>
       </thead>
       <tbody>
        <?php 
        foreach ($ingresos as $key => $row) {
         echo'<tr>';
         echo'<td class="hidden">'.mb_strtoupper($row->CONCEPTO).'</td>';
         echo'
         <td>'.$row->FECHA.' <br>
           <b style="font-size: 10px;"> '.mb_strtoupper($row->CONCEPTO).'</b>
         </td>';
         echo'<td>'.mb_strtoupper($row->DESCRIPCION).'</td>';
         echo'<td align="right">$ '.number_format($row->VALOR, 0, '.', '.').'</td>';
         echo'</tr>';
       } ?>

     </tbody>
   </table> 
   <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th colspan="3" class="text-center danger">GASTOS DEL MES</th>
      </tr>
      <tr>  
        <th width="20%" class="hidden">CONCEPTO</th>
        <th width="20%">FECHA</th>
        <th width="30%">DESCRIPCIÓN</th>
        <th width="10%">VALOR</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      foreach ($gastos as $key => $row) {
       echo'<tr>';
       echo'<td class="hidden">'.mb_strtoupper($row->CONCEPTO).'</td>';
       echo'
       <td>'.$row->FECHA.' <br>
         <b style="font-size: 10px;"> '.mb_strtoupper($row->CONCEPTO).'</b>
       </td>';
       echo'<td>'.mb_strtoupper($row->DESCRIPCION).'</td>';
       echo'<td align="right">$ '.number_format($row->VALOR, 0, '.', '.').'</td>';
       echo'</tr>';
     } ?>
   </tbody>
   <tfoot>
    <tr>
      <th  colspan="2">TOTAL INGRESOS</th>
      <th class="text-success text-right" >$ <?= number_format($datos['totalIngresos'], 0, '.', '.') ?></th>
    </tr>
    <tr>
      <th  colspan="2">TOTAL GASTOS</th>
      <th class="text-danger text-right" >$ <?= number_format($datos['totalGastos'], 0, '.', '.') ?></th>
    </tr>
    <tr>
      <th  colspan="2">SALDO TOTAL</th>
      <th class="text-warning text-right" >$ <?= number_format($datos['saldo'], 0, '.', '.') ?></th>
    </tr>
  </tfoot>
</table>  
</div>
</div>
</div>
<?php $this->load->view('overall/footer'); ?> 

<script>
  $( document ).ready(function() {

    $( "#buscar" ).click(function() {
     var ini = $( "#FECHA_INICIAL" ).val();
     var fin =  $( "#FECHA_FINAL" ).val();
     if (ini!="" && fin!="") {
      window.location.href = "<?= base_url();?>home/index/"+ini+"/"+fin+"  ";
     }
   });

  });

</script>
</body>
</html>