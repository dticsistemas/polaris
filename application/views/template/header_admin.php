<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=TITLE_SYSTEM?> | <?=SUBTITLE_SYSTEM?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="description" content="sistema manejo de huertas">
  <meta name="keywords" content="">
  <meta name="author" content="leonmc">

  <?php
  if(!isset($experiencias)){
    $experiencias=array();
  }
  if(!isset($programaciones)){
    $programaciones=array();
  }
  if(!isset($notificaciones)){   
    $notificaciones=array();
  }
  $h_meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                   $h_day=date('d');
                   $h_month=date('m');
                   $h_year=date('Y');

  if(isset($_SESSION['name'])){
    $name=$_SESSION['name'];
  }else
  $name=" NN ";
  
  if(isset($calendario)){
  echo '<link rel="stylesheet" href="'.base_url().'assets/plugins/iCheck/all.css">'."\n";
  echo '<link rel="stylesheet" href="'.base_url().'assets/bower_components/fullcalendar/dist/fullcalendar.min.css">'."\n";
  echo '<link rel="stylesheet" href="'.base_url().'assets/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">'."\n";
  }
  if(isset($datepicker))
    echo '<link rel="stylesheet" href="'.base_url().'assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">'."\n";
  if(isset($charts))
  echo '<link rel="stylesheet" href="'.base_url().'assets/bower_components/morris.js/morris.css">'."\n";

  ?>  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<?php 
if(isset($daterangepicker))
    echo '<link rel="stylesheet" href="'.base_url().'assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">';

if(isset($css_files))
foreach($css_files as $file): ?>
  <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

</head>
<body class="hold-transition skin-yellow sidebar-mini">

