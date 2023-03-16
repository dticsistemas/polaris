<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="author" content="kitsoft">
    <link rel="icon" href="<?php echo base_url();?>assets/img/favicon.ico">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/estilo.css" rel="stylesheet">
     <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top navbartitleadmin">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url('admin')?>"><img class="starter-logo img-responsive" src="<?php echo base_url();?>assets/img/logo_empresa_smallest.png" alt="logo empresa"></a>
       
        </div>
        <div id="navbar" class="navbar-collapse collapse">          
          <ul class="nav navbar-nav navbar-right">            
            <li <?php  if (isset($nav)) {if($nav=="catalogo") echo 'class="active"'; }?>><a href="<?php echo base_url();?>admin/catalogo">CATALOGO</a></li>  
            <li <?php  if (isset($nav)) {if($nav=="ventas") echo 'class="active"'; }?>><a href="<?php echo base_url();?>admin/modulo_ventas">VENTAS</a></li>                       
            <li <?php  if (isset($nav)) {if($nav=="admin_web") echo 'class="active"'; }?>><a href="<?php echo base_url();?>admin/admin_web">ADMINISTRACION</a></li>

            <li <?php  if (isset($nav)) {if($nav=="report") echo 'class="active"'; }?>><a href="<?php echo base_url();?>admin/reportes">REPORTES</a></li>                     
            <li <?php  if (isset($nav)) {if($nav=="inventario") echo 'class="active"'; }?>><a href="<?php echo base_url();?>admin/inventario">INVENTARIOS</a></li>
            <li <?php  if (isset($nav)) {if($nav=="sistema") echo 'class="active"'; }?>><a href="<?php echo base_url();?>admin/sistema">CONFIGURACION</a></li>
            <li class="dropdown nav_user <?php  if (isset($nav)) {if($nav=="usuario")echo 'active'; }?>">              
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-user"> </span> 
                <?php echo  ' '.strtoupper($usuario['username']);?> <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url();?>admin/perfil_usuario">Perfil de Usuario</a></li>
                <li><a href="<?php echo base_url();?>admin/cambiar_password">Cambiar Password</a></li>                
                <li class="divider"></li>
                <li><a href="<?php echo base_url();?>login/salir">Salir</a></li>
              </ul>
            </li>




          </ul>          
        </div>
      </div>
    </nav>