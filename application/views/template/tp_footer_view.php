

	<footer class="navbar-inverse">		
      <div class="row div_footer ">
        <div class="col-sm-2">
		 <img src="<?php echo base_url();?>assets/img/logo_polaris.png" class="img-responsive">
		</div>
		<div class="col-sm-6" style="color:#fff;">
			<h4>Contactanos</h4>		   
			<ul>
				<?php 

				foreach ($sucursales as $sucursal) {
					echo '<li>'.$sucursal['nombre'];
					if($sucursal['telefono']!='')echo " &nbsp&nbsp Telf.: ".$sucursal['telefono']."<br> ";
					if($sucursal['email']!='')echo "Email.: ".$sucursal['email']."<br> ";
					echo $sucursal['direccion']."</li>";
				}

				?>				
			</ul>
		</div>
		<div class="col-sm-2"  style="color:#fff;">		 
             <h4>Acerca de nosotros</h4>
             <ul >             	
             	<li><a href="">Sala de Prensa</a></li>
             	<li><a href="http://">Responsabilidad Social</a></li>
             	<li><a href="http://" target="_blank">Trabaja con Nosotros</a></li>
             	<li><a href="http://" target="_blank">Proveedores</a>
			</ul> 
			<span style="color:#848484; font-size:11px;">
				© Copyright 2017 - Kitsoft, Inc.
			</span>            		

		</div>
		<div class="col-sm-2">
			<div class="pull-right">
		 	<a href ="*" target="_blank">
			<img src="<?php echo base_url();?>assets/img/kitsoft.png" class="img-responsive" alt="Desarrollado por www.kitsoft.com">
		    </a>
		    </div>
		</div>
      </div>	
    </footer><!-- Fin footer -->

 <!-- Bootstrap core JavaScript
    ================================================== -->
   <!-- SIN NN<script src="<?php echo base_url();?>assets/bootstrap/win/docs.min.js"></script>-->
    <script src="<?php echo base_url();?>assets/bootstrap/win/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url();?>assets/bootstrap/win/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
