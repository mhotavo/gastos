<?php $this->load->view('overall/header'); ?>
<body>
  <?php $this->load->view('overall/nav'); ?>
  <div class="container">
    <h4 align="center"> Nuevo concepto </h4>
    <br>
    <div class="">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <?=  form_open_multipart('conceptos/agregar/', 'class="form-horizontal"');  ?>
        <fieldset>
          <div class="form-group">
            <label for="" class="col-md-2 control-label">Nombre</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="NOMBRE" id="NOMBRE" value="">
            </div>
          </div>    
          <div class="form-group">
            <label for="" class="col-md-2 control-label">Tipo</label>
            <div class="col-md-8">
              <select  class="form-control" name="TIPO" id="TIPO">
                <option value="G">Gasto</option>
                <option value="I">Ingreso</option>
              </select>
            </div>
          </div>  
          <div class="form-group">
            <label for="" class="col-md-2 control-label">Día Vencimiento</label>
            <div class="col-md-8">
              <input type="number" maxlength="2" class="form-control" name="FECHA_VEN" id="FECHA_VEN" value="">
            </div>
          </div>     
          <div class="form-group">
            <label for="" class="col-md-2 control-label">Mensual</label>
            <div class="col-md-8">
              <div class="radio">
                <label><input type="radio" name="MENSUAL" value="S">SI</label>
                <label><input type="radio" name="MENSUAL" value="N" checked>NO</label>
              </div>
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