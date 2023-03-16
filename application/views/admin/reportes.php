

<div class="container ">	

<?php
if(isset($acciones)){
  $contador=0;
  echo '<div class="row starter-container"> ';
  foreach ($acciones as $accion) {
    $nombre_accion=$accion['nombre'];
    $enlace_accion=$accion['enlace'];
    $imagen_accion=$accion['icono'];
    echo '<div class="col-sm-3"><div class="thumbnail">  <a href="'.site_url($enlace_accion).'">';
    echo '<img src="'.base_url().'assets/img/web/'.$imagen_accion.'" alt="Nature" style="width:100%">';
    echo '<div class="caption">';
    echo '<p>'.$nombre_accion.'</p>';
    
    echo ' </div> </a> </div></div>';
    $contador++;
    if($contador>3){
       echo '</div><div class="row starter-container">';
       $contador=0;
     }
  }
  echo '</div></div>';
}
?>
		<?php 
		   if (isset($nav)){if($nav=="inicio")
              echo '<img src="'.base_url().'/assets/img/administracion.jpg" class="img-thumbnail img-responsive" alt="Administracion de productos">';			
           }
      if(isset($html_init)) echo $html_init;     
      if(isset($output))   echo $output; 
      if(isset($html_end)) echo $html_end;
       

		?>
</div>

 <!-- Bootstrap core JavaScript
    ================================================== -->
  <?php  if($output=='')  {?>
    <script src="<?php echo base_url();?>assets/grocery_crud/js/jquery-1.11.1.min.js"></script>
    
  <?php } ?>
    <!-- Placed at the end of the document so the pages load faster -->
   <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- SIN NN<script src="<?php echo base_url();?>assets/bootstrap/win/docs.min.js"></script>-->
    

</body>
</html>
