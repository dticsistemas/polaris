<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	
    function __construct()
    {
        parent::__construct();   
        $this->load->library('grocery_CRUD');
        $this->load->model('acciones_model');
        $this->load->model('sucursales_model');        
        $this->load->model('inventarios_model');
    }
    public function _example_output($output = null,$enlace = null)
    {
          if(!($this->session->has_userdata('logged_in'))){
            redirect('login');
          }else{
            $output['usuario'] = $this->session->userdata();        
            $this->load->view('admin/web/header_view.php',$output);             
            if($enlace==null)
                $this->load->view('admin/admin_view.php',$output);
            else
                $this->load->view($enlace,$output);
          }
    }
    public function index()
    {
        $output='';
        $js_files=array();
        $css_files=array();
        $data['output']=$output;
        $data['js_files']=$js_files;
        $data['css_files']=$css_files;
        $data['nav']='inicio';
        $this->_example_output($data);
    }
    public function catalogo()
    {
        $output='';
        $js_files=array();
        $css_files=array();
        $data['output']=$output;
        $data['js_files']=$js_files;
        $data['css_files']=$css_files;
        $data['nav']='catalogo';
        $modulo='3';//--modulo de catalogo       
        $data['acciones'] = $this->acciones_model->get_acciones_modulo($modulo);                
        $this->_example_output($data);
    }
    public function perfil_usuario()
    {
        $output='';
        $js_files=array();
        $css_files=array();
        $data['output']=$output;
        $data['js_files']=$js_files;
        $data['css_files']=$css_files;
        $data['nav']='usuario';
        //$modulo='3';//--modulo de catalogo
        $data['html_init'] = '<div class="alert alert-info starter-container"><h4>Datos del Perfil de Usuario</h4>'.
        '<p class="text-center">Mostrando informacion de la cuenta de usuario</p></div>';
        $this->_example_output($data);
    }
    public function inventario()
    {
        $output='';
        $js_files=array();
        $css_files=array();
        $data['output']=$output;
        $data['js_files']=$js_files;
        $data['css_files']=$css_files;
        $data['nav']='inventario';
        $modulo='7';//--modulo de inventario
        $data['acciones'] = $this->acciones_model->get_acciones_modulo($modulo);                
        $this->_example_output($data);
    }
    public function settings()
    {
        $output='';
        $js_files=array();
        $css_files=array();
        $data['output']=$output;
        $data['js_files']=$js_files;
        $data['css_files']=$css_files;
        $data['nav']='sistema';
        $modulo='7';//--modulo de inventario
        $data['acciones'] = $this->acciones_model->get_acciones_modulo($modulo);  
        $this->load->model('settings_model');
        $aux=$this->settings_model->get_settings();  
         $data['settings']=array();
        if(count($aux)>0)
        $data['settings']=$aux[0];            
        if($this->input->post()){
            $validar_stock=0;
            $mostrar_venta_realizada=0;
            $clientes_sn=0;
            if($this->input->post('validar_stock'))
               { $validar_stock=1;}
            if($this->input->post('mostrar_venta_realizada'))
               {$mostrar_venta_realizada=1;}
            if($this->input->post('clientes_sn'))
               {$clientes_sn=1;}


            //echo '<p> Valores'.$validar_stock.' '.$mostrar_venta_realizada. '</p>' ; 
            //print_r($this->input->post());
            $res= array('validar_stock' => $validar_stock,
                        'mostrar_venta_realizada'=>$mostrar_venta_realizada,
                        'clientes_sn' =>$clientes_sn);
            $this->settings_model->insertar($res);
             redirect('admin/sistema'); 

        }else
        $this->_example_output($data,'admin/web/settings_view');

    }
     public function cambiar_password()
    {
        $output='';
        $js_files=array();
        $css_files=array();
        $data['output']=$output;
        $data['js_files']=$js_files;
        $data['css_files']=$css_files;
        $data['nav']='usuario';
        //$modulo='3';//--modulo de catalogo
        $data['html_init'] = '<div class="alert alert-info starter-container"><h4>Cambiar Password</h4>'.
        '<p class="text-center">cambiar password de la cuenta de usuario</p></div>';
        $this->_example_output($data);
    }
    public function admin_web()
    {
        $output='';
        $js_files=array();
        $css_files=array();
        $data['output']=$output;
        $data['js_files']=$js_files;
        $data['css_files']=$css_files;
        $data['nav']='admin_web';
        $modulo='1';//--modulo de admin_web
        $data['acciones'] = $this->acciones_model->get_acciones_modulo($modulo);
        
        $this->_example_output($data);
    }
    public function reportes()
    {
        $output='';
        $js_files=array();
        $css_files=array();
        $data['output']=$output;
        $data['js_files']=$js_files;
        $data['css_files']=$css_files;
        $data['nav']='report';
        $modulo='8';//--modulo de  reportes
        $data['acciones'] = $this->acciones_model->get_acciones_modulo($modulo);
        
        $this->_example_output($data);
    }
    public function sistema()
    {
        $output='';
        $js_files=array();
        $css_files=array();
        $data['output']=$output;
        $data['js_files']=$js_files;
        $data['css_files']=$css_files;
        $data['nav']='sistema';
        $modulo='2';//--modulo de sistema
        $data['acciones'] = $this->acciones_model->get_acciones_modulo($modulo);
        
        $this->_example_output($data);
    }
    public function backup()
    {
        $output='';
        $js_files=array();
        $css_files=array();
        $data['output']=$output;
        $data['js_files']=$js_files;
        $data['css_files']=$css_files;
        $data['nav']='sistema';        
        $data['html_init']='<div class="alert alert-info starter-container"><h4>Crear Backup de la Base de Datos</h4>'.
        '<p class="text-center">Guarde el script de la base de datos para tener un copia de '.
        'su informacion registrada hasta este momento: </p>'.
        '<div class="row starter-container"><div class="col-sm-3"></div>'.
        '<div class="col-sm-6"> <button type="button" class="btn btn-primary disabled btn-block">Descargar Script Base de Datos</button></div>'.
        '<div class="col-sm-3"> </div>';    

        $this->_example_output($data);
    }
    
  /*  public function optimizar_imagenes_simple()
    {
            //---Redimensionando imagenes             
            $path_imagenes_large  ="assets/img/catalogo";
            $path_imagenes_small  ="assets/img/catalogo/small";
            $path_imagenes_thumbs  ="assets/img/catalogo/thumbs";
            $path_imagenes_medium ="assets/img/catalogo/medium";
            $this->load->helper('file'); 
            $this->load->library('image_lib');            
            //---listar imagenes
            $files_imagenes=get_dir_file_info($path_imagenes_large,false);
            foreach ($files_imagenes as $file_imagen) {
                $name = $file_imagen['name'];
                $path_name_small = $path_imagenes_small."/".$name;
                $path_name_thumbs = $path_imagenes_thumbs."/".$name;
                $path_name_medium= $path_imagenes_medium."/".$name;
                //-----parametros comunes----
                $config['image_library'] = 'gd2';
                $config['source_image']  = $path_imagenes_large."/".$name;               
                $config['maintain_ratio']= TRUE;
                $config['quality'] = '100%';
                if (!file_exists($path_name_thumbs)) {
                    //----si no existe su version thumbs---                   
                    $config['width']         = 120;
                    $config['height']        = 90;
                    $config['new_image']     = $path_name_thumbs;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config); 
                    $this->image_lib->resize();                   
                } 
                if (!file_exists($path_name_small)) {
                    //----si no existe su version small---                   
                    $config['width']         = 300;
                    $config['height']        = 225;
                    $config['new_image']     = $path_name_small;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config); 
                    $this->image_lib->resize();                   
                }                
                if (!file_exists($path_name_medium)) {
                    //----si no existe su version medium---                   
                    $config['width']         = 500;
                    $config['height']        = 375;
                    $config['new_image']     = $path_name_medium;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config); 
                    $this->image_lib->resize();
                   // echo "No existe : $name_large<br>";
                }
            }           
           
    }*/
    /*public function optimizar_imagenes()
    {
        $output='';
        $js_files=array();
        $css_files=array();
        $data['output']=$output;
        $data['js_files']=$js_files;
        $data['css_files']=$css_files;
        $data['nav']='sistema';        
        $data['html_init']='';   
        if($this->input->post()){
            //---Redimensionando imagenes             
            $path_imagenes_large  ="assets/img/catalogo";
            $path_imagenes_small  ="assets/img/catalogo/small";
            $path_imagenes_medium ="assets/img/catalogo/medium";
            $path_imagenes_thumbs  ="assets/img/catalogo/thumbs";
            $this->load->helper('file'); 
            $this->load->library('image_lib');            
            //---listar imagenes
            $files_imagenes=get_dir_file_info($path_imagenes_large,false);
            foreach ($files_imagenes as $file_imagen) {
                $name = $file_imagen['name'];
                $path_name_small = $path_imagenes_small."/".$name;
                $path_name_medium= $path_imagenes_medium."/".$name;
                $path_name_thumbs = $path_imagenes_thumbs."/".$name;
                //-----parametros comunes----
                $config['image_library'] = 'gd2';
                $config['source_image']  = $path_imagenes_large."/".$name;               
                $config['maintain_ratio']= TRUE;
                $config['quality'] = '100%';
                if (!file_exists($path_name_thumbs)) {
                    //----si no existe su version thumbs---                   
                    $config['width']         = 120;
                    $config['height']        = 90;
                    $config['new_image']     = $path_name_thumbs;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config); 
                    $this->image_lib->resize();                   
                } 
                if (!file_exists($path_name_small)) {
                    //----si no existe su version small---                   
                    $config['width']         = 300;
                    $config['height']        = 225;
                    $config['new_image']     = $path_name_small;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config); 
                    $this->image_lib->resize();                   
                }                
                if (!file_exists($path_name_medium)) {
                    //----si no existe su version medium---                   
                    $config['width']         = 500;
                    $config['height']        = 375;
                    $config['new_image']     = $path_name_medium;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config); 
                    $this->image_lib->resize();
                   // echo "No existe : $name_large<br>";
                }
            }           
            $data['mensaje']='Se ha redimensionados las imagenes para su optimizacion';
        }
        if($this->input->post('optimizar')==null)
        $this->_example_output($data,'admin/web/optimizar_imagenes_view');

    }*/
    public function printCatalogo()
    {   
    // Se carga el modelo alumno
    $this->load->model('productos_model');
    $this->load->model('imagenes_model');
    // Se carga la libreria fpdf
    $this->load->library('pdf');
 
    // Se obtienen los alumnos de la base de datos
    $productos = $this->productos_model->obtener_productos_total();
 
    // Creacion del PDF
 
    /*
     * Se crea un objeto de la clase Pdf, recuerda que la clase Pdf
     * heredó todos las variables y métodos de fpdf
     */
    $this->pdf = new Pdf();
    // Agregamos una página
    $this->pdf->AddPage();
    // Define el alias para el número de página que se imprimirá en el pie
    $this->pdf->AliasNbPages();
 
    /* Se define el titulo, márgenes izquierdo, derecho y
     * el color de relleno predeterminado
     */
    $this->pdf->SetTitle(TITLE);
    $this->pdf->SetLeftMargin(15);
    $this->pdf->SetRightMargin(15);
    $this->pdf->SetFillColor(200,200,200);
 
    // Se define el formato de fuente: Arial, negritas, tamaño 9
    $this->pdf->SetFont('Arial', 'B', 9);
    /*
     * TITULOS DE COLUMNAS
     *
     * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
     */
 
    $this->pdf->Cell(15,7,'ID'        ,'TBL',0,'C','1');
    $this->pdf->Cell(45,7,'PRODUCTO'  ,'TB',0,'L','1');
   // $this->pdf->Cell(25,7,'TITULO'  ,'TB',0,'L','1');
    //$this->pdf->Cell(30,7,'DESCRIPCION','TB',0,'L','1');
    $this->pdf->Cell(40,7,'CODIGO'     ,'TB',0,'C','1');
    $this->pdf->Cell(40,7,'PRECIO'     ,'TB',0,'L','1');
    $this->pdf->Cell(40,7,'IMAGEN'     ,'TBR',0,'C','1');
    $this->pdf->Ln(7);
    // La variable $x se utiliza para mostrar un número consecutivo
    $x = 1;
    foreach ($productos as $producto) {
      // se imprime el numero actual y despues se incrementa el valor de $x en uno
      $this->pdf->Cell(15,25,$producto->id,'BL',0,'C',0);
      // Se imprimen los datos de cada alumno
     // $this->pdf->Cell(45,5,$producto->id,'B',0,'L',0);
      $this->pdf->Cell(45,25,$producto->nombre,'B',0,'L',0);
      //$this->pdf->Cell(25,5,$producto->titulo,'B',0,'L',0);
      //$this->pdf->Cell(40,5,$producto->descripcion,'B',0,'C',0);
      $this->pdf->Cell(40,25,$producto->codigo,'B',0,'L',0);
      $this->pdf->Cell(40,25,$producto->precio_base,'BR',0,'L',0);
//$pdf->Cell(11,11, $pdf->Image('images/prueba.jpg', $pdf->GetX(), $pdf->GetY(),11),1);
      $imagen=$this->imagenes_model->get_imagen_producto($producto->id);
      $this->pdf->Cell(40,25,$this->pdf->Image('assets/img/catalogo/small/'.$imagen['imagen'], $this->pdf->GetX(), $this->pdf->GetY(),0,25),'BR',0,'L',0);
      //Se agrega un salto de linea
      $this->pdf->Ln(25);
    }
    /*
     * Se manda el pdf al navegador
     *
     * $this->pdf->Output(nombredelarchivo, destino);
     *
     * I = Muestra el pdf en el navegador
     * D = Envia el pdf para descarga
     *
     */
    $this->pdf->Output("Catalogo Productos.pdf", 'I');
 
   }
 public function catalogo_pdf() {
        $output='';
        $js_files=array();
        $css_files=array();
        $data['output']=$output;
        $data['js_files']=$js_files;
        $data['css_files']=$css_files;
        $data['nav']='catalogo';     
        //print_r($this->input->post()); 
        if($this->input->post('butt_catalogo_pdf')=='ok'){
            //-------Realizando la peticion del PDF------
                $this->printCatalogo();
        }else{  
        $data['html_init']='<div class="alert alert-info starter-container"><h4>CATALOGO DE PRODUCTOS</h4>'.
        '<form method="post" target="_blank"  action="catalogo_pdf">'.
        '<p class="text-center">catalogo general de los productos en formato PDF: </p>'.
        '<div class="row starter-container"><div class="col-sm-3"></div>'.
        '<div class="col-sm-6"> <button name="butt_catalogo_pdf" value="ok" type="submit" class="btn btn-primary btn-block">Descargar Catalogo</button></div>'.
        '<div class="col-sm-3">'.
        '</form> </div>';            
        $this->_example_output($data);
        }
    }
    public function producto(){
        $output=array();
        $this->load->view('web/producto_view.php',$output);
    }
    public function banners()
    {
         ///no permite visualizar el bannerscaso extraño borra y espera luego
       /* $crud = new grocery_CRUD();
        $crud->set_table('categorias');
        $crud->display_as('id_categoria','Nombre Categoria');
        //$crud->change_field_type ('descripcion', 'enabled');
        $crud->set_relation('id_categoria','categorias','nombre');
        $output = $crud->render(); 
        $array = json_decode(json_encode($output), True);        
        $array['nav']='admin_web';
        $this->_example_output($array);  */

    }

    public function informacion()
    {
        $output='';
        $js_files=array();
        $css_files=array();
        $data['output']=$output;
        $data['js_files']=$js_files;
        $data['css_files']=$css_files;
        $data['nav']='admin_web';        
        $data['html_init']='<div class="alert alert-info starter-container"><h4>Informacion del sitio Web</h4>'.
        '<p class="text-center">Datos de Informacion: </p>'.
        '<div class="row starter-container"><div class="col-sm-2"></div>'.
        '<div class="col-sm-8"><ul>'.
        '<li> Cantidad de visitas: </li>'.
        '<li> Uso de Espacio: </li>'.
        '<li>  ...</li>'.
        '<li>  ...</li>'.
        '</ul></div>'.
        '<div class="col-sm-2"></div></div>';        
        
        $this->_example_output($data);
    }
    public function diapositivas()
    {
        //--preparando la ediciones para administrar las imagende diapositivas
        $this->load->library('image_CRUD');
        $image_crud = new image_CRUD();
    
        $image_crud->set_primary_key_field('id');
        $image_crud->set_url_field('url');
        $image_crud->set_title_field('title');
        $image_crud->set_table('slideshow')
        ->set_ordering_field('priority')
        ->set_image_path('assets/img/web/slideshow');  

        $output = $image_crud->render(); 
        $data=json_decode(json_encode($output), True);
        $data['nav']='catalogo';             
        $data['html_init']='<div class="alert alert-info"><h4>Subir Imagenes para el inicio de sitio Web</h4>'.
        '<p class="text-center">para su mejor visualizacion asegurese subir imagenes de una resolucion alta mayor a 600x300 pixeles</p></div>';
        
        $this->_example_output($data);
    } 
    public function personal(){

        $crud = new grocery_CRUD();       
        $crud->set_table('personas');            
        $crud->columns(array('nombre','apellidos','tipo'));

        $output = $crud->render(); 
        $data = json_decode(json_encode($output), True);        
        $data['nav']='admin_web';
        
        $this->_example_output($data);
    }    

    public function productos(){

        $crud = new grocery_CRUD();       
        $crud->set_table('productos');     
        $crud->set_relation_n_n('categorias', 'categoria_productos', 'categorias', 'id_producto', 'id_categoria', 'nombre');
        $crud->add_action('Imagenes','../assets/img/upload_image.png', 'admin/editar_imagenes_producto');
        $crud->columns(array('id','codigo','nombre','titulo','subtitulo','precio_base','categorias'));
        $crud->fields(array('codigo','nombre','titulo','subtitulo','categorias','precio_base'));
        $crud->display_as('subtitulo','IMAGEN');
        //------Mostrando imagenes del producto
        //$crud->required_fields('codigo','nombre','titulo','subtitulo','categorias','precio_base');
        $crud->callback_column('subtitulo',array($this,'product_imagen_scale_callback'));

        $output = $crud->render(); 
        $data = json_decode(json_encode($output), True);        
        $data['nav']='catalogo';
        
        $this->_example_output($data);
    } 

    function product_imagen_scale_callback($value, $row)
    {           
        $this->load->model('imagenes_model');
        $d=$this->imagenes_model->get_imagen_producto($row->id); 
        $imagen = base_url()."/assets/img/catalogo/small/".$d['imagen'];
        return '<div class="text-center"><a href="'.$imagen.'"class="image-thumbnail"><img src="'.$imagen.'" height="50px"></a></div>';

    }
    public function editar_imagenes_producto()
    {
         $id_producto = $this->uri->segment(3);
        //--preparando la ediciones para administrar las imagende diapositivas
        $this->load->library('image_CRUD');
        $this->load->model('productos_model');
        $image_crud = new image_CRUD();
    
        $image_crud->set_primary_key_field('id');
        $image_crud->set_url_field('imagen');
        $image_crud->set_title_field('descripcion');
        $image_crud->set_table('imagenes')
        ->set_relation_field('id_producto')
        ->set_ordering_field('orden')
        ->set_image_path('assets/img/catalogo'); 

        $output = $image_crud->render(); 
        $data=json_decode(json_encode($output), True);
        $data['nav']='admin_web';  
        $productos = $this->productos_model->get_detalle_producto_by_id($id_producto);      
        $producto=$productos[0];     
        $data['html_init']='<div class="alert alert-info"><h4>Subir Imagenes para el producto "'.$producto['nombre'].'"</h4>'.
        '<p class="text-center">para su mejor visualizacion asegurese subir imagenes de una resolucion alta mayor a 600x300 pixeles</p>'.
        '<a href="'.site_url('admin/productos').'"> Volver a Productos</a></div>';        
        $this->_example_output($data);
    } 
    /*public function editar_imagenes_producto_todas()
    {
        //--preparando la ediciones para administrar las imagende diapositivas
        $this->load->library('image_CRUD');
        $this->load->model('productos_model');
        $image_crud = new image_CRUD();
    
        $image_crud->set_primary_key_field('id');
        $image_crud->set_url_field('imagen');
        $image_crud->set_title_field('descripcion');
        $image_crud->set_table('imagenes')
       // ->set_relation_field('id_producto')
        ->set_ordering_field('orden')
        ->set_image_path('assets/img/catalogo'); 

        $output = $image_crud->render(); 
        $data=json_decode(json_encode($output), True);
        $data['nav']='admin_web';  
           
        $data['html_init']='';
        $this->_example_output($data);
    }*/      

    public function sucursales(){

       $crud = new grocery_CRUD();
       $crud->set_table('sucursales');
       $output = $crud->render();      
       $data = json_decode(json_encode($output), True);      
       $data['nav']='admin_web';
       $this->_example_output($data);

    }
    public function clientes(){

       $crud = new grocery_CRUD();
       $crud->set_table('clientes');
       $output = $crud->render();      
       $data = json_decode(json_encode($output), True);      
       $data['nav']='ventas';
       $this->_example_output($data);

    }
    public function mensajes(){

       $crud = new grocery_CRUD();
       $crud->set_table('mensajes');
       $output = $crud->render();
       $data = json_decode(json_encode($output), True);     
       $data['nav']='catalogo';
       $data['html_init']='<div class="alert alert-info"><h4>Administrar Mensajes de Bienvenida</h4></div>';
       $this->_example_output($data);

    }
     public function destacados(){
        
        $crud = new grocery_CRUD();
        $crud->set_table('destacados');
        $crud->display_as('id_producto','Nombre del Producto');
        $crud->set_relation('id_producto','productos','nombre');
        $output = $crud->render(); 
        $data = json_decode(json_encode($output), True);        
        $data['nav']='admin_web';
        $this->_example_output($data);        

    }
    public function categorias(){
        
        $crud = new grocery_CRUD();
        $crud->set_table('categorias');
        $crud->display_as('id_categoria','Nombre Categoria');
        $crud->set_relation('id_categoria','categorias','nombre');
        $output = $crud->render(); 
        $array = json_decode(json_encode($output), True);        
        $array['nav']='admin_web';
        $this->_example_output($array);         

    }
    public function categorias_banners(){
        
        $crud = new grocery_CRUD();
        $crud->set_table('banners');
        $crud->unset_delete();
        $crud->unset_add();
        $crud->set_field_upload('imagen','assets/img/web/banners'); 
        $output = $crud->render(); 
        $array = json_decode(json_encode($output), True);        
        $array['nav']='admin_web';
        $this->_example_output($array);         

    }
   /* public function imagenes(){

        $crud = new grocery_CRUD();     
        $crud->set_table('imagenes');
        $crud->set_relation('id_producto','productos','nombre');
        $crud->display_as('id_producto','Nombre Producto');
        $crud->columns(array('id','imagen','id_producto'));
     
       // $crud->required_fields('lastName');     
        $crud->set_field_upload('imagen','assets/img/catalogo'); 
        $crud->callback_after_insert(array($this, 'log_after_insert_imagenes'));
        $crud->callback_after_update(array($this, 'log_after_insert_imagenes'));    
        $output = $crud->render();     
        $data = json_decode(json_encode($output), True);
        $data['nav']='catalogo';
        $this->_example_output($data);
    }
    function log_after_insert_imagenes($post_array,$primary_key)
    {
        $logs_insert = array(
        "id_usuario" => $this->session->userdata('id_usuario'),
        "accion" => 'Insert Update Imagen :'.$primary_key,
        "fecha" => date('Y-m-d H:i:s')
        );         
        $this->optimizar_imagenes_simple();
        $this->db->insert('bitacora',$logs_insert);         
        return true;
    }*/
    public function usuarios(){

        $crud = new grocery_CRUD();
     
        $crud->set_table('usuarios');
        $output = $crud->render(); 
        $data = json_decode(json_encode($output), True);        
        $data['nav']='sistema';
        $this->_example_output($data);
    }    
    public function dispositivos(){

        $crud = new grocery_CRUD();
     
        $crud->set_table('dispositivos');       
        $crud->display_as('id_usuario','Usuario');
        $crud->set_subject('Dispositivo Android');         
        $crud->set_relation('id_usuario','usuarios','username
            '); 
        $crud->fields(array('id_dispositivo','id_usuario','estado'));
         $output = $crud->render();  
        $data = json_decode(json_encode($output), True);        
        $data['nav']='sistema';
        $this->_example_output($data);

    }    
	public function bitacora(){

        $crud = new grocery_CRUD();     
        $crud->set_table('bitacora');
        $crud->set_relation('id_usuario','usuarios','username'); 
        $output = $crud->render(); 
        $data = json_decode(json_encode($output), True);        
        $data['nav']='sistema';
        $this->_example_output($data);
    } 
    public function prueba(){
        $this->load->view('prueba.php');  

    }

    /*
    public function prueba(){

       $this->load->model('categorias_model');
       $categorias=$this->categorias_model->obtenerCategoriasTotal();
       echo "<p>Categorias principales</p>";
       foreach ($categorias as $categoria) {
           
           echo " catgorias=".$categoria['nombre'].'<p>';
           $subcategorias=$categoria['sub_categorias'];
           //*print_r($categoria);
           if($subcategorias==null) {
           // echo 'no tienen subcategorias<p>';
           }
           else{
               // echo "recorriendo subcatgorias-------- Nivel raiz<p>";
                foreach ($subcategorias as $categorias_aux) {
                    $this->subcategorias($categorias_aux,1);
                   // echo '---->Nivel:=0---->'.$categorias_aux['nombre'].'<p>';
                }
                
            }
            

       }

    } 
    public function subcategorias($categorias,$nivel){
        //---entrandoa  subcategorias---
        $subcategorias=$categorias['sub_categorias'];
        echo '---->Nivel:='.$nivel.'---->'.$categorias['nombre'].'<p>';
        if($subcategorias==null){
           // echo '---->Nivel:='.$nivel.'---->'.$categorias['nombre'].'<p>';
        }else{       
            foreach ($subcategorias as $categorias_aux) {             
            //echo " mostrando sus subiveles:_=".$nivel.'<p>';
             $this->subcategorias($categorias_aux,$nivel+1);
            }
        }
    }*/

    public function modulo_ventas()
    {
        $output='';
        $js_files=array();
        $css_files=array();
        $data['output']=$output;
        $data['js_files']=$js_files;
        $data['css_files']=$css_files;
        $data['nav']='ventas';
        $modulo='5';//--modulo de ventas
        $data['acciones'] = $this->acciones_model->get_acciones_modulo($modulo);

        
        $this->_example_output($data);
    }
    /*
    public function adicionar_producto_inventario(){


     if($this->input->post('butt_habilitar_inventario')=="Habilitar Producto"){
            //----------datos enviados-----
            $id_sucursal=$this->input->post('id_sucursal');
            $data_add=array(
                'id_producto'=>$this->input->post('id_producto'),
                'id_sucursal'=>$this->input->post('id_sucursal'),
                'cantidad'=>$this->input->post('cantidad'),
                'precio'=>$this->input->post('precio'),
                'medida'=>$this->input->post('medida'),
                'cantidad_mayor'=>$this->input->post('cantidad_mayor'),
                'precio_mayor'=>$this->input->post('precio_mayor')

                );
            $this->db->insert('inventarios',$data_add);
            if($this->input->post('cantidad')>0){
                $data_reposicion=array(
                'id_producto'=>$this->input->post('id_producto'),
                'id_sucursal_destino'=>$this->input->post('id_sucursal'),
                'cantidad'=>$this->input->post('cantidad'),
                'precio_base'=>$this->input->post('precio'),
                'tipo'=>'1',
                'id_usuario'=>$this->session->userdata('id_usuario'),
                'nota'=>'Iniciando Stock',
                'fecha'=>date('Y-m-d H:i:s')

                );
            $this->db->insert('reposiciones',$data_reposicion); 


            }
            redirect('admin/inventario_productos?sucursal_id='.$id_sucursal); 
        } else  if($this->input->post('butt_habilitar_todo')=="Habilitar Todos los producto"){
            //----------datos enviados-----
            $id_sucursal=$this->input->post('id_sucursal');
             $this->load->model('Inventarios_model');
            $res=$this->Inventarios_model->get_productos_faltantes_sucursal($id_sucursal);                        
            $id_producto='';
            foreach ($res as $valor) {
               $id=$valor['id'];
               $value=$valor['nombre'];
               $data_add=array(
                'id_producto'=>$id,
                'id_sucursal'=>$id_sucursal,
                'cantidad'=>0,
                'precio' =>10,
                'medida'=>'Unidad',
                'cantidad_mayor' =>12,
                'precio_mayor' => 100
                );
            $this->db->insert('inventarios',$data_add);
               
            }        

            
            redirect('admin/inventario_productos?sucursal_id='.$id_sucursal); 
        } else{
        $output='';
        $js_files=array();
        $css_files=array();
        $data['output']=$output;
        $data['js_files']=$js_files;
        $data['css_files']=$css_files;
        $data['nav']='inventarios';
        $modulo='7';//--modulo de inventarios
       // $data['acciones'] = $this->acciones_model->get_acciones_modulo($modulo);
        //---mostrando los productos que faltana en la sucursal
        $this->load->model('Inventarios_model');
        $id_sucursal=$this->session->userdata('id_sucursal_temp');
        $res=$this->Inventarios_model->get_productos_faltantes_sucursal($id_sucursal);
               
        $combox=array();
        $id_producto=''; $i=0;
        foreach ($res as $valor) {
           $key=$valor['id'];
           $value=$valor['nombre'];
           if($i==0){
            $id_producto=$key;
            $i++;
           }
           $combox[$key]=$value;
        }        
        $data['html_init']='<div class="alert alert-info starter-container"><p><h4>Habilitar Productos para el inventario de la sucursal:</h4></p>'.
        form_open('admin/adicionar_producto_inventario') .'<p>'.
        '<div class="row"><div class="col-sm-1"></div><div class="col-sm-10" >'.
        form_dropdown('id_producto', $combox, $id_producto,'class="form-control"' ).                form_hidden('id_sucursal', $id_sucursal). 
        '<div class="row"> <div class="col-sm-4">'.                 
        form_label('Precio del Producto: ').
        '</div><div class="col-sm-8">'.
        form_input('precio', '0').'<p>'.
        '</div></div>'.
        '<div class="row"> <div class="col-sm-4">'. 
        form_label('Unidad de Medida: ').
         '</div><div class="col-sm-8">'.
        form_input('medida', 'Unidad').'<p>'.
         '</div></div>'.
         '<div class="row"> <div class="col-sm-4">'. 
        form_label('Cantidad por Mayor: ').
        '</div><div class="col-sm-8">'.
        form_input('cantidad_mayor', '12').'<p>'.
        '</div></div>'.
        '<div class="row"> <div class="col-sm-4">'. 
        form_label('Precio por mayor').
        '</div><div class="col-sm-8">'.
         form_input('precio_mayor', '0').'<p>'.
         '</div></div>'.
          '<div class="row"> <div class="col-sm-4">'. 
        form_label('Cantidad Inicial Stock: ').
        '</div><div class="col-sm-8">'.
        form_input('cantidad', '0').'<p>'.
        '</div></div>'.
         '<div class="row"> <div class="col-sm-6">'. 
        form_submit('butt_habilitar_inventario', 'Habilitar Producto', 'class="form-control"').
        '</div><div class="col-sm-6">'.
        form_submit('butt_habilitar_todo', 'Habilitar Todos los producto', 'class="form-control"').
        '</div></div>'.
        form_close().     
        '</div></div></div>'; 
        
        $this->_example_output($data);
        }

    }*/
    public function inventario_productos(){
       
        //---automatizando revision de inventarios
        $this->load->model('Inventarios_model'); 
        $this->inventarios_model->habilitarProductosInventarioAllSucursales();
        //---recibiendo los datos--
        $id_sucursal = $this->session->userdata('id_sucursal_temp');
        $output='';          
        $crud = new grocery_CRUD();
        $crud->set_table('inventarios'); 
        $this->load->model('sucursales_model');               
        $sucursales = $this->sucursales_model->listSucursales();
        //echo '<p><p><p>entro='.$crud->getState()."--->estado<p>";
        
        
        if($this->input->post('sucursal_id')){
           
            $id_sucursal=$this->input->post('sucursal_id');
            //echo '<p><p><p>entro post='.$id_sucursal;            
           
            
        }else if ($this->input->get('sucursal_id')){            
            $id_sucursal=$this->input->get('sucursal_id');
           // echo '<p><p><p>entro get='.$id_sucursal;   
        }
        //---acciones tomadas----       
        /*       
        else if($crud->getState()=='delete'){
          //  echo '<p><p><p>entro delete='.$id_sucursal;
           //redirect('admineliminar_producto_inventario');
          // echo 'capturando la eliminacion';
           //$data
           $id_producto=$this->uri->segment(4); 
           $cantidad=$this->Inventarios_model->get_cantidad_productos($id_sucursal,$id_producto);
           $data = array(
                'id_producto'=>$id_producto,
                'id_sucursal_destino'=>$id_sucursal,
                'id_sucursal_origen'=>'0',
                'tipo'=>'2',
                'id_usuario'=>$this->session->userdata('id_usuario'),
                'nota'=>'Eliminacion de productos de la sucursal',
                'cantidad'=>-$cantidad            
            );
           $this->db->insert('reposiciones',$data);
        }*/
        else if($id_sucursal==''){      
            foreach ($sucursales as $key => $value) {
                $id_sucursal = $key;
                break;
            }  
        }
        else if($crud->getState()=='add'){
            echo '<p><p><p>entro add='.$id_sucursal;
            $this->session->set_userdata('id_sucursal_temp',$id_sucursal);
            redirect('admin/adicionar_producto_inventario');
        }

        $this->session->set_userdata('id_sucursal_temp',$id_sucursal);          
        $crud->where('id_sucursal',$id_sucursal); 
        $crud->unset_read();
        $crud->unset_edit();                         
        $crud->unset_delete();
        $crud->set_relation('id_producto','productos','id,nombre');        
        $crud->columns('id','id_producto','Producto','cantidad');     
        //$crud->unset_edit_fields('id_sucursal','cantidad','id_sucursal');
        $crud->add_action('Agregar/Quitar productos',base_url().'/assets/img/agregar_producto.png', 'admin/reposicion/add');
        $crud->add_action('Trasladar productos',base_url().'assets/img/mover_producto.png', 'admin/trasladar_producto_inventario/add');
        $crud->display_as('id_producto','Nombre');
        //------Mostrando imagenes del producto
        $crud->callback_column('Producto',array($this,'product_imagen_scale_callback'));
        
        $output = $crud->render(); 
        $data = json_decode(json_encode($output), True);     
        $data['nav']='inventario';
        $modulo='7';//--modulo de inventario

        $data['html_init']='<div class="alert alert-info starter-container"><p><h4>Inventario de Productos de la sucursal:</p>'.
        form_open('admin/inventario_productos') .
        form_dropdown('sucursal_id', $sucursales, $id_sucursal,'class="form-control" onchange="this.form.submit()" ' ).
        form_close().     
        '</div>'; 
        
        $this->_example_output($data);
    }    
    public function trasladar_producto_inventario(){

        $crud = new grocery_CRUD();     
        $crud->set_table('reposiciones');
        $id_sucursal_temp=$this->session->userdata('id_sucursal_temp');
        if($crud)
        if(($crud->getState()=='list') || ($crud->getState()=='success')){             
            $id_sucursal_temp=$this->session->userdata('id_sucursal_temp');
            redirect('admin/inventario_productos?sucursal_id='.$id_sucursal_temp); 
        }
        $id_producto=$this->uri->segment(4); 
        $cantidad_max=$this->inventarios_model->get_cantidad_productos($id_sucursal_temp,$id_producto);
        $this->session->set_userdata('cant_max_mover_producto',$cantidad_max);      
       
        $crud->callback_add_field('id_sucursal_destino',array($this,'add_field_sucursal_diferente'));   

        $crud->field_type('id_sucursal_origen','hidden',$id_sucursal_temp);
        //---el destino no existe debe ser el taller si no seria repóner       
        $crud->field_type('id_producto','hidden',$id_producto);
        $crud->field_type('tipo','hidden',3);
        $crud->field_type('id_usuario','hidden',$this->session->userdata('id_usuario'));
        $crud->field_type('cantidad', 'integer', 1);
        $crud->callback_after_insert(array($this, 'log_inventario_insert'));
        $output = $crud->render(); 
        $data = json_decode(json_encode($output), True);        
        $data['nav']='inventario';
        $this->_example_output($data);
    }
    public function reposicion(){
        $crud = new grocery_CRUD();     
        $crud->set_table('reposiciones');
        $id_sucursal_temp=$this->session->userdata('id_sucursal_temp');
        if($crud)
        if(($crud->getState()=='list') || ($crud->getState()=='success')){             
            $id_sucursal_temp=$this->session->userdata('id_sucursal_temp');
            redirect('admin/inventario_productos?sucursal_id='.$id_sucursal_temp); 
        }
        $id_producto=$this->uri->segment(4); 
      
        //$crud->field_type('tipo','hidden','1');
        $crud->callback_add_field('tipo',array($this,'add_field_tipo_reponer'));   

        $crud->field_type('id_sucursal_origen','hidden','0');
        //---el origen no existe debe ser el taller si no seria mover
        $crud->field_type('id_sucursal_destino','hidden',$id_sucursal_temp);
        $crud->field_type('id_producto','hidden',$id_producto);
        $crud->field_type('fecha','hidden',date('Y-m-d H:i:s'));       
        $crud->field_type('id_usuario','hidden',$this->session->userdata('id_usuario'));
        $crud->callback_after_insert(array($this, 'log_inventario_insert'));
        $output = $crud->render(); 
        $data = json_decode(json_encode($output), True);        
        $data['nav']='inventario';
        $modulo='7';//--modulo de inventario
        $this->_example_output($data);

    } 
    function add_field_tipo_reponer()
    {
    return "<select id='field-tipo' name='tipo' class='form-control'".
    " data-placeholder='Seleccionar Tipo'><option value='1'  >agregar´producto</option><option value='2'".
    " >Quitar o dar de baja</option></select> ";           
     }  
     function add_field_sucursal_diferente()
    {
        $id_sucursal=$this->session->userdata('id_sucursal_temp');
        $cantidad_max=$this->session->userdata('cant_max_mover_producto');
        $cad="<p><label>Cantidad Maxima de Productos a Trasladar ".$cantidad_max." </label></p><select id='combox_destino' name='id_sucursal_destino' class='form-control'".
        " data-placeholder='Seleccionar Destino'>";
        $arrsucursales = $this->sucursales_model->listSucursalesDiferentes($id_sucursal);
        foreach ($arrsucursales as $sucursal) {
            $cad=$cad.'<option value='.$sucursal['id'].'  >'.$sucursal['nombre'].'</option>';
        }
        $cad=$cad."</select> ";  

        return $cad; 
             
     }   
    function log_inventario_insert($post_array,$primary_key)
    {
        //Permite actualizar el inventario cuando se
        //---realiza una reposiciom        
        $id_sucursal_destino=$post_array['id_sucursal_destino'];
        $id_sucursal_origen=$post_array['id_sucursal_origen'];
        $id_producto=$post_array['id_producto'];
        $cantidad=$post_array['cantidad'];
        $tipo=$post_array['tipo'];


        if($tipo==3){//---si se trata de mover-----  

         $cantidad_max=$this->inventarios_model->get_cantidad_productos($id_sucursal_origen,$id_producto);         
         if($cantidad >= $cantidad_max){
            $cantidad = $cantidad_max;
          }
           /* script util para comprobar los datos 
           $data = array(
            'id'=>'1',
            'nombre'=>$cantidad_max.'===>'.$cantidad_max2.'///'.print_r($post_array,true)
            //'nombre'=>$id_producto
            );
          $this->db->insert('vacios',$data);
          $this->db->flush_cache();*/

         //----quitando productos-----
        $this->db->set('cantidad', 'cantidad-'.$cantidad, FALSE);
        $this->db->where('id_sucursal', $id_sucursal_origen);
        $this->db->where('id_producto', $id_producto);       
        $this->db->update('inventarios'); 
        //---verificar si el producto existe en la nueva sucursal
        $this->inventarios_model->habilitarProductoInventario($id_producto,$id_sucursal_destino);
        //-----adicionando productos
        $this->db->set('cantidad', 'cantidad+'.$cantidad, FALSE);
        $this->db->where('id_sucursal', $id_sucursal_destino);
        $this->db->where('id_producto', $id_producto);       
        $this->db->update('inventarios'); 

        }
        else 
        {
        if($tipo==1)//----si es agregar
            $this->db->set('cantidad', 'cantidad+'.$cantidad, FALSE);
        else if($tipo==2)//---si es quitar o dar de baja
            $this->db->set('cantidad', 'cantidad-'.$cantidad, FALSE);
        $this->db->where('id_sucursal', $id_sucursal_destino);
        $this->db->where('id_producto', $id_producto);       
        $this->db->update('inventarios'); 

        } 
       
      /*  $data = array(
            'id'=>'1',
            'nombre'=>print_r($post_array,true)
            //'nombre'=>$id_producto
            );
        $this->db->insert('vacios',$data);
        // gives UPDATE mytable SET field = field+1 WHERE id = 2*/

    return true;
    }
    public function ventas_contado(){
        $output='';
        $js_files=array(base_url().'assets/grocery_crud/js/jquery-1.11.1.min.js',
            base_url().'assets/bootstrap/js/bootstrap.min.js');
        $css_files=array();
        $data['output']=$output;
        $data['js_files']=$js_files;
        $data['css_files']=$css_files;
        $data['nav']='ventas';
        $modulo='5';//--modulo de ventas
        $data['acciones'] = $this->acciones_model->get_acciones_modulo($modulo);

        if($this->input->post('butt_vc_procesar')=="procesar"){
            //-----------
            echo "PROCESANDO VENTAS<p>";
            $id_cliente= $this->input->post('id_cliente');
            $id_productos=$this->input->post('array_id_productos'); 
            $array_id_productos=explode(',', $id_productos);
            $precio_productos=$this->input->post('array_precio_productos');
            $array_precio_productos=explode(',',$precio_productos);
            $cantidad_productos=$this->input->post('array_cantidad_productos');
            $array_cantidad_productos=explode(',', $cantidad_productos);
            $cliente_name=$this->input->post('cliente_name');
            $cionit=$this->input->post('cionit');
            $id_vendedor=$this->input->post('select_vendedor');
            $id_sucursal=$this->input->post('select_sucursal');
            $monto_ventas=$this->input->post('monto_ventas');
            $descripcion=$this->input->post('descripcion');
            $fecha=$this->input->post('fecha');
            $this->load->model('Ventas_model');
            //--------caso de  cliente--------

            //--------caso de venta------------
            $data_ventas= array(
                'id_usuario'=>$this->session->userdata('id_usuario'),
                'fecha'=>$fecha,
                'id_cliente'=>$id_cliente,
                'nota'=>$descripcion,
                'total'=>$monto_ventas,
                'estado'=>'',
                'transferida'=>'',
                'id_vendedor'=>$id_vendedor,
                'id_sucursal'=>$id_sucursal,
                'tipo'=>'0'//al contado
                );
            $id_venta = $this->Ventas_model->insertar_ventas($data_ventas);
            //-----caso ventas productos--------
            $i=0;
            foreach ($array_id_productos as $producto_id) {
                $producto_precio = $array_precio_productos[$i];
                $producto_cantidad=$array_cantidad_productos[$i];
                $data_venta_productos = array(
                    'id_venta'=>$id_venta,
                    'id_producto'=>$producto_id,
                    'cantidad'=>$producto_cantidad,
                    'precio'=>$producto_precio
                    );
                $this->Ventas_model->insert_ventas_productos($data_venta_productos);

                echo "ID:=".$producto_id."<p>";

                $i++;
            }

           // print_r($this->input->post());
            echo "<a href='".base_url()."admin/ventas_contado'>Volver a Ventas</a>";
            

        }else{
            $this->load->model('categorias_model');
            $this->load->model('productos_model');
            $categorias=$this->categorias_model->get_categorias();
            $productos=$this->productos_model->get_productos_total(); 
            $combox_productos=array();
            foreach ($productos as $fila) {
                $combox_productos[$fila['id']]=$fila['nombre'];
            }
            $data['combox_productos'] = $combox_productos;
            $data['categorias_productos']=$categorias;

            
            $this->_example_output($data,'admin/web/ventas_view.php');
        }

    } 


}
