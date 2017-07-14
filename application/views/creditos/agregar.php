<?php $this->load->view('overall/header'); ?>
<body>
  <?php $this->load->view('overall/nav'); ?>
  <div class="container">
    <h4 align="center"> Nuevo Crédito </h4>
    <br>
    <div class="">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <?=  form_open_multipart('creditos/agregar/', 'class="form-horizontal"');  ?>
        <fieldset>
          <div class="form-group">
            <label for="" class="col-md-3 control-label">Crédito</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="CREDITO" id="CREDITO" value="">
            </div>
          </div>   
          <div class="form-group">
            <label for="" class="col-md-3 control-label">Saldo</label>
            <div class="col-md-9">
              <input type="number" class="form-control" name="SALDO" id="SALDO" value="">
            </div>
          </div>    
          <div class="form-group">
            <label for="" class="col-md-3 control-label">Día Vencimiento</label>
            <div class="col-md-9">
              <input type="number" maxlength="2" class="form-control" name="FECHA_VEN" id="FECHA_VEN" value="">
            </div>
          </div>   
          <div class="form-group">
            <label for="" class="col-md-3 control-label">Total cuotas</label>
            <div class="col-md-9">
              <input type="number" class="form-control" name="TOTAL_CUOTAS" id="TOTAL_CUOTAS" value="">
            </div>
          </div>   
          <div class="form-group">
          <label for="" class="col-md-3 control-label">Interés</label>
            <div class="col-md-9">
              <input type="number" class="form-control" name="INTERES" id="INTERES" value="">
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