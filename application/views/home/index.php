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
              <th colspan="4" class="text-center success">INGRESOS DEL MES</th>
            </tr>
            <tr>           
             <th width="30%">DESCRIPCIÓN</th>
             <th width="20%">FECHA</th>
             <th width="20%" class="hidden-xs">CONCEPTO</th>
             <th width="10%">VALOR</th>
           </tr>
         </thead>
         <tbody>
          <?php 
          foreach ($ingresos as $key => $row) {
           echo'<tr>';
           echo'<td>'.mb_strtoupper($row->DESCRIPCION).'</td>';
           echo'<td>'.$row->FECHA.'</td>';
           echo'<td class="hidden-xs">'.mb_strtoupper($row->CONCEPTO).'</td>';

           echo'<td>$ '.number_format($row->VALOR, 0, '.', '.').'</td>';
           echo'</tr>';
         } ?>

       </tbody>
       <tfoot>
        <tr>
          <th  class="hidden-xs"></th>
          <th  colspan="2">TOTAL INGRESOS</th>
          <th>$ <?= number_format($datos['totalIngresos'], 0, '.', '.') ?></th>
        </tr>
      </tfoot>
    </table> 
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th colspan="4" class="text-center warning">GASTOS DEL MES</th>
        </tr>
        <tr>           
         <th width="30%">DESCRIPCIÓN</th>
         <th width="20%">FECHA</th>
         <th width="20%" class="hidden-xs">CONCEPTO</th>
         <th width="10%">VALOR</th>
       </tr>
     </thead>
     <tbody>
      <?php 
      foreach ($gastos as $key => $row) {
       echo'<tr>';
       echo'<td>'.mb_strtoupper($row->DESCRIPCION).'</td>';
       echo'<td>'.$row->FECHA.'</td>';
       echo'<td class="hidden-xs">'.mb_strtoupper($row->CONCEPTO).'</td>';

       echo'<td>$ '.number_format($row->VALOR, 0, '.', '.').'</td>';
       echo'</tr>';
     } ?>

   </tbody>
   <tfoot>
    <tr>
      <th  class="hidden-xs"></th>
      <th  colspan="2">TOTAL INGRESOS</th>
      <th>$ <?= number_format($datos['totalGastos'], 0, '.', '.') ?></th>
    </tr>
    <tr class="info">
      <th  class="hidden-xs"></th>
      <th  colspan="2">SALDO TOTAL</th>
      <th>$ <?= number_format($datos['saldo'], 0, '.', '.') ?></th>
    </tr>
  </tfoot>
</table>  
<!--<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th colspan="4" class="text-center danger">POR PAGAR</th>
    </tr>
    <tr>           
      <th width="25%">DESCRIPCIÓN</th>
      <th width="15%">FECHA</th>
      <th width="30%">TIPO</th>
      <th width="30%">ESTADO</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    foreach ($creditosPorPagar as $key => $row) {
     echo'<tr>';
     echo'<td>'.mb_strtoupper($row['CONCEPTO']).'</td>';
     echo'<td>'.date("Y-m-").$row['VENCE'].'</td>';
     echo'<td>'.mb_strtoupper($row['TIPO']).'</td>';
     echo'<td>'.mb_strtoupper($row['ESTADO']).'</td>';
     echo'</tr>';
   } 
   foreach ($porPagar as $key => $row) {
     echo'<tr>';
     echo'<td>'.mb_strtoupper($row['CONCEPTO']).'</td>';
     echo'<td>'.date("Y-m-").$row['VENCE'].'</td>';
     echo'<td>'.mb_strtoupper($row['TIPO']).'</td>';
     echo'<td>'.mb_strtoupper($row['ESTADO']).'</td>';
     echo'</tr>';
   } 

   ?>

 </tbody>
</table> -->

</div>
</div>
</div>

<?php $this->load->view('overall/footer'); ?> 


</body>

</html>