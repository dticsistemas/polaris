 </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong><?=TITLE_SYSTEM?> <a href="https://kitsoft.com.bo"> KitSoft-Desarrollo</a>.</strong> 
    Sistema Manejo de Huertas Frutales.
  </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/dist/js/demo.js"></script>

<?php 

if (isset($datepicker)){
echo '<script src="'.base_url().'assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>'."\n";
echo '<script src="'.base_url().'assets/bower_components/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js"></script>';
}
if (isset($daterangepicker)){
echo '<script src="'.base_url().'assets/bower_components/moment/min/moment.min.js"></script>';
echo '<script src="'.base_url().'assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>';
}
if (isset($charts)){
echo '<script src="'.base_url().'assets/bower_components/raphael/raphael.min.js"></script>';
echo '<script src="'.base_url().'assets/bower_components/morris.js/morris.min.js"></script>';
if(isset($caterin_global)){
?>
<script>

 
new  Morris.Bar({
  element: 'revenue-chart',
  data: [
  <?php
  $n_orden='';
   
  foreach ($caterin_global as $data) {
   echo $n_orden.'{ y: "'.$data['nombre'].'", emitidos: '.$data['emitidos'].', olvidados:'.$data['olvidados'].' ,anulados:'.$data['anulados'].',transferidos:'.$data['transferidos'].',faltantes:'.$data['faltantes'].'}';
   
  
   $n_orden=',';
  }

  ?>    
  ],
  barColors: ['#00a65a','#f56954','#f39c12','#3c8dbc', '#00c0ef'],
  xkey: 'y',
  ykeys: ['emitidos', 'olvidados','faltantes','anulados','transferidos'],
  labels: ['Nro Tickets', 'Nro Olvidados','Nro Pendientes','Nro Anulados','Nro Transferidos']
});
</script>

<?php
}
}
if(isset($js_files))
foreach($js_files as $file): ?>
<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<script type="text/javascript">
   <?php
 //Date range picker
  if (isset($daterangepicker)){ ?>
    $('#reservation').daterangepicker({
    locale: {
            format: 'DD/MM/YYYY'
            }
    });        

    <?php
  }
  ?>
   //Date picker
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd',
      language: 'es',
      autoclose: true
    });
 var url = window.location; 
    //alert(url);
      // Will only work if string in href matches with location 
  $('.treeview-menu li a[href="' + url + '"]').parent().addClass('active'); 
  // Will also work for relative and absolute hrefs 
  $('.treeview-menu li a').filter(function() { return this.href == url; }).parent().parent().parent().addClass('active');

<?php

if(isset($eventual)){

echo ' $(document).ready(function()';
echo '{';
echo '$( ".datepicker-input" ).datepicker( "option", "minDate", "'.date('d/m/Y').'" );';
echo '});';
}

?>

</script>
</body>
</html>
