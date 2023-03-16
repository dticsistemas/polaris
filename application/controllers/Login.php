<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();    
        //$this->load->model('personals_model');               
    }   
    public function index()
    {         
        $this->show_login();
    }
    function __encrip_password($password) 
    {
        return md5($password);
    }    
    public function check_login() 
    {                     

        $this->load->model('login_model');   
        $data=null;
        $this->form_validation->set_rules('username', 'nombre de usuario', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');  


        if ($this->form_validation->run())
        {
            $username  = $this->input->post('username');
            $password  =$this->input->post('password');
            //$password  = $this->__encrip_password($this->input->post('password')); 
             //echo $username." ->".$password;    
            $data = $this->login_model->validate($username, $password);
            if(isset($data))
            {             
                $estado = $data['estado'];
                if($estado){
                    $data['message'] = 'Bienvenido al Sistema '.$data['username'];               
                    $logs_login = array(
                    "id_usuario" => $this->session->userdata('id_usuario'),
                    "accion" => 'Inicio de session'
                    );                             
                    $this->db->insert('bitacora',$logs_login);                    

                }else{ //---cliente con cuenta bloqueada
                    $data['message'] = 'Su cuenta ha sido bloqueada, comuniquese con el administrador';               
                }
                
            }
            else // incorrect username or password
            {            
                $data['message'] = 'Usuario y Password Incorrectos';                                     
            } 
        }        
              
        $this->show_login($data);  
    }   
    public function show_welcome() {

        $data = $this->ce_login->validarSession();        
        //$data['menu'] = $this->ce_login->obtenerMenuPrivilegios($this->session->userdata('id_grupo'));            
        echo "mostrar bienvenida";
             
      //  $this->load->view('template/tp_principal_view');
        $this->load->view('template/tp_header_view',$data);                      
        //$this->load->view('template/tp_welcome_view', $data);  
        $this->load->view('template/tp_footer_view'); 
               
              
    }
     public function salir() {       
        $logs_login = array(
        "id_usuario" => $this->session->userdata('id_usuario'),
        "accion" => 'Cierre de session'
        );                             
        $this->db->insert('bitacora',$logs_login); 
        $this->session->sess_destroy();
        redirect('principal'); 
    }

    public function show_login($error=null) {       


        if($this->session->has_userdata('logged_in')){
            redirect('admin');
        }else{
        //---parametros a enviar configurables     
        $this->load->model('categorias_model');  
        $data['empresa'] = "Artesanias Mariscal";       
        $data['titulo']  = "PRODUCTOS POLARIS Promocion  Difusion de Productos en la WEB"; 
        $data['categorias'] = $this->categorias_model->get_categorias();
      
             $this->load->view('template/tp_header_view',$data);   
             $this->load->view('admin/login_view',$error);             
        }
    }
 
    
   
}