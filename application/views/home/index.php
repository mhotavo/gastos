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
           <th colspan="4" class="text-center info">CRÉDITOS</th>
         </tr>
         <tr>           
           <th width="20%">DESCRIPCIÓN</th>
           <th width="20%">VENCIMIENTO</th>
           <th width="20%">CUOTAS</th>
           <th width="20%">SALDO</th>
         </tr>
       </thead>
       <tbody>
        <?php 
        $totalCredito=0;
        foreach ($creditos as $key => $row) {
         echo'<tr>';
         echo'<td>'.mb_strtoupper($row->CREDITO).'</td>';
         echo'<td>'.$row->FECHA_VEN.date("-m-Y").'</td>';
         echo'<td>'.$row->CUOTAS_PAGAS.' de '.$row->TOTAL_CUOTAS. '</td>';
         echo'<td> $ '.number_format($row->SALDO, 0, '.', '.').'</td>';
         echo'</tr>';
         $totalCredito=$totalCredito+$row->SALDO;
       } ?>

     </tbody>
     <tfoot>
      <tr>
        <th  colspan="3" ">TOTAL</th>
        <th><?= number_format($totalCredito, 0, '.', '.') ?></th>
      </tr>
    </tfoot>
  </table>
  <table class="table table-striped table-hover ">
    <thead>
      <tr>
       <th colspan="4" class="text-center warning">OBLIGACIONES</th>
     </tr>
     <tr>           
       <th width="30%">DESCRIPCIÓN</th>
       <th width="20%">VENCIIENTO</th>
       <th width="20%">ESTADO</th>
       <th width="10%">VALOR</th>
     </tr>
   </thead>
   <tbody>
    <?php 
    foreach ($mensuales as $key => $row) {
     echo'<tr>';
     echo'<td>'.mb_strtoupper($row->CONCEPTO).'</td>';
     echo'<td>'.str_pad($row->FECHA_VEN, 2, '0',STR_PAD_LEFT ).date("-m-Y").'</td>';
     echo'<td>'.mb_strtoupper($row->ULTIMO_PAGO).'</td>';
     echo'<td>'.mb_strtoupper($row->VALOR_PAGO).'</td>';
 
     echo'</tr>';
   } ?>

 </tbody>
 <tfoot>
  <tr>
    <th  colspan="3" ">TOTAL</th>
    <th><?= number_format($totalCredito, 0, '.', '.') ?></th>
  </tr>
</tfoot>
</table> 
</div>
</div>
</div>

<?php $this->load->view('overall/footer'); ?> 


</body>

</html>