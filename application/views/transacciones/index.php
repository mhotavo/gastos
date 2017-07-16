 
<?php $this->load->view('overall/header'); ?>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/plugins/datatables/css/dataTables.bootstrap.css">

<body>
  <?php $this->load->view('overall/nav'); ?>
  <div id="container">
    <h2 align="center"></h2>
    <div class="">
      <div class="col-md-2"></div>
      <div class="col-md-8">

        <table class="table table-striped table-hover dataTable" id="">
          <thead>
            <tr>
              <th colspan="5" class="text-center info">TRANSACCIONES</th>
            </tr>
            <tr>
              <th width="" class="hidden-xs">Concepto</th>
              <th width="25%">Descripción</i></th>
              <th width="" class="hidden-xs">Fecha</i></th>
              <th width="">Valor</i></th>
              <th width="" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>
            </tr>
          </thead>
          <tbody style="font-size: 14px"> 

            <?php 
            foreach ($transacciones as $key => $row) 
            {  
              if ($row->TIPO=='G') {
                echo '<tr class="text-danger bold">';
              } else {
               echo '<tr class="text-success bold">';
             }
             echo '<td class="hidden-xs">'. mb_strtoupper($row->CONCEPTO).'</td>';
             echo '<td>'. mb_strtoupper($row->DESCRIPCION).'</td>';
             echo '<td class="hidden-xs">'. mb_strtoupper($row->FECHA).'</td>';
             echo '<td> $ '. number_format($row->VALOR, 0, '.', '.').'</td>';
             ?>
             <td >
              <a  class="btn btn-warning" href="<?php echo base_url(); ?>transacciones/editar/<?php echo $row->ID_TRANSACCION; ?>"><i class="fa fa-cog" aria-hidden="true"></i></a> 
              <a  class="btn btn-danger" onclick="DeleteItem('¿Está seguro de eliminar esta transaccion?', '<?php echo base_url(); ?>transacciones/eliminar/<?php echo $row->ID_TRANSACCION ?>')" >
                <i class="fa fa-trash" aria-hidden="true"></i>
              </a> 
            </td>
            <?php
            echo '</tr>';
          }   
          ?>

        </tbody>
      </table>

    </div>
    <div class="col-md-2"></div>
  </div>  
</div>
<?php $this->load->view('overall/footer'); ?>
<script type="text/javascript" src="<?= base_url(); ?>public/plugins/datatables/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>public/plugins/datatables/js/dataTables.bootstrap.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.dataTable').DataTable({
      "iDisplayLength": -1,
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
      "autoWidth": true,           
      "sPaginationType": "full_numbers",
      "order": [[ 2, 'desc' ]]
    });
  } );
</script>
</body>
</html>   