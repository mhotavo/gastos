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
              <th colspan="2" class="text-center danger">GASTOS DEL MES</th>
            </tr>
            <tr>           
             <th width="70%">CONCEPTO</th>
             <th width="30%">TOTAL</th>
           </tr>
         </thead>
         <tbody>
          <?php foreach ($gastos as $key => $row): ?>
            <tr>           
             <td><?= strtoupper($row->CONCEPTO) ?></td>
             <td align="right"><?= number_format($row->TOTAL, 0, '.', '.') ?></td>
           </tr>
         <?php endforeach ?>
       </tbody>
       <tfoot>
        <tr>
          <th>TOTAL</th>
          <th class="bold text-right" >$ <?= number_format($datos['totalGastos'], 0, '.', '.') ?></th>
        </tr>
      </tfoot>
    </table> 
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th colspan="2" class="text-center success">INGRESOS DEL MES </th>
        </tr>
        <tr>  
          <th width="70%">CONCEPTO</th>
          <th width="30%">TOTAL</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($ingresos as $key => $row): ?>
          <tr>           
            <td><?= strtoupper($row->CONCEPTO) ?></td>
            <td align="right"><?= number_format($row->TOTAL, 0, '.', '.') ?></td>
          </tr>
        <?php endforeach ?>
        <tfoot>
          <tr>
            <th>TOTAL</th>
            <th class="bold text-right" >$ <?= number_format($datos['totalIngresos'], 0, '.', '.') ?></th>
          </tr>
          <tr>
          <th class="warning">SALDO</th>
            <th  class="bold text-right warning" >$ <?= number_format($datos['saldo'], 0, '.', '.') ?></th>
          </tr>
        </tfoot>
      </tbody>
    </table>  
  </div>
</div>
</div>
<?php $this->load->view('overall/footer'); ?> 
</body>
</html>