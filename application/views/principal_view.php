<div class="container">
  <!-- Carousel
    ================================================== -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <?php
      $cont_slide=1;

       while ( $cont_slide< count($slideshow)) {
         echo '<li data-target="#myCarousel" data-slide-to="'.$cont_slide.'"></li>';
         $cont_slide++;
       }
    ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php  
        $cont_slide=0;        
       while ( $cont_slide<count($slideshow)) {
         $slide_aux=$slideshow[$cont_slide];
         
       
    ?>
    <div class="item <?php if ($cont_slide==0) echo " active";?>">
      <img src="<?php echo base_url();?>assets/img/web/slideshow/<?php echo $slide_aux['url'];?>" alt="Chania">
      <div class="carousel-caption">
         <p><?php echo $slide_aux['title'];?></p>
      </div>
    </div>
    <?php
        $cont_slide++;
        }
    ?>

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- End Carousel-->
      <div class="starter-template">
        <h1><?=SUBTITLE?></h1>
        <p class="lead">
          <?php echo $mensaje; ?>
        </p>
      </div>  

<div class="row">
  <h3>PRODUCTOS DESTACADOS</h3>

    <?php 
    $max=4; 
  if(count($productos_destacados)>0){
  foreach ($productos_destacados as $producto_destacado) {
    $max--;
    if($max<0) break;
        ?>
        
    <div class="col-md-3">
    <div class="thumbnail">
    <div  style="height:265px ;width:100%">
      <img src="<?php echo base_url();?>assets/img/catalogo/small/<?php echo $producto_destacado['imagen']; ?>" alt="..." style="height:105px ;width:100%" >
      <div class="caption">
        <h4><?php echo substr($producto_destacado['nombre'],0,125);?></h4>
        <p><?php            
        if($producto_destacado['nota']!=''){
          echo $producto_destacado['nota'];
        }else
           echo substr(strip_tags($producto_destacado['descripcion']),0,125)."...";
        ?></p>
        <p>
          <a href="<?php echo base_url()."producto/detalle/".$producto_destacado['id_producto'];?>" class="btn btn-primary" role="button">Ver Producto</a>
          <!--<a href="#" class="btn btn-default" role="button">+</a>-->
        </p>
      </div>
     </div> 
    </div>
    </div>


  <?php
    
  }
  }

  ?>

</div><!--/ destacados-->	

<!--/panel info-->
<div class="row">
<?php 
  if (isset($banners))
    foreach ($banners as $banner) {
      $titulo=$banner['titulo'];
      $imagen=$banner['imagen'];
      $descripcion=$banner['descripcion'];

    
  ?>
<div class="panel panel-default col-sm-6">
  <div class="panel-body"> 
    <img src="<?php echo base_url();?>assets/img/web/banners/<?=$imagen?>" class="img-responsive" alt="...">
    <h4><?=$titulo?></h4>
    <p><?=$descripcion?> </p>

   </div>
</div>

<?php
}
?>

</div>  
<!--/End panel-->
<div class="jumbotron text-center " style="padding-top: 10px; padding-bottom: 10px">
  <h2>Novedades Siguenos</h2>      
    <div class="row gi-3x">
      <div class="col-sm-3">
         <a href="" target="_blank"><span class="glyphicon glyphicon-home"></span></a>
         
      </div>    
      <div class="col-sm-3">
         <a href="" target="_blank"><span class="glyphicon glyphicon-facetime-video"></span></a>
         
      </div>  
      <div class="col-sm-3">
         <a href="" target="_blank"><span class="glyphicon glyphicon-thumbs-up"></span></a>
         
      </div>  
      <div class="col-sm-3">
         <a href="" target="_blank"><span class="glyphicon glyphicon-picture"></span></a>
         
      </div>                   
    </div>  
</div>
</div><!-- /.container -->