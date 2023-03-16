<div class="container">
	<div class="alert alert-info starter-container"><h4>Optimizar imagenes de la WEB</h4>
        <p class="text-center"> Realizar el redimensionamiento para las imagenes de productos 
        su subidas hasta este momento: </p>
        <div class="row starter-container"><div class="col-sm-3"></div>
        <div class="col-sm-6"> 
		<form action="<?php echo base_url();?>admin/optimizar_imagenes" method="post" class="form-horizontal" role="form">  
		  <div class="form-group">		   
		  	<?php 
				if(isset($mensaje)){
				   echo '<div class="alert alert-success">'.$mensaje.'</div>';
				}
		  	?>
		     <button name="butt_optimizar_imagenes" type="submit" class="btn btn-primary btn-block">Redimensionar Imagenes</button>            
		  </div>
		</form>
        </div>
        <div class="col-sm-3"> </div>
</div>	