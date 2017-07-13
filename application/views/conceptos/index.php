 
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
              <th width="20%" class="hidden-xs">Nombre</th>
              <th width="20%"><i class="fa fa-user" aria-hidden="true"></i></th>
              <th width="25%"><i class="fa fa-key" aria-hidden="true"></i></th>
              <th width="15%" class="hidden-xs"><i class="fa fa-calendar" aria-hidden="true"></i></th>
              <th width="20%" class="hidden-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>
            </tr>
          </thead>
          <tbody style="font-size: 14px"> 

            <?php 
            foreach ($logs as $key => $row) 
            {  
              echo '<tr>';
              echo '<td class="text-default hidden-xs"><b>'. ucwords(mb_strtolower($row->NOMBRE)).'</b></td>';
              echo '<td>'. strtolower($row->EMAIL).'</td>';
              echo '<td>'. $row->CLAVE.'</td>';
              echo '<td class="hidden-xs">'. $row->FECHA.'</td>';
              ?>
              <td class="hidden-xs">
                <a  class="btn btn-warning" href="<?php echo base_url(); ?>logs/editar/<?php echo $row->ID; ?>"><i class="fa fa-cog" aria-hidden="true"></i></a> 
                <a  class="btn btn-danger" onclick="DeleteItem('¿Está seguro de eliminar este log?', '<?php echo base_url(); ?>logs/eliminar/<?php echo $row->ID ?>')" >
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
        //"order": [[ 2, 'desc' ]]
        "order": false
      });
    } );
  </script>
</body>
</html>   