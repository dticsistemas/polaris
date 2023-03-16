<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ventas extends CI_Controller {

	
    function __construct()
    {
        parent::__construct();   
        $this->load->library('grocery_CRUD');
        $this->load->model('acciones_model');
        $this->load->model('settings_model');
        $this->load->model('clientes_model');
        $this->load->model('inventarios_model');        
        $this->load->model('ventas_model');
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
    
    
    public function productos(){

        $crud = new grocery_CRUD();       
        $crud->set_table('productos');     
        $crud->set_relation_n_n('categorias', 'categoriaproductos', 'categorias', 'id_producto', 'id_categoria', 'nombre');
        $crud->add_action('Imagenes','../assets/img/upload_image.png', 'admin/editar_imagenes_producto');
        $crud->columns(array('id','codigo','nombre','titulo','subtitulo','precio'));
        $crud->edit_fields(array('codigo','nombre','titulo','precio','categorias'));
        $crud->display_as('subtitulo','Imagen');
        //------Mostrando imagenes del producto
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
        $imagen = base_url()."/assets/img/catalogo/".$d['imagen'];
        return '<div class="text-center"><a href="'.$imagen.'"class="image-thumbnail"><img src="'.$imagen.'" height="50px"></a></div>';

    }
    public function ventas_print(){
        //-----imprimir datos venta----
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
        $data['settings'] = $this->settings_model->get_setting();
        $settings=$data['settings'];

        if($this->input->post('butt_imprimir_venta')=="ok"){            
             $id_venta=$this->input->post('id_venta');    
        if($settings['mostrar_venta_realizada']==1){
              
                $venta=$this->ventas_model->obtener_venta($id_venta);
                $detalle_venta=$this->ventas_model->obtener_detalle_venta($id_venta);

                $id_cliente=$venta['id_cliente'];
                $cliente=$this->clientes_model->get_cliente($id_cliente);
                $data['venta']=$venta;
                $data['detalle_venta']=$detalle_venta;
                $data['cliente']=$cliente;
                $this->_example_output($data,'admin/web/nota_ventas_view.php');
            }  
            else{
                redirect('ventas/ventas_contado');
               
            }   
        }     else {
            redirect('ventas/ventas_contado');
        }

    }
    
    public function ventas_contado(){
       /* $output='';
        $js_files=array(base_url().'assets/grocery_crud/js/jquery-1.11.1.min.js',
            base_url().'assets/bootstrap/js/bootstrap.min.js');
        $css_files=array();
        $data['output']=$output;
        $data['js_files']=$js_files;
        $data['css_files']=$css_files;
        $data['nav']='ventas';
        $modulo='5';//--modulo de ventas
        $id_vendedor=$this->session->userdata('id_usuario'); 
        $id_sucursal=$this->session->userdata('id_sucursal');
        $data['acciones'] = $this->acciones_model->get_acciones_modulo($modulo);
        $data['settings'] = $this->settings_model->get_setting();


        if($this->input->post('butt_vc_procesar')=="procesar"){
            //-----------
            
            $id_cliente= $this->input->post('id_cliente');
            $id_productos=$this->input->post('array_id_productos'); 
            $array_id_productos=explode(',', $id_productos);
            $precio_productos=$this->input->post('array_precio_productos');
            $array_precio_productos=explode(',',$precio_productos);
            $cantidad_productos=$this->input->post('array_cantidad_productos');
            $array_cantidad_productos=explode(',', $cantidad_productos);
            $cliente_name=$this->input->post('clientename');
            $cionit=$this->input->post('cionit'); 
            $cliente_procedencia=$this->input->post('select_procedencia');           
            $monto_ventas=$this->input->post('monto_ventas');
            $descripcion=$this->input->post('descripcion');  
            $sexocliente=$this->input->post('optsexocliente');
            $fecha= date('Y-m-d H:i:s');
            $this->load->model('Ventas_model');
            $settings=$data['settings'];

            //--------caso de  cliente--------           
            if($id_cliente==''){//---Cliente no registrado
                //if($cliente_name==''){//---cliente vacio
                if($settings['clientes_sn']==0){ //----sistema no permite registrar    
                    $id_cliente=0;
                    $cliente_name="S/N";

                }else{//---cliente datos basicos
                    //registrar con datos basicos----
                    $data_cliente=array(
                        'nombres'=>$cliente_name,
                        'ci'=>$cionit,
                        'sexo'=>$sexocliente,
                        'procedencia'=>$cliente_procedencia

                        );
                    $id_cliente=$this->clientes_model->insertar($data_cliente);

                }

            }else{//-----cliente buscado
                //--se asume que los datos fueron cargados y enviados por el post
            }
            $data_cliente=array('id'=>$id_cliente,
                'nombres'=>$cliente_name,
                'ci'=>$cionit,
                'sexo'=>$sexocliente);
            $data['cliente']=$data_cliente;
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
                    'orden'=>$i+1,
                    'cantidad'=>$producto_cantidad,
                    'precio'=>$producto_precio
                    );
                $this->Ventas_model->insert_ventas_productos($data_venta_productos);

                //------caso de stock-------------
                if($settings['validar_stock']=='1'){
                    //-----descontar los productos
                    $this->inventarios_model->actualizar_cantidad_productos($id_sucursal,$producto_id,-$producto_cantidad);                
                }

                $i++;
            }

           //-------Una vez realizadaa la venta redireccionar o mostra 
           
            if($settings['mostrar_venta_realizada']==1){
              
                $venta=$this->Ventas_model->obtener_venta($id_venta);
                $detalle_venta=$this->Ventas_model->obtener_detalle_venta($id_venta);
                $id_cliente=$venta['id_cliente'];
                $cliente=$this->clientes_model->get_cliente($id_cliente);
                $data['venta']=$venta;
                $data['detalle_venta']=$detalle_venta;
                $data['cliente']=$cliente;
                $this->_example_output($data,'admin/web/nota_ventas_view.php');
            }  
            else{
                redirect('ventas/ventas_contado');
               
            }               
          

        }else{
            //---------Mostrando Formulario para realizar Venta
            $this->load->model('categorias_model');
            $this->load->model('productos_model');
            $this->load->model('sucursales_model');
            $this->load->model('usuarios_model');
            $sucursales=$this->sucursales_model->listSucursales();
            $vendedores=$this->usuarios_model->listVendedores();
            $categorias=$this->categorias_model->get_categorias();
            $productos=$this->productos_model->get_productos_total_by_sucursal($id_sucursal); 
            $combox_productos=array();
            foreach ($productos as $fila) {
                $combox_productos[$fila['id']]=$fila['nombre'];
            }
            $data['combox_productos'] = $combox_productos;
            $data['categorias_productos']=$categorias;
            $data['combox_sucursales']=$sucursales;            
            $data['combox_vendedores']=$vendedores;

            
            $this->_example_output($data,'admin/web/ventas_view.php');
        }*/
        echo "Falta depuracion";

    } 
    public function ventas_suspendidas(){
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
        $data['settings'] = $this->settings_model->get_setting();

        if($this->input->post('butt_vc_procesar')=="procesar"){
            //-----------           
            $id_cliente= $this->input->post('id_cliente');
            $id_productos=$this->input->post('array_id_productos'); 
            $array_id_productos=explode(',', $id_productos);
            $precio_productos=$this->input->post('array_precio_productos');
            $array_precio_productos=explode(',',$precio_productos);
            $cantidad_productos=$this->input->post('array_cantidad_productos');
            $array_cantidad_productos=explode(',', $cantidad_productos);
            $cliente_name=$this->input->post('clientename');
            $cionit=$this->input->post('cionit');
            $cliente_procedencia=$this->input->post('select_procedencia');
            $sexocliente=$this->input->post('optsexocliente');
            $id_vendedor=$this->input->post('select_vendedor'); 
            $id_sucursal=$this->input->post('select_sucursal'); 
            $monto_ventas=$this->input->post('monto_ventas');
            $descripcion=$this->input->post('descripcion');                    
            $fecha= $this->input->post('fecha'); 
            $this->load->model('Ventas_model');
            $settings=$data['settings'];
            //--------caso de  cliente--------           
            if($id_cliente==''){//---Cliente no registrado
                //if($cliente_name==''){//---cliente vacio
      
                if($settings['clientes_sn']==0){ //----sistema no permite registrar    
                    $id_cliente=0;
                    $cliente_name="S/N";

                }else{//---cliente datos basicos
                    //registrar con datos basicos----
                    $data_cliente=array(
                        'nombres'=>$cliente_name,
                        'ci'=>$cionit,
                        'sexo'=>$sexocliente,
                        'procedencia'=>$cliente_procedencia

                        );
                    $id_cliente=$this->clientes_model->insertar($data_cliente);

                }

            }else{//-----cliente buscado
                //--se asume que los datos fueron cargados y enviados por el post
            }            
            $data_cliente=array('id'=>$id_cliente,
                'nombre'=>$cliente_name,
                'ci'=>$cionit,
                'sexo'=>$sexocliente);
            $data['cliente']=$data_cliente;
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
                    'orden'=>$i+1,
                    'cantidad'=>$producto_cantidad,
                    'precio'=>$producto_precio
                    );
                $this->Ventas_model->insert_ventas_productos($data_venta_productos);

                //------caso de stock-------------
                if($settings['validar_stock']=='1'){
                    //-----descontar los productos
                    $this->inventarios_model->actualizar_cantidad_productos($id_sucursal,$producto_id,-$producto_cantidad);                
                }

                $i++;
            }

           //-------Una vez realizadaa la venta redireccionar o mostrar 
           
            if($settings['mostrar_venta_realizada']==1){
              
                $venta=$this->Ventas_model->obtener_venta($id_venta);
                $detalle_venta=$this->Ventas_model->obtener_detalle_venta($id_venta);
                $id_cliente=$venta['id_cliente'];
                $cliente=$this->clientes_model->get_cliente($id_cliente);
                $data['venta']=$venta;
                $data['detalle_venta']=$detalle_venta;
                $data['cliente']=$cliente;
                $data['ventas_suspendidas']='ok';
                $this->_example_output($data,'admin/web/nota_ventas_view.php');
            }  
            else{
                redirect('ventas/ventas_suspendidas');
               
            }               
          
            

        }else{
            //---------Mostrando Formulario para realizar Venta
            $this->load->model('categorias_model');
            $this->load->model('productos_model');
            $this->load->model('sucursales_model');
            $this->load->model('usuarios_model');
            $sucursales=$this->sucursales_model->listSucursales();
            $vendedores=$this->usuarios_model->listVendedores();
            $categorias=$this->categorias_model->get_categorias();
            $productos=$this->productos_model->get_productos_total(); 
            $combox_productos=array();
            foreach ($productos as $fila) {
                $combox_productos[$fila['id']]=$fila['nombre'];
            }
            $data['combox_productos'] = $combox_productos;
            $data['categorias_productos']=$categorias;
            $data['combox_sucursales']=$sucursales;            
            $data['combox_vendedores']=$vendedores;

            
            $this->_example_output($data,'admin/web/ventas_suspendidas_view.php');
        }

    } 
    public function ventas_credito(){
      /*  $output='';
        $js_files=array(base_url().'assets/grocery_crud/js/jquery-1.11.1.min.js',
            base_url().'assets/bootstrap/js/bootstrap.min.js');
        $css_files=array();
        $data['output']=$output;
        $data['js_files']=$js_files;
        $data['css_files']=$css_files;
        $data['nav']='ventas';
        $modulo='5';//--modulo de ventas
        $data['acciones'] = $this->acciones_model->get_acciones_modulo($modulo);                   
        $this->_example_output($data,'admin/web/ventas_view.php');*/
        echo "No implementado";
       
    } 
    public function ventas_credito_admin(){
       /* $output='';
        $js_files=array(base_url().'assets/grocery_crud/js/jquery-1.11.1.min.js',
            base_url().'assets/bootstrap/js/bootstrap.min.js');
        $css_files=array();
        $data['output']=$output;
        $data['js_files']=$js_files;
        $data['css_files']=$css_files;
        $data['nav']='ventas';
        $modulo='5';//--modulo de ventas
        $data['acciones'] = $this->acciones_model->get_acciones_modulo($modulo);                   
        $this->_example_output($data,'admin/web/ventas_view.php');*/
        echo "No implmentado";
       
    } 


}
