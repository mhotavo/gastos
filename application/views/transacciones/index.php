 
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
              <th><i class="fa fa-bed" aria-hidden="true"></i></th>
              <th>Lugar</th>
              <th>Fecha</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody> 
            <?php 
            $ant='';
            $next='';
            $dias='';
            foreach ($transacciones as $key => $row) 
            {

              ?>
              <tr>           
                <?php switch ( $row->TIPO) {
                  case 'Andres':
                  
                  if ($ant!='') {
                    $datetime1 = new DateTime($ant);
                    $datetime2 = new DateTime($row->FECHA);
                    $interval = $datetime1->diff($datetime2);
                   # $dias=$interval->format('Ciclo de %R%a días');
                    $dias=$interval->format('Ciclo de %a días');
                    $ant=$row->FECHA;

                  } else {
                    $ant=$row->FECHA;
                  }
                  echo "<td>";
                  echo '<a style="text-decoration: none;" href='.base_url().'eventos/ver/'.$row->ID_EVENTO.'">' ;
                  echo '<img src="'.base_url().'public/images/andres.png" alt="Sex" width="40">';
                  echo "</td>";
                  echo ' <td> '.$dias.' </td>';
                  echo ' <td>'.$row->FECHA.'</td>';
                  break;
                  case 'Sex':
                  echo "<td>";
                  echo '<a style="text-decoration: none;" href='.base_url().'eventos/ver/'.$row->ID_EVENTO.'">' ;
                  echo '<img src="'.base_url().'public/images/sex.png" alt="Sex" width="60">';
                  echo "</td>";
                  echo ' <td>'.$row->LUGAR.'</td>';
                  echo ' <td>'.$row->FECHA.'</td>';
                  break;
                  case '69':
                  echo "<td>";
                  echo '<a style="text-decoration: none;" href='.base_url().'eventos/ver/'.$row->ID_EVENTO.'">' ;
                  echo '<img src="'.base_url().'public/images/69.png" alt="Total 69" width="70">';
                  echo "</td>";
                  echo ' <td>'.$row->LUGAR.'</td>';
                  echo ' <td>'.$row->FECHA.'</td>';
                  break;
                  case 'El':
                  echo "<td>";
                  echo '<a style="text-decoration: none;" href='.base_url().'eventos/ver/'.$row->ID_EVENTO.'">' ;
                  echo '<img src="'.base_url().'public/images/oralElla.png" alt="Oral a el" width="40">';
                  echo "</td>";
                  echo ' <td>'.$row->LUGAR.'</td>';
                  echo ' <td>'.$row->FECHA.'</td>';
                  break;
                  case 'Ella':
                  echo "<td>";
                  echo '<a style="text-decoration: none;" href='.base_url().'eventos/ver/'.$row->ID_EVENTO.'">' ;
                  echo '<img src="'.base_url().'public/images/oralEl.png" alt="Oral a ella" width="70">';
                  echo "</td>";
                  echo ' <td>'.$row->LUGAR.'</td>';
                  echo ' <td>'.$row->FECHA.'</td>';
                  break;
                  case 'Inyeccion':
                  echo "<td>";
                  echo '<a style="text-decoration: none;" href='.base_url().'eventos/ver/'.$row->ID_EVENTO.'">' ;
                  echo '<img src="'.base_url().'public/images/inyeccion.png" alt="Cyclofem" width="50">';
                  echo "</td>";
                  echo ' <td>'.$row->DESCRIPCION.'</td>';
                  echo ' <td>'.$row->FECHA.'</td>';
                  break;
                }   ?> </a>
              </td>
              <td>
                <a  class="btn btn-warning" href="<?= base_url(); ?>eventos/editar/<?php echo  $row->ID_EVENTO; ?>"><i class="fa fa-cog" aria-hidden="true"></i></a> 
                <a  class="btn btn-danger" onclick="DeleteItem('¿Está seguro de eliminar este evento?','<?= base_url(); ?>eventos/eliminar/<?php echo  $row->ID_EVENTO; ?>')" ><i class="fa fa-trash" aria-hidden="true"></i></a> 
              </td>
            </tr>
            <?php 
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
      "iDisplayLength": 25,
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
      "autoWidth": false,           
      "sPaginationType": "full_numbers",
      "order": [[ 2, 'desc' ]]
    });
  } );

      //Calcular duración ciclo



    </script>
  </body>
  </html>   