<?php $this->load->view('overall/header'); ?>
<body>
  <?php     $this->load->view('overall/nav'); ?>
  <div id="container">
    <h2 align="center"><i class="fa fa- text-danger" aria-hidden="true"></i></h2>
    <div class="col-xs-12  col-sm-6 col-sm-offset-3 ">
      <div class="row">
       <table class="table table-striped table-hover ">
        <thead>
          <tr>
            <th>DESCRIPCIÓN</th>
            <th>SALDO</th>
            <th>VENCIMIENTO</th>
            <th>ULTIMO PAGO</th>
            <th>PRÓXIMO PAGO</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table> 
    </div>
  </div>
</div>

<?php $this->load->view('overall/footer'); ?> 


</body>

</html>