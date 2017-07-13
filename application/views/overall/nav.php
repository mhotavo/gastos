<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style="font-size: 17px" href="<?= base_url(); ?>"><b>Logs</b>  <b></b></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
       <li><a href="<?= base_url(); ?>logs/agregar"> Agregar  <i class="fa fa-key" aria-hidden="true"></i></a></li> 
     </ul>
     <ul class="nav navbar-nav">
       <li><a href="<?= base_url(); ?>"> Activos <i class="fa fa-list" aria-hidden="true"></i></i></a></li> 
     </ul>
     <ul class="nav navbar-nav">
       <li><a href="<?= base_url(); ?>logs/inactivos"> Inactivos <i class="fa fa-list" aria-hidden="true"></i></i></a></li> 
     </ul>
     <ul class="nav navbar-nav">
     <li><a href="<?= base_url(); ?>logs/backup"> Backup <i class="fa fa-pc" aria-hidden="true"></i></i></a></li> 
     </ul>
     <ul class="nav navbar-nav navbar-right">
       <li>
         <a> <?php echo ucwords($this->session->userdata('name')); ?>  <i class="fa fa-user" aria-hidden="true"></i></i></a>
       </li> 
       <li><a href="<?= base_url(); ?>login/logout">  Salir  <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
     </ul>
   </div>
 </div>
</nav>