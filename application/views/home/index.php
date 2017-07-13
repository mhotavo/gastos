<?php $this->load->view('overall/header'); ?>
<body>
  <?php     $this->load->view('overall/nav'); ?>
  <div id="container">
    <h2 align="center"><i class="fa fa- text-danger" aria-hidden="true"></i></h2>
    <div class="col-xs-12  col-sm-6 col-sm-offset-3 ">
      <div class="row">
       <div class="col-xs-6 col-sm-6  ">
         <p  class="text-success bold">
          Ingresos
        </p>
      </div>
      <div class="col-xs-6 col-sm-6">
        <p>
          <?php echo number_format($datos['totalIngresos'], 0, '.', '.');  ?> <br> 
        </p>
      </div>
    </div>
    <div class="row">
     <div class="col-xs-6 col-sm-6  ">
      <p  class="text-danger bold">
        Gastos
      </p>
    </div>
    <div class="col-xs-6 col-sm-6">
      <p>
        <?php echo   number_format($datos['totalGastos'], 0, '.', '.'); ?> <br> 
      </p>
    </div>
  </div>
  <hr style="margin:0px">
  <div class="row">
   <div class="col-xs-6 col-sm-6  ">
    <p  class="text-info bold">
      Saldo
    </p>
  </div>
  <div class="col-xs-6 col-sm-6">
    <p>
      <?php echo   number_format($datos['saldo'], 0, '.', '.'); ?> <br>       
    </p>
  </div>
</div>
</div>
</div>

<?php $this->load->view('overall/footer'); ?> 


</body>

</html>