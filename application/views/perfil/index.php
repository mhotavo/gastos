<html>
<head>
  <?php $this->load->view('overall/header'); ?>
</head>
<body>
  <?php     $this->load->view('overall/nav'); ?>
  <div  class="container"> <!-- box-principal -->
    <div class="panel panel-success">
     <div class="panel-heading">
       <h3 class="panel-title" align="center"><?= ucwords($this->session->userdata('name')) ?></h3>
     </div>
     <div class="panel-body">
      <div class="row">
       <div class="col-md-4">
        <div class="panel panel-default">
         <div class="panel-body">
          <img class="img-responsive" src="https://scontent.fbog2-1.fna.fbcdn.net/v/t1.0-9/14729166_10207207283848661_3989142169652778557_n.jpg?oh=bb44d1efd39f00c12159819bedac9840&oe=5A2F4B7F" required>
        </div>
      </div>
    </div>
    <div class="col-md-8">
     <?=  form_open_multipart('perfil/index/'.$usuario->ID.' ', 'class="form-horizontal"');  ?>
     <fieldset>
       <div class="form-group">
         <label for="USER" class="col-md-3 control-label">Usuario</label>
         <div class="col-md-9">
          <input type="text" class="form-control" name="USER" value="<?= $usuario->USER ?>" required >
        </div>
      </div>  
      <div class="form-group">
       <label for="NOMBRES" class="col-md-3 control-label">Nombres</label>
       <div class="col-md-9">
        <input type="text" class="form-control" name="NOMBRES" value="<?= $usuario->NOMBRES ?>" required>
      </div>
    </div>    
    <div class="form-group">
     <label for="P_APELLIDO" class="col-md-3 control-label">Primer Apellido</label>
     <div class="col-md-9">
      <input type="text" class="form-control" name="P_APELLIDO" value="<?= $usuario->P_APELLIDO ?>" required>
    </div>
  </div>    
  <div class="form-group">
   <label for="S_APELLIDO" class="col-md-3 control-label">Segundo Apellido</label>
   <div class="col-md-9">
    <input type="text" class="form-control" name="S_APELLIDO" value="<?= $usuario->S_APELLIDO ?>" >
  </div>
</div>  
<div class="form-group">
  <label for="PASS_ACTUAL" class="col-md-3 control-label">Contraseña Actual</label>
  <div class="col-md-6">
    <input type="password" class="form-control" id="PASS_ACTUAL" name="PASS_ACTUAL" value="<?= $usuario->PASS ?>" onblur="validarPasswordActual();">
  </div>
  <div class="col-md-3" id="msjActual"> </div>
</div>   
<div class="form-group">
  <label for="PASS_NUEVA" class="col-md-3 control-label">Nueva Contraseña</label>
  <div class="col-md-6">
    <input type="password" class="form-control" id="PASS_NUEVA"  name="PASS_NUEVA"  >
  </div>

</div>  
<div class="form-group">
  <label for="CONFIRMAR" class="col-md-3 control-label" >Confirmar Contraseña</label>
  <div class="col-md-6">
    <input type="password" class="form-control" id="CONFIRMAR" onblur="validarPasswords();">
  </div>
  <div class="col-md-3" id="msjConfirmar"> </div>
</div>               
<div class="form-group">
  <label for="EMAIL" class="col-md-3 control-label">E-mail:</label>
  <div class="col-md-9">
   <input type="email" class="form-control" name="EMAIL" value="<?= $usuario->EMAIL ?>" required>
 </div>
</div>  
<div class="form-group">
  <label for="INICIO_MES" class="col-md-3 control-label">Días Inicio mes</label>
  <div class="col-md-2">
    <input type="number" class="form-control" name="INICIO_MES" value="<?= $usuario->INICIO_MES ?>" required>
  </div>
</div>  
<div class="form-group">
<label for="FIN_MES" class="col-md-3 control-label">Días Fin mes</label>
  <div class="col-md-2">
    <input type="number" class="form-control" name="FIN_MES" value="<?= $usuario->FIN_MES ?>" required>
  </div>
</div>   
<div class="form-group">
 <div class="col-md-9 col-md-offset-2">
  <button type="submit" class="btn btn-success">Guardar</button>
</div>
</div>
</fieldset>
<?=   form_close(); ?>


</div>
<div class="col-md-2"></div>
</div>
</div>  
</div>
</div>
<?php $this->load->view('overall/footer'); ?> 

</body>
</html>