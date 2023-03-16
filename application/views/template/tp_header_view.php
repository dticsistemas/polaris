<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="kitsoft">
    <link rel="icon" href="<?php echo base_url();?>assets/img/favicon.ico">
    <title>Polaris, Venta de Productos</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/estilo.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/less/bootstrap-submenu.min.css">
     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" defer></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js" defer></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-submenu.min.js" defer></script>  
    <script src="<?php echo base_url();?>assets/less/docs.js" defer></script>

</head>
<body>


<nav class="navbar navbar-inverse navbar-fixed-top navbartitle">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>          
          <a class="navbar-brand" href="#"><img   class="starter-logo img-responsive" src="<?php echo base_url();?>assets/img/logo_empresa_small.png" alt="logo empresa"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="<?php echo base_url();?>">INICIO</a></li>
            
     <li class="dropdown">
    <a  class="dropdown-toggle" tabindex="0"  data-toggle="dropdown" data-submenu="">CATEGORIAS 
    <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <?php     

    function subcategorias($categoria,$nivel){
      $subcategorias=$categoria['sub_categorias'];
       if($subcategorias==null) {
        echo '<li>';
        echo '<a tabindex="0"  href="'.base_url().'productos/categoria/'.$categoria["id"].'">'.$categoria["nombre"].'</a>';      
        echo '</li>';
       }
       else{
        echo '<li class="dropdown-submenu">';
        echo '<a tabindex="0" href="#">'.$categoria["nombre"] .'</a>';
        echo '<ul class="dropdown-menu">';
        echo '<li>';
        echo '<a tabindex="0"  href="'.base_url().'productos/categoria/'.$categoria["id"].'">[Todos]</a>';      
        echo '</li>';
          foreach ($subcategorias as $categorias_aux) {
            subcategorias($categorias_aux,1);          
            //echo '<li><a href="#">3rd level dropdown</a></li>';
          }
        echo '</ul>';
        echo '</li>';
        }
     }
     //-----------------------   
    if(count($categorias>0))
    foreach ($categorias as $categoria) {           
       $subcategorias=$categoria['id_categoria'];
       if($subcategorias==null) {
        echo '<li>';
        echo '<a tabindex="0"  href="'.base_url().'productos/categoria/'.$categoria["id"].'">'.$categoria["nombre"].'</a>';      
        echo '</li>';
       }
       else{
        echo '<li class="dropdown-submenu">';
        echo '<a tabindex="0" href="#">'.$categoria["nombre"] .'</a>';
        echo '<ul class="dropdown-menu">';
        echo '<li>';
        echo '<a tabindex="0"  href="'.base_url().'productos/categoria/'.$categoria["id"].'">[Todos]</a>';      
        echo '</li>';
          foreach ($subcategorias as $categorias_aux) {
          //  subcategorias($categorias_aux,1);          
            //echo '<li><a href="#">3rd level dropdown</a></li>';
          }
        echo '</ul>';
        echo '</li>';
        }                   

       }
       

      ?>      
      


    </ul>
  </li>  
    
            <li><a href="<?php echo base_url();?>empresa">EMPRESA</a></li>            
            <li><a href="<?php echo base_url();?>contacto">CONTACTO</a></li>
            <li role="presentation"><a href="<?php echo base_url();?>login"><span class="glyphicon glyphicon-user"></span> LOGIN</a></li>
          </ul>
          <form method="post" action="<?php echo base_url();?>productos/listar" class="navbar-form navbar-right">
            <div class="input-group">
              <input type="text" class="form-control text-search" name="search_string_inicio" placeholder="¿Qué estás buscando?">                                        
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit" name="butt_buscar_inicio" value="ok" >
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </nav>

