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
       <thead>
        <tr>
          <th  colspan="3" ">TOTAL</th>
          <th><?= number_format($totalCredito, 0, '.', '.') ?></th>
        </tr>
      </thead>
    </table> 
  </div>
</div>
</div>

<?php $this->load->view('overall/footer'); ?> 


</body>

</html>