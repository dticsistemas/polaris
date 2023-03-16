<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

   var $welcome_message = "";
	function __construct()
    {
        parent::__construct();   
        
       //---añadimos los modelo a utilizar*/   
       $this->load->model('categorias_model');
       $this->load->model('imagenes_model');
       $this->load->model('productos_model');
       $this->load->model('mensajes_model');
       $this->load->model('sucursales_model');
       $this->load->model('slideshow_model');
       $this->load->model('banners_model');
        
    }
    public function obtenerMensajeBienvenida()
    {
        //---permite mostrar mensaje de la Bd para ser mas interactivo la web
    	$data=$this->mensajes_model->get_mensajes_mixed();
        if(count($data)>0){
        $m=$data[0];
        $mensaje=$m['mensaje'];
        }else{
            $mensaje="Bienvenidos a mi pagina !!!";
        }
    	return $mensaje;
    }  
    public function mostrarVista($data=null,$vista=null){
        //---parametros a enviar configurables
        $data['mensaje'] = $this->obtenerMensajeBienvenida();   
        $data['empresa'] = EMPRESA;      
        $data['titulo']  = TITLE; 
        $data['categorias'] = $this->categorias_model->obtenerCategoriasTotal();
        $data['sucursales'] = $this->sucursales_model->get_sucursales();        
        $data['banners']    = $this->banners_model->get_banners(); 
        $destacados_aux  = $this->productos_model->get_productos_destacados();
        $destacados = null; $cont = 0;
        foreach ($destacados_aux as $producto) {
            $imagen = $this->imagenes_model->get_imagen_producto($producto['id_producto']);
            if($imagen==null){
                $producto['imagen']='no_image.png';
            }else{
                $producto['imagen']= $imagen['imagen'];
            }
            $destacados[$cont]=$producto;
            $cont++;
        }
        $data['productos_destacados']= $destacados ;

        $this->load->view('template/tp_header_view',$data);                      
        $this->load->view($vista,$data); 
        $this->load->view('template/tp_footer_view'); 
    }  	
	public function index()
	{     
        $data = array();    
        $data['slideshow']  = $this->slideshow_model->get_imagenes();
		$this->mostrarVista($data,'principal_view');
       
	}
    public function empresa()
    {
        $this->mostrarVista(array(),'web/empresa_view');
    }
    public function iniciarCaptcha(){
       
        $this->load->model('captcha_model');
        $this->load->helper('captcha');                                                    
        $vals = array(
            'img_path' => './captcha/',
            'img_url' => base_url().'captcha/',
            'font_path' => './path/to/fonts/texb.ttf',
            'img_width' => '150',
            'img_height' => 30,
            'expiration' => 7200
        );

        $cap = create_captcha($vals);       
        $data = array(
            'captcha_time' => $cap['time'],
            'ip_address' => $this->input->ip_address(),
            'word' => $cap['word']
            );
          //pasamos la info del captcha al modelo para
        //insertarlo en la base de datos
        $this->captcha_model->insertar_captcha($data);               
        //creamos una sesión con el string del captcha que hemos creado
        //para utilizarlo en la función callback
        $this->session->set_userdata('captcha', $cap['word']);  
        return $cap;

    }
    public function validate_captcha()
    {
     
        if($this->input->post('captcha') != $this->session->userdata('captcha'))
        {
            //echo "<p>se envio eso = ".$this->input->post('captcha')."</p>";
            $this->form_validation->set_message('validate_captcha', 'Error en el codigo de verificacion');
            return false;
        }else{
            return true;
        }
     
    }
    public function contacto()
    {
          $data['resultado'] = '';        
       
        if ($this->input->server('REQUEST_METHOD') === 'POST'){
            //----------datos enviados por el Formulario------
             $data['fecha'] = ' 10/10/2015';            
             $this->form_validation->set_rules('nombre', 'Nombre y Apellido', 'required');
             $this->form_validation->set_rules('telefono', 'Telefono', 'required');
             $this->form_validation->set_rules('motivo', 'Motivo', 'required');
             $this->form_validation->set_rules('mensaje', 'Mensaje', 'required');
             $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
             $this->form_validation->set_rules('captcha', 'Captcha', 'callback_validate_captcha');


             if ($this->form_validation->run() == true)
             {
             $this->load->model('captcha_model');            
             $expiration = time()-600; // Límite de 10 minutos
             $ip = $this->input->ip_address();//ip del usuario
             $captcha = $this->input->post('captcha');//captcha introducido por el usuario             
            //eliminamos los captcha con más de 2 minutos de vida
             $this->captcha_model->remover_old_captcha($expiration);
            //comprobamos si es correcta la imagen introducida
             $check = $this->captcha_model->check($ip,$expiration,$captcha);
             
            /*
            |si el número de filas devuelto por la consulta es igual a 1
            |es decir, si el captcha ingresado en el campo de texto es igual
            |al que hay en la base de datos, junto con la ip del usuario
            |entonces dejamos continuar porque todo es correcto
            */
                   if($check == 1)
                   {                 
                    //---si los datos fueron correctos---                                       
                    $email_to = "artesaniasmariscal@gmail.com";
                    $nombre  = $this->input->post('nombre');
                    $empresa = $this->input->post('empresa');
                    $telefono= $this->input->post('telefono');
                    $motivo  = $this->input->post('motivo');
                    $mensaje  = $this->input->post('mensaje');
                    $email   = $this->input->post('email');

                    $email_message = "Detalles del formulario de contacto:\n\n";
                    $email_message .= "Nombre: " .$nombre.  "\n";
                    $email_message .= "Empresa: " .$empresa."\n";
                    $email_message .= "E-mail: " . $email . "\n";
                    $email_message .= "Teléfono: " . $telefono. "\n";
                    $email_message .= "Motivo: " . $motivo . "\n";
                    $email_message .= "Mensaje: " . $mensaje . "\n\n";
                    $email_from = $email;

                    $this->load->library('email');

                    $this->email->from($email, $nombre);
                    $this->email->to($email_to);
                    //$this->email->cc('');
                    //$this->email->bcc('ellos@su-ejemplo.com');

                    $this->email->subject($motivo);
                    $this->email->message($email_message);

                    //descomenar eso para enviar
                    /*$this->email->send();*/
                    $data['resultado'] = '<p>Se ha enviado su consulta!!!</p>';             
                    
                    }else{ //---error en algunos datos recibidos

                    $data['resultado'] = '<p>Error en el captcha!!!</p>';       
                    }
             }else{ //---error en algunos datos recibidos

                    $data['resultado'] = '<p>Ingrese los datos!!!</p>';
             }
        //----fin de  revision datos recibidos
        } 

        //---creando un captcha----
        $data['captcha'] = $this->iniciarCaptcha();        
        $this->mostrarVista($data,'web/contacto_view');
    }   


}
