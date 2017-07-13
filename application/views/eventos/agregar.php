<?php $this->load->view('overall/header'); ?>
<body>
  <?php $this->load->view('overall/nav'); ?>
  <div class="container">
    <h3 align="center">Registro <i class="fa fa-transgender" aria-hidden="true"></i></h3> 
    <br>
    <div class="row">
     <div class="col-md-2"></div>
     <div class="col-md-8">
       <?=  form_open_multipart('eventos/agregar', 'class="form-horizontal"');  ?>
       <fieldset>
        <div class="form-group">
         <label for="" class="col-lg-2 control-label">Lugar</label>
         <div class="col-lg-10">
           <input type="text" class="form-control" name="lugar" id="lugar" placeholder="Casa">
         </div>
       </div>		 
       <div class="form-group">
         <label for="" class="col-lg-2 control-label">Tipo</label>
         <div class="col-lg-10">
           <select name="tipo" id="tipo" class="form-control">
             <option value="">[...]</option>
             <option value="Andres">Regla</option>
             <option value="Sex">Sex</option>
             <option value="69">69</option>
             <option value="El">Oral a Él</option>
             <option value="Ella">Oral a Ella</option>
             <option value="Inyeccion">Inyección</option>
           </select>
         </div>
       </div>		
       <div class="form-group">
         <label for="" class="col-lg-2 control-label">Descripcion</label>
         <div class="col-lg-10">
          <textarea  type="text" class="form-control" name="descripcion" id="descripcion"  rows="5" required></textarea>
        </div>
      </div> 
      <div class="form-group">
       <label for="" class="col-lg-2 control-label">Fecha</label>
       <div class="col-lg-10">
         <input type="date" class="form-control" name="fecha"  id="fecha" value="<?php echo date('Y-m-d'); ?>">
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