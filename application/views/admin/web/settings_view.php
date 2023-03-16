<div class="container">
	<div class="alert alert-info starter-container"><h4>Configuracion del sistema</h4>
        <p class="text-center"> Variables para el funcionamiento del sistema: </p>
        <div class="row starter-container"><div class="col-sm-3"></div>
        <div class="col-sm-6"> 

<form class="form-horizontal" action="<?php echo base_url();?>admin/settings" method="post"">
  
  <?php
  //print_r($settings);
  if(count($settings)>0){
	$validar_stock=$settings['validar_stock'];  	
	$mostrar_venta_realizada=$settings['mostrar_venta_realizada'];
  $clientes_sn=$settings['clientes_sn'];
  }
?>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Nombre Empresa</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pwd" placeholder="nombre Empresa">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><?php 
         echo form_checkbox('validar_stock', '1', $validar_stock);
        ?> validar stock</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
        <?php 
         echo form_checkbox('mostrar_venta_realizada', '1', $mostrar_venta_realizada);

        ?>
         Mostrar venta realizada</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
        <?php 
         echo form_checkbox('clientes_sn', '1', $clientes_sn);

        ?>
         Permitir clientes sin nombres</label>
      </div>
    </div>
  </div>
   <div class="form-group">		   
		  	<?php 
				if(isset($mensaje)){
				   echo '<div class="alert alert-success">'.$mensaje.'</div>';
				}
		  	?>
		     <button id="butt_settings" name="butt_settings" type="submit" class="btn btn-primary btn-block">Guardar</button>            
		  </div>
</form> 


		
        </div>
        <div class="col-sm-3"> </div>
</div>	