<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url()?>home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SFH</b></span>
      <!-- logo for regular state and mobile devices -->

      <span class="logo-lg " style="text-align: left;">
                 
              <img class="img" width="40px" height="40px"  src="<?=base_url()?>assets/img/logoa.png" alt="Logo Sisfrut" ><!-- /.direct-chat-img -->
              <?=TITLE_SYSTEM_2?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="<?=base_url()?>" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav"> 
         <!-- Notificaciones: style can be found in dropdown.less -->
        <li class="dropdown notifications-menu ">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <i class="fa fa-bell-o"></i>
              
              <?php 
                if(count($notificaciones)>0)
                  echo '<span class="label label-success">'.count($notificaciones).'</span>';                
              ?>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tu tienes <?=count($notificaciones)?> notificaciones</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                 <?php

                      foreach ($notificaciones as $nota) {
                        $mensaje=$nota['mensaje'];
                        $tipo   =$nota['tipo'];
                        $id     =$nota['id'];
                        $estilo='fa fa-users text-aqua';
                        switch ($tipo) {
                          case 'Informativo':
                              $estilo='fa fa-info-circle text-aqua';
                            break;
                          case 'Advertencia':
                              $estilo='fa fa-warning text-yellow';
                            break;
                          case 'Mensaje':
                              $estilo='fa fa-envelope text-green';
                            break;
                          case 'Critico':
                              $estilo='fa  fa-times-circle text-red';
                            break;   
                        }

                        echo '<li>';
                        echo '  <a href="'.base_url().'gestion/notificaciones/read/'.$id.'">';
                        echo '    <i class="'.$estilo.'"></i>';
                        echo $mensaje;
                        echo '  </a>';
                        echo '</li>';
                      }
                    ?>
                  
                 
                </ul>
              </li>
              <li class="footer"><a href="<?=base_url()?>reportes/notificaciones">Ver Todas las Notificaciones</a></li>
            </ul>
          </li>                      
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>             
              <?php 
                if(count($programaciones)>0)
                  echo '<span class="label label-danger">'.count($programaciones).'</span>';                
              ?>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tareas programadas:</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                 <?php

                      foreach ($programaciones as $nota) {
                      	$porcentaje=50;
                        $mensaje=$nota['descripcion'];
                        $tipo   =$nota['tipo'];
                        $id     =$nota['id'];
                        $fecha_estimada=$nota['fecha_estimada'];
                        $fecha_limite  =$nota['fecha_limite'];
                        $fecha_actual  =date('Y-m-d');

                        $date1 = new DateTime($fecha_estimada);
						$date2 = new DateTime($fecha_limite);
						$date3 = new DateTime($fecha_actual);
						$diff = $date1->diff($date2);
						$diff2= $date1->diff($date3);
						if($date1>$date3){
							//echo "Aun no empezo";
							$porcentaje=2;
						}else{
							$total=$diff->days;
							$falta=$diff2->days;
							$x=$falta*100;
							$y=$total;
							$porcentaje= ($x - ($x % $y)) / $y;
              if($porcentaje<=0) 
                $porcentaje=10;
							//echo  $total." de ".$falta." = ".$x.','.$y;
						}			
					                        
                        $estilo='info';
                        switch ($tipo) {
                          case 'Programado':
                              $estilo='success';
                            break;
                          case 'Preventivo':
                              $estilo='info';
                            break;
                          case 'Urgente':
                              $estilo='warning';
                            break;
                          case 'Critico':
                              $estilo='danger';
                            break;   
                        }                        
                     ?>
	<li><!-- Task item -->
        <a href="<?=base_url()?>gestion/programaciones/read/<?=$id?>">
          <h3>
            <?=$mensaje?>
            <small class="label label-<?=$estilo?> pull-right"><?=$porcentaje?>%</small>
          </h3>
          <div class="progress xs">
            <div class="progress-bar progress-bar-<?=$estilo?>" style="width: <?=$porcentaje?>%" role="progressbar"
                 aria-valuenow="10" aria-valuemin="0" aria-valuemax="200">
              <span class="sr-only"><?=$porcentaje?>% Completado</span>
            </div>
          </div>
        </a>
     </li>

                     <?php
                      }
                    ?>

                  
                  <!-- end task item -->
                </ul>
              </li>              
            </ul>
          </li>
           <!-- Experiencias: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-lightbulb-o "></i>
                          
              <?php 
                if(count($experiencias)>0)
                  echo '<span class="label label-info">'.count($experiencias).'</span>';                
              ?>
            </a>
            <ul class="dropdown-menu">
            <li class="header">Experiencias Realizadas:</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
               <?php

                      foreach ($experiencias as $nota) {
                      	$porcentaje=50;
                        $mensaje=$nota['nombre'];                        
                        $id     =$nota['id'];
                        $fecha_estimada=$nota['fecha_inicio'];
                        $fecha_limite  =$nota['fecha_fin'];
                        $fecha_actual  =date('Y-m-d');

                      
                        $date1 = new DateTime($fecha_estimada);
						$date2 = new DateTime($fecha_limite);
						$date3 = new DateTime($fecha_actual);
						$diff = $date1->diff($date2);
						$diff2= $date1->diff($date3);
						if($date1>$date3){
							//echo "Aun no empezo";
							$porcentaje=2;
						}else{
							$total=$diff->days;
							$falta=$diff2->days;
							$x=$falta*100;
							$y=$total;
							$porcentaje= ($x - ($x % $y)) / $y;
							//echo  $total." de ".$falta." = ".$res;
						}			
					                        
                        if ($porcentaje<25)
                              $estilo='success';
                        else  if ($porcentaje<50)                          
                              $estilo='info';
                        else  if ($porcentaje<75)   
                              $estilo='warning';
                        else  if ($porcentaje<100)   
                              $estilo='danger';
                                                 
                     ?>
	<li><!-- Task item -->
        <a href="<?=base_url()?>gestion/experiencias/edit/<?=$id?>">
          <h3>
            <?=$mensaje?>
            <small class="pull-right"><?=$porcentaje?>%</small>
          </h3>
          <div class="progress xs">
            <div class="progress-bar progress-bar-<?=$estilo?>" style="width: <?=$porcentaje?>%" role="progressbar"
                 aria-valuenow="10" aria-valuemin="0" aria-valuemax="200">
              <span class="sr-only"><?=$porcentaje?>% Completado</span>
            </div>
          </div>
        </a>
     </li>

                     <?php
                      }
                    ?>

                  
                  <!-- end task item -->   
                  </ul>
              </li>        
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$name?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?=$_SESSION['name']?> - Administrador
                  <small>
                  <?php
                   
                   echo $h_day." de ".$h_meses[$h_month-1]." del ".$h_year;
                  ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row text-center">
                  <?=SUBTITLE_SYSTEM?>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url()?>logout" class="btn btn-default btn-flat">Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['name'] ;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>      
      <!-- sidebar menu: : style can be found in sidebar.less -->       
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU NAVEGACION</li>
        <li>
          <a href="<?=base_url()?>home">
            <i class="fa fa-home"></i> <span>Inicio</span>
            <span class="pull-right-container">
            </span>
          </a>          
        </li> 
       
        <li>
          <a href="<?=base_url()?>gestion/actividades">
            <i class="fa fa-tasks"></i> <span>Actividades</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-blue">Admin</small>
            </span>
          </a>
        </li>  
        <li>
          <a href="<?=base_url()?>gestion/programaciones">
            <i class="fa fa-clock-o"></i> <span>Programacion</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">Tareas</small>
            </span>
          </a>
        </li> 
        <li>
          <a href="<?=base_url()?>gestion/notificaciones">
            <i class="fa fa-commenting-o"></i> <span>Notificaciones</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"> Notas&nbsp; </small>
            </span>
          </a>
        </li>         
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-share-alt"></i>
            <span>Gestionar </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">              
             <li><a href="<?=base_url()?>gestion/compras"><i class="fa  fa-shopping-cart text-red"></i> Registrar Compras </a></li>  
             <li><a href="<?=base_url()?>gestion/ventas"><i class="fa  fa-shopping-cart text-green"></i> Registrar Ventas </a></li> 
             <li><a href="<?=base_url()?>gestion/gastos"><i class="fa  fa-money text-yellow"></i> Registrar Gastos </a></li>    
             <li><a href="<?=base_url()?>gestion/clientes"><i class="fa  fa-group"></i>  Registrar Clientes </a></li>  
             <li><a href="<?=base_url()?>gestion/experiencias"><i class="fa  fa-flask"></i>  Experimentacion</a></li> 
             <li><a href="<?=base_url()?>gestion/viajes"><i class="fa  fa-automobile "></i> Registrar Viajes </a></li>                                             
          </ul>
        </li>                     
          <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li> <a href="<?=base_url()?>reportes/mapa"><i class="fa fa-circle-o"></i> Visualizar MAPAS</a></li>          
          </ul>
        </li>               
        
        <li class="header">CONFIGURACION</li>
           <?php if($_SESSION['is_admin'])   {?>  

         <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Administracion</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">            
            <li><a href="<?=base_url()?>administracion/admin_terrenos"><i class="fa fa-building"></i> Terreno Huerta</a></li>
            <li><a href="<?=base_url()?>administracion/admin_zonas"><i class="fa fa-map-o"></i> Area Zonas</a></li>   
            <li><a href="<?=base_url()?>administracion/admin_arboles"><i class="fa  fa-leaf text-olive"></i>Arboles/ Zona</a></li>                         
            <li><a href="<?=base_url()?>administracion/admin_variedades"><i class="fa fa-pagelines"></i>Tipo de Variedades</a></li>   
            <li><a href="<?=base_url()?>administracion/admin_tareas"><i class="fa fa-cubes"></i>Tipo de Tareas</a></li>                         
            <li><a href="<?=base_url()?>administracion/admin_materiales"><i class="fa  fa-flask"></i>Insumos</a></li>  
            <li><a href="<?=base_url()?>administracion/admin_herramientas"><i class="fa fa-wrench"></i>Herramientas</a></li>   


          </ul>
        </li>  
         <li>
          <a href="<?=base_url()?>administracion/admin_personas"> 
            <i class="fa fa-group"></i> <span>Gestionar Personas</span>
            <span class="pull-right-container">
            </span>
          </a>          
        </li> 
         <?php } ?> 
        <?php if($_SESSION['is_admin'])   {?>  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-modx"></i>
            <span>Sistema </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>administracion/admin_configuracion"><i class="fa  fa-gears"></i> Configuracion <?=TITLE_SYSTEM?></a></li>          
            <li> <a href="<?= base_url('register')?>"><i class="fa  fa-user-plus"></i> Registrar Usuario</a></li>
            <li><a href="<?=base_url()?>administracion/admin_bitacora"><i class="fa fa-list"></i> Bitacora</a></li>
            <li><a href="<?=base_url()?>administracion/admin_usuarios"><i class="fa fa-users"></i>Usuarios</a></li>                                               
          </ul>
        </li>
        <?php } ?>       
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

    


   