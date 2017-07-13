<html>
<head>
  <?php $this->load->view('overall/header'); ?>
</head>
<body>
  <?php     $this->load->view('overall/nav'); ?>
  <div  class="container"> <!-- box-principal -->
    <h3  align="center">Mi Perfil</h3>
    <br>
    <div class="panel panel-success">
     <div class="panel-heading">
       <h3 class="panel-title" align="center"><?php #echo $datos['NOMBRES'] ." ". $datos['P_APELLIDO']." ". $datos['S_APELLIDO'] ; ?></h3>
     </div>
     <div class="panel-body">
      <div class="row">
       <div class="col-md-4">
        <div class="panel panel-default">
         <div class="panel-body">
          <img class="img-responsive" src="<?php #echo URL;?>HTML/Miperfil/avatars/<?php #echo  !empty($datos['IMAGEN']) ? $datos['IMAGEN'] : 'no-image.png'    ; ?>" required>
        </div>
      </div>
    </div>
    <div class="col-md-8">
     <?=  form_open_multipart('perfil/update', 'class="form-horizontal"');  ?>
     <!-- <form class="form-horizontal" enctype="multipart/form-data" method="POST"> -->
     <fieldset>
       <div class="form-group">
         <label for="inputUser" class="col-md-3 control-label">Usuario</label>
         <div class="col-md-9">
          <input type="text" class="form-control" name="inputUser" value="<?php #echo $datos['USER']; ?>" required >
        </div>
      </div> 
      <div class="form-group">
        <label for="inputDocumento" class="col-md-3 control-label">Documento</label>
        <div class="col-md-9">
          <input type="text" class="form-control" name="inputDocumento" value="<?php #echo $datos['DOC']; ?>" required>
        </div>
      </div>   
      <div class="form-group">
       <label for="inputNombres" class="col-md-3 control-label">Nombres</label>
       <div class="col-md-9">
        <input type="text" class="form-control" name="inputNombres" value="<?php #echo $datos['NOMBRES']; ?>" required>
      </div>
    </div>    
    <div class="form-group">
     <label for="inputPrimerApellido" class="col-md-3 control-label">Primer Apellido</label>
     <div class="col-md-9">
      <input type="text" class="form-control" name="inputPrimerApellido" value="<?php #echo $datos['P_APELLIDO']; ?>" required>
    </div>
  </div>    
  <div class="form-group">
   <label for="inputSegundoApellido" class="col-md-3 control-label">Segundo Apellido</label>
   <div class="col-md-9">
    <input type="text" class="form-control" name="inputSegundoApellido" value="<?php #echo $datos['S_APELLIDO']; ?>" >
  </div>
</div>  
<div class="form-group">
  <label for="inputSegundoApellido" class="col-md-3 control-label">Contraseña Actual</label>
  <div class="col-md-6">
    <input type="password" class="form-control" id="actual" name="actual" onblur="validarPasswordActual();">
  </div>
  <div class="col-md-3" id="msjActual"> </div>
</div>   
<div class="form-group">
  <label for="inputSegundoApellido" class="col-md-3 control-label">Nueva Contraseña</label>
  <div class="col-md-6">
    <input type="password" class="form-control" id="nueva"  name="nueva"  >
  </div>

</div>  
<div class="form-group">
  <label for="inputSegundoApellido" class="col-md-3 control-label" >Confirmar Contraseña</label>
  <div class="col-md-6">
    <input type="password" class="form-control" id="confirmar" onblur="validarPasswords();">
  </div>
  <div class="col-md-3" id="msjConfirmar"> </div>

</div>
<div class="form-group">
  <label for="selectGenero" class="col-md-3 control-label">Género</label>
  <div class="col-md-9">
    <select class="form-control" name="selectGenero">
     <option value="">[...]</option>
     <option value="F" <?php #echo ($datos['GENERO']=='F') ? "selected" : NULL ?> >Femenino</option>
     <option value="M"  <?php #echo ($datos['GENERO']=='M') ? "selected" : NULL ?>>Masculino</option>
   </select>
 </div>
</div>                 
<div class="form-group">
 <label for="inputEmail" class="col-md-3 control-label">E-mail:</label>
 <div class="col-md-9">
  <input type="email" class="form-control" name="inputEmail" value="<?php #echo $datos['EMAIL']; ?>" required>
</div>
</div>   
<div class="form-group">
 <label for="inputImagen" class="col-md-3 control-label">Imagen</label>
 <div class="col-md-9">
  <input type="file" class="form-control" name="inputImagen" >
</div>
</div>
<div class="form-group">
  <label for="fechaIngreso" class="col-md-3 control-label">Fecha de Registro</label>
  <div class="col-md-9">
    <input type="date" class="form-control" disabled name="fechaIngreso" value="<?php #echo $datos['FECHA_REGISTRO']; ?>" >
  </div>
</div>


<div class="form-group">
 <div class="col-md-9 col-md-offset-2">
  <input type="hidden" class="form-control" id="id"  name="id" required value="<?php #echo $datos['ID']; ?>" >
  <input type="hidden" class="form-control" id="nombreImagen" name="nombreImagen"   value="<?php #echo $datos['IMAGEN']; ?>" >
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