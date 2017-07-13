<?php $this->load->view('overall/header'); ?>
<body>
  <?php $this->load->view('overall/nav'); ?>
  <div class="container">
    <h4 align="center">Nueva Transacción <i class="fa fa-money" aria-hidden="true"></i></h4> 
    <br>
    <div class="row">
     <div class="col-md-2"></div>
     <div class="col-md-8">
       <?=  form_open_multipart('transacciones/agregar', 'class="form-horizontal"');  ?>
       <fieldset>
        <div class="form-group">
         <label for="" class="col-lg-2 control-label">Concepto:</label>
         <div class="col-lg-10">
           <select name="ID_CONCEPTO" id="ID_CONCEPTO" class="form-control">

             <?php 
             foreach ($concepto as $key => $row) 
             { 
              echo ' <option value="'. $row->ID_CONCEPTO.'">'. strtoupper($row->CONCEPTO).'</option>';
            }
            ?>
          </select>
        </div>
      </div>		
      <div class="form-group">
       <label for="" class="col-lg-2 control-label">Valor: </label>
       <div class="col-lg-10">
         <input type="number" class="form-control" name="VALOR"  id="VALOR">
       </div>
     </div> 
     <div class="form-group">
       <label for="" class="col-lg-2 control-label">Fecha</label>
       <div class="col-lg-10">
         <input type="date" class="form-control" name="FECHA"  id="FECHA" value="<?php echo date('Y-m-d'); ?>">
       </div>
     </div>			    	        


     <div class="form-group">
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