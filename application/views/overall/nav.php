<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style="font-size: 17px" href="<?= base_url(); ?>"><b>Gastos</b>  <b></b></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
     <ul class="nav navbar-nav">
      <li class="dropdown ">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"> Conceptos <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="<?= base_url(); ?>conceptos">Listar</a></li>
          <li class="divider"></li>
          <li><a href="<?= base_url(); ?>conceptos/agregar">Agregar</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav">
      <li class="dropdown ">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"> Créditos <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="<?= base_url(); ?>creditos">Listar</a></li>
          <li class="divider"></li>
          <li><a href="<?= base_url(); ?>creditos/agregar">Agregar</a></li>
          <li class="divider"></li>
          <li><a href="<?= base_url(); ?>creditos/agregarAbono">Pago</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav">
      <li class="dropdown ">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"> Transacciónes <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="<?= base_url(); ?>transacciones">Todas</a></li>
          <li class="divider"></li>
          <li><a href="<?= base_url(); ?>transacciones/ingresos">Ingresos</a></li>
          <li class="divider"></li>
          <li><a href="<?= base_url(); ?>transacciones/gastos">Gastos</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav">
      <li><a href="<?= base_url(); ?>home"> Informe <i class="fa fa-pie-chart" aria-hidden="true"></i></a></li> 
    </ul>
    <ul class="nav navbar-nav">
    <li><a href="<?= base_url(); ?>home/transportes"> Transportes <i class="fa fa-bus" aria-hidden="true"></i></a></li> 
    </ul>
    <ul class="nav navbar-nav">
      <li><a href="<?= base_url(); ?>home/deudas"> Endeudamiento <i class="fa fa-line-chart" aria-hidden="true"></i></i></a></li> 
    </ul>
    <ul class="nav navbar-nav">
     <li><a href="<?= base_url(); ?>home/backup"> Backup <i class="fa fa-database" aria-hidden="true"></i></i></a></li> 
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