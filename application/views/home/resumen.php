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
<script>
  $( document ).ready(function() {

    $( "#buscar" ).click(function() {
     var ini = $( "#FECHA_INICIAL" ).val();
     var fin =  $( "#FECHA_FINAL" ).val();
     if (ini!="" && fin!="") {
      window.location.href = "<?= base_url();?>home/resumen/"+ini+"/"+fin+"  ";
    }
  });

  });

</script>
</body>
</html>